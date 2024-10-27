<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Notification extends Component
{

    public $state = '';
    public $msg;
    public $autoHide = false;
    public $redirectUrl;
    public $reload = false;

    function resetNotify()
    {
        $this->reset();
    }

    #[On("notify")]
    function notify($state = false, $msg = "", $autoHide = false, $redirect = '')
    {
        $this->state = $state;
        $this->msg = $msg;

        if ($autoHide) {
            $this->dispatch('autoHide');
        }

        if ($this->reload){
            $this->dispatch("reload");
        }
        if ($redirect != "") {
            $this->dispatch("redirect", url: $redirect);
        }


    }


    public function render()
    {
        return view('livewire.notification');
    }
}
