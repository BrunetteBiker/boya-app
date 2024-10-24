<?php

namespace App\Livewire\Order;

use App\Exports\Orders;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Excel;

#[Title("Sifarişlər")]
class Dashboard extends Component
{

    use WithPagination;

    public $searchState = false;

    public $sortings = [
        "id|desc" => "Öncə yenilər",
        "id|asc" => "Öncə köhnələr",
        "total|desc" => "Yekun məbləğ (çoxdan-aza)",
        "total|asc" => "Yekun məbləğ (azdan-çoxa)",
        "debt|desc" => "Borc (çoxdan-aza)",
        "debt|asc" => "Borc (azdan-çoxa)",
    ];

    #[Url]
    public $orderBy = "id|desc";

    public $filters = [
        "receipt"=>"",
        'pid' => '',
        'customer' => '',
        'executor' => '',
        'status' => [],
        'total' => [
            "min" => '',
            'max' => ''
        ],
        'debt' => [
            "min" => '',
            'max' => ''
        ],
        'paid' => [
            "min" => '',
            'max' => ''
        ],
        'discount' => [
            "min" => '',
            'max' => ''
        ],
        'createdAt' => [
            "min" => '',
            'max' => ''
        ],
    ];


    function search($reset = false)
    {

        $this->resetPage();

        if ($reset) {
            $this->reset(["filters"]);
        }

        $this->orders();
    }

    function updated($prop)
    {
        switch ($prop) {
            case "orderBy":
                $this->resetPage();
                break;
        }
    }

    function updatedFilters()
    {
        $this->resetPage();
    }

    function mount()
    {


    }

    #[Computed]
    function orders()
    {
        $orderBy = Str::of($this->orderBy)->explode("|")->collect();

        $filters = collect($this->filters)->filter();
        $createdAt = collect($this->filters["createdAt"])->filter();
        $total = collect($this->filters["total"])->filter();
        $discount = collect($this->filters["discount"])->filter();
        $paid = collect($this->filters["paid"])->filter();
        $debt = collect($this->filters["debt"])->filter();


        $items = Order::query();

        if ($filters->has("pid")) {
            $items = $items->where("pid", "like", "%" . $filters["pid"] . "%");
        }

        if ($filters->has("receipt")) {
            $items = $items->whereHas("items",function ($query) use ($filters){
                $query->where("receipt","like","%".$filters["receipt"]."%");
            });
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

        if ($filters->has("status")) {
            $items = $items->whereIn("status_id", $filters["status"]);
        }

        if ($createdAt->isNotEmpty()) {

            if ($createdAt->count() == 1) {
                $items = $items->whereDate("created_at", Carbon::make($createdAt->first())->format("Y-m-d"));
            } else {
                $items = $items->whereDate("created_at", ">=", Carbon::make($createdAt->first())->format("Y-m-d"));
                $items = $items->whereDate("created_at", "<=", Carbon::make($createdAt->last())->format("Y-m-d"));
            }
        }

        if ($total->isNotEmpty()) {

            if ($total->has("min")) {
                $items = $items->where("total", ">=", $total["min"]);
            }
            if ($total->has("max")) {
                $items = $items->where("total", "<=", $total["max"]);
            }
        }

        if ($discount->isNotEmpty()) {

            if ($discount->has("min")) {
                $items = $items->where("discount", ">=", $total["min"]);
            }
            if ($discount->has("max")) {
                $items = $items->where("discount", "<=", $total["max"]);
            }
        }

        if ($paid->isNotEmpty()) {

            if ($paid->has("min")) {
                $items = $items->where("paid", ">=", $paid["min"]);
            }
            if ($paid->has("max")) {
                $items = $items->where("paid", "<=", $paid["max"]);
            }
        }

        if ($debt->isNotEmpty()) {

            if ($debt->has("min")) {
                $items = $items->where("debt", ">=", $debt["min"]);
            }
            if ($debt->has("max")) {
                $items = $items->where("debt", "<=", $debt["max"]);
            }
        }

        $items = $items->orderBy($orderBy->first(), $orderBy->last());
        $items = $items->paginate();

        return $items;
    }

    #[Computed]
    function summary()
    {
        $count = Order::query()->count();
        $funds = Order::query()->sum("total");
        $funds = round($funds,2);
        $data["all"] = [
            "name"=>"Bütün sifarişlər",
            "count"=>$count . " ədəd",
            "funds"=>$funds . " AZN"
        ];

        $count = Order::query()->where("debt",">",0)->count();
        $funds = Order::query()->where("debt",">",0)->sum("total");
        $funds = round($funds,2);
        $data["hasDebt"] = [
            "name"=>"Borc olan sifarişlər",
            "count"=>$count . " ədəd",
            "funds"=>$funds . " AZN"
        ];

        $count = Order::query()->where("status_id",4)->count();
        $funds = Order::query()->where("status_id",4)->sum("total");
        $funds = round($funds,2);
        $data["cancelled"] = [
            "name"=>"Ləğv olunan sifarişlər",
            "count"=>$count . " ədəd",
            "funds"=>$funds . " AZN"
        ];

        $count = Order::query()->where("status_id",1)->count();
        $funds = Order::query()->where("status_id",1)->sum("total");
        $funds = round($funds,2);
        $data["inProgress"] = [
            "name"=>"İcrada olan sifarişlər",
            "count"=>$count . " ədəd",
            "funds"=>$funds . " AZN"
        ];

        $count = Order::query()->where("status_id",2)->count();
        $funds = Order::query()->where("status_id",2)->sum("total");
        $funds = round($funds,2);
        $data["completed"] = [
            "name"=>"Hazır olan sifarişlər",
            "count"=>$count . " ədəd",
            "funds"=>$funds . " AZN"
        ];

        $count = Order::query()->where("status_id",3)->count();
        $funds = Order::query()->where("status_id",3)->sum("total");
        $funds = round($funds,2);
        $data["delivered"] = [
            "name"=>"Hazır olan sifarişlər",
            "count"=>$count . " ədəd",
            "funds"=>$funds . " AZN"
        ];

        return $data;
    }

    function export()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new Orders($this->filters), "sifarişlər-".now()->format("d-m-y-h-i").".xlsx");
    }

    public function render()
    {
        return view('livewire.order.dashboard');
    }
}
