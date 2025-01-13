<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('private-chat-conversation.{chat_conversation_id}', function (User $user, string $chat_conversation_id) {
    return $user->chat_conversations->contains($chat_conversation_id);
});

