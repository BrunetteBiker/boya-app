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
    public function __construct($order = null, $customer = null, $type = null, $action = null, $amount = null, $note = "")
    {
        $payment = new Payment();
        $payment->executor_id = Auth::id();
        $payment->order_id = $order;
        $payment->customer_id = $customer;
        $payment->type_id = $type;
        $payment->action_id = $action;
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
