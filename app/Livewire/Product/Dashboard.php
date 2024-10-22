<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title("Məhsullar")]
class Dashboard extends Component
{
    use WithPagination;
    public $newProduct = [
        "state" => false,
        'name' => '',
        'note' => '',
        "visible" => 1
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
        'visible' => ''
    ];

    function search($reset = false)
    {
        if ($reset) {
            $this->reset("filters");
        }
        $this->resetPage();
        $this->products();
    }

    function create()
    {

        $validator = Validator::make($this->newProduct, [
            'name' => "required",
        ], [
            'name.required' => 'Məhsulun adı daxil edilməlidir',
        ]);

        if ($validator->fails()) {
            $this->dispatch('notify', state: 'danger', msg: $validator->errors()->first(), autoHide: true);
            return;
        }

        Product::insert([
            "name" => $this->newProduct["name"],
            "visible" => $this->newProduct["visible"],
            "note" => $this->newProduct["note"]
        ]);

        $this->dispatch('notify', state: "info", msg: "Yeni məhsul əlavə edildi", autoHide: true);
        $this->reset("newProduct");

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

    function mount()
    {
    }

    public function render()
    {
        return view('livewire.product.dashboard');
    }
}
