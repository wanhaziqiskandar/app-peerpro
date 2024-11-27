<x-app-layout>
    <!-- Card Section -->
    <div class="mx-auto max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
        <!-- Grid Container for Cards -->
        <div class="grid gap-3 sm:grid-cols-2 sm:gap-6 md:grid-cols-3 xl:grid-cols-4">
            @foreach ($tutors as $tutor)
                <!-- Tutor Card -->
                <div class="group flex cursor-pointer flex-col rounded-xl bg-white shadow-sm dark:bg-gray-800">
                    <div class="p-4 md:p-7">
                        <!-- Name -->
                        <h3 class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                            Name: {{ $tutor->name }}
                        </h3>
                        <!-- Expertise -->
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                            Expertise:
                        </p>
                        {{-- timeslot --}}
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                            Timeslot:
                        </p>
                        <!-- Rate -->
                        <p class="mt-1 flex justify-end text-sm text-gray-600 dark:text-gray-300">
                            RM{{ $tutor->price_rate }}
                        </p>

                        <div class="mt-4 flex flex-col items-center gap-y-3">
                            <!-- Pay and Chat Accepted or Rejected or Pending (Side by Side) -->
                            <div class="flex gap-x-3">
                                <!-- Pay Button -->
                                <a href="{{ route('payments.index', $tutor->id) }}"
                                    class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800">
                                    Pay
                                </a>
                                <!-- Accepted, Rejected, Pending Button -->
                                <a href="#"
                                    class="inline-flex items-center justify-center rounded-lg bg-green-600 px-7 py-2 text-sm font-semibold text-white hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-800">
                                    Accepted
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
