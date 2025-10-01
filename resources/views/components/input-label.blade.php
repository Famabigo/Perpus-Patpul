@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-purple-900 dark:text-purple-300 mb-1']) }}>
    {{ $value ?? $slot }}
</label>
