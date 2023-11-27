@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li style="display: none">{{ $message }}</li>
            <li>E-mail ou senha inválidos</li>
        @endforeach
    </ul>
@endif
