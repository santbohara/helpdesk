<div>
    {{-- Breadcrumb --}}
    <div class="breadcrumb flex flex-question justify-between ">

        {{-- Left navigation info --}}
        <div class="flex text-xs text-gray-500 items-center">
            <i class="bi bi-house mr-1"></i> Home / Topics / Questions
        </div>

        {{-- Right Quick Action --}}

    </div>

    <div class="md:flex items-center justify-between space-y-3 md:space-y-0 md:space-x-4 py-4">

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
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                        placeholder="Search Title" required="">
                </div>

            </form>
        </div>

        <div class="flex flow-row gap-3 justify-center">

            <div class="flex self-center">
                @if($topic || $active)
                    <a href="#" wire:click="refresh" class="text-indigo-500 hover:underline">
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
                    <a
                        href="{{ route('questions.reorder') }}"
                        class="block text-start p-4 text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-100"
                    >
                        <i class="bi bi-arrows-move"></i>
                        Re-order Question
                    </a>
                </div>
            </div>

            <div>
                <x-btn-secondary-outline id="filterDropdownButton" data-dropdown-toggle="filterDropdown">
                    <i class="bi bi-funnel-fill mr-1"></i> Filter <i class="bi bi-chevron-down"></i>
                </x-btn-secondary-outline>

                <div wire:ignore.self id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow-lg dark:bg-gray-700">

                    <x-input-label class="mb-3">By Category</x-input-label>
                    <ul class="space-y-2 text-sm border-b dark:border-b-gray-600 pb-3" aria-labelledby="filterDropdownButton">
                        @foreach ($topics as $topic)
                            <li class="flex items-center">
                                <x-checkbox-filter wire:model="topic" id="{{ $topic->id }}" value="{{ $topic->id }}" />
                                <x-checkbox-label for="{{ $topic->id }}">{{ $topic->title }}</x-checkbox-label>
                            </li>
                        @endforeach
                    </ul>

                    <x-input-label class="my-3">By Status</x-input-label>
                    <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                        <li class="flex items-center">
                            <x-checkbox-filter wire:model="active" id="status-active" value="1" />
                            <x-checkbox-label for="status-active" class="">Active</x-checkbox-label>
                        </li>
                        <li class="flex items-center">
                            <x-checkbox-filter wire:model="active" id="status-blocked" value="false" />
                            <x-checkbox-label for="status-blocked">Blocked</x-checkbox-label>
                        </li>
                    </ul>

                </div>
            </div>

            @can('create')
                <x-nav-btn-primary href="{{ route('questions.add') }}">
                    <i class="bi bi-plus pr-2"></i>
                    Add Question
                </x-nav-btn-primary>
            @endcan
        </div>
    </div>

    <div class="w-full realtive bg-white dark:bg-gray-800 relative shadow-md mb-6 my-3">

        <x-loading-absolute wire:loading.flex wire:target="topic, active">Loading...</x-loading-absolute>

        <div class="w-full">
            {{-- Table --}}
            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-4 py-3 w-16 text-center">SN</th>
                            <th class="px-4 py-3">
                                Title
                            </th>
                            <th class="px-4 py-3 hidden md:block">
                                Topic
                            </th>
                            <th class="px-4 py-3">
                                Status
                            </th>
                            <th class="px-4 py-3">
                                Views
                            </th>
                            <th class="px-4 py-3"></th>
                            <th class="px-4 py-3 hidden md:block">
                                <span class="">Created At</span>
                            </th>
                            <th class="px-4 py-3 md:w-32"></th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($questions as $question)

                            <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">

                                <td class="px-4 py-3 text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-4 py-3">
                                    <ul>
                                        <li>{{ $question->title }}</li>
                                        <li>{{ $question->title_unicode }}</li>
                                    </ul>
                                </td>

                                <td class="px-4 py-3 hidden md:block">
                                    {{ $question->Topic->title }}
                                </td>

                                <td class="px-4 py-3">
                                    @if ($question->active == true)
                                        <span
                                            class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Active</span>
                                    @else
                                        <span
                                            class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Blocked</span>
                                    @endif
                                </td>

                                <td class="px-4 py-3">
                                    <span class="bg-blue-100 text-indigo-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                        {{ $question->views }}
                                    </span>
                                </td>

                                <td class="px-4 py-3">
                                    {{ optional($question->Feedback)->yes }} Like <i class="bi bi-hand-thumbs-up"></i> 
                                    | Dislike <i class="bi bi-hand-thumbs-down"></i> {{ optional($question->Feedback)->no }}
                                </td>

                                <td class="px-4 py-3 hidden md:block"><span>{{ $question->created_at->format('Y-m-d') }}</span></td>

                                <td class="px-4 py-3">

                                    <ul class="flex flex-row justify-center space-x-3">
                                        <li>
                                            <a href="{{ route('questions.view',$question->id) }}"  data-tooltip-target="tooltip-view" class="text-indigo-500 hover:text-indigo-700">
                                                <i class="bi bi-info-circle"></i>
                                            </a>
                                            <x-tooltip id="tooltip-view">View</x-tooltip>
                                        </li>
                                        <li>
                                            @can('edit')
                                                <a href="{{ route('questions.edit',$question->id) }}" data-tooltip-target="tooltip-edit" class="text-indigo-500 hover:text-indigo-700">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <x-tooltip id="tooltip-edit">Edit</x-tooltip>
                                            @endcan
                                        </li>
                                    </ul>
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
    <div class="pb-3">
        {{ $questions->links() }}
    </div>
</div>
