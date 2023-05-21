<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto">
            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded">
                @include('profile.partials.update-password-form')
            </div>
        </div>
    </div>
</x-app-layout>
