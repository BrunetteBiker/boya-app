<?php

namespace App\Livewire;

use App\Models\Phone;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Login extends Component
{


    public $errorMsg;

    public $executorId;

    function mount()
    {

    }

    function updated($prop)
    {

    }


    #[Computed]
    function executors()
    {
        return User::orderBy("name", "asc")->where("role_id", 1)->get();
    }

    function login()
    {

        Auth::loginUsingId($this->executorId);
        $this->redirect("order/dashboard");

    }

    public function render()
    {
        return view('livewire.login');
    }
}
