<div role="tooltip" {!! $attributes->merge(['class' => 'absolute z-10 invisible inline-block px-3 py-2 text-xs font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700']) !!}>
    {{ $slot }}
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>
