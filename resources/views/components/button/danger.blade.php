@props([
    'type' => 'button',
])

<x-button
    {{ $attributes->merge(['class' => 'text-white p-2 bg-red-600 border border-solid border-red-600 hover:bg-red-700 hover:text-white active:bg-red-700 outline-none focus:outline-none ease-linear transition-all duration-150 transition-all duration-300 hover:scale-95']) }}>
    {{ $slot }}
</x-button>