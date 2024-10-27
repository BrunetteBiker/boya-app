<?php

namespace App\Livewire\Payment;

use App\Events\AcceptPayment;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Component;

class Details extends Component
{
    public $state = false;
    public $payment = null;
    public $explanation = null;

    function placeholder()
    {
        return <<<'HTML'
                <div class="opacity-0"></div>
               HTML;
    }

    #[On("payment.details.changeState")]
    function changeState($id = null)
    {
        $this->state = !$this->state;

        if (!is_null($id)) {
            $this->payment = Payment::find($id);
            $this->cancelData["explanation"] = $this->payment->explanation;

        } else {
            $this->reset();
        }

    }

    public $cancelData = [
        "explanation" => null
    ];


    function cancel()
    {

        if (is_null($this->cancelData["explanation"])) {
            $this->dispatch("notify", state: "warning", msg: "Ləğv səbəbi daxil edilməlidir", autoHide: false);
            return;
        }

        $this->payment->cancelled_by = Auth::id();
        $this->payment->explanation = $this->cancelData["explanation"];
        $this->payment->is_cancelled = true;
        $this->payment->save();

        $customer = $this->payment->customer;
        $customer->increment("balance", $this->payment->amount);


        event(new AcceptPayment(order: null, customer: $customer->id, amount: $this->payment->amount, action: 1, type: 2, note: $this->payment->pid . " kodlu ödənişin ləğvindən yaranmış artım."));


        $this->dispatch("notify", state: "info", msg: "Ödəniş ləğv edildi", autoHide: true);
        $this->dispatch("payment.dashboard.refresh");
        sleep(3);
        $this->reset();
    }

    public function render()
    {
        return view('livewire.payment.details');
    }
}
