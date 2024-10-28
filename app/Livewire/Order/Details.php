<?php

namespace App\Livewire\Order;

use App\Events\AcceptPayment;
use App\Events\CreateOrderLog;
use App\Events\GeneralCalculate;
use App\Events\PaymentLog;
use App\Events\RecordUpdate;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\UpdateLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\DocBlock\Tags\Deprecated;

#[Lazy]
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
        "cancel" => false,
        "ready" => false,
        "delivered" => false
    ];

    function calculate()
    {

        $this->paymentData["debt"] = $this->order->debt - $this->paymentData["amount"];
        $this->paymentData["debt"] = round($this->paymentData["debt"], 2);
        if ($this->paymentData["debt"] < 0) {
            $this->paymentData["reminder"] = abs($this->paymentData["debt"]);
            $this->paymentData["debt"] = 0;
        } else {
            $this->paymentData["reminder"] = 0;
        }
    }


    function pay($method)
    {

        if ($method == "balance") {
            if ($this->order->customer->balance < $this->paymentData["amount"]) {
                $this->dispatch("notify", state: "warning", msg: "Balansda kifayət qədər vəsait yoxdur", autoHide: true);
                return;
            }
            $this->order->customer->decrement("balance", round($this->paymentData["amount"] - $this->paymentData["reminder"], 2));
        } else {
            if ($this->paymentData["addToBalance"]) {
                $this->order->customer->increment("balance", $this->paymentData["reminder"]);
                event(new AcceptPayment(order: null, amount: $this->paymentData["reminder"], customer: $this->order->customer_id, note: $this->order->pid . " kodlu sifarişin borc ödəniş qalığından yaranmış artım", action: 1, type: 2));
            }
        }

        $this->order->increment("paid", round($this->paymentData["amount"] - abs($this->paymentData["reminder"]), 2));
        $this->order->debt = $this->paymentData["debt"];
        $this->order->save();

        event(new AcceptPayment(order: $this->order->id, amount: round($this->paymentData["amount"] - $this->paymentData["reminder"], 2), customer: $this->order->customer_id, note: $this->paymentData["note"], action: 1, type: 4));

        event(new CreateOrderLog(orderId: $this->order->id, info: $this->paymentData["amount"] . " AZN məbləğində borc ödənişi daxil edildi."));

        $this->dispatch("notify", state: "success", msg: "Ödəniş qəbul edildi", reload: true);

    }

    public $paymentData = [
        "addToBalance" => false,
        "fromBalance" => false,
        "amount" => null,
        "reminder" => null,
        "debt" => 0,
        "note" => ""
    ];

    function mount($id)
    {
        $this->order = Order::findOrFail($id);

        $this->paymentData["debt"] = $this->order->debt;

        $this->cancelExplanation = $this->order->cancel_explanation;

        $this->state["cancel"] = $this->order->status_id == 4;


    }

    #[Computed]
    function payments()
    {
        $items = Payment::where("order_id", $this->order->id)->where("type_id", 4)->where("is_cancelled", false)->orderBy("id", "desc");

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

    public $readyData = [
        "note" => ""
    ];

    public $cancelledData = [
        "note" => ""
    ];

    function changeStatusToCancelled()
    {
        if ($this->cancelledData["note"] == "") {
            $this->dispatch("notify", state: "danger", msg: "Ləğv səbəbi daxil edilməlidir", autoHide: true);
            return;
        }

        $this->order->status_id = 4;
        $this->order->save();

        Payment::where("order_id", $this->order->id)->update(["is_cancelled" => true]);

        $refunded = Payment::where([
            "order_id" => $this->order->id,
            "is_cancelled" => true
        ])->sum("amount");

        $this->order->customer->increment("balance", round($refunded, 2));

        event(new AcceptPayment(order: null, customer: $this->order->customer_id, amount: $refunded, action: 1, type: 2, note: $this->order->pid . " kodlu sifarişin ləğvindən gələn artım."));

        event(new GeneralCalculate($this->order->id));


        $this->dispatch("notify", state: "info", msg: "Sifariş ləğv edildi");
        event(new CreateOrderLog($this->order->id, "Sifarişin statusu LƏĞV EDİLDİ olaraq dəyişdirildi", $this->cancelledData["note"]));

    }

    function changeStatusToReady()
    {
        $this->order->status_id = 2;
        $this->order->save();
        event(new CreateOrderLog($this->order->id, "Sifarişin statusu HAZIRLANDI olaraq dəyişdirildi", $this->readyData["note"]));
        $this->dispatch("notify", state: "info", msg: "Sorğunuz icra edildi", autoHide: true);
    }

    public $deliveredData = [
        "note" => ""
    ];

    function changeStatusToDelivered()
    {
        $this->order->status_id = 3;
        $this->order->save();
        event(new CreateOrderLog($this->order->id, "Sifarişin statusu TƏHVİL VERİLDİ olaraq dəyişdirildi", $this->readyData["note"]));
        $this->dispatch("notify", state: "info", msg: "Sorğunuz icra edildi", autoHide: true);
    }

    public function render()
    {
        return view('livewire.order.details');
    }
}
