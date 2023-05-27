<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/css/theme.css', 'resources/js/app.js'])
        @livewireStyles
    </head>

    <body class="bg-white">

        <div class="min-h-screen">

            <!-- Page Heading -->
            @include('layouts.header')

            <!-- Page Content -->
            <main class="text-sm">
                {{ $slot }}
            </main>
        </div>

        <!-- Page Footer -->
        @include('layouts.footer')
        @livewireScripts
    </body>
</html>
