<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Pedidos') }}
        </h2>
    </x-slot>

    @livewire('Pedido.Pedidos')
    
</x-app-layout>