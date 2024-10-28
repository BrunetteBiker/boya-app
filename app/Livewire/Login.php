<?php

namespace App\Livewire;

use App\Models\Phone;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Lazy]
#[Title("Portala giriş")]
class Login extends Component
{
    public $executorId = null;

    function mount()
    {

    }

    #[Computed]
    function executors()
    {
        return User::orderBy("name", "asc")->where("role_id", 1)->get();
    }

    function login()
    {

        if (is_null($this->executorId)) {
            $this->dispatch("notify", state: "warning", msg: "İcraçı seçilməlidir", autoHide: true);
            return;
        }


        Auth::loginUsingId($this->executorId);
        $this->redirect("order/dashboard");

    }

    public function render()
    {
        return view('livewire.login');
    }
}
