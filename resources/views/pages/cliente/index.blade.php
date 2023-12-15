<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

    @livewire('Cliente.Clientes')
    
</x-app-layout>
