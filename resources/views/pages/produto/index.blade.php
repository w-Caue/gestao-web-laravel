<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Produtos') }}
        </h2>
    </x-slot>

    @livewire('Produto.Produtos')
    
</x-app-layout>
