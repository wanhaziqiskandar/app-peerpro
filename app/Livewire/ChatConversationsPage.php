<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class ChatConversationsPage extends Component
{
    use WithPagination;

    public function render()
    {
        $chat_conversations = auth()->user()->chat_conversations()
            ->with([
                'users' => function ($query) {
                    $query->where('users.id', '!=', auth()->id()); // Excluding current user
                },
                'latest_message',
            ])
            ->whereHas('users', function ($query) {
                $query->where('users.id', auth()->id());
            })
            ->paginate(15);

        $chat_conversations->getCollection()->transform(function ($chat_conversation) {
            $latest_message = $chat_conversation->latest_message;
            if (!empty($latest_message)) {
                $latest_message->created_at_diff = $this->formatTimeDiff($latest_message->created_at);
            }

            return $chat_conversation;
        });

        return view('livewire.chat-conversations-page', compact('chat_conversations'))->layout('layouts.app');
    }

    /**
     * Format the time difference for the latest message.
     */
    private function formatTimeDiff($time1, $time2 = null): string
    {
        $time2 = $time2 ?: now();

        $diff_in_days = $time1->diffInDays($time2);

        if ($diff_in_days < 1) {
            return $time1->format('h:i A');
        } elseif ($diff_in_days < 2) {
            return 'Yesterday';
        } elseif ($diff_in_days < 7) {
            return $time1->format('l');
        } else {
            return $time1->format('d/m/Y');
        }
    }
}