<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Preline CSS -->
    <link rel="stylesheet" href="https://unpkg.com/preline/dist/preline.min.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="flex min-h-screen flex-col items-center bg-slate-200 pt-6 sm:justify-center sm:pt-0">
        <div>
            <a href="/">
                <x-application-logo class="h-20 w-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="mt-6 w-full overflow-hidden bg-slate-50 px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

    <!-- Preline JavaScript -->
    <script src="https://unpkg.com/preline/dist/preline.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM fully loaded and parsed');
            const select = document.querySelector('#expertise');
            if (select) {
                console.log('Select element found:', select);
                // Initialize Preline multi-select
                new Preline.Select(select, {
                    multiple: true // Ensure it’s set for multiple selections
                });
            } else {
                console.error('Select element not found');
            }
        });
    </script>
</body>

</html>
