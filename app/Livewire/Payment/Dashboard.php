<?php

namespace App\Livewire\Payment;

use App\Exports\Orders;
use App\Exports\Payments;
use App\Models\Payment;
use App\Models\PaymentType;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Lazy]
#[Title("Ödənişlər")]
class Dashboard extends Component
{

    use WithPagination;

    public $searchState = false;

    public $orderBy = [
        "id|desc" => "Öncə yenilər",
        "id|asc" => "Öncə köhnələr",
        "amount|desc" => "Məbləğ üzrə (Çoxdan aza)",
        "amount|asc" => "Məbləğ üzrə (Azdan çoxa)",
        "is_cancelled|asc" => "Status üzrə (Öncə akitvlər)",
        "is_cancelled|desc" => "Status üzrə (Öncə ləğv edilənlər)",
    ];

    public $filters = [
        "term" => null,
        "orderBy" => "id|desc",
        "pid" => null,
        "customer" => null,
        "executor" => null,
        "cancelledBy" => null,
        "isCancelled" => "",
        "action" => "",
        "types" => [],
        "amount" => [
            "min" => null,
            "max" => null,
        ],
        "createdAt" => [
            "min" => null,
            "max" => null,
        ],
    ];

    function search($reset = false)
    {
        if ($reset) {
            $this->reset("filters");
        }

        $this->resetPage();
        $this->payments();
    }

    function updatedFilters()
    {
        $this->resetPage();
    }

    #[On("payment.dashboard.refresh")]
    function resetCurrentPayments()
    {
        $this->payments();
    }

    #[Computed]
    function summary()
    {

        $data["all"] = [
            "name" => "Bütün ödənişlər",
            "count" => Payment::query()->count() . " ədəd",
            "fund" => round(Payment::query()->sum("amount"), 2) . " AZN",
        ];

        $data["cancelled"] = [
            "name" => "Ləğv edilən ödənişlər",
            "count" => Payment::query()->where("is_cancelled", true)->count() . " ədəd",
            "fund" => round(Payment::query()->where("is_cancelled", true)->sum("amount"), 2) . " AZN",
        ];

        $data["oldDebt"] = [
            "name" => "Öncədən olan borc",
            "count" => Payment::query()->where("type_id", 1)->count() . " ədəd",
            "fund" => round(Payment::query()->where("type_id", 1)->sum("amount"), 2) . " AZN",
        ];

        $data["balance"] = [
            "name" => "Müştərilərin balansı",
            "count" => Payment::query()->where("type_id", 2)->count() . " ədəd",
            "fund" => round(Payment::query()->where("type_id", 2)->sum("amount"), 2) . " AZN",
        ];

        $data["supplierDebt"] = [
            "name" => "Tədarüçklərin ödənişi",
            "count" => Payment::query()->where("type_id", 3)->count() . " ədəd",
            "fund" => round(Payment::query()->where("type_id", 3)->sum("amount"), 2) . " AZN",
        ];

        $data["salesDebt"] = [
            "name" => "Satışlardan yaranmış borc",
            "count" => Payment::query()->where("type_id", 4)->count() . " ədəd",
            "fund" => round(Payment::query()->where("type_id", 4)->sum("amount"), 2) . " AZN",
        ];

        return $data;


    }

    #[Computed]
    function payments()
    {
        $filters = collect($this->filters)->filter();

        $amount = collect($filters["amount"])->filter();

        $createdAt = collect($filters["createdAt"])->filter();

        $orderBy = Str::of($filters["orderBy"])->explode("|");

        $items = Payment::query();

        $items = $items->orderBy($orderBy->first(), $orderBy->last());

        if ($filters->has("term")) {

            $items = $items->where("pid", "like", "%" . $filters["term"] . "%");

        } else {

            if ($filters->has("pid")) {
                $items = $items->where("pid", "like", "%" . $filters["pid"] . "%");
            }

            if ($filters->has("customer")) {
                $items = $items->whereHas("customer", function ($query) use ($filters) {
                    $query->where("name", "like", "%" . $filters["customer"] . "%");
                });
            }

            if ($filters->has("executor")) {
                $items = $items->whereHas("executor", function ($query) use ($filters) {
                    $query->where("name", "like", "%" . $filters["executor"] . "%");
                });
            }

            if ($filters->has("cancelledBy")) {
                $items = $items->whereHas("cancelledBy", function ($query) use ($filters) {
                    $query->where("name", "like", "%" . $filters["cancelledBy"] . "%");
                });
            }

            if ($filters->has("types")) {
                $items = $items->whereIn("type_id", $filters["types"]);
            }

            if ($filters->has("action")) {
                $items = $items->where("action_id", $filters["action"]);
            }

            if ($filters->has("isCancelled")) {
                if ($filters["isCancelled"] == -1) {
                    $filters["isCancelled"] = 0;
                }
                $items = $items->where("is_cancelled", $filters["isCancelled"]);
            }

            if ($amount->isNotEmpty()) {

                if ($amount->count() == 1) {
                    $items = $items->where("amount", $amount->first());
                } else {
                    $items = $items->where("amount", ">=", $amount->first());
                    $items = $items->where("amount", "<=", $amount->first());
                }
            }

            if ($createdAt->isNotEmpty()) {

                if ($createdAt->count() == 1) {
                    $date = Carbon::make($createdAt->first())->format("Y-m-d");
                    $items = $items->whereDate("created_at", $date);
                } else {
                    $min = Carbon::make($createdAt->first())->format("Y-m-d");
                    $max = Carbon::make($createdAt->first())->format("Y-m-d");
                    $items = $items->whereDate("created_at", ">=", $min);
                    $items = $items->whereDate("created_at", "<=", $max);
                }

            }

        }

        $items = $items->paginate(10);

        return $items;
    }

    function export()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new Payments($this->filters), "ödənişlər-".now()->format("d-m-y-h-i").".xlsx");
    }


    public function render()
    {
        return view('livewire.payment.dashboard');
    }
}
