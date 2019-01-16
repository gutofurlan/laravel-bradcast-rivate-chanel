<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel; //canal publico
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel; // canal privado
use Illuminate\Broadcasting\PresenceChannel; // canal de presenca
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Mensagem;
use App\User;

class PrivateEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $mensagem;
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Mensagem $mensagem, User $user = null)
    {
        $this->mensagem = $mensagem;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('user.' . $this->user->id);
    }
}
