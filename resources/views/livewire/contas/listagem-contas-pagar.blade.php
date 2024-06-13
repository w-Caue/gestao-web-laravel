<div class="">
    <div class="flex justify-normal sm:justify-between items-end gap-2 sm:gap-0 flex-wrap  ">
        <div class="mx-4">
            <div class="relative mt-2">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input wire:model.live="search" type="text" id="table-search"
                    class="p-2 pl-10 text-sm text-gray-600 font-semibold rounded sm:w-80 bg-white dark:bg-gray-800 dark:text-white"
                    placeholder="Pesquisar">
            </div>
        </div>

        <x-button.danger x-data x-on:click="$dispatch('open-modal', { name : 'cadastro' })"
            class="flex items-center gap-1 mx-4">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
            </svg>
            Nova Conta a pagar
        </x-button.danger>

        {{-- <button x-data x-on:click="$dispatch('open-modalfilter')"
                class="flex justify-center sm:w-44 gap-2 text-white font-semibold border p-2 rounded-md bg-indigo-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-600 dark:border-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                </svg>
    
                <p class="hidden sm:block">Busca Avançada</p>
            </button> --}}
    </div>

    <div class="border my-6 mx-32 dark:border-gray-600"></div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs hidden sm:block">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Cliente</th>
                        <th class="px-4 py-3">Valor Documento</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Data Lançamento</th>
                        <th class="px-4 py-3">Data Vencimento</th>
                        <th class="px-4 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($contas as $conta)
                        <tr wire:key="{{ $conta->id }}" class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $conta->id }}
                            </td>
                            <td class="px-4 py-3">
                                <p class="font-semibold">{{ $conta->pessoa->nome }}</p>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                R${{ number_format($conta->valor_documento, 2, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                @if ($conta->status == 'Aberto')
                                    <span
                                        class="p-2 font-semibold uppercase leading-tight text-gray-100 bg-gray-400 rounded-full dark:bg-gray-200 dark:text-gray-500">
                                        {{ $conta->status }}
                                    </span>
                                @else
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-green-100 rounded-full dark:bg-red-700 dark:text-green-100">
                                        {{ $conta->status }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ date('d/m/Y', strtotime($conta->data_lancamento)) }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ date('d/m/Y', strtotime($conta->data_vencimento)) }}
                            </td>

                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-2 text-sm">
                                    {{-- <a href="{{ route('pedidos.show', ['codigo' => $pedido->id]) }}"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg hover:scale-105 dark:hover:text-purple-600 dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </a> --}}
                                    <a href="{{ route('contas.show', ['codigo' => $conta->id]) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-500 rounded-lg hover:text-red-500 hover:scale-110 transition-all focus:outline-none focus:shadow-outline-gray"
                                        aria-label="">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path
                                                d="M11 2C15.968 2 20 6.032 20 11C20 15.968 15.968 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2ZM11 18C14.8675 18 18 14.8675 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18ZM19.4853 18.0711L22.3137 20.8995L20.8995 22.3137L18.0711 19.4853L19.4853 18.0711Z">
                                            </path>
                                        </svg>
                                    </a>

                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-500 rounded-lg hover:text-red-500 hover:scale-110 transition-all focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path
                                                d="M12 3C10.9 3 10 3.9 10 5C10 6.1 10.9 7 12 7C13.1 7 14 6.1 14 5C14 3.9 13.1 3 12 3ZM12 17C10.9 17 10 17.9 10 19C10 20.1 10.9 21 12 21C13.1 21 14 20.1 14 19C14 17.9 13.1 17 12 17ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z">
                                            </path>
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

</div>
