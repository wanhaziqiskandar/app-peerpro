<x-app-layout>
    <!-- Card Section -->
    <div class="mx-auto max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
        <!-- Grid Container for Cards -->
        <div class="grid gap-3 sm:grid-cols-2 sm:gap-6 md:grid-cols-3 xl:grid-cols-4">
            @foreach ($tutees as $tutee)
                <!-- Tutee Card -->
                <div class="group flex cursor-pointer flex-col rounded-xl bg-white shadow-sm dark:bg-gray-800">
                    <div class="p-4 md:p-7 flex flex-col justify-between h-full">
                        <!-- Name -->
                        <h3 class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                            Name: {{ $tutee->name }}
                        </h3>
                        <!-- Timeslot -->
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                            Timeslot: {{ $tutee->timeslot }}
                        </p>
                        <!-- Subject -->
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                            Expertise: {{ $tutee->expertise }}
                        </p>

                        <!-- Buttons Section -->
                        <div class="mt-4 flex flex-col items-center gap-y-3">
                            <!-- View Assessment Button (on top) -->
                            <a href="#"
                                class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800">
                                View Assessment
                            </a>
                            
                            <!-- Accept and Reject Buttons (below) -->
                            <div class="flex gap-x-3 justify-center">
                                <!-- Accept Button -->
                                <button
                                    class="inline-flex items-center justify-center rounded-lg bg-green-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-800">
                                    Accept
                                </button>
                                <!-- Reject Button -->
                                <button
                                    class="inline-flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-800">
                                    Reject
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
