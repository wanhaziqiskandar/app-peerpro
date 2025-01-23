<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PeerPro - Connect, Learn, and Grow</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Preline CSS -->
    <link rel="stylesheet" href="https://unpkg.com/preline/dist/preline.min.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .btn-primary {
            background-color: #4f46e5;
            color: #fff;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #4338ca;
        }

        .btn-secondary {
            border: 1px solid #d1d5db;
            color: #374151;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #f3f4f6;
        }

        .card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans text-gray-800 antialiased">
    <div class="bg-gray-50 text-gray-800">
        <div
            class="relative flex min-h-screen flex-col items-center justify-center selection:bg-indigo-600 selection:text-white">
            <div class="relative w-full max-w-4xl px-6 lg:max-w-7xl">
                <!-- Header -->
                <header class="grid grid-cols-2 items-center gap-4 py-8 lg:grid-cols-3">
                    <div class="flex lg:col-start-2 lg:justify-center">
                        <h1 class="text-4xl font-extrabold text-indigo-600">PeerPro</h1>
                    </div>
                    <nav class="flex flex-1 justify-end space-x-4">
                        <a href="{{ route('login') }}" class="btn-secondary rounded-md px-4 py-2 focus:outline-none">Log
                            in</a>
                        <a href="{{ route('register') }}"
                            class="btn-primary rounded-md px-4 py-2 focus:outline-none">Register</a>
                    </nav>
                </header>

                <!-- Hero Section -->
                <section class="text-center">
                    <h2 class="text-3xl font-semibold text-gray-800 lg:text-5xl">
                        Empowering Tutees & Tutors to Learn Together
                    </h2>
                    <p class="mt-4 text-lg text-gray-600 lg:text-xl">
                        PeerPro connects students who need help (tutees) with students who love to teach (tutors).
                        Learn, teach, and grow together!
                    </p>
                    <div class="mt-6 flex justify-center gap-4">
                        <a href="{{ route('register') }}" class="btn-primary rounded-md px-6 py-3 text-lg">Join as
                            Tutee</a>
                        <a href="{{ route('register') }}" class="btn-primary rounded-md px-6 py-3 text-lg">Join as
                            Tutor</a>
                    </div>
                </section>

                <!-- Features Section -->
                <main class="mt-12">
                    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                        <div
                            class="card flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-lg">
                            <div class="pt-3">
                                <h3 class="text-2xl font-semibold text-gray-800">Learn & Teach Seamlessly</h3>
                                <p class="mt-2 text-lg text-gray-600">
                                    Whether you're a tutee looking for guidance or a tutor eager to share your
                                    knowledge,
                                    PeerPro simplifies the process. Schedule one-on-one sessions,
                                    and
                                    focus on meaningful progress with minimal effort.
                                </p>
                            </div>
                        </div>

                        <div class="grid gap-4">
                            <div class="card flex items-start gap-4 rounded-lg bg-white p-6 shadow-lg">
                                <div
                                    class="flex size-12 shrink-0 items-center justify-center rounded-full bg-indigo-100">
                                    <svg class="size-6 text-indigo-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-semibold text-gray-800">Find a Tutor</h4>
                                    <p class="mt-2 text-gray-600">
                                        Discover the right tutor to support your academic journey. Browse through a
                                        diverse range of tutors, filter by subject expertise,and connect with someone
                                        who matches your unique learning preferences.
                                        Gain personalized one-on-one guidance to excel in your studies.
                                    </p>

                                </div>
                            </div>

                            <div class="card flex items-start gap-4 rounded-lg bg-white p-6 shadow-lg">
                                <div
                                    class="flex size-12 shrink-0 items-center justify-center rounded-full bg-indigo-100">
                                    <svg class="size-6 text-indigo-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-semibold text-gray-800">Become a Tutor</h4>
                                    <p class="mt-2 text-gray-600">
                                        Empower students by becoming a tutor. Share your expertise, create assessments,
                                        and provide valuable learning materials to help students excel.
                                    </p>

                                </div>
                            </div>

                            <div class="card flex items-start gap-4 rounded-lg bg-white p-6 shadow-lg">
                                <div
                                    class="flex size-12 shrink-0 items-center justify-center rounded-full bg-indigo-100">
                                    <svg class="size-6 text-indigo-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-semibold text-gray-800">One-on-One Personalized Sessions
                                    </h4>
                                    <p class="mt-2 text-gray-600">
                                        Experience focused and personalized learning with one-on-one tutoring. Connect
                                        with a tutor dedicated to helping you achieve your goals in a comfortable and
                                        supportive environment.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <!-- Footer -->
                <footer class="py-16 text-center text-sm text-gray-600">
                    &copy; 2025 PeerPro. All rights reserved.
                </footer>
            </div>
        </div>
    </div>
</body>

</html>
