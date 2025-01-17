<x-app-layout>
    <div class="d-flex justify-content-center align-items-center container-fluid bg-gray-50" style="min-height: 100vh;">
        <div class="col-lg-8">
            <!-- Main card container -->
            <div class="card mx-auto rounded-xl border-t-4 bg-white p-8 shadow-xl">
                <h1 class="mb-6 text-center text-2xl font-semibold text-gray-800">Edit Assessment</h1>

                <!-- Success message -->
                @if (session('success'))
                    <div class="alert alert-success mb-6 rounded-lg bg-green-500 p-4 text-white shadow-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Main edit form -->
                <form action="{{ route('assessments.update', $tuitionAssessment->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Questions container -->
                    <div id="questions-container">
                        @foreach ($tuitionAssessment->questions as $index => $question)
                            <div class="question-block card mb-6 rounded-xl bg-gray-100 p-6 shadow-md"
                                id="question-{{ $index }}">
                                <!-- Question header with delete button -->
                                <div class="mb-4 flex items-center justify-between">
                                    <label for="question-{{ $index + 1 }}"
                                        class="form-label text-lg font-semibold text-gray-800">
                                        Question {{ $index + 1 }}:
                                    </label>
                                    <button type="button"

                                        onclick="deleteSingleQuestion( {{ $index }})"
                                        class="rounded-md bg-red-500 px-4 py-2 text-white transition duration-300 hover:bg-red-600">
                                        Delete Question
                                    </button>
                                </div>

                                <div class="card-body text-gray-800">
                                    <!-- Question Input -->
                                    <input type="text" name="questions[{{ $index }}][question]"
                                        class="form-control mb-4 w-full rounded-md border border-gray-300 p-4"
                                        value="{{ $question['question'] }}">

                                    <!-- Question Type Selection -->
                                    <label class="form-label mt-3 text-lg font-medium text-gray-800">Select Question
                                        Type:</label>
                                    <div class="form-check">
                                        <input type="radio" id="multiple_choice_{{ $index }}"
                                            name="questions[{{ $index }}][type]" value="multiple_choice"
                                            class="form-check-input"
                                            {{ $question['type'] == 'multiple_choice' ? 'checked' : '' }}
                                            onclick="toggleQuestionType({{ $index }})">
                                        <label class="form-check-label text-gray-700"
                                            for="multiple_choice_{{ $index }}">Multiple Choice</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" id="true_false_{{ $index }}"
                                            name="questions[{{ $index }}][type]" value="true_false"
                                            class="form-check-input"
                                            {{ $question['type'] == 'true_false' ? 'checked' : '' }}
                                            onclick="toggleQuestionType({{ $index }})">
                                        <label class="form-check-label text-gray-700"
                                            for="true_false_{{ $index }}">True/False</label>
                                    </div>
                                    <!-- Answers Section -->
                                    <div class="answers-section mt-6">
                                        <label class="form-label text-lg font-medium text-gray-800">Answers:</label>
                                        <!-- Multiple Choice Answers -->
                                        <div class="multiple-choice-answers text-black"
                                            style="{{ $question['type'] == 'multiple_choice' ? 'display:block;' : 'display:none;' }}">
                                            @foreach ($question['answers'] as $answerIndex => $answer)
                                                <div class="form-check mb-4">
                                                    <input type="text"
                                                        name="questions[{{ $index }}][answers][{{ $answerIndex }}]"
                                                        class="form-control mb-3 rounded-md border border-gray-300 p-4"
                                                        value="{{ $answer }}"
                                                        placeholder="Answer {{ $answerIndex + 1 }}">
                                                    <input type="radio"
                                                        name="questions[{{ $index }}][correct_answer]"
                                                        value="{{ $answerIndex }}" class="form-check-input"
                                                        {{isset($question['correct_answer']) && $question['correct_answer'] == $answerIndex ? 'checked' : '' }}>
                                                    <label class="form-check-label text-gray-700"
                                                        for="answer{{ $answerIndex }}">Correct Answer</label>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- True/False Answers -->
                                        <div class="true-false-answers"
                                            style="{{ $question['type'] == 'true_false' ? 'display:block;' : 'display:none;' }}">
                                            <div class="form-check mb-3">
                                                <input type="radio" id="true-{{ $index }}"
                                                    name="questions[{{ $index }}][true_false]" value="true"
                                                    class="form-check-input"
                                                    {{ isset($question['true_false']) && $question['true_false'] == 'true' ? 'checked' : '' }}>
                                                <label class="form-check-label text-gray-700"
                                                    for="true-{{ $index }}">True</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input type="radio" id="false-{{ $index }}"
                                                    name="questions[{{ $index }}][true_false]" value="false"
                                                    class="form-check-input"
                                                    {{ isset($question['true_false']) && $question['true_false'] == 'false' ? 'checked' : '' }}>
                                                <label class="form-check-label text-gray-700"
                                                    for="false-{{ $index }}">False</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Action Buttons -->
                    <button type="button" onclick="addQuestion()"
                        class="mt-6 w-full rounded-md bg-blue-600 py-3 text-lg text-white transition duration-300 hover:bg-blue-700">
                        Add Question
                    </button>

                    <button type="submit"
                        class="mt-6 w-full rounded-md bg-green-600 py-3 text-lg text-white transition duration-300 hover:bg-green-700">
                        Update Assessment
                    </button>
                </form>

                <!-- Delete Assessment Form -->
                <form action="{{ route('assessments.destroy', $tuitionAssessment->id) }}" method="POST"
                    class="mt-6">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full rounded-md bg-red-600 py-3 text-lg text-white transition duration-300 hover:bg-red-700">
                        Delete Assessment
                    </button>
                </form>

                <!-- Back Link -->
                <a href="{{ route('assessments.index') }}"
                    class="mt-6 inline-block w-full rounded-md bg-indigo-600 py-3 text-center text-lg text-white transition duration-300 hover:bg-indigo-700">
                    Back to Assessments
                </a>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
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
            newQuestionBlock.classList.add('question-block', 'card', 'bg-gray-100', 'mb-6', 'p-6', 'rounded-xl',
                'shadow-md');
            newQuestionBlock.id = `question-${questionCount}`;

            newQuestionBlock.innerHTML = `
                <div class="flex justify-between items-center mb-4">
                    <label for="question-${questionCount + 1}" class="form-label text-lg font-semibold text-gray-800">
                        Question ${questionCount + 1}:
                    </label>
                    <button type="button"
                            onclick="deleteSingleQuestion(${questionCount})"
                            class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-300">
                        Delete Question
                    </button>
                </div>
                <div class="card-body">
                    <input type="text" name="questions[${questionCount}][question]"
                           class="form-control mb-4 p-4 w-full rounded-md border border-gray-300">

                    <label class="form-label mt-3 text-lg font-medium text-gray-800">Select Question Type:</label>
                    <div class="form-check">
                        <input type="radio" name="questions[${questionCount}][type]"
                               value="multiple_choice" class="form-check-input" checked
                               onclick="toggleQuestionType(${questionCount})">
                        <label class="form-check-label text-gray-700">Multiple Choice</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="questions[${questionCount}][type]"
                               value="true_false" class="form-check-input"
                               onclick="toggleQuestionType(${questionCount})">
                        <label class="form-check-label text-gray-700">True/False</label>
                    </div>

                    <div class="answers-section mt-6">
                        <label class="form-label text-lg font-medium text-gray-800">Answers:</label>
                        <div class="multiple-choice-answers text-black">
                            <!-- Multiple Choice Answer Inputs -->
                            ${[0, 1, 2, 3].map(i => `
                                                        <div class="form-check mb-4">
                                                            <input type="text" name="questions[${questionCount}][answers][${i}]"
                                                                   class="form-control mb-3 p-4 rounded-md border border-gray-300"
                                                                   placeholder="Answer ${i + 1}">
                                                            <input type="radio" name="questions[${questionCount}][correct_answer]"
                                                                   value="${i}" class="form-check-input">
                                                            <label class="form-check-label text-gray-700">Correct Answer</label>
                                                        </div>
                                                    `).join('')}
                        </div>

                        <div class="true-false-answers" style="display: none;">
                            <div class="form-check">
                                <input type="radio" name="questions[${questionCount}][true_false]"
                                       value="true" class="form-check-input">
                                <label class="form-check-label text-gray-700">True</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="questions[${questionCount}][true_false]"
                                       value="false" class="form-check-input">
                                <label class="form-check-label text-gray-700">False</label>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            questionsContainer.appendChild(newQuestionBlock);
        }

        function deleteQuestion(assessmentId, index) {
            if (confirm('Are you sure you want to delete this question?')) {
                fetch(`/assessments/${assessmentId}/questions/${index}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            document.getElementById(`question-${index}`).remove();
                            updateQuestionNumbers();
                            alert('Question deleted successfully');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error deleting question');
                    });
            }
        }

        function deleteSingleQuestion(index){
            document.getElementById(`question-${index}`).remove();
        }

        function updateQuestionNumbers() {
            const questionBlocks = document.querySelectorAll('.question-block');
            questionBlocks.forEach((block, index) => {
                const label = block.querySelector('label');
                label.textContent = `Question ${index + 1}:`;

                // Update input names and IDs
                const inputs = block.querySelectorAll('input[name^="questions["]');
                inputs.forEach(input => {
                    const namePattern = /questions\[\d+\]/;
                    input.name = input.name.replace(namePattern, `questions[${index}]`);
                });
            });
        }
    </script>
</x-app-layout>
