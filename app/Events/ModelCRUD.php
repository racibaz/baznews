<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ModelCRUD
{
    use InteractsWithSockets, SerializesModels;


    public $modelName;
    public $methodName;
    public $userFullName;
    public $recordId;
    public $userIp;
    /**
     * ModelCRUD constructor.
     * @param $modelName
     */
    public function __construct($modelName, $methodName, $userFullName , $recordId , $userIp)
    {

        $this->modelName = $modelName;
        $this->methodName = $methodName;
        $this->userFullName = $userFullName;
        $this->recordId = $recordId;
        $this->userIp = $userIp;

//        dd($modelName);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
