<?php

namespace App\Livewire\Product;

use App\Exports\Products;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

#[Lazy]
#[Title("Məhsullar")]
class Dashboard extends Component
{
    use WithPagination;


    public $filters = [
        "name" => '',
        'visible' => ''
    ];

    #[Computed]
    function summary()
    {
        $data["all"] = [
            "name" => "Bütün məhsullar",
            "count" => Product::query()->count() . " ədəd",
        ];
        $data["active"] = [
            "name" => "Aktiv məhsullar",
            "count" => Product::query()->where("visible", true)->count() . " ədəd"
        ];
        $data["passive"] = [
            "name" => "Deaktiv məhsullar",
            "count" => Product::query()->where("visible", false)->count() . " ədəd"
        ];

        return $data;
    }

    function search($reset = false)
    {
        if ($reset) {
            $this->reset("filters");
        }
        $this->resetPage();
        $this->products();
    }


    public $sortings = [
        "name|asc" => "Məhsul adı üzrə (A-Z)",
        "name|desc" => "Məhsul adı üzrə (Z-A)",
        "visible|desc" => "Status üzrə",
    ];

    public $orderBy = "name|asc";

    function updated($prop)
    {
        switch ($prop) {
            case "orderBy":
                $this->resetPage();
                break;
        }
    }

    #[Computed]
    function products()
    {
        $filters = collect($this->filters)->filter(function ($value) {
            return $value != '';
        });

        $orderBy = Str::of($this->orderBy)->explode("|");

        $items = Product::query();

        $items = $items->orderBy($orderBy->first(), $orderBy->last());

        if ($filters->has('name')) {
            $items = $items->where('name', 'like', "%" . $filters->get("name") . "%");
        }

        if ($filters->has('visible')) {
            $items = $items->where('visible', $filters->get("visible"));

        }

        $items = $items->paginate(10);


        return $items;
    }

    function export()
    {
        $filename = "məhsullar-" . now()->format("d-m-y-h-i") . ".xlsx";
        return Excel::download(new Products(Product::orderBy("name", "asc")->get()), $filename);
    }

    function mount()
    {
    }



    #[On("payment.reload")]
    function reload()
    {
        $this->reset();
        $this->products();
    }

    public function render()
    {
        return view('livewire.product.dashboard');
    }
}
