<div wire:init="load">

    @include('includes.loading')

    <div class="flex justify-normal sm:justify-between items-end gap-2 sm:gap-0 flex-wrap my-2 ">
        <div class="md:mb-0">
            <label for="table-search" class="sr-only">Pesquisa</label>
            <div class="relative mt-2">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input wire:model.live="search" type="text" id="table-search"
                    class="p-2 pl-10 text-sm text-gray-600 font-semibold rounded-lg sm:w-80 bg-white dark:bg-gray-800 dark:text-white"
                    placeholder="Pesquisar">
            </div>
        </div>

        <button x-data x-on:click="$dispatch('open-modalfilter')"
            class="flex justify-center sm:w-44 gap-2 text-white font-semibold border p-2 rounded-md bg-indigo-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-600 dark:border-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
            </svg>

            <p class="hidden sm:block">Busca Avançada</p>
        </button>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs hidden sm:block">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Cliente</th>
                        <th class="px-4 py-3">Forma de Pagamento</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Total Itens</th>
                        <th class="px-4 py-3">Desconto</th>
                        <th class="px-4 py-3">Total Pedido</th>
                        <th class="px-4 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($pedidos as $pedido)
                        <tr wire:key="{{ $pedido->id }}" class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $pedido->id }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div>
                                        <p class="font-semibold">{{ $pedido->pessoa->nome }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $pedido->descricao }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $pedido->formaPagamento->nome }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                @if ($pedido->status == 'Aberto')
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-gray-500 bg-gray-100 rounded-full dark:bg-gray-300 dark:text-gray-500">
                                        {{ $pedido->status }}
                                    </span>
                                @endif

                                @if ($pedido->status == 'Finalizado')
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-blue-300 bg-blue-400 rounded-full dark:bg-blue-500 dark:text-blue-100">
                                        {{ $pedido->status }}
                                    </span>
                                @endif

                                @if ($pedido->status == 'Autenticado')
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-yellow-300 bg-yellow-400 rounded-full dark:bg-yellow-500 dark:text-yellow-100">
                                        {{ $pedido->status }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ number_format($pedido->total_itens, 2, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ number_format($pedido->desconto, 2, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ number_format($pedido->total_pedido, 2, ',', '.') }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-2 text-sm">
                                    <a href="{{ route('pedidos.show', ['codigo' => $pedido->id]) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg hover:scale-105 dark:hover:text-purple-600 dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>

                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg hover:scale-95 dark:hover:text-purple-600
                                         dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>

                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Listagem Mobile --}}
    <div class="w-full sm:hidden md:hidden lg:hidden">
        <div class="flex flex-col justify-center">
            @foreach ($pedidos as $pedido)
                <div wire:key="{{ $pedido->id }}"
                    class="text-md font-semibold text-gray-700 p-2 my-1 bg-gray-50 rounded-lg dark:text-white dark:bg-gray-800">
                    <div class="flex justify-between items-center">
                        <span class="text-blue-500">#{{ $pedido->id }}</span>

                        <a href=" {{ route('pedidos.show', ['codigo' => $pedido->id]) }}"
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg hover:scale-105 dark:hover:text-purple-600 dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                </path>
                            </svg>
                        </a>
                    </div>
                    <div class="flex justify-between my-2">
                        <p class="flex flex-wrap">{{ $pedido->pessoa->nome }}</p>
                        {{-- <p class="text-gray-400">{{ $pedido->total_pedido }}</p> --}}
                    </div>

                    <p class="flex flex-wrap">{{ $pedido->descricao }}</p>

                    <div class="flex justify-between items-center">
                        <p class="text-gray-400">{{ $pedido->formaPagamento->nome }}</p>

                        @if ($pedido->status == 'Aberto')
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-gray-500 bg-gray-100 rounded-full dark:bg-gray-300 dark:text-gray-500">
                                {{ $pedido->status }}
                            </span>
                        @endif

                        @if ($pedido->status == 'Finalizado')
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-blue-300 bg-blue-400 rounded-full dark:bg-blue-500 dark:text-blue-100">
                                {{ $pedido->status }}
                            </span>
                        @endif

                        @if ($pedido->status == 'Autenticado')
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-yellow-300 bg-yellow-400 rounded-full dark:bg-yellow-500 dark:text-yellow-100">
                                {{ $pedido->status }}
                            </span>
                        @endif
                    </div>

                    <div class="flex items-end gap-2 text-gray-200 font-semibold mt-1">
                        <p class="">Total do Pedido:</p>
                        <p class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">R$ {{ number_format($pedido->total_pedido, 2, ',', '') }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    {{-- /Listagem Mobile --}}

    <div class="mx-7 mt-2">
        {{ $this->dados()->links('layouts.paginate') }}
    </div>

    <x-modal-filter>
        @slot('body')
            <div class="md:mb-0">
                <label for="table-search" class="sr-only">Pesquisa Descrição</label>
                <div class="relative mt-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input wire:model.live="search" type="text" id="table-search"
                        class="p-2 pl-10 text-sm text-gray-600 font-semibold rounded-lg sm:w-80 bg-white dark:bg-gray-800 dark:text-white"
                        placeholder="Pesquisar pela Descrição">
                </div>
            </div>
        @endslot
        @slot('button')
            <button
                class="w-full px-2 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Buscar
            </button>
        @endslot
    </x-modal-filter>
</div>
