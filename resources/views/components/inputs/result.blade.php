@props(['value'])

<label {{ $attributes->merge(['class' => 'text-gray-500 text-sm uppercase tracking-wide font-bold dark:text-gray-200']) }}>
    {{ $value ?? $slot }}
</label>
