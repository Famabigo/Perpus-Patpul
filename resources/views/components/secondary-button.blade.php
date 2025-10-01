<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border-2 border-purple-500 dark:border-purple-400 rounded-lg font-semibold text-sm text-purple-600 dark:text-purple-300 tracking-wide shadow-sm hover:bg-purple-50 dark:hover:bg-purple-900/30 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition-all duration-300']) }}>
    {{ $slot }}
</button>
