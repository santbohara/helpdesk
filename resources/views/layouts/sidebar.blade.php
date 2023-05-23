@php
    $active = 'border-indigo-500 bg-gray-200 dark:bg-gray-900';

    //Get route segment for active menu
    $url_segment_1 = Request::segment(1);
    $url_segment_2 = Request::segment(2);
    $url = $url_segment_1.'/'.$url_segment_2;

    $Sidebar = Sidebar::getMenu();
@endphp

<aside id="default-sidebar"
    class="flex flex-col absolute z-40 lg:z-30 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0
    overflow-y-auto no-scrollbar w-56
    shrink-0 transition-all duration-200 ease-in-out -translate-x-64 h-screen
    bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700 border-r"
    aria-label="Sidebar">

        <div class="overflow-y-auto overflow-x-hidden h-full flex-grow">

            <div class="flex justify-between pt-4 pb-3 px-4 border-b border-gray-100 dark:border-gray-700">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" title="logo">
                        <img src="{{ asset('images/logo-red.png') }}" alt="logo" width="115px">
                    </a>
                </div>

                <a href="/" target="_blank" class="text-gray-500 hover:text-indigo-600" title="Customer Panel">
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>
            </div>

            <ul class="flex flex-col py-4 space-y-1">

                @foreach($Sidebar['groups'] as $group)

                    <li class="px-4">
                        <div class="flex flex-row items-center h-8 mt-3">
                            <div class="text-sm font-semibold tracking-wide text-gray-600 dark:text-gray-500">
                                {{ $group->title }}
                            </div>
                        </div>
                    </li>

                    @foreach ($Sidebar['menus'] as $menu)

                        @if($menu->menu_groups_id == $group->id)
                            <li>
                                <a href="/{{ $menu->route_prefix }}"
                                    class="relative flex flex-row items-center h-10 focus:outline-none border-l-4 {{ $url == $menu->route_prefix ? $active : 'border-transparent' }}  hover:border-indigo-500 hover:bg-gray-200 dark:hover:bg-gray-900 hover:text-gray-800 text-gray-600 dark:text-gray-400 pr-6">
                                    <span class="inline-flex justify-center items-center ml-4">
                                        <i class="{{ $menu->icon }}"></i>
                                    </span>
                                    <span class="ml-2 text-sm tracking-wide truncate">{{ $menu->menu_title }}</span>
                                    {{--
                                        <span
                                            class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-gray-800 bg-gray-100 dark:bg-indigo-200 rounded-full">
                                        0
                                        </span>
                                    --}}
                                </a>
                            </li>
                        @endif

                    @endforeach
                @endforeach
            </ul>
        </div>
</aside>
