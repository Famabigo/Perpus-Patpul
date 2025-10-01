@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-1']) }}>
        @foreach ((array) $messages as $message)
            <li class="flex items-center">
                <i class="fas fa-exclamation-circle text-xs mr-1"></i>
                {{ $message }}
            </li>
        @endforeach
    </ul>
@endif
