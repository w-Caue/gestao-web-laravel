<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Itens') }}
        </h2>
    </x-slot>

    @livewire('Item.Itens')
    
</x-app-layout>
