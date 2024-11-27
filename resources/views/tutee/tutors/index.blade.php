<x-app-layout>
    <!-- Filter and Search Section -->
    <div class="mx-auto max-w-[85rem] px-4 py-4 sm:px-6 lg:px-8">
        <div class="flex justify-center space-x-4">
            <!-- Search Bar -->
            <div class="w-full max-w-md">
                <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Search by Subject</label>
                <input type="text" id="search" name="search" placeholder="Search subjects..."
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 sm:text-sm">
            </div>

            <!-- Filter Dropdown -->
            <div class="w-full max-w-xs">
                <label for="subject-filter" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Filter by Subject</label>
                <select id="subject-filter" name="subject"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 sm:text-sm">
                    <option value="all">All Subjects</option>
                    <option value="math">Math</option>
                    <option value="science">Science</option>
                    <option value="english">English</option>
                    <option value="history">History</option>
                </select>
            </div>

            <!-- Search Button -->
            <div class="mt-5 flex justify-end gap-2">
                <button type="submit"
                    class="rounded-lg bg-blue-600 px-12 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800">
                    Search
                </button>
            </div>
        </div>
    </div>

    <!-- Card Section -->
    <div class="mx-auto max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
        <!-- Grid -->
        <div class="grid gap-3 sm:grid-cols-2 sm:gap-6 md:grid-cols-3 xl:grid-cols-4">
            @forelse ($tutors as $tutor)
                <!-- Tutor Card -->
                <div
                    class="group flex cursor-pointer flex-col rounded-xl border bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="p-4 md:p-7">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                            Name: {{ $tutor->name }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Qualification: {{ $tutor->qualifications }}
                        </p>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Expertise: {{ $tutor->expertise }}
                        </p>
                        <p class="mt-2 flex justify-end font-semibold text-gray-800 dark:text-gray-200">
                            RM{{ number_format($tutor->price_rate, 2) }}
                        </p>

                        <div class="mt-4 flex flex-col items-center gap-y-3">
                            <!-- Request and Chat Buttons (Side by Side) -->
                            <div class="flex gap-x-3">
                                <!-- Request Button -->
                                <a href="{{ route('tutors.create', $tutor->id) }}"
                                    class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800">
                                    Request
                                </a>
                                <!-- Chat Button -->
                                <a href="#"
                                    class="inline-flex items-center justify-center rounded-lg bg-green-600 px-7 py-2 text-sm font-semibold text-white hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-800">
                                    Chat
                                </a>
                            </div>
                            <!-- View Details Button -->
                            <a href="{{ route('tutors.show', $tutor->id) }}"
                                class="mt-3 inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700 dark:bg-indigo-700 dark:hover:bg-indigo-800">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-600 dark:text-gray-400">
                    No tutors found.
                </p>
            @endforelse
        </div>
    </div>
</x-app-layout>


