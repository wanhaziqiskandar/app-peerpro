<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="container mx-auto py-10">
            <div class="col-lg-8 mx-auto">
                <div class="card rounded-lg border-0 bg-white p-6 shadow-md">
                    <!-- Title -->
                    <h1 class="mb-6 text-2xl font-extrabold text-gray-800 text-center">Assessment Results</h1>

                    <!-- Tutee Details -->
                    <div class="mb-6">
                        <h2 class="text-lg font-semibold text-gray-700">Tutee Name:</h2>
                        <p class="text-lg text-gray-500">{{ session('tutee_name') }}</p>
                    </div>

                    <!-- Score Summary -->
                    <div class="mb-6">
                        <h2 class="text-lg font-semibold text-gray-700">Score:</h2>
                        <p class="text-5xl font-extrabold text-green-500">
                            {{ session('score') }} / {{ session('total') }}
                        </p>
                        <p class="mt-2 text-gray-500">Great job! Keep improving!</p>
                    </div>

                    <!-- Question and Answer Details -->
                    @if (session('questionDetails') && count(session('questionDetails')) > 0)
                        <div class="mt-6">
                            <h2 class="mb-4 text-xl font-bold text-gray-700">Question Breakdown</h2>
                            <div class="space-y-4">
                                @foreach (session('questionDetails') as $index => $question)
                                    <div class="rounded-lg bg-gray-100 p-5 shadow-sm">
                                        <h3 class="text-md font-bold text-gray-700">Question {{ $index + 1 }}:</h3>
                                        <p class="mt-2 text-gray-600">{{ $question['text'] }}</p>
                                        <div class="mt-3 space-y-1">
                                            <p>
                                                <span class="font-semibold text-gray-700">Tutee's Answer:</span>
                                                <span class="text-gray-600">{{ $question['tutee_answer'] }}</span>
                                            </p>
                                            <p>
                                                <span class="font-semibold text-gray-700">Correct Answer:</span>
                                                <span class="text-gray-600">{{ $question['correct_answer'] }}</span>
                                            </p>
                                            <p
                                                class="{{ $question['is_correct'] ? 'text-green-600' : 'text-red-600' }} text-sm font-semibold">
                                                {{ $question['is_correct'] ? 'Correct' : 'Incorrect' }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <p class="mt-6 text-gray-500">No question details available.</p>
                    @endif

                    <!-- Action Button -->
                    <div class="mt-10">
                        <a href="{{ route('requests.index') }}"
                            class="inline-block rounded-full bg-blue-600 px-8 py-3 text-base font-medium text-white transition hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                            Back to Requests
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
