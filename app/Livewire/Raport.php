<?php

namespace App\Livewire;

use AllowDynamicProperties;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Psy\Util\Str;

#[Title("Hesabatlar")]
class Raport extends Component
{

    use WithPagination, WithoutUrlPagination;

    public $quantityChart = [];

    public $fundsChart = [];

    public $years = [];

    public $selectedYear;

    function mount()
    {


        $this->years["min"] = Order::query()->first()->created_at->format("Y");
        $this->years["max"] = Order::query()->latest()->first()->created_at->format("Y");

        $this->selectedYear = $this->years["min"];


    }

    public $monthes = [
        "Yanvar",
        "Fevral",
        "Mart",
        "Aprel",
        "May",
        "İyun",
        "İyul",
        "Avqust",
        "Sentyabr",
        "Oktyabr",
        "Noyabr",
        "Dekabr",
    ];

    function countByStatusWithIntervalExecute()
    {
        $this->countByStatusWithInterval();
    }

    public $countByStatusWithIntervalSearch = [
        "start" => null,
        "end" => null
    ];

    #[Computed]
    function countByStatusWithInterval()
    {
        $data = [];

        $search = collect($this->countByStatusWithIntervalSearch)->filter();
        if ($search->count() == 1) {

            $funds = Order::query()
                ->whereDate("created_at", Carbon::make($search->first())->format("Y-m-d"))
                ->sum("total");
            $count = Order::query()
                ->whereDate("created_at", Carbon::make($search->first())->format("Y-m-d"))
                ->count();

        } elseif ($search->count() === 2) {

            $funds = Order::query()
                ->whereDate("created_at", "<=", Carbon::make($search->first())->format("Y/m/d"))
                ->whereDate("created_at", ">=", Carbon::make($search->first())->format("Y/m/d"))
                ->sum("total");

            $count = Order::query()
                ->whereDate("created_at", "<=", Carbon::make($search->first())->format("Y/m/d"))
                ->whereDate("created_at", ">=", Carbon::make($search->first())->format("Y/m/d"))
                ->count();

        } else {
            $funds = Order::query()
                ->sum("total");

            $count = Order::query()
                ->count();
        }
        $funds = round($funds) . " AZN";

        $data[] = [
            "name" => "Ümumi",
            "count" => $count . " ədəd",
            "funds" => $funds,
        ];

        foreach (OrderStatus::query()->orderBy("name", "asc")->get() as $os) {
            if ($search->count() == 1) {

                $funds = Order::query()
                    ->where("status_id", $os->id)
                    ->whereDate("created_at", Carbon::make($search->first())->format("Y/m/d"))
                    ->sum("total");

                $count = Order::query()
                    ->where("status_id", $os->id)
                    ->whereDate("created_at", Carbon::make($search->first())->format("Y/m/d"))
                    ->count();

            } elseif ($search->count() === 2) {

                $funds = Order::query()
                    ->where("status_id", $os->id)
                    ->whereDate("created_at", "<=", Carbon::make($search->first())->format("Y/m/d"))
                    ->whereDate("created_at", ">=", Carbon::make($search->first())->format("Y/m/d"))
                    ->sum("total");

                $count = Order::query()
                    ->where("status_id", $os->id)
                    ->whereDate("created_at", "<=", Carbon::make($search->first())->format("Y/m/d"))
                    ->whereDate("created_at", ">=", Carbon::make($search->first())->format("Y/m/d"))
                    ->count();

            } else {

                $funds = Order::query()
                    ->where("status_id", $os->id)
                    ->sum("total");

                $count = Order::query()
                    ->where("status_id", $os->id)
                    ->count();
            }

            $funds = round($funds) . " AZN";
            $data[] = [
                "name" => $os->name,
                "count" => $count . " ədəd",
                "funds" => $funds,
            ];
        }

        return $data;
    }

