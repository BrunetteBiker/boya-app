<?php

namespace App\Livewire\Payment;

use App\Events\AcceptPayment;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Component;

class Cancel extends Component
{

    public $state = false;

    public $explanation = null;
    public $payment = null;
    public $pid = null;

    #[On("cancel-payment-change-state")]
    function changeState($id = null)
    {
        $this->state = !$this->state;

        if (!is_null($id)) {
            $this->payment = Payment::query()->find($id);
            $this->pid = $this->payment->pid;
        } else {
            $this->payment = null;
        }

    }


    #[On("payment.cancel")]
    function save($payment = null, $explanation = null)
    {

        $this->explanation = $explanation;


        if (!is_null($payment)) {
            $this->payment = Payment::find($payment);
        }

        if (is_null($this->explanation)) {
            $this->dispatch("notify", state: "warning", msg: "Ləğv səbəbi gösətərilməlidir", autoHide: true);
            return;
        }


        $this->payment->is_cancelled = true;
        $this->payment->cancelled_by = Auth::id();
        $this->payment->explanation = $this->explanation;
        $this->payment->save();

        $this->payment->customer->increment("balance", $this->payment->amount);
        event(new AcceptPayment(order: null, customer: $this->payment->customer_id, type: 2, action: 1, amount: $this->payment->amount, note: $this->payment->pid . " kodlu ödənişin ləğvindən gələn artım"));


        if (!is_null($payment)) {
            $this->dispatch("payment.details.changeState");
        }else{
            $this->reset();
        }
        $this->dispatch('payment.dashboard.refresh');
        $this->dispatch("notify", state: "info", msg: "Sifariş ləğv edildi", autoHide: true);


    }

    public function render()
    {
        return view('livewire.payment.cancel');
    }
}
