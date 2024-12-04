<x-app-layout>
    <div class="d-flex justify-content-center align-items-center container-fluid bg-dark" style="min-height: 100vh;">
        <div class="col-lg-8">
            <!-- Main card container with a dark background centered -->
            <div class="card mx-auto rounded-xl bg-gray-800 p-5 shadow-lg">
                <h1 class="mb-4 text-center font-semibold text-white">Answer Assessment</h1>

                <!-- Success/Error message -->
                @if (session('success'))
                    <div class="alert alert-success mb-4">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Form to submit answers -->
                <form>
                    @csrf

                    <!-- Dummy questions -->
                    @php
                        $questions = [
                            [
                                'id' => 1,
                                'question' => 'What is the capital of France?',
                                'type' => 'multiple_choice',
                                'answers' => ['Paris', 'Berlin', 'Madrid', 'Rome'],
                            ],
                            [
                                'id' => 2,
                                'question' => 'The Earth is flat.',
                                'type' => 'true_false',
                            ],
                            [
                                'id' => 3,
                                'question' => 'What is 2 + 2?',
                                'type' => 'multiple_choice',
                                'answers' => ['3', '4', '5', '6'],
                            ],
                        ];
                    @endphp

                    <!-- Questions dynamically rendered -->
                    <div id="questions-container">
                        @foreach ($questions as $index => $question)
                            <div class="question-block card mb-4 rounded-xl bg-gray-700 p-4">
                                <div class="card-body">
                                    <!-- Question Display -->
                                    <label class="form-label text-white">{{ $index + 1 }}.
                                        {{ $question['question'] }}</label>

                                    <!-- Answer Section based on Question Type -->
                                    @if ($question['type'] === 'multiple_choice')
                                        <div class="multiple-choice-answers mt-3 text-black">
                                            @foreach ($question['answers'] as $answerIndex => $answer)
                                                <div class="form-check mb-3">
                                                    <input type="radio" name="answers[{{ $question['id'] }}]"
                                                        value="{{ $answerIndex }}" class="form-check-input" required>
                                                    <label
                                                        class="form-check-label text-white">{{ $answer }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @elseif ($question['type'] === 'true_false')
                                        <div class="true-false-answers mt-3 text-black">
                                            <div class="form-check mb-3">
                                                <input type="radio" name="answers[{{ $question['id'] }}]"
                                                    value="true" class="form-check-input" required>
                                                <label class="form-check-label text-white">True</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input type="radio" name="answers[{{ $question['id'] }}]"
                                                    value="false" class="form-check-input" required>
                                                <label class="form-check-label text-white">False</label>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Submit button -->
                    <button type="submit"
                        class="mt-4 inline-flex w-full items-center justify-center rounded-lg bg-green-600 px-6 py-3 text-base font-semibold text-white transition duration-200 ease-in-out hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-800">
                        Submit Answers
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
