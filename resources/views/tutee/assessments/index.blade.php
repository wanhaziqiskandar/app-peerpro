<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <div class="d-flex justify-content-center align-items-center container-fluid bg-light p-4"
            style="min-height: 100vh;">
            <div class="col-lg-8">
                <!-- Main card container with a light background centered -->
                <div class="card mx-auto rounded-xl bg-white p-5 shadow-lg">
                    <h1 class="mb-4 text-center font-semibold text-gray-800">Answer Assessment</h1>

                    <!-- Success/Error message -->
                    @if (session('success'))
                        <div class="alert alert-success mb-4 rounded-md p-3">
                            {{ session('success') }}
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger mb-4 rounded-md p-3">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Form to submit answers -->
                    <form action="{{ route('tutee.submit_assessment') }}" method="POST">
                        @csrf
                        @method('post')
                        @php
                            $questions = $assessment->questions;
                        @endphp
                        <input type="text" name="assessment_id" value="{{ $assessment->id }}" hidden>
                        <input type="text" name="tuition_request_id" value="{{ $tuition_request->id }}" hidden>
                        <!-- Questions dynamically rendered -->
                        <div id="questions-container">
                            @foreach ($questions as $index => $question)
                                <div class="question-block card mb-4 rounded-xl bg-gray-100 p-4">
                                    <div class="card-body">
                                        <!-- Question Display -->
                                        <label class="form-label text-gray-800">{{ $index + 1 }}.
                                            {{ $question['question'] }}</label>

                                        <!-- Answer Section based on Question Type -->
                                        @if ($question['type'] === 'multiple_choice')
                                            <div class="multiple-choice-answers mt-3 text-black">
                                                @foreach ($question['answers'] as $answerIndex => $answer)
                                                    <div class="form-check mb-3">
                                                        <input type="radio" name="answers[{{ $index }}]"
                                                            value="{{ $answerIndex }}" class="form-check-input"
                                                            required>
                                                        <label
                                                            class="form-check-label text-gray-800">{{ $answer }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @elseif ($question['type'] === 'true_false')
                                            <div class="true-false-answers mt-3 text-black">
                                                <div class="form-check mb-3">
                                                    <input type="radio" name="answers[{{ $index }}]"
                                                        value="true" class="form-check-input" required>
                                                    <label class="form-check-label text-gray-800">True</label>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input type="radio" name="answers[{{ $index }}]"
                                                        value="false" class="form-check-input" required>
                                                    <label class="form-check-label text-gray-800">False</label>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Submit button -->
                        <button type="submit"
                            class="mt-4 inline-flex w-full items-center justify-center rounded-lg bg-blue-600 px-6 py-3 text-base font-semibold text-white transition duration-200 ease-in-out hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800">
                            Submit Answers
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
