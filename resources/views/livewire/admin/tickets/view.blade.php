<div>
    {{-- Breadcrumb --}}
    <div class="breadcrumb flex flex-row justify-between ">

        {{-- Left navigation info --}}
        <div class="flex text-xs text-gray-500 items-center">
            <ul class="flex">
                <li><i class="bi bi-house mr-1"></i> Home / Ticket / View </li>
                <li><a href="{{ route('ticket.all') }}" class="mx-2 text-blue-500"> <i class="bi bi-arrow-return-left"></i> Back</a></li>
                <li><a href="#" class="mx-2 text-blue-500"> <i class="bi bi-printer"></i> Print</a></li>
            </ul>
        </div>

        {{-- Right Quick Action --}}

    </div>

    @include('alert')

    <div class="md:flex md:space-x-3">

        <div class="mb-6 grow">

            <div class="p-3 my-3 border dark:border-gray-700 bg-white dark:bg-gray-800">

                <div class="flex justify-between text-xs border-b dark:border-gray-700 pb-1">

                    <div>
                        <span class="text-gray-400 dark:text-gray-500"> 2023-05-06 12:21:15</span> | Reply by <span class="font-semibold">Sant Bohara</span>
                    </div>
                </div>

                <div class="my-6 space-y-2">

                    <div>
                        To: {{ $ticket->email }}
                    </div>

                    <div>
                        Dear Sir/Madam,

                        Please visit any neareast branch for this query.

                        Thanks.
                    </div>
                </div>
            </div>

            <div class="overflow-hidden mb-6">

                <form action="">
                    <textarea class="hidden" name="content" id="markDownContent"></textarea>

                    <div class="bg-white dark:bg-gray-800 mb-3">
                        <div id="editor-container" class="bg-white dark:bg-gray-800"></div>
                    </div>

                    <x-btn-primary type="submit" id="test">
                        <span>Reply</span>
                    </x-btn-primary>
                </form>
            </div>
        </div>

        <div class="md:w-96 text-sm">

            {{-- Ticket Details --}}
            <div class="p-3 bg-white dark:bg-gray-800 border dark:border-gray-700 my-3">

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
                            <select name="" class="p-0 ps-1 m-0 border-0 text-sm bg-transparent">
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}" {{ $status->id == $ticket->Status->id ? 'selected' : '' }}> {{ $status->title}}</option>
                                @endforeach
                            </select>
                            <a href="" class="text-blue-500">Update</a>
                        </li>
                    </ul>
                </div>
                <div class="flex mb-3">
                    <ul>
                        <li><span class="font-medium dark:text-gray-400">Category</span></li>
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

            {{-- Customer Details --}}
            <div class="p-3 bg-white dark:bg-gray-800 border dark:border-gray-700 my-3">
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

            {{-- Status History --}}
            <div id="accordion-collapse" data-accordion="collapse">

                <h2 id="accordion-collapse-heading-2">
                    <button type="button" class="flex items-center justify-between w-full py-2 px-3 text-left font-medium text-gray-500
                        border border-gray-200 dark:border-gray-700 dark:text-gray-400 bg-white dark:bg-gray-900 dark:focus:bg-gray-800"
                        data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                        <span>Status History</span>
                        <svg data-accordion-icon class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                    <div class="p-5 space-y-3 text-xs bg-white dark:bg-gray-800 border border-gray-200 border-t-0 dark:border-gray-700">
                        <ul>
                            <li><i class="bi bi-clock"></i> 2023-01-01 13:01:05</li>
                            <li class="ps-4">Something changed by Sant</li>
                        </ul>
                        <ul>
                            <li><i class="bi bi-clock"></i> 2023-01-01 13:01:05</li>
                            <li class="ps-4">Something changed by Sant</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-quill-js></x-quill-js>
</div>

