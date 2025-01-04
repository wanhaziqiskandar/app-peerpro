<x-app-layout>
    <div class="d-flex justify-content-center align-items-center container-fluid bg-dark" style="min-height: 100vh;">
        <div class="col-lg-8">
            <!-- Main card container with a dark background centered -->
            <div class="card mx-auto rounded-xl bg-gray-800 p-5 shadow-lg">
                <h1 class="mb-4 text-center font-semibold text-white">Edit Assessment</h1>

                <!-- Success message -->
                @if (session('success'))
                    <div class="alert alert-success mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Form to edit questions -->
                <form action="{{ route('assessments.update', $tuitionAssessment->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Dynamic Question Container -->
                    <div id="questions-container">
                        @foreach ($tuitionAssessment->questions as $index => $question)
                            <div class="question-block card mb-4 rounded-xl bg-gray-700 p-4">
                                <div class="card-body text-black">
                                    <!-- Question Input -->
                                    <label for="question-{{ $index + 1 }}" class="form-label text-white">Question
                                        {{ $index + 1 }}:</label>
                                    <input type="text" name="questions[{{ $index }}][question]"
                                        class="form-control mb-3 w-full" value="{{ $question['question'] }}">

                                    <!-- Question Type Selection -->
                                    <label class="form-label mt-3 text-white">Select Question Type:</label>
                                    <div class="form-check">
                                        <input type="radio" id="multiple_choice_{{ $index }}"
                                            name="questions[{{ $index }}][type]" value="multiple_choice"
                                            class="form-check-input"
                                            {{ $question['type'] == 'multiple_choice' ? 'checked' : '' }}
                                            onclick="toggleQuestionType({{ $index }})">
                                        <label class="form-check-label text-white"
                                            for="multiple_choice_{{ $index }}">Multiple Choice</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" id="true_false_{{ $index }}"
                                            name="questions[{{ $index }}][type]" value="true_false"
                                            class="form-check-input"
                                            {{ $question['type'] == 'true_false' ? 'checked' : '' }}
                                            onclick="toggleQuestionType({{ $index }})">
                                        <label class="form-check-label text-white"
                                            for="true_false_{{ $index }}">True/False</label>
                                    </div>

                                    <!-- Answers Section -->
                                    <div class="answers-section mt-3">
                                        <label class="form-label text-white">Answers:</label>
                                        <div class="multiple-choice-answers text-black"
                                            style="{{ $question['type'] == 'multiple_choice' ? 'display:block;' : 'display:none;' }}">
                                            @foreach ($question['answers'] as $answerIndex => $answer)
                                                <div class="form-check mb-3">
                                                    <input type="text"
                                                        name="questions[{{ $index }}][answers][{{ $answerIndex }}]"
                                                        class="form-control mb-2" value="{{ $answer }}"
                                                        placeholder="Answer {{ $answerIndex + 1 }}">
                                                    <input type="radio"
                                                        name="questions[{{ $index }}][correct_answer]"
                                                        value="{{ $answerIndex }}" class="form-check-input"
                                                        {{ $question['correct_answer'] == $answerIndex ? 'checked' : '' }}>
                                                    <label class="form-check-label text-white"
                                                        for="answer{{ $answerIndex }}">Correct Answer</label>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="true-false-answers"
                                            style="{{ $question['type'] == 'true_false' ? 'display:block;' : 'display:none;' }}">
                                            <div class="form-check">
                                                <input type="radio" id="true-{{ $index }}"
                                                    name="questions[{{ $index }}][true_false]" value="true"
                                                    class="form-check-input"
                                                    {{ isset($question['true_false']) && $question['true_false'] == 'true' ? 'checked' : '' }}>
                                                <label class="form-check-label text-white"
                                                    for="true-{{ $index }}">True</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="false-{{ $index }}"
                                                    name="questions[{{ $index }}][true_false]" value="false"
                                                    class="form-check-input"
                                                    {{ isset($question['true_false']) && $question['true_false'] == 'false' ? 'checked' : '' }}>
                                                <label class="form-check-label text-white"
                                                    for="false-{{ $index }}">False</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Button to add new question -->
                    <button type="button" onclick="addQuestion()"
                        class="mt-4 inline-flex w-full items-center justify-center rounded-lg bg-blue-600 px-6 py-3 text-base font-semibold text-white transition duration-200 ease-in-out hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800">
                        Add Question
                    </button>

                    <!-- Submit button -->
                    <button type="submit"
                        class="mt-4 inline-flex w-full items-center justify-center rounded-lg bg-green-600 px-6 py-3 text-base font-semibold text-white transition duration-200 ease-in-out hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-800">
                        Update Assessment
                    </button>
                </form>

                <!-- Delete Button -->
                <form action="{{ route('assessments.destroy', $tuitionAssessment->id) }}" method="POST"
                    class="mt-4">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex w-full items-center justify-center rounded-lg bg-red-600 px-6 py-3 text-base font-semibold text-white transition duration-200 ease-in-out hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-800">
                        Delete Assessment
                    </button>
                </form>

            </div>
        </div>
    </div>

    <script>
        function toggleQuestionType(index) {
            const mcAnswers = document.querySelectorAll('.multiple-choice-answers');
            const tfAnswers = document.querySelectorAll('.true-false-answers');

            if (document.querySelector(`input[name="questions[${index}][type]"][value="multiple_choice"]`).checked) {
                mcAnswers[index].style.display = "block";
                tfAnswers[index].style.display = "none";
            } else {
                mcAnswers[index].style.display = "none";
                tfAnswers[index].style.display = "block";
            }
        }

        function addQuestion() {
            let questionsContainer = document.getElementById('questions-container');
            let questionCount = questionsContainer.getElementsByClassName('question-block').length;

            let newQuestionBlock = document.createElement('div');
            newQuestionBlock.classList.add('question-block', 'card', 'bg-gray-700', 'mb-4', 'p-4', 'rounded-xl');

            newQuestionBlock.innerHTML = `
                <div class="card-body">
                    <!-- Question Input -->
                    <label for="question-${questionCount + 1}" class="form-label text-white">Question ${questionCount + 1}:</label>
                    <input type="text" name="questions[${questionCount}][question]" class="form-control mb-3"  >

                    <!-- Question Type Selection -->
                    <label class="form-label mt-3 text-white">Select Question Type:</label>
                    <div class="form-check">
                        <input type="radio" name="questions[${questionCount}][type]" value="multiple_choice" class="form-check-input" checked onclick="toggleQuestionType(${questionCount})">
                        <label class="form-check-label text-white" for="multiple_choice_${questionCount}">Multiple Choice</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="questions[${questionCount}][type]" value="true_false" class="form-check-input" onclick="toggleQuestionType(${questionCount})">
                        <label class="form-check-label text-white" for="true_false_${questionCount}">True/False</label>
                    </div>

                    <!-- Answers Section -->
                    <div class="answers-section mt-3">
                        <label class="form-label text-white">Answers:</label>
                        <div class="multiple-choice-answers text-black">
                            <!-- Multiple Choice Answer Inputs -->
                            <div class="form-check mb-3">
                                <input type="text" name="questions[${questionCount}][answers][0]" class="form-control mb-2" placeholder="Answer 1"  >
                                <input type="radio" name="questions[${questionCount}][correct_answer]" value="0" class="form-check-input"  >
                                <label class="form-check-label text-white" for="answer1-${questionCount}">Correct Answer</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="text" name="questions[${questionCount}][answers][1]" class="form-control mb-2" placeholder="Answer 2"  >
                                <input type="radio" name="questions[${questionCount}][correct_answer]" value="1" class="form-check-input"  >
                                <label class="form-check-label text-white" for="answer2-${questionCount}">Correct Answer</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="text" name="questions[${questionCount}][answers][2]" class="form-control mb-2" placeholder="Answer 3">
                                <input type="radio" name="questions[${questionCount}][correct_answer]" value="2" class="form-check-input">
                                <label class="form-check-label text-white" for="answer3-${questionCount}">Correct Answer</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="text" name="questions[${questionCount}][answers][3]" class="form-control mb-2" placeholder="Answer 4">
                                <input type="radio" name="questions[${questionCount}][correct_answer]" value="3" class="form-check-input">
                                <label class="form-check-label text-white" for="answer4-${questionCount}">Correct Answer</label>
                            </div>
                        </div>

                        <!-- True/False Answers (Initially Hidden) -->
                        <div class="true-false-answers" style="display: none;">
                            <div class="form-check">
                                <input type="radio" name="questions[${questionCount}][true_false]" value="true" class="form-check-input">
                                <label class="form-check-label text-white" for="true-${questionCount}">True</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="questions[${questionCount}][true_false]" value="false" class="form-check-input">
                                <label class="form-check-label text-white" for="false-${questionCount}">False</label>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            questionsContainer.appendChild(newQuestionBlock);
        }
    </script>

</x-app-layout>
