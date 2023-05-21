<x-app-layout>

    {{-- Breadcrumb --}}
    <div class="breadcrumb flex flex-row justify-between ">

        {{-- Left navigation info --}}
        <div class="flex text-xs text-gray-500 items-center">
            <i class="bi bi-house mr-1"></i> Home / Topics / Questions / Reorder
        </div>

        {{-- Right Quick Action --}}
        <a href="{{ route('topic.questions') }}" class="hover:text-blue-500">
            <i class="bi bi-arrow-return-left"></i> Go Back
        </a>

    </div>

    <div class="max-w-xl">

        <p class="my-3 text-lg font-bold">Choose Topic</p>

        <div class="w-full shadow-md text-sm text-left text-gray-500 dark:text-gray-400">

            @forelse ($topics as $topic)

                <a href="{{ route('questions.reorder.list',$topic->id) }}" class="block p-3 bg-white border-b hover:bg-gray-200 dark:bg-gray-800 dark:border-gray-900 dark:hover:bg-gray-700">

                    <div class="flex flex-row items-center justify-between">
                        <ul>
                            <li>{{ $topic->title }}</li>
                            <li>{{ $topic->title_unicode }}</li>
                        </ul>
                        <i class="bi bi-chevron-right"></i>
                    </div>
                </a>
            @empty
                <p class="px-4 py-3" colspan="8">No data found!</p>
            @endforelse
        </div>
    </div>

    <x-quill-js></x-quill-js>
</x-app-layout>