    public $supplierSortings = [
        "remnant|desc" => "Borc üzrə çoxdan aza",
        "remnant|asc" => "Borc üzrə azdan çoxa",
        "name|asc" => "Ad və soyad üzrə (A-Z)",
        "name|desc" => "Ad və soyad üzrə (Z-A)",
    ];
    public $suppliersFilter = [
        "orderBy" => "remnant|desc",
        "term" => "",
        "pid" => "",
        "name" => "",
        "remnant" => [
            "min" => "",
            "max" => ""
        ]
    ];

    function updatedSuppliersFilter($val, $key)
    {
        if ($key == "orderBy" || $key == "term") {
            $this->resetPage();
        }
    }

    function searchSupplier($reset = false)
    {

        if ($reset) {
            $this->reset(['suppliersFilter']);
        }

        $this->resetPage();
        $this->suppliers();
    }

    #[Computed]
    function suppliers()
    {
        $filters = collect($this->suppliersFilter)->filter();
        $remnant = collect($filters["remnant"])->filter();
        $orderBy = \Illuminate\Support\Str::of($filters["orderBy"])->explode("|")->collect();

        $users = User::query()->where("remnant", ">", 0);

        if ($filters->has("term")) {
            $users = $users
                ->where("name", "like", "%" . $filters["term"] . "%")
                ->orWhere("pid", "like", "%" . $filters["term"] . "%");
        } else {
            if ($filters->has("pid")) {
                $users = $users->where("pid", "like", "%" . $filters["pid"] . "%");
            }

            if ($filters->has("name")) {
                $users = $users->where("name", "like", "%" . $filters["name"] . "%");
            }

            if ($remnant->count() == 1) {
                $users = $users->where("remnant", $remnant->first());
            } elseif ($remnant->count() == 2) {
                $users = $users->where("remnant", ">=", $remnant->first());
                $users = $users->where("remnant", "<=", $remnant->last());
            }
        }

        $users = $users->orderBy($orderBy->first(), $orderBy->last());

        return $users->paginate();
    }

    public function render()
    {

        $quantityData = [
            "Ümumi" => [],
            "Ödənilib" => [],
            "Borc" => [],
            "Ləğv" => [],
        ];
        $fundsData = [
            "Ümumi" => [],
            "Ödənilib" => [],
            "Borc" => [],
            "Ləğv" => [],
        ];

        foreach ($this->monthes as $index => $month) {
            $fundsData["Ümumi"][] = round(Order::query()->whereMonth("created_at", $index + 1)->sum("total"), 2);
            $fundsData["Ödənilib"][] = round(Order::query()->whereNot("status_id", 4)->whereMonth("created_at", $index + 1)->sum("paid"), 2);
            $fundsData["Borc"][] = round(Order::query()->whereNot("status_id", 4)->whereMonth("created_at", $index + 1)->sum("debt"), 2);
            $fundsData["Ləğv"][] = round(Order::query()->where("status_id", 4)->whereMonth("created_at", $index + 1)->sum("total"), 2);

            $quantityData["Ümumi"][] = Order::query()->whereMonth("created_at", $index + 1)->count();
            $quantityData["Ödənilib"][] = Order::query()->whereNot("status_id", 4)->whereMonth("created_at", $index + 1)->count();
            $quantityData["Borc"][] = Order::query()->whereNot("status_id", 4)->whereMonth("created_at", $index + 1)->count();
            $quantityData["Ləğv"][] = Order::query()->where("status_id", 4)->whereMonth("created_at", $index + 1)->count();
        }

        $this->fundsChart["categories"] = $this->monthes;
        $this->fundsChart["series"] = [];

        foreach ($fundsData as $name => $data) {
            $this->fundsChart["series"][] = [
                "name" => $name,
                "data" => $data
            ];
        }

        $this->quantityChart["categories"] = $this->monthes;
        $this->quantityChart["series"] = [];

        foreach ($quantityData as $name => $data) {
            $this->quantityChart["series"][] = [
                "name" => $name,
                "data" => $data
            ];
        }

        return view('livewire.raport');
    }
}
