<x-app-layout>
    <!-- Card Section -->
    <div class="mx-auto max-w-4xl px-4 py-10 sm:px-6 lg:px-8">
        <!-- Card -->
        <div class="rounded-xl bg-white p-4 shadow dark:bg-gray-800 sm:p-7">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Request for Tutor</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Submit your requirements for tutoring assistance.</p>
            </div>

            <form>
                <!-- Grid -->
                <div class="grid gap-4 sm:grid-cols-12 sm:gap-6">

                    <!-- Expertise -->
                    <div class="sm:col-span-3">
                        <label class="mt-2.5 text-sm text-gray-800 dark:text-gray-200">Expertise</label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="text"
                            class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                            placeholder="Enter tutor expertise">
                    </div>

                    <!-- Requirement -->
                    <div class="sm:col-span-3">
                        <label class="mt-2.5 text-sm text-gray-800 dark:text-gray-200">Requirement (Optional)</label>
                    </div>
                    <div class="max-w-sm space-y-2 sm:col-span-9">
                        <textarea
                            class="block w-full rounded-lg border-transparent bg-gray-100 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:bg-gray-900 dark:text-gray-300"
                            rows="3" placeholder="Enter your learning requirements"></textarea>
                    </div>

                    <!-- Timeslot -->
                    <div class="sm:col-span-3">
                        <label class="mt-2.5 text-sm text-gray-800 dark:text-gray-200">Timeslot</label>
                    </div>
                    <div class="sm:col-span-9">
                        <select
                            class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                            <option selected disabled>Choose a timeslot</option>
                            <option value="morning">Morning (9:00 AM - 12:00 PM)</option>
                            <option value="afternoon">Afternoon (1:00 PM - 4:00 PM)</option>
                            <option value="evening">Evening (5:00 PM - 8:00 PM)</option>
                        </select>
                    </div>
                </div>
                <!-- End Grid -->

                <div class="mt-5 flex justify-end gap-2">
                    <button type="button"
                        class="rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Cancel</button>
                    <button type="submit"
                        class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800">Next</button>
                </div>
            </form>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
</x-app-layout>
