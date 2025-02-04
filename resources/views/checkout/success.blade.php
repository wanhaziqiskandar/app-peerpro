<x-app-layout>
    <div class="flex min-h-screen flex-col items-center justify-center bg-gray-100">
        <div class="max-w-md rounded-2xl bg-white p-8 text-center shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 h-16 w-16 text-green-500" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414L8.414 15 3.293 9.879a1 1 0 111.414-1.414l3.293 3.293 7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
            </svg>
            <h1 class="mb-2 text-2xl font-bold text-green-600">Payment Successful</h1>
            <p class="mb-4 text-lg text-gray-700">
                Your payment status: <span class="font-semibold">{{ $tuition_payment->status }}</span>
            </p>
            <a href="{{ route('requests.index') }}"
                class="rounded-lg bg-blue-600 px-6 py-2 text-lg text-white shadow-md transition-all duration-300 hover:bg-blue-700">
                Continue Browsing
            </a>
        </div>
    </div>
</x-app-layout>
