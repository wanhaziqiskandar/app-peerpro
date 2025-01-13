<x-app-layout>
    <div class="bg-gray-50 py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-xl">
                <!-- Welcome Message -->
                <div class="p-6 text-center text-gray-900">
                    <h1 class="mb-4 text-4xl font-extrabold leading-tight">
                        @if (Auth::user()->isTutor())
                            {{ __('Welcome to PeerPro Tutor Dashboard') }}
                        @else
                            {{ __('Welcome to PeerPro Tutee Dashboard') }}
                        @endif
                    </h1>
                    <p class="text-lg text-gray-600">
                        {{ __('Empowering students and tutors through personalized peer tutoring.') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- General Information Section -->
        <div class="mx-auto mt-12 max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                <div
                    class="transform rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 p-8 text-center text-white shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <h3 class="mb-2 text-2xl font-semibold">{{ __('What is PeerPro?') }}</h3>
                    <p class="text-lg">
                        {{ __('PeerPro connects students and expert tutors for personalized, interactive learning experiences. Whether you’re looking to learn a new subject or reinforce your knowledge, PeerPro makes it easy to find the right tutor or tutee.') }}
                    </p>
                </div>
                <div
                    class="transform rounded-xl bg-gradient-to-r from-teal-500 to-cyan-600 p-8 text-center text-white shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <h3 class="mb-2 text-2xl font-semibold">{{ __('For Tutors') }}</h3>
                    <p class="text-lg">
                        {{ __('As a tutor, you have the opportunity to share your knowledge, earn income, and help students succeed. Customize your availability, set your rates, and create your teaching profile to attract students.') }}
                    </p>
                </div>
                <div
                    class="transform rounded-xl bg-gradient-to-r from-yellow-500 to-orange-500 p-8 text-center text-white shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <h3 class="mb-2 text-2xl font-semibold">{{ __('For Tutees') }}</h3>
                    <p class="text-lg">
                        {{ __('As a tutee, you have access to a pool of highly qualified tutors. Browse their profiles, read reviews, and schedule sessions at your convenience to get the help you need.') }}
                    </p>
                </div>
            </div>

            <!-- Role-Based Content -->
            @if (Auth::user()->isTutor())
                <!-- Tutor Dashboard -->
                <div class="mx-auto mt-12 max-w-7xl sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div
                            class="transform rounded-xl bg-gradient-to-r from-green-400 to-blue-500 p-8 text-center text-white shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                            <div class="mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <h3 class="mb-2 text-2xl font-semibold">{{ __('Manage Your Sessions') }}</h3>
                            <p class="text-lg">
                                {{ __('View and manage your tutoring sessions, and customize your teaching schedule.') }}
                            </p>
                        </div>
                        <div
                            class="transform rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 p-8 text-center text-white shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                            <div class="mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7l-4 4m0 0l-4-4m4 4V3m8 8H8" />
                                </svg>
                            </div>
                            <h3 class="mb-2 text-2xl font-semibold">{{ __('Customize Your Teaching Preferences') }}
                            </h3>
                            <p class="text-lg">
                                {{ __('Set your availability, preferred subjects, and teaching style to match with tutees.') }}
                            </p>
                        </div>
                        <div
                            class="transform rounded-xl bg-gradient-to-r from-pink-500 to-rose-600 p-8 text-center text-white shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                            <div class="mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 0v4M3 10h18M5 10a1 1 0 00-1 1v6a1 1 0 001 1h14a1 1 0 001-1v-6a1 1 0 00-1-1H5zm4 5h.01M9 15h6" />
                                </svg>
                            </div>
                            <h3 class="mb-2 text-2xl font-semibold">{{ __('Set Your Schedule Availability') }}</h3>
                            <p class="text-lg">
                                {{ __("Let tutees know when you're available to teach and adjust your hours according to your convenience.") }}
                            </p>
                        </div>
                    </div>
                </div>
            @else
                <!-- Tutee Dashboard -->
                <div class="mx-auto mt-12 max-w-7xl sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div
                            class="transform rounded-xl bg-gradient-to-r from-teal-500 to-cyan-600 p-8 text-center text-white shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                            <div class="mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 16l-4-4m0 0l4-4m-4 4h16" />
                                </svg>
                            </div>
                            <h3 class="mb-2 text-2xl font-semibold">{{ __('Find a Tutor') }}</h3>
                            <p class="text-lg">
                                {{ __('Browse through available tutors, filter by subject expertise, and choose the perfect tutor for your needs.') }}
                            </p>
                        </div>
                        <div
                            class="transform rounded-xl bg-gradient-to-r from-green-400 to-lime-500 p-8 text-center text-white shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                            <div class="mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <h3 class="mb-2 text-2xl font-semibold">{{ __('Book a Session') }}</h3>
                            <p class="text-lg">
                                {{ __('Book tutoring sessions at your convenience, based on tutor availability and preferences.') }}
                            </p>
                        </div>
                        <div
                            class="transform rounded-xl bg-gradient-to-r from-pink-500 to-rose-600 p-8 text-center text-white shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                            <div class="mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 0v4M3 10h18M5 10a1 1 0 00-1 1v6a1 1 0 001 1h14a1 1 0 001-1v-6a1 1 0 00-1-1H5zm4 5h.01M9 15h6" />
                                </svg>
                            </div>
                            <h3 class="mb-2 text-2xl font-semibold">{{ __('Explore Available Tutors') }}</h3>
                            <p class="text-lg">
                                {{ __('Explore detailed tutor profiles, including qualifications, ratings, and availability, to find the best match.') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
