<?php

namespace App\Livewire\User;

use App\Models\Phone;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{

    public $state = false;

    public $data = [
        "name" => "",
        "phones" => [''],
        "debt" => 0,
        "balance" => 0,
        "isExecutor" => false
    ];

    function addPhone()
    {
        $this->data["phones"][] = "";
    }
    function removePhone($index)
    {
        if (count($this->data["phones"]) > 1) {
            unset($this->data["phones"][$index]);
            $this->data["phones"] = array_values($this->data["phones"]);
        }

    }
    #[On("create-user")]
    function changeState()
    {
        $this->state = !$this->state;

        if ($this->state == false) {
            $this->reset('data');
        }

    }

    function createUser()
    {

        $data = collect($this->data)->filter();
        $data["phones"] = collect($data->get("phones"))->filter()->toArray();


        $validator = Validator::make($data->toArray(), [
            'name' => "required",
            "phones" => "array|min:1",
            "phones.*" => "unique:phones,item"
        ], [
            "name.required" => "Müştərinin adı və soyadı daxil edilməlidir",
            "phones.min" => "Ən az bir ədəd əlaqə nömrəsi daxil edilməlidir",
            "phones.*.unique" => ":position nömrəli əlaqə nömrəsi istifadə olunmuşdur",
        ]);

        if ($validator->fails()) {
            $this->dispatch("notify", state: "warning", msg: $validator->errors()->first());
            return;
        }

        $user = new User();
        $user->name = $this->data["name"];
        $user->debt = $this->data["debt"];
        $user->balance = $this->data["balance"];
        $user->is_executor = $this->data["isExecutor"];
        $user->save();

        foreach ($this->data["phones"] as $phone) {
            Phone::insert([
                "user_id" => $user->id,
                "item" => $phone
            ]);
        }

        $this->reset('data');
        $this->dispatch("notify", state: "success", msg: "Yeni istifadəçi sistemə əlavə olundu", autoHide: true);
        $this->dispatch('create-user');

    }

    public function render()
    {
        return view('livewire.user.create');
    }
}
