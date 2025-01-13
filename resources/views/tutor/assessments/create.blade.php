<x-app-layout>
    <div class="d-flex justify-content-center align-items-center container-fluid"
        style="min-height: 100vh; background-color: #f8fafc;">
        <div class="col-lg-8">
            <!-- Main card container with a light background centered -->
            <div class="card mx-auto rounded-xl bg-white p-6 shadow-xl">
                <h1 class="mb-6 text-center text-2xl font-semibold text-gray-900">Create Assessment</h1>

                <!-- Success message -->
                @if (session('success'))
                    <div class="alert alert-success mb-4 rounded-md p-3">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Form to create questions -->
                <form action="{{ route('assessments.store') }}" method="POST">
                    @csrf
                    @method('post')

                    <!-- Dynamic Question Container -->
                    <div id="questions-container">
                        <!-- Initial Question Block -->
                        <div class="question-block card mb-4 rounded-xl bg-gray-100 p-4">
                            <div class="card-body text-black">
                                <!-- Question Input -->
                                <label for="question-1" class="form-label text-sm text-gray-800">Question 1:</label>
                                <input type="text" name="questions[0][question]"
                                    class="form-control mb-3 w-full rounded-md border p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    placeholder="Enter your question here" required>

                                <!-- Question Type Selection -->
                                <label class="form-label mt-3 text-sm text-gray-800">Select Question Type:</label>
                                <div class="form-check">
                                    <input type="radio" name="questions[0][type]" value="multiple_choice"
                                        class="form-check-input" checked onclick="toggleQuestionType(0)">
                                    <label class="form-check-label text-gray-800" for="multiple_choice_0">Multiple
                                        Choice</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="questions[0][type]" value="true_false"
                                        class="form-check-input" onclick="toggleQuestionType(0)">
                                    <label class="form-check-label text-gray-800" for="true_false_0">True/False</label>
                                </div>

                                <!-- Answers Section -->
                                <div class="answers-section mt-3">
                                    <label class="form-label text-sm text-gray-800">Answers:</label>
                                    <div class="multiple-choice-answers text-black">
                                        <!-- Multiple Choice Answer Inputs -->
                                        <div class="form-check mb-3">
                                            <input type="text" name="questions[0][answers][0]"
                                                class="form-control mb-2 rounded-md border p-3" placeholder="Answer 1"
                                                required>
                                            <input type="radio" name="questions[0][correct_answer]" value="0"
                                                class="form-check-input">
                                            <label class="form-check-label text-gray-800" for="answer1">Correct
                                                Answer</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input type="text" name="questions[0][answers][1]"
                                                class="form-control mb-2 rounded-md border p-3" placeholder="Answer 2"
                                                required>
                                            <input type="radio" name="questions[0][correct_answer]" value="1"
                                                class="form-check-input">
                                            <label class="form-check-label text-gray-800" for="answer2">Correct
                                                Answer</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input type="text" name="questions[0][answers][2]"
                                                class="form-control mb-2 rounded-md border p-3" placeholder="Answer 3"
                                                required>
                                            <input type="radio" name="questions[0][correct_answer]" value="2"
                                                class="form-check-input">
                                            <label class="form-check-label text-gray-800" for="answer3">Correct
                                                Answer</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input type="text" name="questions[0][answers][3]"
                                                class="form-control mb-2 rounded-md border p-3" placeholder="Answer 4"
                                                required>
                                            <input type="radio" name="questions[0][correct_answer]" value="3"
                                                class="form-check-input">
                                            <label class="form-check-label text-gray-800" for="answer4">Correct
                                                Answer</label>
                                        </div>
                                    </div>

                                    <!-- True/False Answers (Initially Hidden) -->
                                    <div class="true-false-answers" style="display: none;">
                                        <div class="form-check">
                                            <input type="radio" name="questions[0][true_false]" value="true"
                                                class="form-check-input">
                                            <label class="form-check-label text-gray-800" for="true-0">True</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="questions[0][true_false]" value="false"
                                                class="form-check-input">
                                            <label class="form-check-label text-gray-800" for="false-0">False</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- Add Another Question button -->
                    <button type="button" onclick="addQuestion()"
                        class="mb-3 mt-6 inline-flex items-center justify-center rounded-lg bg-indigo-600 px-6 py-3 text-base font-semibold text-white transition duration-200 ease-in-out hover:bg-indigo-700">
                        Add Another Question
                    </button>

                    <!-- Submit button -->
                    <button type="submit"
                        class="mt-6 inline-flex w-full items-center justify-center rounded-lg bg-green-600 px-6 py-3 text-base font-semibold text-white transition duration-200 ease-in-out hover:bg-green-700">
                        Save Questions
                    </button>
                </form>

            </div>
        </div>
    </div>

    <script>
        function addQuestion() {
            let questionsContainer = document.getElementById('questions-container');
            let questionCount = questionsContainer.getElementsByClassName('question-block').length;

            let newQuestionBlock = document.createElement('div');
            newQuestionBlock.classList.add('question-block', 'card', 'bg-gray-100', 'mb-4', 'p-4', 'rounded-xl');

            newQuestionBlock.innerHTML = `
                <div class="card-body">
                    <!-- Question Input -->
                    <label for="question-${questionCount + 1}" class="form-label text-gray-800 text-sm">Question ${questionCount + 1}:</label>
                    <input type="text" name="questions[${questionCount}][question]" class="form-control mb-3 p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter your question here" required>

                    <!-- Question Type Selection -->
                    <label class="form-label mt-3 text-gray-800 text-sm">Select Question Type:</label>
                    <div class="form-check">
                        <input type="radio" name="questions[${questionCount}][type]" value="multiple_choice" class="form-check-input" checked onclick="toggleQuestionType(${questionCount})">
                        <label class="form-check-label text-gray-800" for="multiple_choice_${questionCount}">Multiple Choice</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="questions[${questionCount}][type]" value="true_false" class="form-check-input" onclick="toggleQuestionType(${questionCount})">
                        <label class="form-check-label text-gray-800" for="true_false_${questionCount}">True/False</label>
                    </div>

                    <!-- Answers Section -->
                    <div class="answers-section mt-3">
                        <label class="form-label text-gray-800 text-sm">Answers:</label>
                        <div class="multiple-choice-answers text-black">
                            <!-- Multiple Choice Answer Inputs -->
                            <div class="form-check mb-3">
                                <input type="text" name="questions[${questionCount}][answers][0]" class="form-control mb-2 p-3 border rounded-md" placeholder="Answer 1" required>
                                <input type="radio" name="questions[${questionCount}][correct_answer]" value="0" class="form-check-input">
                                <label class="form-check-label text-gray-800" for="answer1-${questionCount}">Correct Answer</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="text" name="questions[${questionCount}][answers][1]" class="form-control mb-2 p-3 border rounded-md" placeholder="Answer 2" required>
                                <input type="radio" name="questions[${questionCount}][correct_answer]" value="1" class="form-check-input">
                                <label class="form-check-label text-gray-800" for="answer2-${questionCount}">Correct Answer</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="text" name="questions[${questionCount}][answers][2]" class="form-control mb-2 p-3 border rounded-md" placeholder="Answer 3" required>
                                <input type="radio" name="questions[${questionCount}][correct_answer]" value="2" class="form-check-input">
                                <label class="form-check-label text-gray-800" for="answer3-${questionCount}">Correct Answer</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="text" name="questions[${questionCount}][answers][3]" class="form-control mb-2 p-3 border rounded-md" placeholder="Answer 4" required>
                                <input type="radio" name="questions[${questionCount}][correct_answer]" value="3" class="form-check-input">
                                <label class="form-check-label text-gray-800" for="answer4-${questionCount}">Correct Answer</label>
                            </div>
                        </div>

                        <!-- True/False Answers (Initially Hidden) -->
                        <div class="true-false-answers" style="display: none;">
                            <div class="form-check">
                                <input type="radio" name="questions[${questionCount}][true_false]" value="true" class="form-check-input">
                                <label class="form-check-label text-gray-800" for="true-${questionCount}">True</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="questions[${questionCount}][true_false]" value="false" class="form-check-input">
                                <label class="form-check-label text-gray-800" for="false-${questionCount}">False</label>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            questionsContainer.appendChild(newQuestionBlock);
        }

        function toggleQuestionType(index) {
            const mcAnswers = document.querySelectorAll(`.multiple-choice-answers`)[index];
            const tfAnswers = document.querySelectorAll(`.true-false-answers`)[index];

            if (document.querySelectorAll(`input[name="questions[${index}][type]"]`)[0].checked) {
                mcAnswers.style.display = "block";
                tfAnswers.style.display = "none";
            } else {
                mcAnswers.style.display = "none";
                tfAnswers.style.display = "block";
            }
        }
    </script>

</x-app-layout>
