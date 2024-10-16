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
        "customerInfo" => false,
        "updateRecords" => true
    ];

    public $paymentInfo = [
        "amount" => null,
        "fromBalance" => false,
        "debt" => null,
        "addBalance" => false,
        "note" => "",
    ];

    function calculate()
    {
        $this->paymentInfo["debt"] = round((float)$this->paymentInfo["amount"] - $this->order->debt, 2);
    }

    function acceptPayment()
    {
        if ($this->paymentInfo["fromBalance"]) {
            if ($this->paymentInfo["amount"] > $this->order->customer->balance) {
                $this->dispatch("notify", state: "warning", msg: "Balansda kifayət qədər vəsait yoxdur");
                return;
            } else {
                $this->order->customer->decrement("balance", $this->paymentInfo["amount"]);
            }
        }

        if ($this->paymentInfo["debt"] < 0) {
            $this->order->debt = abs($this->paymentInfo["debt"]);
        } else {
            $this->order->debt = 0;
        }

        if ($this->paymentInfo["addBalance"]) {
            $this->order->customer->increment("balance", $this->paymentInfo["debt"]);

            event(new AcceptPayment(orderId : null , customerId: $this->order->customer_id,amount: $this->paymentInfo["debt"],paymentTypeId: 2,note: $this->order->pid() . " kodlu sifarişin ödənişində yaranan pulun qalığı"));

            event(new RecordUpdate(userId: $this->order->customer_id ,note: "Borc ödənişinin pul qalığı balansa əlavə olundu"));

        }

        $this->order->save();
        $this->order->customer->debt = Order::where("customer_id", $this->order->customer->id)->sum("debt");
        $this->order->customer->save();

        event(new RecordUpdate(userId: $this->order->customer_id, orderId: $this->order->id, note: "Borc ödənişi edildi.Ödəniş miqdarı :" . $this->paymentInfo["amount"] . " AZN. ".$this->order->debt == 0 ? "Sifariş üzrə borc sıfırlandı" : ""));

        event(new AcceptPayment(orderId: $this->order->id, customerId: $this->order->customer_id, paymentTypeId: 1, amount: $this->paymentInfo["amount"], note: $this->paymentInfo["note"]));

        $this->dispatch("notify", state: "success", msg: "Ödəniş qeydə alındı");


    }

    function mount($id)
    {
        $this->order = Order::findOrFail($id);
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


    public $updateLogData = [
        "orderBy" => "id|desc",
        "keyword" => ""
    ];

    function updatedUpdateLogData($val, $key)
    {
        $this->resetPage("updateLogsPager");
    }


    #[Computed]
    function updateLogs()
    {
        $keyword = $this->updateLogData["keyword"];
        $orderBy = Str::of($this->updateLogData["orderBy"])->explode("|")->collect();

        $items = UpdateLog::query();
        $items = $items->where("order_id", $this->order->id);
        $items = $items->orderBy($orderBy->first(), $orderBy->last());

        if ($keyword != "") {
            $items = $items->where("note", "like", "%$keyword%");
        }



        $items = $items->paginate(10, pageName: "updateLogsPager");
        return $items;
    }

    public function render()
    {
        return view('livewire.order.details');
    }
}
