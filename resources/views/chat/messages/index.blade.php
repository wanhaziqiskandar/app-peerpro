<x-app-layout>
    <div class="chat-messages">
        <h2>Chat with {{ $chat_conversation->users->first()->name }}</h2>

        <!-- Display Chat Messages -->
        <div id="messages-list">
            @foreach ($chat_messages as $message)
                <div class="message" id="message-{{ $message->id }}">
                    <strong>{{ $message->author->name }}</strong>: {{ $message->content }}
                    <small class="text-muted">{{ $message->created_at_diff }}</small>
                </div>
            @endforeach
        </div>

        <!-- Send New Message Form -->
        <form id="send-message-form" method="POST" action="{{ route('chat.message.store') }}">
            @csrf
            <input type="hidden" name="chat_conversation_id" value="{{ $chat_conversation->id }}">
            <textarea name="content" placeholder="Type your message..." required></textarea>
            <button type="submit">Send</button>
        </form>

        <!-- Pagination for messages -->
        <div class="pagination">
            {{ $chat_messages->links() }}
        </div>
    </div>

    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.13.3/dist/echo.js"></script>

        <script>
            // Initialize Echo for Laravel broadcasting
            const echo = new Echo({
                broadcaster: 'pusher',
                key: 'ab71602936902850a7cc', // Replace with your Pusher key
                cluster: 'ap1', // Replace with your Pusher cluster
                forceTLS: true
            });

            const chatConversationId = {{ $chat_conversation->id }};

            // Listen for 'ChatMessageSent' event for this conversation
            echo.private('private-chat-conversation.' + chatConversationId)
                .listen('ChatMessageSent', (event) => {
                    // Append the new message to the chat
                    const message = event.chat_message;
                    const messageElement = document.createElement('div');
                    messageElement.classList.add('message');
                    messageElement.innerHTML = `
                        <strong>${message.author}</strong>: ${message.chat_message}
                        <small class="text-muted">${message.created_at_diff}</small>
                    `;

                    // Prepend the new message to the messages list
                    const messagesList = document.getElementById('messages-list');
                    messagesList.prepend(messageElement);

                    // Optionally, scroll to the bottom
                    messagesList.scrollTop = messagesList.scrollHeight;
                });
        </script>
    @endsection
</x-app-layout>
