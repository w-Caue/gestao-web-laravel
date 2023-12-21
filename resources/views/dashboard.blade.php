<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    @livewire('Dashboard')

    <div class="py-12">
        <div class="max-w-7xl mx-2 sm:px-6 sm:mx-0 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
    <p class="text-gray-300 font-semibold text-center">
        Desenvolvido por
        <a href="" class="text-sm text-indigo-500">Code Set7</a>
    </p>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</x-app-layout>
