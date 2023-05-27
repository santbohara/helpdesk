<div class="p-4 bg-gray-200 rounded-md mb-3">
    <span class="font-bold">{{ __('messages.quick_question') }}</span>
    <p class="my-4">
        {{ __('messages.quick_question_text') }}
    </p>
    <a href="{{ route('raise.ticket') }}"
        class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-red-800 font-medium rounded-lg px-6 py-2.5 text-center md:mr-5 mb-3 md:mb-0 inline-flex items-center justify-center">
        {{ __('header.new_ticket') }}
    </a>
</div>
