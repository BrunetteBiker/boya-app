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
        "state" => false,
        'name' => '',
        'note' => '',
        "status" => true
    ];
    public $selectedId;
    public $selectedProduct = [
        'name' => '',
        'note' => '',
        'visible' => 0
    ];

    function select($id)
    {
        $this->selectedId = $id;
        $product = Product::find($this->selectedId);
        $this->selectedProduct["name"] = $product->name;
        $this->selectedProduct["note"] = $product->note;
        $this->selectedProduct["visible"] = (int)$product->visible;
    }

    function modify()
    {
        $current = Product::find($this->selectedId);
        $current->name = $this->selectedProduct["name"] ?? $current->name;
        $current->note = $this->selectedProduct["note"];
        $current->visible = $this->selectedProduct["visible"];
        $current->save();

        $this->dispatch('notify', state: 'info', msg: 'Düzəlişlər qeydə alındı', autoHide: true);

        $this->reset('selectedId');
    }

    public $filters = [
        "name" => '',
        "keyword" => '',
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
        $filters = collect($this->filters)->filter(function ($value) {
            return $value != '';
        });

        $orderBy = collect(['name', 'desc']);

        $items = Product::query();

        if ($filters->has('name')) {
            $items = $items->where('name', 'like', "%" . $filters->get("name") . "%");
        }

        if ($filters->has('keyword')) {
            $this->resetPage();
            $items = $items->where('id', 'like', "%" . $filters->get("keyword") . "%")
                ->orWhere('name', 'like', "%" . $filters->get("keyword") . "%")
                ->orWhere('note', 'like', "%" . $filters->get("keyword") . "%");
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
