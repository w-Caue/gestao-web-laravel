@props(['value'])

<label {{ $attributes->merge(['class' => 'text-gray-600 text-sm uppercase tracking-wide font-bold dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
