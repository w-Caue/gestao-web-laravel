<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Contas a Pagar') }}
        </h2>
    </x-slot>

    @livewire('Contas.ContasPagar')
    
</x-app-layout>
