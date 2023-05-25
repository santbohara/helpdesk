<div>
    {{-- Breadcrumb --}}
    <div class="breadcrumb flex flex-row justify-between ">

        {{-- Left navigation info --}}
        <div class="flex text-xs text-gray-500 items-center">
            <i class="bi bi-house mr-1"></i> Home / Topics / Questions / Reorder
        </div>

        {{-- Right Quick Action --}}
        <a href="{{ route('topic.questions') }}" class="hover:text-indigo-500">
            <i class="bi bi-arrow-return-left"></i> Go Back
        </a>

    </div>

    <div class="max-w-xl">

        <div class="my-3">
            <p class="text-lg font-bold">Re-order Questions</p>
            <span>Click and Drag to re-oder.</span>
        </div>


        <div class="w-full relative shadow-md text-sm text-left text-gray-500 dark:text-gray-400">

            <x-loading-absolute wire:loading.flex wire:target="updateOrder">Saving...</x-loading-absolute>

            @forelse ($questions as $question)
                <div wire:sortable="updateOrder" class="cursor-move">

                    <div wire:sortable.item="{{ $question->id }}" wire:key="question-{{ $question->id }}" class="flex flex-row space-x-6 items-center justify-start px-3 py-2 bg-white border-b hover:bg-gray-200 dark:bg-gray-800 dark:border-gray-900 dark:hover:bg-gray-700">

                        <i class="bi bi-arrows-move"></i>
                        <p>{{ $question->title }}</p>
                    </div>
                </div>
            @empty
                <p class="block px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-900">No any questions found for this topic.</p>
            @endforelse
        </div>
    </div>
</div>

@push('scripts')
    <style>
        .draggable-mirror {
            max-width: 100%;
            width: 600px;
            border: 1px solid #dddddd;
            display: flex;
            align-items: center;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        }
    </style>
@endpush
