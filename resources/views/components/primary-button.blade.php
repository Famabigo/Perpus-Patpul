<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-lg hover:from-purple-700 hover:to-purple-800 focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 font-semibold text-sm tracking-wide transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5']) }}>
    {{ $slot }}
</button>
