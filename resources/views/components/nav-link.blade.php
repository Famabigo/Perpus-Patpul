@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-purple-600 dark:text-purple-400 focus:outline-none transition-all duration-300'
            : 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-purple-600 dark:hover:text-purple-400 focus:outline-none transition-all duration-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
