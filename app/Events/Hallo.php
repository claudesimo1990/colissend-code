<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use JetBrains\PhpStorm\ArrayShape;

class Hallo implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $name;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->name = 'simo';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel
     */
    public function broadcastOn(): Channel
    {
        return new Channel('test-app');
    }

    public function broadcastAs(): string
    {
        return 'TestApp';
    }

    #[ArrayShape(['name' => "string"])] public function broadcastWith(): array
    {
        return ['name' => $this->name];
    }
}
