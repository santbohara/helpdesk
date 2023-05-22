<div>
    {{-- Breadcrumb --}}
    <div class="breadcrumb flex flex-row justify-between ">

        {{-- Left navigation info --}}
        <div class="flex text-xs text-gray-500 items-center">
            <i class="bi bi-house mr-1"></i> Home / Ticket / View
        </div>

        {{-- Right Quick Action --}}

    </div>

    @include('alert')

    <div class="w-full p-3 realtive bg-white dark:bg-gray-800 relative shadow-md mb-6 my-3">
        {{ $ticket }}
    </div>
</div>
