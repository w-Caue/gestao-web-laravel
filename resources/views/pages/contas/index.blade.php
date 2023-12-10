<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    <a href="{{ route('contas-pagar') }}"
                        class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:w-1/3 hover:bg-gray-100 cursor-pointer m-5">
                        <div class="border p-4 m-2 rounded-full bg-gray-100">
                            <svg class="w-11 h-11 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.905 1.316 15.633 6M18 10h-5a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h5m0-5a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1m0-5V7a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h15a1 1 0 0 0 1-1v-3m-6.367-9L7.905 1.316 2.352 6h9.281Z"/>
                              </svg>

                        </div>
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Contas a Pagar</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>