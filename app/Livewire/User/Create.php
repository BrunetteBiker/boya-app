<?php

namespace App\Livewire\User;

use App\Events\RecordUpdate;
use App\Models\Phone;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{

    public $state = false;

    public $data = [
        "name" => "",
        "phones" => [''],
        "oldDebt" => 0,
        "balance" => 0,
        "role" => '',
        "remnant" => 0,
    ];

    function updatedData($val, $key)
    {
        if ($key == "role") {
            $this->data["remnant"] = 0;
            $this->data["balance"] = 0;
            $this->data["oldDebt"] = 0;
        }
    }

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
            "phones.*" => "unique:phones,item",
            "role" => "required"
        ], [
            "name.required" => "Müştərinin adı və soyadı daxil edilməlidir",
            "phones.min" => "Ən az bir ədəd əlaqə nömrəsi daxil edilməlidir",
            "phones.*.unique" => ":position nömrəli əlaqə nömrəsi istifadə olunmuşdur",
            "role.required" => "Vəzifə seçilməlidir",
        ]);

        if ($validator->fails()) {
            $this->dispatch("notify", state: "warning", msg: $validator->errors()->first());
            return;
        }


        $user = new User();
        $user->name = $this->data["name"];
        $user->old_debt = $this->data["oldDebt"];
        $user->balance = $this->data["balance"];
        $user->role_id = $this->data["role"];
        $user->remnant = $this->data["remnant"];
        $user->save();

        $user->pid = "USR" . $user->created_at->format("dmy") . Str::of($user->id)->padLeft(6, 0);
        $user->save();

        foreach ($this->data["phones"] as $phone) {
            Phone::insert([
                "user_id" => $user->id,
                "item" => $phone
            ]);
        }

        event(new RecordUpdate(userId: $user->id, note: Auth::user()->name . " tərəfindən portala əlavə olundu"));


        $this->state = false;
        $this->reset('data');
        $this->dispatch("notify", state: "success", msg: "Yeni istifadəçi sistemə əlavə olundu", autoHide: true);
        $this->dispatch('refresh-users');


    }

    public function render()
    {
        return view('livewire.user.create');
    }
}
