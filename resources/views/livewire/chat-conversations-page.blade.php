{{-- <div class="text-white">
    <div wire:poll.visible.1s>
        @foreach ($chat_conversations as $chat_conversation)
            <div>
                <a href="{{ route('chat.conversations.show', ['chat_conversation_id' => $chat_conversation->id]) }}">
                    <div>{{ $chat_conversation->users->first()->name }}</div>
                    <p>{{ $chat_conversation->latest_message->content ?? 'No messages yet.' }}</p>
                    <small>{{ $chat_conversation->latest_message ? $chat_conversation->latest_message->created_at_diff : 'No messages yet.' }}</small>
                </a>
            </div>
        @endforeach
    </div>
    <div>
        {{ $chat_conversations->links() }}
    </div>
</div> --}}
<div class="flex h-screen flex-col bg-white text-gray-800">
    <div wire:poll.visible.1s class="flex-grow space-y-4 overflow-y-auto p-6">
        @if ($chat_conversations->isEmpty())
            <!-- Display message when there are no conversations -->
            <div class="flex items-center justify-center p-4">
                <p class="text-lg text-gray-500">No conversations</p>
            </div>
        @else
            <!-- Loop through the conversations if available -->
            @foreach ($chat_conversations as $chat_conversation)
                <div class="rounded-lg bg-white p-4 shadow-md transition-all duration-300 hover:bg-gray-50 hover:shadow-lg">
                    <a href="{{ route('chat.conversations.show', ['chat_conversation_id' => $chat_conversation->id]) }}"
                        class="flex flex-col">
                        <div class="flex items-center justify-between">
                            <div class="text-lg font-semibold text-gray-800">
                                {{ $chat_conversation->users->first()->name }}
                            </div>
                            <small class="text-sm text-gray-500">
                                {{ $chat_conversation->latest_message ? $chat_conversation->latest_message->created_at_diff : 'No messages yet.' }}
                            </small>
                        </div>
                        <p class="mt-2 truncate text-sm text-gray-600">
                            {{ $chat_conversation->latest_message->content ?? 'No messages yet.' }}
                        </p>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
    <div class="bg-white p-4 shadow-inner">
        {{ $chat_conversations->links('pagination::tailwind') }}
    </div>
</div>

