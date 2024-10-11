<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public $newProduct = [
        'name' => '',
        'min' => '',
        'max' => ''
    ];
    public $selectedId;
    public $selectedProduct = [
        'name' => '',
        'min' => 0,
        'max' => 0,
        'visible' => 0
    ];

    function select($id)
    {
        $this->selectedId = $id;
        $product = Product::find($this->selectedId);
        $this->selectedProduct["name"] = $product->name;
        $this->selectedProduct["min"] = $product->min_price;
        $this->selectedProduct["max"] = $product->max_price;
        $this->selectedProduct["visible"] = (bool)$product->visible;
    }

    function modify()
    {

        $current = Product::find($this->selectedId);
        $current->name = $this->selectedProduct["name"] ?? $current->name;
        $current->min_price = $this->selectedProduct["min"] ?? $current->min_price;
        $current->max_price = $this->selectedProduct["max"] ?? $current->max_price;
        $current->visible = $this->selectedProduct["visible"];
        $current->save();

        $this->dispatch('notify', state: 'info', msg: 'Düzəlişlər qeydə alındı', autoHide: true);

        $this->reset('selectedId');
    }

    public $filters = [
        "name" => '',
        "min" => '',
        'max' => '',
        'visible' => ''
    ];


    function search()
    {
        $this->resetPage();
        $this->products();
    }

    function resetSearch()
    {
        $this->resetPage();
        $this->reset('filters');
    }
    function create()
    {
        $validator = Validator::make($this->newProduct, [
            'name' => "required",
            'min' => 'required',
            'max' => 'required'
        ], [
            'name.required' => 'Məhsulun adı daxil edilməlidir',
            'min.required' => 'Minimal məbləğ daxil edilməlidir',
            'max.required' => 'Maksimal məbləğ daxil edilməlidir',
        ]);
        if ($validator->fails()) {
            $this->dispatch('notify', state: 'danger', msg: $validator->errors()->first(), autoHide: true);
        }
        Product::insert([
            "name" => $this->newProduct["name"],
            "min_price" => $this->newProduct["min"],
            "max_price" => $this->newProduct["max"],
        ]);

        $this->dispatch('notify', state: "info", msg: "Yeni məhsul əlavə edildi", autoHide: true);

    }

    #[Computed]
    function products()
    {
        $filters = collect($this->filters)->filter(function ($value){
            return $value != '';
        });

        $orderBy = collect(['name', 'desc']);

        $items = Product::query();

        if ($filters->has('name')) {
            $items = $items->where('name', 'like', "%" . $filters->get("name") . "%");
        }

        if ($filters->has('min')) {
            $items = $items->where('min_price', '>=', $filters->get("min"));
            $orderBy = collect(['min_price', "desc"]);
        }

        if ($filters->has('max')) {
            $items = $items->where('max_price', '<=', $filters->get("max"));
            $orderBy = collect(['max_price', "desc"]);
        }

        if ($filters->has('visible')) {
            $items = $items->where('visible', $filters->get("visible"));

        }

        $items = $items->orderBy($orderBy->first(), $orderBy->last())->paginate(10);
        return $items;
    }

    function mount()
    {
    }

    public function render()
    {
        return view('livewire.product.dashboard');
    }
}
