<x-app-layout>

    {{-- Breadcrumb --}}
    <div class="breadcrumb flex flex-row justify-between ">

        {{-- Left navigation info --}}
        <div class="flex text-xs text-gray-500 items-center">
            <i class="bi bi-house mr-1"></i> Home / Topics / Questions / Add
        </div>

        {{-- Right Quick Action --}}
        <a href="{{ route('topic.questions') }}" class="hover:text-indigo-500">
            <i class="bi bi-arrow-return-left"></i> Go Back
        </a>

    </div>

    <div class="max-w-4xl">

        @include('alert')
        @include('error')

        <form action="{{ route('questions.store') }}" method="POST" id="markDownForm">

            <textarea class="hidden" name="content" id="markDownContent"></textarea>
            @csrf

            <div class="">
                <div class="bg-white dark:bg-gray-800 relative shadow-md mb-6 my-3 p-3">
                    <div class="mb-6">
                        <x-input-label>Title</x-input-label>
                        <x-text-input type="text" name="title" value="{{ old('title') }}" required></x-text-input>
                        @error('title')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <x-input-label>Title Unicode</x-input-label>
                        <x-text-input type="text" name="title_unicode" value="{{ old('title_unicode') }}" required>
                        </x-text-input>
                        @error('title')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-row space-x-6 items-center">

                        <div class="w-full">
                            <x-input-label>Topics</x-input-label>
                            <x-searchable-dropdown
                                item-id="topics-items"
                                :collection="$topics"
                                :searchable="true"
                                :multiple-choices="false"
                                :description="true"
                                selected-id=""
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
                                    <input type="checkbox" class="sr-only peer" name="active">
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

            <div class="">
                <div
                class="overflow-hidden border bg-white shadow dark:border-gray-800 dark:bg-gray-800 mb-6 my-3 p-3">
                    <x-input-label>Answer</x-input-label>
                    <div id="editor-container" class="dark:bg-gray-800">{!! old('content') !!}</div>
                </div>

                <x-btn-primary type="submit" id="test">
                    <span>Save</span>
                </x-btn-primary>
            </div>
        </form>
    </div>

    <x-quill-js></x-quill-js>
</x-app-layout>
