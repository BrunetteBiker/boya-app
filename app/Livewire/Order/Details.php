<?php

namespace App\Livewire\Order;

use App\Events\PaymentLog;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("Sifariş məlumatları")]
class Details extends Component
{
    public $order;

    public $increaseBalance = false;
    public $payFromBalance = false;
    public $paymentAmount = 0;
    public $paymentRest;

    function incrementIncome()
    {

        if ($this->payFromBalance) {
            if ($this->paymentAmount < $this->order->customer->balance) {

                event(new PaymentLog(customerId: $this->order->customer_id, typeId: 3, amount: $this->paymentAmount, note: $this->order->pid() . " kodlu sifariş borcu üçün silinmə olundu."));

            } else {
                $this->dispatch("notify", state: "warning", msg: "Balansda kifayət qədər vəsait yoxdur.");
                return;
            }
        }

        if ($this->paymentRest < 0) {
            $this->order->debt = 0;
            $this->order->paid = $this->order->total;
            event(new PaymentLog(orderId: $this->order->id, customerId: $this->order->customer_id, amount: $this->paymentAmount, typeId: 1, note: "Borc ödənişi edildi. Borc sıfırlandı."));
        } else {
            $this->order->debt = abs($this->paymentRest);
            $this->order->increment("paid", abs($this->paymentAmount));
            event(new PaymentLog(orderId: $this->order->id, customerId: $this->order->customer_id, amount: $this->paymentAmount, typeId: 1, note: "Borc ödəniş edildi."));
        }
        $this->order->save();

        if ($this->increaseBalance) {
            $this->order->customer->increment("balance", abs($this->paymentRest));
            event(new PaymentLog(customerId: $this->order->customer_id, amount: abs($this->paymentRest), typeId: 2, note: $this->order->pid() . " kodlu sifariş ödənişindən artıq qalan vəsait."));
        }

        $this->dispatch("notify", state: "success", msg: "Ödəniş həyata keçirildi", autoHide: false);


    }

    function updated($prop)
    {
        if ($prop == "paymentAmount") {
            $this->paymentRest = $this->order->debt - (float)$this->paymentAmount;
        }

        if ($prop == "payFromBalance") {
            $this->increaseBalance = false;
        }
    }

    function mount($id)
    {
        $this->order = Order::findOrFail($id);
        $this->paymentRest = $this->order->debt;
    }


    #[Computed]
    function payments()
    {
        $items = Payment::where("order_id", $this->order->id)->orderBy("id", "desc");

        $items = $items->paginate(10);

        return $items;

    }

    #[Computed]
    function orderItems()
    {
        return OrderItem::where("order_id", $this->order->id)->paginate();
    }

    public function render()
    {
        return view('livewire.order.details');
    }
}
