<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class Create extends Component
{

    #[Url(except: false,as: 'create')]
    public $state = false;
    public $data = [
        "name" => null,
        "note" => null,
        "visible" => 1
    ];


    public $status = [
         "Deaktiv",
        "Aktiv",
    ];

    function create()
    {

        $validator = Validator::make($this->data, [
            'name' => "required",
        ], [
            'name.required' => 'Məhsulun adı daxil edilməlidir',
        ]);

        if ($validator->fails()) {
            $this->dispatch('notify', state: 'danger', msg: $validator->errors()->first(), autoHide: true);
            return;
        }

        $product = new Product();
        $product->name = $this->data["name"];
        $product->note = $this->data["note"];
        $product->visible = $this->data["visible"];
        $product->save();


        $product->pid = "PROD".Str::of($product->id)->padLeft(6,0).now()->format("dmY");
        $product->save();

        $this->dispatch('notify', state: "info", msg: "Yeni məhsul əlavə edildi", autoHide: true);
        $this->reset("data");
        $this->dispatch('payment.reload');

    }

    #[On("product.change-state")]
    function changeState($state = false)
    {
        $this->state = $state;
    }

    function mount()
    {
    }

    public function render()
    {
        return view('livewire.product.create');
    }
}
