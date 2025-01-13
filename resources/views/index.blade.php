<x-app-layout>
    <!-- Chat Section -->
    <div class="mx-auto max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
        <div class="flex h-[80vh] rounded-xl bg-white shadow-sm dark:bg-gray-800">
            <!-- Sidebar -->
            <div class="w-1/4 flex-shrink-0 overflow-y-auto rounded-l-xl bg-gray-50 p-4 dark:bg-gray-900">
                <div class="mb-6 text-center">
                    <h2 class="text-lg font-bold text-gray-800 dark:text-white">Chats</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Select a conversation</p>
                </div>

                <ul class="space-y-3">
                    @foreach ($conversations as $conversation)
                        <li>
                            <button
                                class="conversation-button flex w-full items-center gap-x-3 rounded-lg bg-gray-100 p-3 text-left hover:bg-gray-200 focus:outline-none focus:ring focus:ring-blue-300 dark:bg-gray-800 dark:hover:bg-gray-700"
                                data-receiver-id="{{ $conversation->receiver->id }}"
                                data-receiver-name="{{ $conversation->receiver->name }}">
                                <div
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-500 font-bold text-white">
                                    {{ substr($conversation->receiver->name, 0, 1) }}
                                </div>
                                <div class="flex-grow">
                                    <p class="text-sm font-semibold text-gray-800 dark:text-white">
                                        {{ $conversation->receiver->name }}</p>
                                    <p class="truncate text-xs text-gray-600 dark:text-gray-400">
                                        {{ $conversation->message }}
                                    </p>
                                </div>
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Main Chat Area -->
            <div class="flex-grow rounded-r-xl bg-white p-6 dark:bg-gray-800">
                <div class="mb-6 text-center">
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Chat</h1>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300" id="chatWithUser">
                        Select a conversation to start chatting
                    </p>
                </div>

                <div class="mb-6 h-[calc(100%-160px)] space-y-4 overflow-y-auto rounded-lg bg-gray-50 p-4 dark:bg-gray-900"
                    id="chatArea">
                </div>

                <div class="flex items-center gap-x-3">
                    <textarea id="messageInput"
                        class="grow rounded-lg border border-gray-300 p-3 shadow-sm focus:ring focus:ring-blue-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white"
                        rows="1" placeholder="Type your message..."></textarea>
                    <button id="sendMessageButton"
                        class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 disabled:opacity-50">
                        Send
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

        <script>
            // Initialize variables
            let currentReceiverId = null;
            let currentReceiverName = null;
            const messageInput = document.getElementById('messageInput');
            const sendMessageButton = document.getElementById('sendMessageButton');
            const chatArea = document.getElementById('chatArea');
            const chatWithUser = document.getElementById('chatWithUser');
            const currentUserId = '{{ auth()->id() }}';
            const currentUserName = '{{ auth()->user()->name }}';

            // Setup CSRF
            axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').content;

            // Initialize Pusher with app credentials
            const pusher = new Pusher('ab71602936902850a7cc', {
                appId: '1915957',
                key: 'ab71602936902850a7cc',
                secret: '05660c6e471bf061fb50',
                cluster: 'ap1',
                encrypted: true
            });

            const channel = pusher.subscribe('chat.' + currentUserId);
            channel.bind('message.sent', function(data) {
                if (data.sender !== currentUserName) {
                    appendMessage(data, false);
                }
            });

            // Event Listeners
            messageInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter' && !e.shiftKey) {
                    e.preventDefault();
                    sendMessage();
                }
            });

            sendMessageButton.addEventListener('click', sendMessage);

            document.querySelectorAll('.conversation-button').forEach(button => {
                button.addEventListener('click', function() {
                    const receiverId = this.getAttribute('data-receiver-id');
                    const receiverName = this.getAttribute('data-receiver-name');

                    // Update UI
                    document.querySelectorAll('.conversation-button').forEach(btn =>
                        btn.classList.remove('bg-blue-100', 'dark:bg-blue-900'));
                    this.classList.add('bg-blue-100', 'dark:bg-blue-900');

                    currentReceiverId = receiverId;
                    currentReceiverName = receiverName;
                    chatWithUser.textContent = `Chatting with ${receiverName}`;

                    // Enable input
                    messageInput.disabled = false;
                    sendMessageButton.disabled = false;

                    loadMessages(receiverId);
                });
            });

            // Functions
            function sendMessage() {
                const message = messageInput.value.trim();
                if (!message || !currentReceiverId) return;

                const payload = {
                    message: message,
                    receiver_id: currentReceiverId
                };

                axios.post('/chat/send', payload)
                    .then(response => {
                        messageInput.value = ''; // Clear the input after sending
                        appendMessage({
                            sender: currentUserName,
                            message: message
                        }, true); // 'true' for sent messages
                    })
                    .catch(error => {
                        console.error('Error sending message:', error);
                        alert('Failed to send message. Please try again.');
                    });
            }

            function loadMessages(receiverId) {
                chatArea.innerHTML = '<div class="text-center">Loading messages...</div>';

                axios.get(`/chat/${receiverId}`)
                    .then(response => {
                        chatArea.innerHTML = '';
                        response.data.forEach(message => {
                            appendMessage(message, message.sender_id == currentUserId);
                        });
                        chatArea.scrollTop = chatArea.scrollHeight;
                    })
                    .catch(error => {
                        console.error('Error loading messages:', error);
                        chatArea.innerHTML =
                            '<div class="text-center text-red-500">Failed to load messages. Please try again.</div>';
                    });
            }

            function appendMessage(message, isSent) {
                const messageElement = document.createElement('div');
                messageElement.classList.add('flex', 'items-start', 'gap-x-4', isSent ? 'justify-end' : '');

                const messageContent = `
                    ${!isSent ? `
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gray-300 font-bold text-gray-700">
                                    ${message.sender[0]}
                                </div>` : ''}
                    <div class="max-w-sm rounded-lg ${isSent ? 'bg-blue-600' : 'bg-gray-600'} p-3 text-white shadow">
                        <p class="text-sm">${message.message}</p>
                    </div>
                `;

                messageElement.innerHTML = messageContent;
                chatArea.appendChild(messageElement);
                chatArea.scrollTop = chatArea.scrollHeight; // Scroll to the bottom
            }
        </script>
    @endpush
</x-app-layout>
