<x-app-layout>
    <div class="chat-conversations text-white">
        @forelse ($chat_conversations as $chat_conversation)
            <div class="chat-conversation-item" id="chat-conversation-{{ $chat_conversation->id }}">
                <a href="{{ route('chat.message.index', ['chat_conversation_id' => $chat_conversation->id]) }}">
                    <div class="conversation-title">
                        <strong>{{ $chat_conversation->users->first()->name }}</strong>
                    </div>
                    <div class="latest-message">
                        <p>{{ $chat_conversation->latest_message->content ?? 'No messages yet.' }}</p>
                        <small class="text-muted">
                            {{ $chat_conversation->latest_message ? $chat_conversation->latest_message->created_at_diff : 'No messages yet.' }}
                        </small>
                    </div>
                </a>
            </div>
        @empty
            <p>No conversations found.</p>
        @endforelse

        <!-- Pagination -->
        <div class="pagination">
            {{ $chat_conversations->links() }}
        </div>
    </div>
</x-app-layout>
