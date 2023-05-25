<div class="bg-gray-200">

    <div class="max-w-5xl mx-auto py-4 px-3">

        <div class="md:flex justify-between items-center">

            <div class="text-gray-500 text-sm md:block hidden">
                <a href="/" class="hover:underline">{{ __('header.home') }}</a> /
                @isset($page_title)
                    {{ $page_title }}
                @endisset()
            </div>

            <form>
                <label for="simple-search" class="sr-only">{{ __('messages.search') }}</label>

                <div class="relative md:w-96">

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
                        rounded-3xl focus:ring-indigo-500 focus:border-indigo-500
                        block w-full pl-10 p-2"
                        placeholder="{{ __('messages.search') }}" required>
                </div>
            </form>
        </div>

    </div>
</div>
