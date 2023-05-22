<div>
    {{-- Breadcrumb --}}
    <div class="breadcrumb flex flex-row justify-between ">

        {{-- Left navigation info --}}
        <div class="flex text-xs text-gray-500 items-center">
            <i class="bi bi-house mr-1"></i> Home / Tickets / All Tickets
        </div>

        {{-- Right Quick Action --}}

    </div>

    <div class="flex items-center justify-between space-y-3 md:space-y-0 md:space-x-4 py-4">

        {{-- Search Input --}}
        <div class="lg:w-1/4">

            <form class="flex items-center">

                <label for="simple-search" class="sr-only">Search</label>

                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input wire:model="search" type="text" id="simple-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Search Ticket ID" required="">
                </div>

            </form>
        </div>

        <div class="flex flow-row gap-3 justify-center">

            <div class="flex self-center">
                @if($filter)
                    <a href="#" wire:click="refresh" class="text-blue-500 hover:underline">
                        <i class="bi bi-x-circle"></i> Clear Filter
                    </a>
                @endif
            </div>

            <div>
                <x-btn-secondary-outline id="moreDropdownButton" data-dropdown-toggle="moreDropdown">
                    <i class="bi bi-chevron-down mr-1"></i>
                    More
                </x-btn-secondary-outline>
                <div id="moreDropdown" class="z-10 hidden overflow-hidden w-48 bg-white rounded-lg shadow-lg dark:bg-gray-700">
                    <button
                        class="w-full text-start p-4 text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-100"
                        wire:click="export('xlsx')"
                        wire:loading.attr="disabled"
                    >
                        <i class="bi bi-file-excel"></i>
                        <span wire:target="export" wire:loading.remove>Export All</span>
                        <span wire:target="export" wire:loading>Exporting...</span>
                    </button>
                </div>
            </div>

            <div>
                <x-btn-secondary-outline data-drawer-target="drawer-add" data-drawer-show="drawer-add"
                data-drawer-placement="right" aria-controls="drawer-add" >
                    <i class="bi bi-funnel-fill mr-1"></i> Filter
                </x-btn-secondary-outline>

                <!-- Add component -->
                <div id="drawer-add" wire:ignore
                    class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-96 dark:bg-gray-800"
                    tabindex="-1" aria-labelledby="drawer-right-label">

                    <h5 id="drawer-right-label"
                        class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                        <i class="bi bi-funnel-fill mr-1"></i> Filter
                    </h5>

                    <button type="button" data-drawer-hide="drawer-add" aria-controls="drawer-add"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <i class="bi bi-x-lg"></i>
                        <span class="sr-only">Close</span>
                    </button>

                    @include('livewire.admin.tickets.filter-tickets')
                </div>
            </div>
        </div>

    </div>

    @include('alert')

    <div class="w-full realtive bg-white dark:bg-gray-800 relative shadow-md mb-6 my-3">

        <x-loading-absolute wire:loading.flex wire:target="search, filter">Loading...</x-loading-absolute>

        {{-- Table --}}
        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">SN</th>
                        <th scope="col" class="px-4 py-3">
                            <div class="flex items-center gap-4">
                                Subject
                                <i class="bi bi-arrow-down-up hover:cursor-pointer {{ $sortBy === 'ticket_id' ? 'text-blue-500' : null }}" wire:click="sortBy('ticket_id')"></i>
                            </div>
                        </th>
                        <th scope="col" class="px-4 py-3">
                            <div class="flex items-center gap-4">
                                Customer
                                <i class="bi bi-arrow-down-up hover:cursor-pointer {{ $sortBy === 'topic_id' ? 'text-blue-500' : null }}" wire:click="sortBy('topic_id')"></i>
                            </div>
                        </th>
                        <th scope="col" class="px-4 py-3">
                            <div class="flex items-center gap-4">
                                Ticket Date
                                <i class="bi bi-arrow-down-up hover:cursor-pointer {{ $sortBy === 'created_at' ? 'text-blue-500' : null }}" wire:click="sortBy('created_at')"></i>
                            </div>
                        </th>
                        <th scope="col" class="px-4 py-3">
                            <div class="flex items-center gap-4">
                                Status
                                <i class="bi bi-arrow-down-up hover:cursor-pointer {{ $sortBy === 'status' ? 'text-blue-500' : null }}" wire:click="sortBy('status')"></i>
                            </div>
                        </th>
                        <th scope="col" class="px-4 py-3"></th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($tickets as $ticket)
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('ticket.view',$ticket->id) }}" class="text-blue-500">{{ $ticket->subject }}</a>
                                <div>
                                    {{ $ticket->Topic->title }}
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <ul>
                                    <li><span class="font-meduim">{{ $ticket->name }}</span></li>
                                    <li>{{ $ticket->email }}</li>
                                </ul>
                            </td>
                            <td class="px-4 py-3">{{ $ticket->created_at }}</td>
                            <td class="px-4 py-3">
                                <span class="text-xs font-medium px-3 py-1 rounded-full {{ $ticket->Status->badge_class}}">
                                    {{ $ticket->Status->title }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <i class="bi bi-reply-fill"></i> Replied
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-4 py-3" colspan="8">No data found!</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

    {{ $tickets->links() }}

</div>
