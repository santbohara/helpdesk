@php
    $page_title = __('trans-topic.'.$question->topic_id);
@endphp
<x-public-layout>

    @include('layouts._search')

    <div class="max-w-5xl mx-auto px-3 py-5">

        <div class="md:flex">

            <div class="w-full mb-3 md:mr-3">

                <div class=" pb-2 border-b-2">

                    <div class="flex items-center font-bold text-red-500">
                        <i class="bi bi-question-circle-fill"></i>
                        <span class="pl-2 text-lg">
                            {{ __('questions.'.$question->question_id) }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between">
                        <p class="flex justify-start text-xs gap-x-3 text-gray-500">
                            {{ __('messages.modified_date') }}: {{ date_format($question->updated_at,'d-M-Y') }}
                            <span> <i class="bi bi-eye-fill"></i> {{ $question->views }}</span>
                        </p>
                        <div class="flex gap-2">
                            <a href="{{ route('support.topic',$question->topic_slug) }}" class="text-sm hover:text-blue-600">
                                <i class="bi bi-arrow-return-left"></i>
                                {{ __('messages.back') }}
                            </a>
                            <a href="" class="text-sm hover:text-blue-600">
                                <i class="bi bi-printer"></i>
                                {{ __('messages.print') }}
                            </a>
                        </div>
                    </div>

                </div>

                <div class="my-8">

                    <div class="py-3">
                        @isset($question->answer)

                            <article class="prose prose-sm prose-p:m-0 prose-p:p-0 max-w-none dark:prose-headings:text-gray-300 dark:prose-strong:text-gray-300 dark:prose-em:text-gray-300 dark:prose-p:text-gray-300 dark:prose-a:text-gray-300 hover:dark:prose-a:text-gray-300 dark:prose-li:text-gray-300 dark:prose-ul:list-inside dark:prose-ol:list-inside dark:prose-li:marker:text-gray-300 dark:prose-img:w-full dark:prose-img:border dark:prose-img:p-1 dark:prose-th:bg-gray-300 dark:prose-th:text-white dark:prose-th:font-sans dark:prose-th:p-2 dark:prose-table:border dark:prose-td:p-2 dark:prose-blockquote:pl-4 dark:prose-blockquote:py-2 dark:prose-blockquote:text-gray-500 dark:prose-blockquote:border-gray-300 dark:prose-blockquote:font-light">
                                {!! \Illuminate\Support\Str::markdown($question->answer) !!}
                            </article>

                        @endisset
                    </div>

                    <div class="mt-8 mb-3 text-sm">
                        <span class="font-bold">{{ __('messages.was_useful') }}</span>
                        <a href="" class="p-2 border rounded-md border-gray-400 hover:border-green-500 hover:bg-green-500 hover:text-white">{{ __('messages.yes') }}</a>
                        <a href="" class="p-2 border rounded-md border-gray-400 hover:border-red-500 hover:bg-red-500 hover:text-white">{{ __('messages.no') }}</a>
                    </div>
                </div>

            </div>

            <div class="w-96">
                @include('layouts.help')
            </div>
        </div>
    </div>
</x-public-layout>
