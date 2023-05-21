<div>
    {{-- Breadcrumb --}}
    <div class="breadcrumb flex flex-row justify-between ">

        {{-- Left navigation info --}}
        <div class="flex text-xs text-gray-500 items-center">
            <i class="bi bi-house mr-1"></i> Home / Manage Menu
        </div>

        {{-- Right Quick Action --}}

    </div>

    @include('alert')

    {{-- Body --}}

    <div class="flex items-center justify-between space-y-3 md:space-y-0 md:space-x-4 py-4">
            <p class="text-gray-700 dark:text-gray-400"> <i class="bi bi-list"></i> List of Menus</p>

            @can('create')

                <x-btn-primary data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example"
                        data-drawer-placement="right" aria-controls="drawer-right-example" type="button">
                    <i class="bi bi-plus pr-2"></i>
                    Add Menu
                </x-btn-primary>

                <!-- Add Menu component -->
                <div id="drawer-right-example"
                    class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-96 dark:bg-gray-800"
                    tabindex="-1" aria-labelledby="drawer-right-label">

                    <h5 id="drawer-right-label"
                        class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                        Add Menu
                    </h5>

                    <button type="button" data-drawer-hide="drawer-right-example" aria-controls="drawer-right-example"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <i class="bi bi-x-lg"></i>
                        <span class="sr-only">Close</span>
                    </button>

                    @livewire('admin.manage-menu.menu-create')
                </div>
            @endcan
    </div>

    <div class="bg-white dark:bg-gray-800 relative shadow-md">

        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">
                            Group
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Route Prefix
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Icon
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Order
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Stauts
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($lists as $row)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td scope="row" class="px-4 py-3">
                                {{ $row->MenuGroup->title }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $row->menu_title }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $row->route_prefix }}
                            </td>
                            <td class="px-4 py-3">
                                <i class="{{ $row->icon }}"></i> {{ $row->icon }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $row->order }}
                            </td>
                            <td class="px-4 py-3">
                                @can('edit')
                                    <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                        <input type="checkbox" wire:click="changeStatus('{{ $row->id }}')" class="sr-only peer" {{ $row->active == true ? 'checked' : '' }} >
                                        <x-checkbox-default>Active</x-checkbox-default>
                                    </label>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
