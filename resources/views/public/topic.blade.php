@php
    $page_title = $topic->title;
    $topic_slug = $topic->slug;
@endphp
<x-public-layout>

    @include('layouts._search')

    <div class="max-w-5xl mx-auto px-3 py-5">

        <div class="md:flex">

            <div class="w-full mb-3 md:mr-3">

                <div class="flex items-center pb-2 border-b-2">
                    <img class="w-10 h-10" src="{{ asset('icons/account.png') }}" alt="Accounts">
                    <div class="pl-2">
                        <h3 class="text-xl font-bold text-red-500">
                            {{ $topic->title }}
                        </h3>
                        <p class="font-light text-gray-500">
                            {{ $topic->desc }}
                        </p>
                    </div>
                </div>

                <div class="mt-6">
                    <ul>
                        @forelse ($questions as $question)
                            <li class="flex flex-row my-2  text-red-500">
                                <i class="bi bi-question-circle-fill"></i>
                                <a href="{{ route('support.view',[$topic->slug,$question->slug]) }}" class="pl-2 font-bold hover:underline hover:text-red-700">
                                    {{ $question->title }}
                                </a>
                            </li>
                        @empty
                            <li>No any data found!</li>
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
