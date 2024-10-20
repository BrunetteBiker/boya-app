<?php

namespace App\Livewire;

use AllowDynamicProperties;
use App\Models\Order;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("Hesabatlar")]

class Raport extends Component
{

    public $quantityChart = [];

    public $fundsChart = [];
    public $years = [2024];

    public $selectedYear;

    function mount()
    {
        $this->selectedYear = $this->years[0];

        foreach (range(1, 30) as $item) {
            $this->years[] = $this->years[0] + $item;
        }




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


    #[Computed]
    function suppliers()
    {
        $users = User::query()->where("role_id",3);

        $users = $users->orderBy("remnant","desc");

        return $users->get();
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
