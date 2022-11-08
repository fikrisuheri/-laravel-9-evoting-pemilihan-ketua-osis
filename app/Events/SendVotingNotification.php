<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendVotingNotification
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message;
    
    public function __construct($msg)
    {
        $this->message = $msg;
    }

    
    public function broadcastOn()
    {
        return ['voting-notif'];
    }
}
