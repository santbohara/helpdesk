<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="flex flex-col h-screen bg-gray-100 dark:bg-gray-900">

    <div class="flex justify-end">
        <button id="theme-toggle" type="button"
            class="text-gray-500 hover:bg-gray-300 border-gray-300 dark:border-gray-700 dark:hover:text-gray-300 dark:hover:bg-gray-700
            focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 bg-transparent rounded-lg m-3 px-3 py-2">
            <i id="theme-toggle-dark-icon" class="bi bi-moon-fill hidden"></i>
            <i id="theme-toggle-light-icon" class="bi bi-sun hidden"></i>
        </button>
    </div>

    <div class="md:py-12">
        <div class="md:w-1/3 max-w-md mx-auto px-4 md:pt-20">
            {{ $slot }}
        </div>
    </div>

</body>

</html>
