<div>
    {{-- Breadcrumb --}}
    <div class="breadcrumb flex flex-row justify-between ">

        {{-- Left navigation info --}}
        <div class="flex text-xs text-gray-500 items-center">
            <i class="bi bi-house mr-1"></i> Home / Config / Site Settings
        </div>

        {{-- Right Quick Action --}}

    </div>

    @include('alert')

    <div class="my-3">
        @livewire('admin.site-settings.general-settings')
        @livewire('admin.site-settings.email-settings')
    </div>
</div>
