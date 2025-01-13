<nav x-data="{ open: false }"
    class="border-b border-gray-100 bg-gradient-to-r from-indigo-600 to-purple-600 ">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo -->
            <div class="flex shrink-0 items-center space-x-2">
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    <span class="ml-2 text-2xl font-bold text-white">PeerPro</span> <!-- Logo with text -->
                </a>
            </div>

            <!-- Menu Links -->
            <div class="flex flex-grow items-center justify-center space-x-6">
                <div class="hidden items-center space-x-8 sm:flex">
                    <!-- Dashboard Link -->
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="rounded-md px-3 py-2 text-lg font-semibold text-white transition-colors duration-300 ease-in-out hover:bg-indigo-800 hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if (Auth::user()->isTutee())
                        <!-- Tutor Link -->
                        <x-nav-link :href="route('tutors.index')" :active="request()->routeIs('tutors.index')"
                            class="rounded-md px-3 py-2 text-lg font-semibold text-white transition-colors duration-300 ease-in-out hover:bg-indigo-800 hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                            {{ __('Tutor') }}
                        </x-nav-link>
                    @endif

                    @if (Auth::user()->isTutor())
                        <!-- Assessment Link -->
                        <x-nav-link :href="route('assessments.index')" :active="request()->routeIs('assessments.index')"
                            class="rounded-md px-3 py-2 text-lg font-semibold text-white transition-colors duration-300 ease-in-out hover:bg-indigo-800 hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                            {{ __('Assessment') }}
                        </x-nav-link>
                    @endif

                    <!-- Request Link -->
                    <x-nav-link :href="route('requests.index')" :active="request()->routeIs('requests.index')"
                        class="rounded-md px-3 py-2 text-lg font-semibold text-white transition-colors duration-300 ease-in-out hover:bg-indigo-800 hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                        {{ __('Request') }}
                    </x-nav-link>

                    <!-- Chat Link -->
                    <x-nav-link :href="route('chat.conversations.index')" :active="request()->routeIs('chat.conversations.index')"
                        class="rounded-md px-3 py-2 text-lg font-semibold text-white transition-colors duration-300 ease-in-out hover:bg-indigo-800 hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                        {{ __('Chat') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="h-4 w-4 fill-current text-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-gray-800 dark:text-gray-200">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="text-gray-800 dark:text-gray-200">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger for mobile -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none dark:text-gray-500 dark:hover:bg-gray-900 dark:hover:text-gray-400 dark:focus:bg-gray-900 dark:focus:text-gray-400">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="space-y-1 pb-3 pt-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-indigo-600 hover:bg-indigo-100">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="border-t border-gray-200 pb-1 pt-4 dark:border-gray-600">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-gray-800 dark:text-gray-200">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="text-gray-800 dark:text-gray-200">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
