@php
    $page_title = __('header.new_ticket');
@endphp
<x-public-layout>

    @include('layouts._search')

    <div class="max-w-5xl mx-auto px-3 py-5">

        <div class="md:flex">

            <div class="w-full mb-3 md:mr-3">

                <div>
                    <div class="flex items-center font-bold text-red-500">
                        <i class="bi bi-plus-circle"></i>
                        <span class="pl-2 text-lg">
                            {{ __('header.new_ticket') }}
                        </span>
                    </div>
                    <p class="text-gray-500">{{ __('messages.quick_question_text') }}</p>
                </div>

                <div class="my-3 md:w-2/3">
                    <livewire:raise-ticket />
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
