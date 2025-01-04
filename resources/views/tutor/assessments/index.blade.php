<x-app-layout>
    <div class="d-flex justify-content-center align-items-center container-fluid bg-dark" style="min-height: 100vh;">
        <div class="col-lg-8 p-5">
            <!-- Main card container with a dark background centered -->
            <div class="card mx-auto my-2 rounded-xl bg-gray-800 p-5 shadow-lg">
                <h1 class="mb-4 text-center font-semibold text-white">Assessment</h1>
                @if ($assessments)
                    @php
                        $question_no = 1;
                    @endphp
                    @foreach ($assessments->questions as $question)
                        <div class="card mx-2 my-4 rounded bg-gray-600 p-2 text-white">
                            <h2 class="font-bold">Question {{ $question_no++ }}</h2>
                            <h5 class="text-gray-200">{{ $question['question'] }}</h5>
                            <div class="mx-2">
                                @if ($question['type'] == 'multiple_choice')
                                    <ol class="ml-4 text-gray-300" style="list-style-type: upper-alpha;">
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
                                    <p class="text-green-400">Correct Answer: {{ $answer }}</p>
                                @else
                                    <p class="text-green-400">Correct Answer: {{ ucfirst($question['true_false']) }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <!-- Edit Button -->
                    <div class="mt-4">
                        <a href="{{ route('assessments.edit', $assessments->id) }}"
                            class="inline-block rounded-lg bg-blue-600 px-5 py-3 text-sm font-medium text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                            Edit Assessment
                        </a>
                    </div>
                @else
                    <!-- Styled "No Assessments" card with dark background -->
                    <div
                        class="mx-auto max-w-lg rounded-lg border border-gray-700 bg-gray-700 p-6 text-center shadow-lg">
                        <a href="{{ route('assessments.create') }}"
                            class="inline-block rounded-lg bg-blue-600 px-5 py-3 text-sm font-medium text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                            Create Assessment
                        </a>
                        <div class="mt-4 text-sm text-gray-300">
                            No assessments available
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
