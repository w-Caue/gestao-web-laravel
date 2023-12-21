<div>
    <div class="flex justify-center">
        <div class="border bg-gray-50 rounded-lg shadow-xl flex flex-col w-1/2 m-2 dark:bg-gray-700 dark:border-gray-600">

            <div class="m-3 text-gray-700 flex justify-between items-center dark:text-white">
                <h1 class="font-bold text-xl">Relatório</h1>
                <h1 class="font-bold text-xl">Pedidos</h1>
            </div>

            <form>
                <div class="m-3 p-3 border-2 rounded bg-white dark:bg-gray-500 dark:border-gray-400">

                    <div class="flex gap-1 items-start m-3">
                        <label for="cliente" class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">
                            <span>Cliente</span>
                            <input wire:model.live="cliente" id="cliente" placeholder="Todos" value="{{ $clienteRelatorio->nome ?? '' }}"
                                class="border border-gray-300 text-gray-900 text-md font-semibold rounded w-44 p-1 dark:bg-gray-300">
                        </label>

                        <button x-data x-on:click.prevent="$dispatch('open-clientes')" class="p-1 border rounded text-white bg-blue-500 dark:border-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex gap-2 flex-wrap m-3">
                        <label for="countries" class="block mb-2 text-lg font-semibold text-gray-900 dark:text-white">
                            <span>Forma de Pagamento</span>

                            <select wire:model.live="formaPagamento" id="countries"
                                class="border border-gray-300 text-gray-500 text-md font-semibold rounded w-52 p-1 dark:bg-gray-300">
                                <option class="text-gray-900 text-md font-semibold" value="" selected>
                                    Todas
                                </option>

                                @foreach ($formaPagamentos as $formaPagamento)
                                    <option class="text-gray-900 text-md font-semibold"
                                        value="{{ $formaPagamento->id }}">
                                        {{ $formaPagamento->nome }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                </div>

                <div class="m-3 p-3 border-2 rounded bg-white flex items-center gap-2 dark:bg-gray-500 dark:border-gray-400">
                    <span class="font-semibold text-gray-800 text-lg dark:text-white">Data</span>

                    <div class="flex gap-1 items-start m-1">
                        <label for="data" class="mb-2 text-lg font-semibold text-gray-900">
                            <input wire:model.live="dataInicio" id="startData" type="date"
                                class="border border-gray-300 text-gray-900 text-md font-semibold rounded w-36 p-1 dark:text-gray-600 dark:bg-gray-300">
                        </label>
                    </div>

                    <span class="font-semibold text-gray-700 text-lg dark:text-white">á</span>

                    <div class="flex gap-1 items-start m-1">
                        <label for="data" class="mb-2 text-lg font-semibold text-gray-900">
                            <input wire:model.live="dataFinal" id="endData" type="date"
                                class="border border-gray-300 text-gray-900 text-md font-semibold rounded w-36 p-1 dark:text-gray-600 dark:bg-gray-300">
                        </label>
                    </div>
                </div>

                <div class="m-3 flex justify-center">
                    <button wire:click.prevent="relatorio()"
                        class="text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-600 dark:border-none">
                        Visualizar Relatório
                    </button>
                </div>
            </form>

        </div>
    </div>

    @if ($mostrarRelatorio)
        <div class="flex justify-center ">
            <div class="fixed top-11 bg-white border shadow-2xl rounded-lg sm:top-11 sm:w-5/6 h-auto max-h-5/6 overflow-auto dark:bg-gray-600 dark:border-gray-500">

                <div class="m-1 flex justify-end gap-2">
                    <button
                        class="flex gap-1 text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-600 dark:border-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 003 3h.27l-.155 1.705A1.875 1.875 0 007.232 22.5h9.536a1.875 1.875 0 001.867-2.045l-.155-1.705h.27a3 3 0 003-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0018 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM16.5 6.205v-2.83A.375.375 0 0016.125 3h-8.25a.375.375 0 00-.375.375v2.83a49.353 49.353 0 019 0zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 01-.374.409H7.232a.375.375 0 01-.374-.409l.526-5.784a.373.373 0 01.333-.337 41.741 41.741 0 018.566 0zm.967-3.97a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H18a.75.75 0 01-.75-.75V10.5zM15 9.75a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V10.5a.75.75 0 00-.75-.75H15z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Imprimir</span>
                    </button>

                    <button wire:click.prevent="filtros()"
                        class="flex gap-1 p-1 border text-md font-semibold text-gray-700 rounded shadow-xl hover:text-white hover:bg-red-500 dark:text-white">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 14">
                            <path
                                d="M13.606 3.748V2.53a1.542 1.542 0 0 0-.872-1.431 1.352 1.352 0 0 0-1.472.2L6.155 5.552a1.6 1.6 0 0 0 0 2.415l5.108 4.25a1.355 1.355 0 0 0 1.472.2 1.546 1.546 0 0 0 .872-1.428v-1.09a4.721 4.721 0 0 1 3.7 2.868 1.186 1.186 0 0 0 1.08.73 1.225 1.225 0 0 0 1.213-1.286v-1.33a6.923 6.923 0 0 0-5.994-7.133Z" />
                            <path
                                d="m2.434 6.693 5.517-4.95A1 1 0 0 0 6.615.257L1.1 5.205a2.051 2.051 0 0 0-.01 3.035l5.61 5.088a1 1 0 1 0 1.344-1.482l-5.61-5.153Z" />
                        </svg>
                    </button>
                </div>

                <div class="bg-white border overflow-hidden shadow-xl sm:rounded-lg m-2 dark:bg-gray-600">
                    <div class="relative overflow-auto shadow-md sm:rounded-lg h-auto max-h-96">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-white">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:text-white dark:bg-gray-600">
                                <tr>
                                    <th scope="col" class="px-4 py-3">
                                        ID Pedido
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        <div class="flex items-center">
                                            Cliente
                                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                                </svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        <div class="flex items-center">
                                            Forma de Pagamento
                                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                                </svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        <div class="flex items-center">
                                            Total do Pedido
                                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                                </svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        <div class="flex items-center">
                                            Data da Criação
                                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                                </svg></a>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($pedidos as $pedido)
                                    <tr class="bg-white border-b font-semibold dark:bg-gray-500 dark:text-white">
                                        <th scope="row"
                                            class="px-4 py-2 whitespace-nowrap">
                                            {{ $pedido->id }}
                                        </th>
                                        <td class="px-4 py-2">
                                            {{ $pedido->cliente->nome }}
                                        </td>
                                        <td class="px-4 py-2 text-center">
                                            {{ $pedido->formaPagamento->nome }}
                                        </td>
                                        <td class="px-4 py-2 text-center">
                                            {{ number_format($pedido->total_pedido, 2, ',') }}
                                        </td>
                                        <td class="px-4 py-2">
                                            {{ $pedido->created_at->format('d/m/Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="font-semibold text-gray-900 dark:text-white">
                                    <th colspan="3" scope="row" class="px-6 py-3 text-base">Total</th>
                                    <td class="px-6 py-3 text-center">R$ {{ number_format($totais, 2, ',', '.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Clientes --}}
    <x-clientes>
        @slot('body')
            @if ($clientes)
                <div class="flex justify-center flex-wrap m-3 overflow-auto h-auto max-h-60">
                    @foreach ($clientes as $cliente)
                        <div wire:click="selecioneCliente({{ $cliente->id }})"
                            class="m-2 p-2 text-gray-400 shadow border rounded w-44 h-24 hover:bg-gray-100 hover:shadow-xl hover:border-2 cursor-pointer dark:bg-gray-300 dark:hover:bg-gray-400 dark:border-none">
                            <h1 class="text-sm  font-semibold dark:text-gray-600">#{{ $cliente->id }}</h1>
                            <h1 class="text-lg font-semibold text-gray-500 dark:text-gray-700">
                                {{ $cliente->nome }}</h1>
                            <h1 class="text-sm  font-semibold dark:text-gray-600">{{ $cliente->whatsapp }}</h1>
                        </div>
                    @endforeach
                </div>
            @endif
        @endslot
    </x-clientes>
</div>
