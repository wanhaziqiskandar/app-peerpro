<x-app-layout>
    <!-- Card Section -->
    <div class="min-h-screen bg-gray-100 px-4 py-10 dark:bg-gray-900 sm:px-6 lg:px-8">
        <!-- Card -->
        <div class="mx-auto max-w-4xl rounded-xl bg-white p-4 shadow dark:bg-gray-800 sm:p-7">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Profile</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Manage your personal information and account
                    settings.</p>
            </div>

            <form>
                <!-- Grid -->
                <div class="grid gap-4 sm:grid-cols-12 sm:gap-6">

                    <!-- First Name -->
                    <div class="sm:col-span-3">
                        <label class="mt-2.5 text-sm text-gray-800 dark:text-gray-200">First Name</label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="text"
                            class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                            placeholder="First Name">
                    </div>

                    <!-- Last Name -->
                    <div class="sm:col-span-3">
                        <label class="mt-2.5 text-sm text-gray-800 dark:text-gray-200">Last Name</label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="text"
                            class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                            placeholder="Last Name">
                    </div>


                    {{-- experience --}}
                    <div class="sm:col-span-3">
                        <label class="mt-2.5 text-sm text-gray-800 dark:text-gray-200">Experience</label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="text"
                            class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                            placeholder="Years of Experience">
                    </div>

                    {{-- expertise --}}
                    <div class="sm:col-span-3">
                        <label class="mt-2.5 text-sm text-gray-800 dark:text-gray-200">Expertise</label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="text"
                            class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                            placeholder="Enter your expertise">
                    </div>

                    {{-- qualifications --}}
                    <div class="sm:col-span-3">
                        <label class="mt-2.5 text-sm text-gray-800 dark:text-gray-200">Qualifications</label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="text"
                            class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                            placeholder="Enter your highest qualifications">
                    </div>

                    {{-- account number --}}
                    <div class="sm:col-span-3">
                        <label class="mt-2.5 text-sm text-gray-800 dark:text-gray-200">Account Number</label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="text"
                            class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                            placeholder="Enter your account number">
                    </div>

                    {{-- rate --}}
                    <div class="sm:col-span-3">
                        <label class="mt-2.5 text-sm text-gray-800 dark:text-gray-200">Rate</label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="number"
                            class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                            placeholder="Enter your rate" step="0.01" min="0">
                    </div>

                    {{-- phone number --}}
                    <div class="sm:col-span-3">
                        <label class="mt-2.5 text-sm text-gray-800 dark:text-gray-200">Phone Number</label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="tel"
                            class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                            placeholder="Enter your phone number" pattern="[0-9]{10,15}"
                            title="Please enter a valid phone number (10-15 digits)">
                    </div>


                    {{-- Timeslot --}}
                    <div class="sm:col-span-3">
                        <label class="mt-2.5 text-sm text-gray-800 dark:text-gray-200">Timeslot</label>
                    </div>
                    <div class="sm:col-span-9">
                        <div class="flex items-center space-x-4">
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <input type="checkbox" id="timeslot-8-9" name="timeslot[]" value="8-9"
                                        class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:ring-offset-gray-900 dark:focus:ring-blue-600">
                                    <label for="timeslot-8-9" class="ml-2 text-sm text-gray-800 dark:text-gray-200">8:00
                                        AM - 9:00 AM</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="timeslot-9-10" name="timeslot[]" value="9-10"
                                        class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:ring-offset-gray-900 dark:focus:ring-blue-600">
                                    <label for="timeslot-9-10"
                                        class="ml-2 text-sm text-gray-800 dark:text-gray-200">9:00 AM - 10:00 AM</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="timeslot-10-11" name="timeslot[]" value="10-11"
                                        class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:ring-offset-gray-900 dark:focus:ring-blue-600">
                                    <label for="timeslot-10-11"
                                        class="ml-2 text-sm text-gray-800 dark:text-gray-200">10:00 AM - 11:00
                                        AM</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="timeslot-2-3" name="timeslot[]" value="2-3"
                                        class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:ring-offset-gray-900 dark:focus:ring-blue-600">
                                    <label for="timeslot-2-3" class="ml-2 text-sm text-gray-800 dark:text-gray-200">2:00
                                        PM - 3:00 PM</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="timeslot-3-4" name="timeslot[]" value="3-4"
                                        class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:ring-offset-gray-900 dark:focus:ring-blue-600">
                                    <label for="timeslot-3-4"
                                        class="ml-2 text-sm text-gray-800 dark:text-gray-200">3:00 PM - 4:00 PM</label>
                                </div>
                            </div>

                            {{-- <button type="button"
                                class="rounded-lg bg-blue-600 px-3 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800">
                                Add Timeslot
                            </button> --}}
                        </div>
                    </div>


                    <!-- Other Fields -->
                    <!-- Repeat fields for experience, expertise, qualifications, etc. -->

                    <!-- Email -->
                    <div class="sm:col-span-3">
                        <label class="mt-2.5 text-sm text-gray-800 dark:text-gray-200">Email</label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="email"
                            class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                            placeholder="Email">
                    </div>

                    <!-- Password -->
                    <div class="sm:col-span-3">
                        <label class="mt-2.5 text-sm text-gray-800 dark:text-gray-200">Password</label>
                    </div>
                    <div class="space-y-2 sm:col-span-9">
                        <input type="password"
                            class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                            placeholder="Current Password">
                        <input type="password"
                            class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                            placeholder="New Password">
                    </div>
                </div>
                <!-- End Grid -->

                <!-- Add Assessment Button -->
                <div class="mt-5 flex justify-center">
                    <a href="{{ route('assessments.index') }}"
                        class="rounded-lg bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-800">
                        Add Assessment
                    </a>
                </div>


                <!-- Save/Cancel Buttons -->
                <div class="mt-5 flex justify-end gap-2">
                    <button type="button"
                        class="rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                        Cancel
                    </button>
                    <button type="submit"
                        class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
</x-app-layout>
