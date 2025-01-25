<x-app-layout>
    <div class="flex min-h-screen flex-col items-center justify-center bg-gray-100">
        <div class="max-w-md rounded-2xl bg-white p-8 text-center shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 h-16 w-16 text-yellow-500" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-14a6 6 0 110 12 6 6 0 010-12zm0 8a2 2 0 100-4 2 2 0 000 4z"
                    clip-rule="evenodd" />
            </svg>
            <h1 class="mb-2 text-2xl font-bold text-yellow-600">Payment Canceled</h1>
            <p class="mb-4 text-lg text-gray-700">
                Your payment has been canceled. If this was a mistake, you can try again.
            </p>
            <a href="{{ route('requests.index') }}"
                class="rounded-lg bg-blue-600 px-6 py-2 text-lg text-white shadow-md transition-all duration-300 hover:bg-blue-700">
                Return to Requests
            </a>
        </div>
    </div>
</x-app-layout>
