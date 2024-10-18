<?php

namespace App\Livewire\Order;

use App\Events\AcceptPayment;
use App\Events\PaymentLog;
use App\Events\RecordUpdate;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\UpdateLog;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\DocBlock\Tags\Deprecated;

#[Title("Sifariş məlumatları")]
class Details extends Component
{

    use WithPagination;

    public $order;

    public $state = [
        "payments" => true,
        "orderItems" => false,
        "generalInfo" => true,
        "customerInfo" => true,
        "cancel" => false
    ];

    public $paymentInfo = [
        "amount" => 0,
        "fromBalance" => false,
        "debt" => null,
        "note" => "",
        "reminder" => null
    ];

    function calculate()
    {
        $payFromBalance = $this->paymentInfo["fromBalance"];
        $reminder = 0;
        $amount = $this->paymentInfo["amount"];
        $debt = (float)$amount - $this->order->debt;
        $debt = round($debt, 2);


        if ($payFromBalance) {
            $reminder = 0;
        }

        if ($debt > 0) {
            $reminder = $debt;
            $debt = 0;
        } else {
            $debt = abs($debt);
        }

        $this->paymentInfo["reminder"] = $reminder;
        $this->paymentInfo["debt"] = $debt;
        $this->paymentInfo["fromBalance"] = $payFromBalance;

    }

    function acceptPayment()
    {
        $payFromBalance = $this->paymentInfo["fromBalance"];
        $amount = $this->paymentInfo["amount"];
        $debt = $this->paymentInfo["debt"];
        $reminder = $this->paymentInfo["reminder"];


        if ($amount == "" || $amount <= 0) {
            $this->dispatch("notify", state: "warning", msg: "Ödəniş miqdarı düzgün qeyd olunmamışdır.");
            return;
        }

        if ($payFromBalance) {
            if ($amount > $this->order->customer->balance) {
                $this->dispatch("notify", state: "warning", msg: "Balansda kifayət qədər vəsait yoxdur");
                return;
            } else {
                $this->order->customer->decrement("balance", $amount);
            }

        }

        if ($amount > $debt) {
            $amount = $amount - $reminder;
        }

        $this->order->increment("paid",$amount);

        event(new AcceptPayment(order: $this->order->id, customer: $this->order->customer_id, type: 4, amount: $amount, action: 1));

        $this->order->debt = $debt;
        $this->order->save();

        $this->order->customer->debt = $this->order->customer->old_debt + Order::where("customer_id", $this->order->customer_id)->sum("debt");
        $this->order->customer->save();

        $this->dispatch("notify", state: "success", msg: "Ödəniş qeydə alındı");

    }

    public $cancelExplanation = "";

    function cancelOrder()
    {
        if ($this->cancelExplanation == "") {
            $this->dispatch("notify", state: "info", msg: "Sifariş ləğv edildi");
            return;
        }

        $this->order->status_id = 4;
        $this->order->cancel_explanation = $this->cancelExplanation;
        $this->order->save();
        Payment::where("order_id", $this->order->id)->update(["is_cancelled" => true]);

        $refunded = Payment::where([
            "order_id" => $this->order->id,
            "is_cancelled" => true
        ])->sum("amount");

        $this->order->customer->increment("balance", $refunded);

        event(new AcceptPayment(order: null, customer: $this->order->customer_id, amount: $refunded, action: 1, type: 2, note: $this->order->pid . " kodlu sifarişin ləğvindən gələn artım."));

        $this->order->customer->current_debt = Order::where(["customer_id" => $this->order->customer_id])->whereNot("status_id", 4)->sum("debt");
        $this->order->customer->current_debt = round($this->order->customer->current_debt, 2);
        $this->order->customer->debt = $this->order->customer->old_debt + $this->order->customer->current_debt;
        $this->order->customer->save();

        $this->dispatch("notify", state: "info", msg: "Sifariş ləğv edildi");

    }

    function mount($id)
    {
        $this->order = Order::findOrFail($id);

        $this->paymentInfo["debt"] = $this->order->debt;

        $this->cancelExplanation = $this->order->cancel_explanation;

        $this->state["cancel"] = $this->order->status_id == 4;

    }

    #[Computed]
    function payments()
    {
        $items = Payment::where("order_id", $this->order->id)->where("type_id", 4)->orderBy("id", "desc");

        $items = $items->paginate(10);

        return $items;

    }

    #[Computed]
    function orderItems()
    {
        return OrderItem::where("order_id", $this->order->id)->paginate();
    }

    #[Computed]
    function updateLogs()
    {

        $items = UpdateLog::query();
        $items = $items->where("order_id", $this->order->id);
        $items = $items->orderBy("id", "desc");
        $items = $items->paginate(10, pageName: "updateLogsPager");
        return $items;
    }

    public function render()
    {
        return view('livewire.order.details');
    }
}
