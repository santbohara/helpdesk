<div>
    {{-- Breadcrumb --}}
    <div class="breadcrumb flex flex-row justify-between ">

        {{-- Left navigation info --}}
        <div class="flex text-xs text-gray-500 items-center">
            <i class="bi bi-house mr-1"></i> Home / Topics / Topics List
        </div>

        {{-- Right Quick Action --}}

    </div>

    @include('alert')

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
                        placeholder="Search Title" required="">
                </div>

            </form>
        </div>

        @can('create')
            <x-btn-primary data-drawer-target="drawer-add" data-drawer-show="drawer-add"
                data-drawer-placement="right" aria-controls="drawer-add" type="button">
                <i class="bi bi-plus pr-2"></i>
                Add Topic
            </x-btn-primary>

            <!-- Add component -->
            <div id="drawer-add" wire:ignore.self
                class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-96 dark:bg-gray-800"
                tabindex="-1" aria-labelledby="drawer-right-label">

                <h5 id="drawer-right-label"
                    class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                    Add Topic
                </h5>

                <button type="button" data-drawer-hide="drawer-add" aria-controls="drawer-add"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <i class="bi bi-x-lg"></i>
                    <span class="sr-only">Close</span>
                </button>

                @include('livewire.admin.topics.add-topic')
            </div>
        @endcan
    </div>

    <div class="w-full bg-white dark:bg-gray-800 relative shadow-md mb-6 my-3">

        <x-loading-absolute wire:loading.flex wire:target="updateTaskOrder, search">Saving....</x-loading-absolute>

        <div class="w-full">
            {{-- Table --}}
            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-4 py-3 w-16 text-center">SN</th>
                            <th class="px-4 py-3 hidden md:flex"></th>
                            <th class="px-4 py-3">
                                Title
                            </th>
                            <th class="px-4 py-3">
                                Status
                            </th>
                            <th class="px-4 py-3">
                                Questions
                            </th>
                            <th class="px-4 py-3 hidden md:flex justify-center">
                                <span class="">Created By</span>
                            </th>
                            <th class="px-4 py-3 w-32">
                                <div class="hidden md:flex justify-center">
                                    Re-order
                                </div>
                            </th>
                            <th class="px-4 py-3 md:w-32"></th>
                        </tr>
                    </thead>

                    <tbody wire:sortable="updateTaskOrder">

                        @forelse ($topics as $topic)

                            <tr wire:sortable.item="{{ $topic->id }}" wire:key="topic-{{ $topic->id }}" class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">

                                <td class="px-4 py-3 text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-4 py-3  hidden md:flex justify-center">
                                    <img src="{{ asset('storage/'.$topic->icon) }}" width="50px" alt="" title="" class="dark:invert dark:opacity-50" />
                                </td>

                                <td class="px-4 py-3">
                                    <ul>
                                        <li>{{ $topic->title }}</li>
                                        <li>{{ $topic->title_unicode }}</li>
                                    </ul>
                                </td>

                                <td class="px-4 py-3">
                                    @if ($topic->active == true)
                                        <span
                                            class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Active</span>
                                    @else
                                        <span
                                            class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Blocked</span>
                                    @endif
                                </td>

                                <td class="px-4 py-3">
                                    <span class="bg-blue-100 text-indigo-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                        {{ $topic->questions_count }}
                                    </span>
                                </td>

                                <td class="px-4 py-3 hidden md:flex justify-center"><span>{{ $topic->created_by }}</span></td>

                                <td class="px-4 py-3 cursor-move" wire:sortable.handle>
                                    <div class="hidden md:flex justify-center">
                                        <i class="bi bi-arrows-move"></i>
                                    </div>
                                </td>

                                <td class="px-4 py-3">
                                    @can('edit')
                                        <a href="{{ route('topic.edit',$topic->id) }}"
                                            class="block py-2 px-4 text-indigo-500 hover:underline">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                    @endcan
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
    </div>

    {{ $topics->links() }}
</div>

@push('scripts')
    <style>
        .draggable-mirror {
            width: 85%;
            border: 1px solid #dddddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        }
    </style>
@endpush
