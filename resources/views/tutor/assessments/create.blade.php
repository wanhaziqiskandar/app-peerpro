<x-app-layout>
    <div class="d-flex justify-content-center align-items-center container-fluid"
        style="min-height: 100vh; background-color: #f8fafc;">
        <div class="col-lg-8">
            <div class="card mx-auto rounded-xl bg-white p-6 shadow-xl">
                <h1 class="mb-6 text-center text-2xl font-semibold text-gray-900">Create Assessment</h1>

                @if (session('success'))
                    <div class="alert alert-success mb-4 rounded-md p-3">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('assessments.store') }}" method="POST" id="assessment-form">
                    @csrf
                    @method('post')
                    <input type="hidden" name="tutor_subject_id" value="{{ $subject_id }}">

                    <div id="questions-container">
                        <!-- Initial Question Block -->
                        <div class="question-block card mb-4 rounded-xl bg-gray-100 p-4" id="question-0">
                            <div class="mb-4 flex items-center justify-between">
                                <label for="question-1" class="form-label text-lg font-semibold text-gray-800">Question
                                    1:</label>
                                <button type="button" onclick="deleteSingleQuestion(0)"
                                    class="rounded-md bg-red-500 px-4 py-2 text-white transition duration-300 hover:bg-red-600">
                                    Delete Question
                                </button>
                            </div>

                            <div class="card-body text-black">
                                <input type="text" name="questions[0][question]"
                                    class="form-control mb-3 w-full rounded-md border border-gray-300 p-3 text-gray-800 placeholder-gray-500 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    placeholder="Enter your question here" required>

                                <label class="form-label mt-3 text-sm text-gray-800">Select Question Type:</label>
                                <div class="form-check">
                                    <input type="radio" name="questions[0][type]" value="multiple_choice"
                                        class="form-check-input" checked onclick="toggleQuestionType(0)" required>
                                    <label class="form-check-label text-gray-800" for="multiple_choice_0">Multiple
                                        Choice</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="questions[0][type]" value="true_false"
                                        class="form-check-input" onclick="toggleQuestionType(0)" required>
                                    <label class="form-check-label text-gray-800" for="true_false_0">True/False</label>
                                </div>

                                <div class="answers-section mt-3">
                                    <label class="form-label text-sm text-gray-800">Answers:</label>
                                    <div class="multiple-choice-answers text-black">
                                        <div class="form-check mb-3">
                                            <input type="text" name="questions[0][answers][0]"
                                                class="form-control mb-2 rounded-md border p-3" placeholder="Answer 1"
                                                required>
                                            <input type="radio" name="questions[0][correct_answer]" value="0"
                                                class="form-check-input" required>
                                            <label class="form-check-label text-gray-800">Correct Answer</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input type="text" name="questions[0][answers][1]"
                                                class="form-control mb-2 rounded-md border p-3" placeholder="Answer 2"
                                                required>
                                            <input type="radio" name="questions[0][correct_answer]" value="1"
                                                class="form-check-input" required>
                                            <label class="form-check-label text-gray-800">Correct Answer</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input type="text" name="questions[0][answers][2]"
                                                class="form-control mb-2 rounded-md border p-3" placeholder="Answer 3"
                                                required>
                                            <input type="radio" name="questions[0][correct_answer]" value="2"
                                                class="form-check-input" required>
                                            <label class="form-check-label text-gray-800">Correct Answer</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input type="text" name="questions[0][answers][3]"
                                                class="form-control mb-2 rounded-md border p-3" placeholder="Answer 4"
                                                required>
                                            <input type="radio" name="questions[0][correct_answer]" value="3"
                                                class="form-check-input" required>
                                            <label class="form-check-label text-gray-800">Correct Answer</label>
                                        </div>
                                    </div>

                                    <div class="true-false-answers" style="display: none;">
                                        <div class="form-check">
                                            <input type="radio" name="questions[0][true_false]" value="true"
                                                class="form-check-input" required>
                                            <label class="form-check-label text-gray-800">True</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="questions[0][true_false]" value="false"
                                                class="form-check-input" required>
                                            <label class="form-check-label text-gray-800">False</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" onclick="addQuestion()"
                        class="mb-3 mt-6 inline-flex items-center justify-center rounded-lg bg-indigo-600 px-6 py-3 text-base font-semibold text-white transition duration-200 ease-in-out hover:bg-indigo-700">
                        Add Another Question
                    </button>

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
            newQuestionBlock.id = `question-${questionCount}`;

            newQuestionBlock.innerHTML = `
        <div class="mb-4 flex items-center justify-between">
            <label for="question-${questionCount + 1}" class="form-label text-lg font-semibold text-gray-800">Question ${questionCount + 1}:</label>
            <button type="button"
                    onclick="deleteSingleQuestion(${questionCount})"
                    class="rounded-md bg-red-500 px-4 py-2 text-white transition duration-300 hover:bg-red-600">
                Delete Question
            </button>
        </div>
        <div class="card-body">
            <input type="text" name="questions[${questionCount}][question]" class="form-control mb-3 p-3 w-full rounded-md border focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter your question here" required>

            <label class="form-label mt-3 text-sm text-gray-800">Select Question Type:</label>
            <div class="form-check">
                <input type="radio" name="questions[${questionCount}][type]" value="multiple_choice" class="form-check-input" checked onclick="toggleQuestionType(${questionCount})" required>
                <label class="form-check-label text-gray-800">Multiple Choice</label>
            </div>
            <div class="form-check">
                <input type="radio" name="questions[${questionCount}][type]" value="true_false" class="form-check-input" onclick="toggleQuestionType(${questionCount})" required>
                <label class="form-check-label text-gray-800">True/False</label>
            </div>

            <div class="answers-section mt-3">
                <label class="form-label text-sm text-gray-800">Answers:</label>
                <div class="multiple-choice-answers text-black">
                    <div class="form-check mb-3">
                        <input type="text" name="questions[${questionCount}][answers][0]" class="form-control mb-2 p-3 border rounded-md" placeholder="Answer 1" required>
                        <input type="radio" name="questions[${questionCount}][correct_answer]" value="0" class="form-check-input" required>
                        <label class="form-check-label text-gray-800">Correct Answer</label>
                    </div>
                    <div class="form-check mb-3">
                        <input type="text" name="questions[${questionCount}][answers][1]" class="form-control mb-2 p-3 border rounded-md" placeholder="Answer 2" required>
                        <input type="radio" name="questions[${questionCount}][correct_answer]" value="1" class="form-check-input" required>
                        <label class="form-check-label text-gray-800">Correct Answer</label>
                    </div>
                    <div class="form-check mb-3">
                        <input type="text" name="questions[${questionCount}][answers][2]" class="form-control mb-2 p-3 border rounded-md" placeholder="Answer 3" required>
                        <input type="radio" name="questions[${questionCount}][correct_answer]" value="2" class="form-check-input" required>
                        <label class="form-check-label text-gray-800">Correct Answer</label>
                    </div>
                    <div class="form-check mb-3">
                        <input type="text" name="questions[${questionCount}][answers][3]" class="form-control mb-2 p-3 border rounded-md" placeholder="Answer 4" required>
                        <input type="radio" name="questions[${questionCount}][correct_answer]" value="3" class="form-check-input" required>
                        <label class="form-check-label text-gray-800">Correct Answer</label>
                    </div>
                </div>

                <div class="true-false-answers" style="display: none;">
                    <div class="form-check">
                        <input type="radio" name="questions[${questionCount}][true_false]" value="true" class="form-check-input" required>
                        <label class="form-check-label text-gray-800">True</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="questions[${questionCount}][true_false]" value="false" class="form-check-input" required>
                        <label class="form-check-label text-gray-800">False</label>
                    </div>
                </div>
            </div>
        </div>
    `;

            questionsContainer.appendChild(newQuestionBlock);
            toggleQuestionType(questionCount);
        }

        function toggleQuestionType(index) {
            const mcAnswers = document.querySelectorAll('.multiple-choice-answers')[index];
            const tfAnswers = document.querySelectorAll('.true-false-answers')[index];
            const mcRadio = document.querySelectorAll('input[name="questions[' + index + '][type]"]')[0];
            const tfRadio = document.querySelectorAll('input[name="questions[' + index + '][type]"]')[1];

            if (mcRadio.checked) {
                mcAnswers.style.display = "block";
                tfAnswers.style.display = "none";

                // Make multiple choice inputs required
                mcAnswers.querySelectorAll('input[type="text"]').forEach(input => {
                    input.setAttribute('required', 'required');
                });
                mcAnswers.querySelectorAll('input[type="radio"][name$="[correct_answer]"]').forEach(input => {
                    input.setAttribute('required', 'required');
                });

                // Remove required from true/false inputs
                tfAnswers.querySelectorAll('input[type="radio"]').forEach(input => {
                    input.removeAttribute('required');
                });
            } else {
                mcAnswers.style.display = "none";
                tfAnswers.style.display = "block";

                // Remove required from multiple choice inputs
                mcAnswers.querySelectorAll('input[type="text"]').forEach(input => {
                    input.removeAttribute('required');
                });
                mcAnswers.querySelectorAll('input[type="radio"][name$="[correct_answer]"]').forEach(input => {
                    input.removeAttribute('required');
                });

                // Make true/false inputs required
                tfAnswers.querySelectorAll('input[type="radio"]').forEach(input => {
                    input.setAttribute('required', 'required');
                });
            }
        }

        function deleteSingleQuestion(index) {
            const questionBlocks = document.querySelectorAll('.question-block');

            // Prevent deleting the last question
            if (questionBlocks.length > 1) {
                document.getElementById(`question-${index}`).remove();
                updateQuestionNumbers();
            } else {
                alert('You must have at least one question in the assessment.');
            }
        }

        function updateQuestionNumbers() {
            const questionBlocks = document.querySelectorAll('.question-block');
            questionBlocks.forEach((block, index) => {
                const label = block.querySelector('label');
                label.textContent = `Question ${index + 1}:`;

                const inputs = block.querySelectorAll('input[name^="questions["]');
                inputs.forEach(input => {
                    const namePattern = /questions\[\d+\]/;
                    input.name = input.name.replace(namePattern, `questions[${index}]`);
                });

                block.id = `question-${index}`;
            });
        }

        document.getElementById("assessment-form").onsubmit = function(event) {
            const questions = document.querySelectorAll('.question-block');

            questions.forEach((questionBlock, index) => {
                // Check question text
                const questionText = questionBlock.querySelector(
                    'input[name^="questions["][name$="[question]"]');
                if (!questionText || !questionText.value.trim()) {
                    event.preventDefault();
                    alert(`Please enter a question text for Question ${index + 1}.`);
                    return false;
                }

                // Check question type
                const questionType = questionBlock.querySelector(
                    'input[name^="questions["][name$="[type]"]:checked');
                if (!questionType) {
                    event.preventDefault();
                    alert(`Please select a question type for Question ${index + 1}.`);
                    return false;
                }

                // Validate based on question type
                if (questionType.value === 'multiple_choice') {
                    // Check multiple choice answers
                    const answers = questionBlock.querySelectorAll('input[name^="questions[' + index +
                        '][answers]"]');
                    const correctAnswer = questionBlock.querySelector('input[name^="questions[' + index +
                        '][correct_answer]"]:checked');

                    // Check if all answers are filled
                    const emptyAnswer = Array.from(answers).find(answer => !answer.value.trim());
                    if (emptyAnswer) {
                        event.preventDefault();
                        alert(`Please fill in all answer fields for Question ${index + 1}.`);
                        return false;
                    }

                    // Check if a correct answer is selected
                    if (!correctAnswer) {
                        event.preventDefault();
                        alert(`Please select a correct answer for Question ${index + 1}.`);
                        return false;
                    }
                } else if (questionType.value === 'true_false') {
                    // Check true/false selection
                    const tfAnswer = questionBlock.querySelector('input[name^="questions[' + index +
                        '][true_false]"]:checked');
                    if (!tfAnswer) {
                        event.preventDefault();
                        alert(`Please select True or False for Question ${index + 1}.`);
                        return false;
                    }
                }
            });
        };

        // Initialize first question's type
        document.addEventListener('DOMContentLoaded', () => {
            toggleQuestionType(0);
        });
    </script>
</x-app-layout>
