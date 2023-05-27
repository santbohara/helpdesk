@php
    $page_title = __('trans-topic.'.$topic->id);
    $topic_slug = $topic->slug;
@endphp
<x-public-layout>

    @include('layouts._search')

    <div class="max-w-5xl mx-auto px-3 py-5">

        <div class="md:flex">

            <div class="w-full mb-3 md:mr-3">

                <div class="flex items-center">
                    <img class="w-10 h-10" src="{{ asset('icons/account.png') }}" alt="Accounts">
                    <div class="pl-2">
                        <h3 class="text-xl font-bold text-red-500">
                            {{ __('trans-topic.'.$topic->id) }}
                        </h3>
                        <p class="font-light text-xs text-gray-500">
                            {{ __('trans-topic-desc.'.$topic->id) }}
                        </p>
                    </div>
                </div>

                <div class="mt-6">
                    <ul class="p-3 border rounded-lg">
                        @forelse ($questions as $question)
                            <li class="flex flex-row text-gray-700">
                                <a href="{{ route('support.view',[$topic->slug,$question->slug]) }}" 
                                    class="w-full flex justify-between items-center p-3 rounded-lg hover:bg-gray-200 hover:text-gray-800 transition ease-in-out duration-300">
                                    {{ __('questions.'.$question->id) }}
                                    <i class="bi bi-chevron-right text-xs"></i>
                                </a>
                            </li>
                        @empty
                            <li>{{ __('messages.not_found') }}</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <div class="w-96">
                @include('layouts.help')
            </div>
        </div>
    </div>
</x-public-layout>
