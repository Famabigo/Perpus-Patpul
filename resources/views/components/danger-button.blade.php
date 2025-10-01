<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-gradient-to-r from-red-600 to-red-700 text-white px-4 py-2 rounded-lg hover:from-red-700 hover:to-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-300 flex items-center shadow-md']) }}>
    {{ $slot }}
</button>
