<div class="bg-red-600">

    <div class="max-w-5xl mx-auto px-3">

        <nav>

            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl py-4">

                <a href="/">
                    <img src="{{ asset('images/logo-white.png') }}" alt="logo" width="120px">
                </a>

                <button data-collapse-toggle="menu-small" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm rounded-lg md:hidden hover:text-yellow-100 focus:outline-none focus:ring-2
                     focus:ring-gray-200 text-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="menu-small" aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>

                <div id="menu-small" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">

                    <ul class="flex flex-col mt-4 font-medium md:flex-row md:space-x-8 md:mt-0">

                        <li>
                            <a href="/" class="block py-2 font-medium text-gray-200" aria-current="page">
                                {{ __('header.home') }}
                            </a>
                        </li>
                        <li>
                            <button data-dropdown-toggle="dropdownNavbar"
                                class="flex items-center justify-between w-full py-2 font-medium text-gray-200">
                                {{ __('header.ticket') }}
                                <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div id="dropdownNavbar"
                                class="z-10 hidden font-normal bg-white rounded-lg
                                    shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                    aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="{{ route('raise.ticket') }}"
                                            class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">
                                            {{ __('header.new_ticket') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">
                                            {{ __('header.ticket_status') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="pt-3 text-gray-200">
                            <span class="language-toggle">
                                <a href="{{ route('changeLang', ['lang' => 'EN']) }}"
                                    class="changeLang  {{ session()->get('locale') == 'EN' ? 'active' : '' }}">EN</a> |
                                <a href="{{ route('changeLang', ['lang' => 'NP']) }}"
                                    class="changeLang  {{ session()->get('locale') == 'NP' ? 'active' : '' }}">ने</a>
                            </span>
                        </li>
                        <li class="pt-1 hidden">
                            <button id="theme-toggle" type="button"
                                class="text-gray-100 dark:text-gray-300 hover:text-gray-700 hover:bg-gray-300 border-gray-300 dark:border-gray-700 dark:hover:text-gray-300 dark:hover:bg-gray-700
                                focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-500 bg-transparent rounded-lg px-3 py-2">
                                <i id="theme-toggle-dark-icon" class="bi bi-moon-fill hidden"></i>
                                <i id="theme-toggle-light-icon" class="bi bi-sun hidden"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
