@props(['value'])

<label {{ $attributes->merge(['class' => 'text-sm uppercase tracking-wide font-bold']) }}>
    {{ $value ?? $slot }}
</label>
