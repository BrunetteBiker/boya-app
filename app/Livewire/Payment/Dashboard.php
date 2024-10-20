<?php

namespace App\Livewire\Payment;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("Ödənişlər")]
class Dashboard extends Component
{


    public function render()
    {
        return view('livewire.payment.dashboard');
    }
}
