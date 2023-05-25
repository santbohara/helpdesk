<button {{ $attributes->merge(['class' => 'block text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-light text-xs
    rounded-md px-2 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
