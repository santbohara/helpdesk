<div>
    {{-- Breadcrumb --}}
    <div class="breadcrumb flex flex-row justify-between ">

        {{-- Left navigation info --}}
        <div class="flex text-xs text-gray-500 items-center">
            <i class="bi bi-house mr-1"></i> Home / Ticket / View <a href="{{ route('ticket.all') }}" class="mx-3 text-blue-500"> <i class="bi bi-arrow-return-left"></i> Back</a>
        </div>

        {{-- Right Quick Action --}}

    </div>

    @include('alert')

    <div class="md:grid grid-cols-2 space-x-6">
        <div class="mb-6">
            <div class="p-3 my-3 bg-gray-50 dark:bg-gray-800 rounded">
                sdfjsdlf
            </div>
        </div>

        <div>
            <div class="p-3 md:w-72 bg-gray-50 dark:bg-gray-800 border dark:border-gray-700 rounded my-3">
                <div class="flex mb-3">
                    <ul>
                        <li><span class="font-medium">Ticket ID</span></li>
                        <li>{{ $ticket->ticket_id }}</li>
                    </ul>
                </div>
                <div class="flex mb-3">
                    <ul>
                        <li><span class="font-medium">Current Status</span></li>
                        <li>
                            <span class="text-xs font-medium px-3 py-1 rounded-full {{ $ticket->Status->badge_class}}">
                                {{ $ticket->Status->title }}
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="flex mb-3">
                    <ul>
                        <li><span class="font-medium">Category</span></li>
                        <li>
                        {{ $ticket->Topic->title }}
                        </li>
                    </ul>
                </div>
                <div class="flex mb-3">
                    <ul>
                        <li><span class="font-medium">Ticket Raise Date</span></li>
                        <li>
                        {{ $ticket->created_at }}
                        </li>
                    </ul>
                </div>

            </div>
            <div class="p-3 md:w-72 bg-gray-50 dark:bg-gray-800 border dark:border-gray-700 rounded my-3">
                <div class="flex mb-3">
                    <ul>
                        <li><span class="font-medium">Customer Name</span></li>
                        <li>
                        {{ $ticket->name }}
                        </li>
                    </ul>
                </div>
                <div class="flex mb-3">
                    <ul>
                        <li><span class="font-medium">Email</span></li>
                        <li>
                        {{ $ticket->email }}
                        </li>
                    </ul>
                </div>
                <div class="flex mb-3">
                    <ul>
                        <li><span class="font-medium">Mobile</span></li>
                        <li>
                        {{ $ticket->mobile }}
                        </li>
                    </ul>
                </div>
                <div class="flex mb-3">
                    <ul>
                        <li><span class="font-medium">Account Number</span></li>
                        <li>
                        {{ $ticket->account_number }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
