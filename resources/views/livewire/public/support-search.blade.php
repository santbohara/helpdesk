<div class="relative md:w-1/2 w-full">

    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                clip-rule="evenodd"></path>
        </svg>
    </div>

    <input type="text" 
        wire:model="term"
        class="bg-gray-50 border border-gray-300 text-gray-900
            rounded-3xl  @if(!empty($term)) rounded-b-none shadow-md @endif focus:ring-0 focus:border-gray-300
            block w-full pl-10 p-3.5"
        placeholder="{{ __('messages.search') }}" 
        required
    >

    <div wire:loading.delay.shorter class="absolute top-1 right-0 p-3">
        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </div>

    @if(!empty($term))

        <div class="absolute text-start left-0 right-0 w-full border border-gray-300 border-t-0 shadow-md bg-white rounded-3xl rounded-t-none overflow-hidden">

            @if(empty($data) || count($data) < 1)

                <div class="p-3">
                    {{ __('messages.search_try') }}
                </div>
                
            @else

                <ul>
                    @foreach($data as $row)

                        <li>
                            <a href="{{ route('support.view',[$row->Topic->slug,$row->slug]) }}"
                                class="flex justify-between items-center w-full p-3 hover:bg-gray-200 hover:text-gray-800"
                            >
                            {{ __('questions.'.$row->id) }}
                                <i class="bi bi-chevron-right text-xs"></i>
                            </a>
                        </li>

                    @endforeach
                </ul>

            @endif
        </div>
    @endif
</div>
