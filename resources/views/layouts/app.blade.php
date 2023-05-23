<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/theme.css', 'resources/js/app.js'])

    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    @livewireStyles
    @stack('css')
    @php
        // force admin login to English language
        // this will also reset lang of customer panel if opened in same browser/time
        session()->put('locale', 'en');
    @endphp
</head>

<body class="flex h-screen overflow-hidden bg-gray-100 dark:bg-gray-900 text-gray-500">

    <div id="top-loader" class="fixed z-40 top-0 left-0 w-full">
        <div style="width: 100%" class="absolute top-0 h-1 bg-transparent loader-blue"></div>
    </div>

    @include('layouts.sidebar')

    <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">

        @include('layouts.navigation')

        {{-- Page Content --}}
        <main class="p-3 text-sm">
            {{ $slot }}
        </main>
    </div>

    @stack('scripts')
    <script type="module">$(document).ready(function(){$('#top-loader').delay(600).hide(0);})</script>
    @livewireScripts
    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script><x-livewire-alert::scripts />
</body>

</html>
