<?php

namespace App\Events;

use App\Models\Payment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use const http\Client\Curl\AUTH_ANY;

class AcceptPayment
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct($orderId = null, $customerId, $paymentTypeId, $amount, $note = "")
    {
        $payment = new Payment();
        $payment->executor_id = Auth::id();
        $payment->order_id = $orderId;
        $payment->customer_id = $customerId;
        $payment->type_id = $paymentTypeId;
        $payment->amount = $amount;
        $payment->note = $note;
        $payment->save();

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
