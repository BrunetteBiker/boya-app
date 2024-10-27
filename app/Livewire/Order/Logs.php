<?php

namespace App\Livewire\Order;

use App\Models\OrderLog;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title("Tarixçə")]
class Logs extends Component
{

    use WithPagination;

    public $orderBy = "id|desc";
    public $sortings = [
        "id|desc" => "Tarix üzrə (öncə yenilər)",
        "id|asc" => "Tarix üzrə (öncə köhnələr)",
    ];

    public $filters = [
        "result"=>null,
        "orderPid" => "",
        "executor" => "",
        "info" => "",
        "createdAt" => [
            "min" => "",
            "max" => ""
        ],
    ];

    function search($reset = false)
    {
        $this->resetPage();
        if ($reset) {
            $this->reset();
            $this->filters["result"] = $this->items()->total();

        }
    }

    function mount()
    {
        $this->filters["result"] = $this->items()->total();
    }

    function updated()
    {
        $this->filters["result"] = $this->items()->total();
    }

    #[Computed]
    function summary()
    {
        $count = OrderLog::query()->count();
        $data["all"] = [
            "name" => "Ümumi fəaliyyətlər",
            "count" => $count . " ədəd"
        ];

        $count = OrderLog::query()->whereDate("created_at",Carbon::today())->count();

        $data["daily"] = [
            "name" => "Bugünə olan fəaliyyətlər",
            "count" => $count . " ədəd"
        ];

        $count = OrderLog::query()->whereBetween("created_at",[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->count();

        $data["weekly"] = [
            "name" => "Cari həftədə olan fəaliyyətlər",
            "count" => $count . " ədəd"
        ];

        $count = OrderLog::query()->whereMonth("created_at",Carbon::now()->month)->whereYear("created_at",now()->year)->count();
        $data["monthly"] = [
            "name" => "Cari ayda olan fəaliyyətlər",
            "count" => $count . " ədəd"
        ];

        $count = OrderLog::query()->whereBetween("created_at",[Carbon::create(Carbon::now()->year,1,1),Carbon::now()])->count();
        $data["halfOfYear"] = [
            "name" => "Yanvar ayından <strong class='font-semibold underline'>". now()->format("d-m-Y H:i:s") ."</strong> tarixinə qədər olan əməliyyatlar",
            "count" => $count . " ədəd"
        ];

        return $data;
    }

    #[Computed]
    function items()
    {
        $filters = collect($this->filters)->filter();
        $createdAt = collect($this->filters["createdAt"])->filter();

        $orderBy = Str::of($this->orderBy)->explode("|")->collect();
        $items = OrderLog::query();
        $items = $items->orderBy($orderBy->first(), $orderBy->last());

        if ($filters->has("orderPid")) {
            $items = $items->whereHas("order", function ($query) use ($filters) {
                $query->where("pid", "like", "%" . $filters["orderPid"] . "%");
            });
        }

        if ($filters->has("executor")) {
            $items = $items->whereHas("executor", function ($query) use ($filters) {
                $query->where("name", "like", "%" . $filters["executor"] . "%");
            });
        }

        if ($filters->has("info")) {
            $items = $items->where("info", "like", "%" . $filters["info"] . "%");
        }

        if ($createdAt->isNotEmpty()) {
            if ($createdAt->count() == 1) {
                $items = $items->whereDate("created_at", $createdAt->first());
            } elseif ($createdAt->count() == 2) {
                $items = $items->whereDate("created_at", ">=", $createdAt->first());
                $items = $items->whereDate("created_at", "<=", $createdAt->last());

            }
        }

        $items = $items->paginate();



        return $items;
    }

    public function render()
    {
        return view('livewire.order.logs');
    }
}
