
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-green-800 dark:bg-white border border-transparent rounded-md font-semibold text-xs text-white dark:text-green-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-amber-300 focus:bg-gray-700 dark:focus:bg-white active:bg-green-800 dark:active:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>