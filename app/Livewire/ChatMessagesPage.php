<?php

namespace App\Livewire;

use Livewire\Component;

use App\Events\ChatMessageSent;
use App\Models\ChatConversation;
use Livewire\WithPagination;

class ChatMessagesPage extends Component
{
    use WithPagination;

    public $chat_conversation_id;

    public $content = '';

    protected $rules = [
        'content' => 'required|string|min:1|max:65535',
    ];

    public function mount($chat_conversation_id)
    {
        $this->chat_conversation_id = $chat_conversation_id;
    }

    public function sendMessage()
    {
        $this->validate();

        $chat_conversation = ChatConversation::findOrFail($this->chat_conversation_id);

        $chat_conversation->chat_messages()->create([
            'author_id' => auth()->id(),
            'content' => $this->content,
        ]);

        // $chat_message = $this->chat_conversation->chat_messages()->create([
        //     'author_id' => auth()->id(),
        //     'content' => $this->content,
        // ]);
        // broadcast(new ChatMessageSent($this->chat_conversation, $chat_message))->toOthers();

        $this->content = '';
    }

    public function render()
    {
        $chat_conversation = ChatConversation::with([
            'chat_messages' => function ($query) {
                $query->orderBy('created_at', 'ASC');
            },
        ])->findOrFail($this->chat_conversation_id);

        return view('livewire.chat-messages-page', [
            'chat_conversation' => $chat_conversation,
        ])->layout('layouts.app');
    }
}