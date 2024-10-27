<?php

namespace App\Events;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GeneralCalculate
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct($orderId)
    {
        $order = Order::find($orderId);
        $order->paid = Payment::where("order_id",$order->id)->where("is_cancelled",false)->sum("amount");
        $order->save();

        $orderItems = OrderItem::where("order_id", $order->id)->get();

        foreach ($orderItems as $orderItem) {
            $subTotal = $orderItem->amount * $orderItem->price;
            $orderItem->total = round($subTotal, 2);
            $orderItem->save();
        }

        $amount = OrderItem::where("order_id", $order->id)->sum("total");

        $discount = $order->discount;
        $paid = $order->paid;

        $total = $amount - $discount;
        $debt = $total - $paid;
        $order->total = $total;
        $order->debt = $debt;
        $order->save();



        $customer = User::find($order->customer_id);

        $oldDebt = $customer->old_debt;
        $currentDebt = Order::query()->where("customer_id",$customer->id)->whereNot("status_id",4)->where("debt",">",0)->sum("debt");

        $totalDebt = $oldDebt + $currentDebt;
        $customer->current_debt = round($currentDebt);
        $customer->debt = round($totalDebt);
        $customer->save();


    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
