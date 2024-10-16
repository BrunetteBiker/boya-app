<?php

namespace App\Events;

use App\Models\UpdateLog;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RecordUpdate
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct($userId = null, $orderId = null, $paymentId = null, $note = "")
    {

        $updateLog = new UpdateLog();
        $updateLog->user_id = $userId;
        $updateLog->order_id = $orderId;
        $updateLog->payment_id = $paymentId;
        $updateLog->note = $note;
        $updateLog->save();

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
