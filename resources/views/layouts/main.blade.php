<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Home</title>
</head>

<body class="bg-gray-900 text-white">
    <header class="flex w-full flex-wrap bg-gray-800 py-3 text-sm sm:flex-nowrap sm:justify-start">
        <nav class="mx-auto flex w-full max-w-[80rem] basis-full flex-wrap items-center justify-between px-4">
            <a class="flex-none text-xl font-semibold focus:opacity-80 focus:outline-none sm:order-1"
                href="{{ route('dashboard') }}">PeerPro</a>
            <div class="flex items-center gap-x-2 sm:order-3">
                <button type="button"
                    class="hs-collapse-toggle size-7 relative flex items-center justify-center gap-x-2 rounded-lg border border-gray-200 bg-gray-800 text-gray-200 shadow-sm hover:bg-gray-700 focus:bg-gray-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50 sm:hidden"
                    id="hs-navbar-alignment-collapse" aria-expanded="false" aria-controls="hs-navbar-alignment"
                    aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-alignment">
                    <svg class="size-4 shrink-0 hs-collapse-open:hidden" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" x2="21" y1="6" y2="6" />
                        <line x1="3" x2="21" y1="12" y2="12" />
                        <line x1="3" x2="21" y1="18" y2="18" />
                    </svg>
                    <svg class="size-4 hidden shrink-0 hs-collapse-open:block" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                    <span class="sr-only">Toggle</span>
                </button>
                {{-- <a href="#"
                    class="inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-gray-800 px-3 py-2 text-sm font-medium text-gray-200 shadow-sm hover:bg-gray-700 focus:bg-gray-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50">
                    Profile
                </a> --}}
            </div>
            <div id="hs-navbar-alignment"
                class="hs-collapse hidden grow basis-full overflow-hidden transition-all duration-300 sm:order-2 sm:block sm:grow-0 sm:basis-auto"
                aria-labelledby="hs-navbar-alignment-collapse">
                <div class="mt-5 flex flex-col gap-5 sm:mt-0 sm:flex-row sm:items-center sm:ps-5">
                    <a class="font-medium text-gray-300 hover:text-gray-400 focus:text-gray-400 focus:outline-none"
                        href="{{ route('tutors.index') }}">Tutor</a>
                    <a class="font-medium text-gray-300 hover:text-gray-400 focus:text-gray-400 focus:outline-none"
                        href="{{ route('requests.index') }}">Request</a>
                    <a class="font-medium text-gray-300 hover:text-gray-400 focus:text-gray-400 focus:outline-none"
                        href="#">Chat</a>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="min-h-screen bg-gray-900">
            @yield('content')
        </div>
    </main>
</body>

</html>
