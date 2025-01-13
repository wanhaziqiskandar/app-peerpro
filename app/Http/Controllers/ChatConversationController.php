<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageSent;
use App\Models\ChatConversation;
use Illuminate\Http\Request;


class ChatConversationController extends Controller
{
    public function redirect($user_id)
    {
        // find existing conversation
        $chat_conversation = ChatConversation::whereHas('users', function ($query) use ($user_id) {
            $query->where('users.id', auth()->id());
        })->whereHas('users', function ($query) use ($user_id) {
            $query->where('users.id', $user_id);
        })->first();

        
        // or create new
        if (!$chat_conversation) {
            $chat_conversation = ChatConversation::create(); // Ensure necessary fields are populated
            $chat_conversation->users()->attach([auth()->id(), $user_id]);
        }

        return redirect(route('chat.conversations.show', $chat_conversation->id));
    }
}
