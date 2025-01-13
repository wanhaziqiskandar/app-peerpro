<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessageSent implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $chat_conversation;
    public $chat_message;

    public function __construct($chat_conversation, $chat_message)
    {
        $this->chat_conversation = $chat_conversation;
        $this->chat_message = $chat_message;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('private-chat-conversation.' . $this->chat_conversation->id);
    }

    public function broadcastAs(): string
    {
        return 'chat-message-sent';
    }
}
