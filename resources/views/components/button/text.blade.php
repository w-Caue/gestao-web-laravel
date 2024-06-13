@props([
    'type' => 'button',
])

<x-button
    {{ $attributes->merge(['class' => 'text-blue-500 bg-transparent hover:bg-blue-100 hover:text-blue-600 active:bg-blue-100 outline-none focus:outline-none ease-linear transition-all duration-150 transition-all duration-300 hover:scale-95']) }}>
    {{ $slot }}
</x-button>
