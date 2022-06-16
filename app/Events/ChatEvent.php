<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $user;
    public $message;
    public $type;
    public $boxChat_id;
    public function __construct($message, $type,$boxChat_id)
    {

        $this->message = $message;
        $this->type = $type;
        $this->boxChat_id = $boxChat_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('chat.' .  $this->boxChat_id);

    }

    public function broadcastWith()
    {
        return [

            'message' => $this->message,
            'type' => $this->type,


        ];
    }
}
