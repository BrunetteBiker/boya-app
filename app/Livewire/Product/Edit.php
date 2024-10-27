<?php

namespace App\Livewire\Product;

use App\Models\Product;
use FontLib\Table\Type\name;
use Livewire\Attributes\On;
use Livewire\Component;

class Edit extends Component
{


    public $id;

    public $state = false;

    public $product;

    public $data = [
        "name" => "",
        "note" => null,
        "visible" => null,
    ];

    #[On("product.edit")]
    function changeState($id = null)
    {
        if (!is_null($id)) {
            $this->state = true;
            $this->id = $id;
            $product = Product::find($id);
            $this->data["name"] = $product->name;
            $this->data["note"] = $product->note;
            $this->data["visible"] = $product->visible;
            $this->product = $product;
        } else {
            $this->reset();
        }

    }

    function edit()
    {
        if (is_null($this->data["name"])) {
            $this->dispatch("notify", state: "warning", msg: "Məhsulun adı daxil edilməlidir", autoHide: true);
            return;
        }

        $this->product->name = $this->data["name"];
        $this->product->note = $this->data["note"];
        $this->product->visible = $this->data["visible"];
        $this->product->save();

        $this->dispatch("notify", state: "info", msg: "Düzləşişlər qeydə alındı", autoHide: true);

        $this->dispatch("payment.reload");
        $this->reset();


    }

    public function render()
    {
        return view('livewire.product.edit');
    }
}
