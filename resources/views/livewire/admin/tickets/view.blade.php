<div>
    {{-- Breadcrumb --}}
    <div class="breadcrumb flex flex-row justify-between ">

        {{-- Left navigation info --}}
        <div class="flex text-xs text-gray-500 items-center">
            <ul class="flex">
                <li><i class="bi bi-house mr-1"></i> Home / Ticket / View </li>
            </ul>
        </div>

        {{-- Right Quick Action --}}

    </div>

    <div class="md:flex md:space-x-3">

        <div class="mb-6 grow max-w-7xl">

            @include('alert')

            {{-- Subject --}}
            <div class="my-3 flex justify-between">
                <div><i class="bi bi-chat"></i> <span>Conversation History</span></div>
                <ul class="flex">
                    <li><a href="{{ route('ticket.all') }}" class="mx-2 text-indigo-500"> <i class="bi bi-arrow-return-left"></i> Back</a></li>
                </ul>
            </div>

            {{-- Customer Query --}}
            <div class="my-3 border dark:border-gray-700 bg-white dark:bg-gray-800">

                <div class="flex justify-between text-xs border-b dark:border-gray-700">

                    <div class="p-3">
                        <span class="text-gray-400 dark:text-gray-500"> <i class="bi bi-clock"></i> {{ $ticket->created_at }}</span> | Query by <span class="font-semibold">{{ $ticket->name }}</span>
                    </div>
                </div>

                <div class="my-3 px-3 space-y-2">

                    <div>
                        <span class="dark:text-gray-400 font-semibold">Subject: </span>{{ $ticket->subject }}
                    </div>

                    <div class="p-3 rounded bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        {{ $ticket->description }}
                    </div>
                </div>
            </div>

            {{-- Response Block --}}
            <div class="my-3">
                <p class="text-xs"> <i class="bi bi-arrow-return-right"></i> {{ count($responses) }} Reply found.</p>
                @foreach ($responses as $response)
                    <div class="my-3 ms-3 border dark:border-gray-700 bg-white dark:bg-gray-800">

                        <div class="flex justify-between text-xs border-b dark:border-gray-700">

                            <div class="p-3">
                                <span class="text-gray-400 dark:text-gray-500">
                                    <i class="bi bi-clock"></i> {{ $response->created_at }}
                                </span>
                                | Reply by <span class="font-semibold">{{ $response->reply_by }}</span>
                            </div>
                        </div>

                        <div class="my-3 px-3 space-y-2">

                            <div>
                                <span class="dark:text-gray-400 font-semibold"> To: </span> {{ $ticket->email }}
                            </div>

                            <div class="p-3 rounded bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                {!! $response->details !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Reply Textbox --}}
            <div class="overflow-hidden mb-6 relative">
                @if ($errors->has('details'))
                    <p class="text-red-600 dark:text-red-500 my-2">
                        {{ $errors->first('details') }}
                    </p>
                @endif
                <form action="{{ route('ticket.reply.process',$ticket->id) }}" id="sendReply" method="POST" wire:ignore>
                    @csrf
                    <textarea class="hidden" name="details" id="markDownContent"></textarea>

                    <div class="bg-white dark:bg-gray-800 mb-3 @if($errors->has('details')) border border-red-600 dark:border-red-500 @endif">
                        <div id="editor-container" class="bg-white dark:bg-gray-800">{!! old('details') !!}</div>
                    </div>

                    <x-btn-primary type="submit" id="btn-submit">Send Reply </x-btn-primary>
                </form>
            </div>
        </div>

        <div class="md:w-96 text-sm">

            {{-- Ticket Details --}}
            <div class="bg-white dark:bg-gray-800 border dark:border-gray-700 my-3">

                <div class="font-medium" id="accordion-ticket-details" data-accordion="collapse">
                    <h2 class="py-2 px-3 flex justify-between">
                        <span>Ticket Details</span>
                        <div class="rounded-md" data-accordion-target="#accordion-ticket-details-body" aria-expanded="true" aria-controls="accordion-ticket-details-body">
                            <svg data-accordion-icon class="w-6 h-6 rotate-360 shrink-0 text-gray-500 cursor-pointer" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                    </h2>
                </div>

                <div class="p-3 border-t dark:border-gray-700" id="accordion-ticket-details-body">
                    <div class="flex mb-3">
                        <ul>
                            <li><span class="font-medium dark:text-gray-400">Ticket ID</span></li>
                            <li>{{ $ticket->ticket_id }}</li>
                        </ul>
                    </div>
                    <div class="flex mb-3">
                        <ul>
                            <li><span class="font-medium dark:text-gray-400">Status</span></li>
                            <li>
                                <form wire:submit.prevent="updateStatus">
                                    <select wire:model="statusId" class="p-0 ps-1 m-0 border-0 text-sm bg-transparent">
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}"> {{ $status->title}}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="text-indigo-500">
                                        <span wire:target="updateStatus" wire:loading.remove>Update</span>
                                    </button>
                                    <span wire:target="updateStatus" wire:loading>Updating...</span>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="flex mb-3">
                        <ul>
                            <li><span class="font-medium dark:text-gray-400">Topic</span></li>
                            <li>
                            {{ $ticket->Topic->title }}
                            </li>
                        </ul>
                    </div>
                    <div class="flex mb-3">
                        <ul>
                            <li><span class="font-medium dark:text-gray-400">Ticket Raise Date</span></li>
                            <li>
                            {{ $ticket->created_at }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Customer Details --}}
            <div class="bg-white dark:bg-gray-800 border dark:border-gray-700 my-3">

                <div class="font-medium" id="accordion-customer-details" data-accordion="collapse">
                    <h2 class="py-2 px-3 flex justify-between">
                        <span>Customer Details</span>
                        <div class="rounded-md" data-accordion-target="#accordion-customer-details-body" aria-expanded="true" aria-controls="accordion-customer-details-body">
                            <svg data-accordion-icon class="w-6 h-6 rotate-360 shrink-0 text-gray-500 cursor-pointer" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                    </h2>
                </div>

                <div class="p-3 border-t dark:border-gray-700" id="accordion-customer-details-body">
                    <div class="flex mb-3">
                        <ul>
                            <li><span class="font-medium dark:text-gray-400">Customer Name</span></li>
                            <li>
                            {{ $ticket->name }}
                            </li>
                        </ul>
                    </div>
                    <div class="flex mb-3">
                        <ul>
                            <li><span class="font-medium dark:text-gray-400">Email</span></li>
                            <li>
                            {{ $ticket->email }}
                            </li>
                        </ul>
                    </div>
                    <div class="flex mb-3">
                        <ul>
                            <li><span class="font-medium dark:text-gray-400">Mobile</span></li>
                            <li>
                            {{ $ticket->mobile }}
                            </li>
                        </ul>
                    </div>
                    <div class="flex mb-3">
                        <ul>
                            <li><span class="font-medium dark:text-gray-400">Account Number</span></li>
                            <li>
                            {{ $ticket->account_number }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Status History --}}
            <div class="bg-white dark:bg-gray-800 border dark:border-gray-700 my-3">

                <div class="font-medium" id="accordion-status-history" data-accordion="collapse">
                    <h2 class="py-2 px-3 flex justify-between">
                        <span>Ticket Details</span>
                        <div class="rounded-md" data-accordion-target="#accordion-status-history-body" aria-expanded="true" aria-controls="accordion-status-history-body">
                            <svg data-accordion-icon class="w-6 h-6 rotate-360 shrink-0 text-gray-500 cursor-pointer" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                    </h2>
                </div>

                <div class="p-3 border-t dark:border-gray-700" id="accordion-status-history-body">
                    <div class="space-y-3 text-xs bg-white dark:bg-gray-800">
                        @forelse ($statusHistory as $row)
                            <ul>
                                <li><i class="bi bi-clock"></i> {{ $row->created_at }}</li>
                                <li class="ps-4">{{ $row->details }}</li>
                            </ul>
                        @empty
                            No any update found.
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Adding Texteditor --}}
    <x-quill-js></x-quill-js>

    {{-- Disbaling Submit button on clicked  --}}
    <script type="module">
        document.querySelector("#sendReply").addEventListener("submit", function(e){
            document.getElementById("btn-submit").disabled=true;
            document.getElementById('btn-submit').innerHTML = `<x-loading class="dark:text-gray-600 fill-gray-600 dark:fill-gray-300"></x-loading>`;
        });
    </script>

    {{-- Scorlling back to error section, for easy view --}}
    @if($errors->has('details'))
        <script type="module">
            document.getElementById("editor-container").scrollIntoView({ behavior: 'smooth' });
        </script>
    @endif
</div>

