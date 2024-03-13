<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>

        @hasSection('page_title')
            @yield('page_title') |
        @endif
        Macojet Systems
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        @if (session('success'))
            <div
                class="max-w-3xl mx-auto my-4 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 bg-opacity-75">
                <p class="font-bold">Success!</p>
                <p class="">{{ session('success') }}</p>
            </div>
        @endif

        @if (session('error'))
            <div
                class="max-w-3xl mx-auto my-4 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 bg-opacity-75">
                <p class="font-bold">Error!</p>
                <p class="">{{ session('error') }}</p>
            </div>
        @endif

        <!-- Page Content -->
        <main class="py-12">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
