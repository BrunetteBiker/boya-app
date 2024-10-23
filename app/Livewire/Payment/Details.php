<?php

namespace App\Livewire\Payment;

use App\Models\Payment;
use Livewire\Attributes\On;
use Livewire\Component;

class Details extends Component
{
    public $state = false;
    public $payment = null;
    public $explanation = null;

    #[On("payment.details.changeState")]
    function changeState($id = null)
    {
        $this->state = !$this->state;

        if (!is_null($id)) {
            $this->payment = Payment::find($id);
        } else {
            $this->reset();
        }

    }

    function cancel()
    {
        $this->dispatch("payment.cancel", explanation: $this->explanation, payment: $this->payment->id);
    }

    public function render()
    {
        return view('livewire.payment.details');
    }
}
