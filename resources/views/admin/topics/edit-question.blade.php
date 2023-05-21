<x-app-layout>

    {{-- Breadcrumb --}}
    <div class="breadcrumb flex flex-row justify-between ">

        {{-- Left navigation info --}}
        <div class="flex text-xs text-gray-500 items-center">
            <i class="bi bi-house mr-1"></i> Home / Topics / Questions / Edit
        </div>

        {{-- Right Quick Action --}}
        <a href="{{ route('topic.questions') }}" class="hover:text-blue-500">
            <i class="bi bi-arrow-return-left"></i> Go Back
        </a>

    </div>

    <div class="max-w-4xl">

        @include('alert')
        @include('error')

        <form action="{{ route('questions.update', $question->id) }}" method="POST" id="markDownForm">

            <textarea class="hidden" name="content" id="markDownContent"></textarea>
            @csrf

            <div class="">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg mb-6 my-3 p-3">
                    <div class="mb-6">
                        <x-input-label>Title</x-input-label>
                        <x-text-input type="text" name="title" value="{{ $question->title }}" required>
                        </x-text-input>
                        @error('title')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <x-input-label>Title Unicode</x-input-label>
                        <x-text-input type="text" name="title_unicode" value="{{ $question->title_unicode }}"
                            required>
                        </x-text-input>
                        @error('title')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-row space-x-6 items-center">

                        {{-- <div class="">
                            <x-input-label>Topics</x-input-label>
                            <select id="active" name="topic"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option value=""></option>
                                @foreach ($topics as $topic)
                                    <option value="{{ $topic->id }}"
                                        {{ $topic->id == $question->topic_id ? 'selected' : '' }}>{{ $topic->title }} -
                                        {{ $topic->title_unicode }}
                                    </option>
                                @endforeach
                            </select>
                            @error('topic')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        <div class="w-full">
                            <x-input-label>Topics</x-input-label>
                            <x-searchable-dropdown
                                item-id="topics-items"
                                :collection="$topics"
                                :searchable="true"
                                :multiple-choices="false"
                                :description="true"
                                selected-id="{{ $question->topic_id }}"
                                item-description="title_unicode"
                                item-label="title"
                                item-value="id"
                                property-name="topic"
                                old="topic"
                                id="topics-items"
                                name="topic"
                            />
                            @error('topic')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-10">
                            <div>
                                <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                    <input type="checkbox" class="sr-only peer" name="active"
                                        {{ $question->active == true ? 'checked' : '' }}>
                                    <x-checkbox-default>Active</x-checkbox-default>
                                </label>
                            </div>
                            @error('active')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>

            <div
                class="overflow-hidden border bg-white shadow dark:border-gray-800 dark:bg-gray-800 rounded-lg mb-6 my-3 p-3">
                <x-input-label>Answer</x-input-label>
                <div id="editor-container" class="dark:bg-gray-800">{!! $question->answer !!}</div>
            </div>

            <div class="flex flex-row justify-between">
                <x-btn-primary type="submit" id="test">
                    <span>Update</span>
                </x-btn-primary>

                @can('delete')
                    <button type="button" data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                        class="text-red-500">
                        <i class="bi bi-trash-fill"></i>
                        <span wire:target="delete">Delete</span>
                    </button>
                @endcan
            </div>
        </form>

        @can('delete')
            @include('admin.topics.delete-question-modal')
        @endcan
    </div>

    <x-quill-js></x-quill-js>
</x-app-layout>
