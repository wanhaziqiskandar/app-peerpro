<x-app-layout>
    <div class="flex min-h-screen flex-col items-center justify-center bg-red-100">
        <div class="max-w-md rounded-2xl bg-white p-8 text-center shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 h-16 w-16 text-red-500" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M4.293 5.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.293a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
            <h1 class="mb-2 text-2xl font-bold text-red-600">Payment Failed</h1>
            <p class="mb-4 text-lg text-gray-700">
                There was an issue processing your payment. Please try again later.
            </p>
            <a href="{{ route('requests.index') }}"
                class="rounded-lg bg-blue-600 px-6 py-2 text-lg text-white shadow-md transition-all duration-300 hover:bg-blue-700">
                Try Again
            </a>
        </div>
    </div>
</x-app-layout>
