<div>
    <div class="mt-8 mb-3 space-x-2 text-sm">
        
        @if (!$message)
            <span class="font-bold">{{ __('messages.was_useful') }}</span>
            <button 
                type="button"
                wire:click="submitFeedback('yes','{{ $question_id }}')"
                class="p-2 border rounded-md border-gray-400 hover:border-green-500 hover:bg-green-500 hover:text-white">
                {{ __('messages.yes') }}
            </button>
            <button 
                type="button"
                wire:click="submitFeedback('no','{{ $question_id }}')"
                class="p-2 border rounded-md border-gray-400 hover:border-red-500 hover:bg-red-500 hover:text-white">
                {{ __('messages.no') }}
            </button>
        @endif

        <p>{!! $message !!}</p>
    </div>
</div>
