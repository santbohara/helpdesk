<div class="bg-gray-200">

    <div class="max-w-5xl mx-auto py-4 px-3">

        <div class="md:flex justify-between items-center">

            <div class="text-gray-500 text-sm md:block hidden">
                <a href="/" class="hover:underline">{{ __('header.home') }}</a> /
                @isset($page_title)
                    {{ $page_title }}
                @endisset()
            </div>

            @livewire('public.support-search')
        </div>

    </div>
</div>
