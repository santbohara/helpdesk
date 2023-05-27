<x-public-layout>

    <div class="bg-gray-100">

        <div class="max-w-5xl mx-auto py-12 px-3 text-center">

            <h5 class="text-3xl mb-4">{{ __('messages.title') }}</h5>

            <form class="flex justify-center">

                <label for="simple-search" class="sr-only">{{ __('messages.search') }}</label>

                @livewire('public.support-search')
            </form>
        </div>
    </div>

    <div class="justify-items-center">

        <div class="max-w-5xl mx-auto px-3 py-5">

            <div class="md:flex">

                <div>
                    <div class="max-w-screen-md md:mx-3">

                        <p class="text-lg pb-1 mb-3 text-gray-600">{{ __('messages.general_topics') }}</p>

                        <div class="grid gap-4 mb-6 lg:mb-16 md:grid-cols-2">

                            @forelse ($topics as $topic)
                                <a href="{{ route('support.topic',$topic->slug) }}" class="block px-3 hover:shadow-lg hover:border-gray-300 bg-white border rounded-lg transition ease-in-out duration-300">
                                    <div class="flex items-center p-2">
                                        <img class="w-12 h-12" src="{{ asset('storage/'.$topic->icon) }}" alt="QR">
                                        <div class="p-5">
                                            <h3 class="text-md font-semibold text-red-500">
                                                {{ __('trans-topic.'.$topic->id) }}
                                            </h3>
                                            <p class="mt-3 font-light text-gray-500">
                                                {{ __('trans-topic-desc.'.$topic->id) }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <p>{{ __('messages.not_found') }}</p>
                            @endforelse

                        </div>
                    </div>
                </div>

                <div class="md:w-80">

                    <div class="p-4 bg-gray-200 rounded-md mb-3">
                        <span class="font-bold">{{ __('messages.quick_title') }}</span>
                        <ul class="mt-2 list-chv">
                            @foreach ($frequentQuestions as $question)
                                <li>
                                    <a href="{{ route('support.view',[$question->Topic->slug,$question->slug]) }}" class="hover:underline hover:text-blue-600">{{ __('questions.'.$question->id) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    @include('layouts.help')
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
