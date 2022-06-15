<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $user;
    public $message;
    public $idBaiViet;
    public $type;
    public $comment_id;
    public function __construct($user, $message, $idBaiViet, $type, $comment_id)
    {
        $this->user = $user;
        $this->message = $message;
        $this->idBaiViet = $idBaiViet;
        $this->type = $type;
        $this->comment_id = $comment_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('baiviet.' . $this->idBaiViet);
    }


    public function broadcastWith()
    {
        return [
            'user' => $this->user,
            'message' => $this->message,
            'type' => $this->type,
            'comment_id' => $this->comment_id

        ];
    }
}
