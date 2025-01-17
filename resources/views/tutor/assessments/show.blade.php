<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <div class="d-flex justify-content-center align-items-center container-fluid bg-gray-100"
            style="min-height: 100vh;">
            <div class="col-lg-8 p-5">
                <!-- Main card container with a subtle shadow and rounded corners -->
                <div class="card mx-auto my-6 rounded-3xl bg-white p-8 shadow-xl">
                    <h1 class="mb-6 text-center text-2xl font-semibold text-gray-800">Assessment</h1>
                    @if ($assessments)
                        @php
                            $question_no = 1;
                        @endphp
                        @foreach ($assessments->questions as $question)
                            <div
                                class="card mx-2 my-4 rounded-xl border border-gray-300 bg-white p-4 text-gray-800 shadow-lg">
                                <h2 class="text-lg font-bold text-gray-900">Question {{ $question_no++ }}</h2>
                                <h5 class="text-sm text-gray-700">{{ $question['question'] }}</h5>
                                <div class="mx-4 mt-2">
                                    @if ($question['type'] == 'multiple_choice')
                                        <ol class="ml-4 list-decimal text-gray-600">
                                            @foreach ($question['answers'] as $answer)
                                                <li>{{ $answer }}</li>
                                            @endforeach
                                        </ol>
                                        @php
                                            switch ($question['correct_answer']) {
                                                case 0:
                                                    $answer = 'A';
                                                    break;
                                                case 1:
                                                    $answer = 'B';
                                                    break;
                                                case 2:
                                                    $answer = 'C';
                                                    break;
                                                case 3:
                                                    $answer = 'D';
                                                    break;
                                            }
                                        @endphp
                                        <p class="font-medium text-green-600">Correct Answer: {{ $answer }}</p>
                                    @else
                                        <p class="font-medium text-green-600">Correct Answer:
                                            {{ ucfirst($question['true_false']) }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        <!-- Edit Button -->
                        <div class="mt-6 text-center">
                            <a href="{{ route('assessments.edit', $assessments->id) }}"
                                class="inline-block rounded-lg bg-blue-600 px-6 py-3 text-sm font-medium text-white shadow-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                                Edit Assessment
                            </a>
                        </div>
                    @else
                        <!-- Styled "No Assessments" card with better contrast -->
                        <div
                            class="mx-auto max-w-lg rounded-xl border border-gray-300 bg-white p-8 text-center shadow-lg">
                            <a href="{{ route('assessments.create') }}"
                                class="inline-block rounded-lg bg-blue-600 px-6 py-3 text-sm font-medium text-white shadow-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                                Create Assessment
                            </a>
                            <div class="mt-6 text-sm text-gray-600">
                                No assessments available
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
