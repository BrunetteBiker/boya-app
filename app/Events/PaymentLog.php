<?php

namespace App\Events;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class PaymentLog
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct($orderId = null, $customerId = null, $amount = null, $typeId = null, $note = "")
    {

        Payment::insert([
            "executor_id" => Auth::id(),
            "order_id" => $orderId,
            "customer_id" => $customerId,
            "amount" => $amount,
            "type_id" => $typeId,
            "note" => $note,
            "created_at" => now()
        ]);

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
