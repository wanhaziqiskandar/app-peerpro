{{-- <div>
    <div wire:poll.visible.1ms>
        @foreach ($chat_conversation->chat_messages as $message)
            @php
                $is_user_author = auth()->id() == $message->author_id;
            @endphp
            @if ($is_user_author)
                <div class="text-red-500">
                    {{ $message->content }}
                </div>
            @else
                <div class="text-blue-500">
                    {{ $message->content }}
                </div>
            @endif
        @endforeach
    </div>
    <div>
        <form wire:submit.prevent="sendMessage">
            <input type="text" wire:model="content">
            <button type="submit" class="text-white">Send</button>
        </form>
    </div>
</div> --}}

<div class="flex h-screen flex-col rounded-xl bg-white text-gray-800 shadow-xl">
    <div class="mx-auto flex h-full w-full max-w-screen-md flex-col">
        <!-- Conversation Header -->
        <div
            class="flex items-center space-x-4 rounded-t-xl border-b border-gray-300 bg-gray-100 p-4 text-xl font-semibold text-gray-800">
            @php
                // Assuming that the chat conversation has more than one user
                $receiver = $chat_conversation->users->firstWhere('id', '!=', auth()->id());
            @endphp
            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-300">
                <!-- Profile Picture (Placeholder) -->
                <span class="font-semibold text-white">{{ strtoupper(substr($receiver->name, 0, 1)) }}</span>
            </div>
            <div class="text-gray-800">
                {{ $receiver ? $receiver->name : 'No conversation found' }}
            </div>
        </div>

        <!-- Message List -->
        <div wire:poll.visible.1ms class="flex-grow space-y-6 overflow-y-auto rounded-b-xl bg-gray-50 p-6">
            @foreach ($chat_conversation->chat_messages as $message)
                @php
                    $is_user_author = auth()->id() == $message->author_id;
                @endphp
                <div class="{{ $is_user_author ? 'text-right' : 'text-left' }}">
                    <!-- Sender Name -->
                    <div class="mb-2 text-sm font-medium text-gray-600">
                        {{ $is_user_author ? 'You' : $message->author->name }}
                    </div>
                    <!-- Message Bubble -->
                    <div
                        class="{{ $is_user_author ? 'bg-blue-500 text-white' : 'bg-green-500 text-white' }} inline-block max-w-[75%] transform rounded-xl p-4 text-left shadow-md transition-all hover:scale-105">
                        <p class="text-sm leading-relaxed">{{ $message->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Message Input -->
        <div class="sticky bottom-0 z-10 rounded-b-xl border-t border-gray-200 bg-white p-4 shadow-lg">
            <form wire:submit.prevent="sendMessage" class="flex items-center space-x-4">
                <input type="text" wire:model="content"
                    class="flex-grow rounded-full bg-gray-100 p-3 text-gray-800 shadow-md outline-none transition-all focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                    placeholder="Type a message...">
                <button type="submit"
                    class="rounded-full bg-blue-500 p-3 text-white shadow-md transition-all hover:bg-blue-600 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12l14-7-7 14L5 12z"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
