@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-purple-200 dark:border-purple-700 bg-white/50 dark:bg-gray-900 text-gray-900 dark:text-gray-300 focus:border-purple-500 dark:focus:border-purple-400 focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 rounded-lg shadow-sm transition-all duration-300 backdrop-blur-sm']) !!}>
