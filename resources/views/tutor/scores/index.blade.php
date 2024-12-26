<x-app-layout>
    <div class="container-fluid bg-dark min-vh-100 d-flex align-items-center justify-content-center text-white">
        <div class="col-lg-8 p-5">
            <div class="card rounded-xl bg-gray-800 p-5 shadow-lg">
                <h1 class="mb-4 text-center text-2xl font-semibold">Assessment Results</h1>

                <!-- Tutee Details -->
                <div class="mb-4">
                    <h2 class="text-xl font-bold">Tutee Name:</h2>
                    <p class="text-gray-300">
                        <!-- Insert the tutee's name dynamically -->
                        [Tutee Name Placeholder]
                    </p>
                </div>

                <!-- Assessment Title -->
                <div class="mb-4">
                    <h2 class="text-xl font-bold">Assessment Title:</h2>
                    <p class="text-gray-300">
                        <!-- Insert the assessment title dynamically -->
                        [Assessment Title Placeholder]
                    </p>
                </div>

                <!-- Score Summary -->
                <div class="mb-4">
                    <h2 class="text-xl font-bold">Score:</h2>
                    <p class="text-2xl text-green-400">
                        <!-- Insert the tutee's score dynamically -->
                        [Score Placeholder] / [Total Questions Placeholder]
                    </p>
                </div>

                <!-- Question and Answer Details -->
                <div class="mt-4">
                    <h2 class="mb-2 text-xl font-bold">Question Breakdown:</h2>
                    <div class="space-y-4">
                        <!-- Repeat for each question -->
                        <div class="rounded-lg bg-gray-700 p-4 shadow">
                            <h3 class="text-lg font-semibold">Question 1:</h3>
                            <p class="text-gray-300">
                                <!-- Insert question text dynamically -->
                                [Question Text Placeholder]
                            </p>
                            <p class="mt-2 text-gray-400">
                                <span class="font-semibold">Tutee's Answer:</span>
                                <!-- Insert tutee's answer dynamically -->
                                [Tutee Answer Placeholder]
                            </p>
                            <p class="mt-1 text-gray-400">
                                <span class="font-semibold">Correct Answer:</span>
                                <!-- Insert correct answer dynamically -->
                                [Correct Answer Placeholder]
                            </p>
                            <p class="mt-1 text-sm">
                                <!-- Indicate correctness -->
                                [Correct/Incorrect Placeholder]
                            </p>
                        </div>
                        <!-- Add more question cards dynamically -->
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-6 text-center">
                    <a href="{{ route('assessments.index') }}"
                        class="rounded-lg bg-blue-600 px-5 py-3 text-sm font-medium text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                        Back to Assessments
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
