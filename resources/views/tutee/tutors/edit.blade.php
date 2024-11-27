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

                    <!-- Gender -->
                    <div class="sm:col-span-3">
                        <label class="mt-2.5 text-sm text-gray-800 dark:text-gray-200">Gender</label>
                    </div>
                    <div class="sm:col-span-9">
                        <div class="flex gap-4">
                            <label class="flex items-center">
                                <input type="radio" name="gender"
                                    class="text-blue-600 focus:ring-blue-500 dark:bg-gray-900" checked>
                                <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">Male</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="gender"
                                    class="text-blue-600 focus:ring-blue-500 dark:bg-gray-900">
                                <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">Female</span>
                            </label>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="sm:col-span-3">
                        <label class="mt-2.5 text-sm text-gray-800 dark:text-gray-200">Email</label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="email"
                            class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                            placeholder="Email">
                    </div>

                    <!-- Mobile Number -->
                    <div class="sm:col-span-3">
                        <label class="mt-2.5 text-sm text-gray-800 dark:text-gray-200">Mobile Number</label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="text"
                            class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                            placeholder="Mobile Number">
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

                <div class="mt-5 flex justify-end gap-2">
                    <button type="button"
                        class="rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">Cancel</button>
                    <button type="submit"
                        class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800">Save
                        changes</button>
                </div>
            </form>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
</x-app-layout>
