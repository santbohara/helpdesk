<x-public-layout>

    <div class="bg-gray-100">

        <div class="max-w-5xl mx-auto py-12 px-3 text-center">

            <h5 class="text-3xl mb-4">{{ __('messages.title') }}</h5>

            <form class="flex justify-center">

                <label for="simple-search" class="sr-only">{{ __('messages.search') }}</label>

                <div class="relative md:w-1/2 w-full">

                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>

                    <input type="text" id="simple-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900
                            rounded-3xl focus:ring-blue-500 focus:border-blue-500
                            block w-full pl-10 p-3.5"
                        placeholder="{{ __('messages.search') }}" required>
                </div>
            </form>
        </div>
    </div>

    <div class="justify-items-center">

        <div class="max-w-5xl mx-auto px-3 py-5">

            <div class="md:flex">

                <div>
                    <div class="max-w-screen-md md:mx-3">

                        <p class="text-xl pb-1 mb-3 font-bold ">{{ __('messages.general_topics') }}</p>

                        <div class="grid gap-3 mb-6 lg:mb-16 md:grid-cols-2">

                            @forelse ($topics as $topic)
                                <a href="{{ route('support.topic',$topic->slug) }}" class="block hover:bg-gray-200 bg-white border-b-2 hover:rounded-md">
                                    <div class="flex items-center p-2">
                                        <img class="w-16 h-16" src="{{ asset('storage/'.$topic->icon) }}" alt="QR">
                                        <div class="p-5">
                                            <h3 class="text-xl font-bold text-red-500">
                                                {{ $topic->title }}
                                            </h3>
                                            <p class="mt-3 font-light text-gray-500">
                                                {{ $topic->desc }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <p>No Data found !! Contact support teams for query!</p>
                            @endforelse

                        </div>
                    </div>
                </div>

                <div class="md:w-80">

                    <div class="p-4 bg-gray-200 rounded-md mb-3">
                        <span class="font-bold">{{ __('messages.quick_title') }}</span>
                        <ul class="mt-2 list-chv">
                            <li>
                                <a href="" class="hover:underline hover:text-blue-600">How to open online
                                    account?</a>
                            </li>
                            <li>
                                <a href="" class="hover:underline hover:text-blue-600">How to register
                                    mobile banking?</a>
                            </li>
                            <li>
                                <a href="" class="hover:underline hover:text-blue-600">How to activate
                                    online transaction in my card?</a>
                            </li>
                            <li>
                                <a href="" class="hover:underline hover:text-blue-600">How to open fixed
                                    deposit?</a>
                            </li>
                        </ul>
                    </div>

                    @include('layouts.help')
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
