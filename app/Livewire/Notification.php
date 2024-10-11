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

    function resetNotify()
    {
        $this->reset();
    }

    #[On("notify")]
    function notify($state = false, $msg = "", $autoHide = false, $redirectUrl = '')
    {
        $this->state = $state;
        $this->msg = $msg;

        if ($autoHide) {
            $this->dispatch('autoHide')   ;
        }

        $this->redirectUrl = $redirectUrl;
    }


    public function render()
    {
        return view('livewire.notification');
    }
}
