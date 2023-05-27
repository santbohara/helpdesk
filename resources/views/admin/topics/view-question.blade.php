<x-app-layout>

    {{-- Breadcrumb --}}
    <div class="breadcrumb flex flex-row justify-between ">

        {{-- Left navigation info --}}
        <div class="flex text-xs text-gray-500 items-center">
            <i class="bi bi-house mr-1"></i> Home / Topics / Questions / View
        </div>

        {{-- Right Quick Action --}}
        <a href="{{ route('topic.questions') }}" class="hover:text-indigo-500">
            <i class="bi bi-arrow-return-left"></i> Go Back
        </a>

    </div>

    <div class="max-w-4xl text-gray-800 dark:text-gray-300 mt-6">

        <div class="border dark:border-gray-700 py-3 px-4 space-y-1 bg-white dark:bg-gray-800 rounded shadow">
            <h4 class="text-lg">{{ $question->title }}</h4>
            <p>{{ $question->title_unicode }}</p>
            <div class="flex justify-between text-xs pt-2">
                <div>
                    <span><i class="bi bi-calendar-date"></i> Added Date : {{ $question->created_at }}</span>
                </div>
                <div class="flex justify-between gap-x-2">
                    <i class="bi bi-eye"></i> Views: {{ $question->views }}
                    <div>
                        | {{ optional($question->Feedback)->yes }} Like <i class="bi bi-hand-thumbs-up"></i> 
                        | Dislike <i class="bi bi-hand-thumbs-down"></i> {{ optional($question->Feedback)->no }}
                    </div>
                </div>
            </div>
        </div>

        <div class="dark:border-gray-700">

            <div class="overflow-hidden shadow mb-6 my-3 p-6 rounded bg-white dark:bg-gray-900">

                @isset($question->answer)

                    <article class="prose prose-sm prose-p:m-0 prose-p:p-0 max-w-none dark:prose-headings:text-gray-300 dark:prose-strong:text-gray-300 dark:prose-em:text-gray-300 dark:prose-p:text-gray-300 dark:prose-a:text-gray-300 hover:dark:prose-a:text-gray-300 dark:prose-li:text-gray-300 dark:prose-ul:list-inside dark:prose-ol:list-inside dark:prose-li:marker:text-gray-300 dark:prose-img:w-full dark:prose-img:border dark:prose-img:p-1 dark:prose-th:bg-gray-300 dark:prose-th:text-white dark:prose-th:font-sans dark:prose-th:p-2 dark:prose-table:border dark:prose-td:p-2 dark:prose-blockquote:pl-4 dark:prose-blockquote:py-2 dark:prose-blockquote:text-gray-500 dark:prose-blockquote:border-gray-300 dark:prose-blockquote:font-light">
                        {!! \Illuminate\Support\Str::markdown($question->answer) !!}
                    </article>

                @endisset
            </div>
        </div>
    </div>
</x-app-layout>
