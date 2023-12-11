<div>

    <div class="mx-7 my-2">
        <div>
            <button wire:click.prevent="novoDocumento()"
                class="p-2 border rounded-lg shadow-lg font-semibold bg-white hover:text-white hover:bg-blue-500 hover:border-blue-500">
                Novo Documento
            </button>
        </div>
    </div>

    <div class="mx-7 relative overflow-x-auto shadow-md rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs font-semibold text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-4 py-3 ">
                        #
                    </th>
                    <th scope="col" class="px-4 py-3 text-center">
                        Empresa
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Descrição
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Data do Lançamento
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Data do Vencimento
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Valor do Documento
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Data do Pagamento
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Valor Pago
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">

                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($contas as $conta)
                    <tr class="bg-white border-b hover:bg-gray-50 {{ $conta->status_documento == 'Finalizado' ? 'text-gray-500' : '' }}">
                        <th scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $conta->id }}
                        </th>
                        <td class="px-4 py-4 text-center font-semibold">
                            {{ $conta->cliente->nome }}
                        </td>
                        <td class="px-6 py-4 text-center font-semibold">
                            {{ $conta->descricao ? $conta->descricao : '-' }}
                        </td>
                        <td class="px-6 py-4 text-center font-semibold">
                            {{ date('d/m/Y', strtotime($conta->data_lancamento)) }}
                        </td>
                        <td class="px-6 py-4 text-center font-semibold">
                            {{ date('d/m/Y', strtotime($conta->data_vencimento)) }}
                        </td>
                        <td class="px-6 py-4 text-center font-semibold">
                            {{ number_format($conta->valor_documento, 2, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 text-center font-semibold">
                            {{ $conta->data_pagamento ? date('d/m/Y', strtotime($conta->data_pagamento)) : '-'}}
                        </td>
                        <td class="px-6 py-4 text-center font-semibold">
                            {{ $conta->valor_pago ? number_format($conta->valor_pago, 2, ',', '.') : '-' }}
                        </td>
                        <td class="px-6 py-2 text-center">
                            <button wire:click.prevent="mostrarDocumento({{ $conta->id }})" class="hover:text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($showDocumento)
        <div class="flex justify-center">
            <div class="fixed top-11 w-80 bg-gray-50 border shadow-2xl rounded-lg sm:top-28 sm:w-2/3">

                <div class="flex justify-between items-center m-2">
                    <h1 class="text-xl font-semibold text-gray-800">Contas a Pagar</h1>

                    <button wire:click="fecharDocumento()"
                        class="p-1 m-1 border rounded float-right hover:text-white hover:bg-red-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <div class="mx-5  flex gap-3">
                    <div class="">
                        <button wire:click.prevent="criarDocumento()"
                            class="p-2 border rounded shadow-xl font-semibold text-md text-white bg-blue-500 border-blue-500 hover:bg-blue-600 hover:border-blue-600">Salvar</button>
                    </div>

                    <div class="">
                        <button wire:click.prevent="baixaDocumento()"
                            class="p-2 border rounded shadow-xl font-semibold text-md text-white bg-green-500 border-green-500 hover:bg-green-600 hover:border-green-600">Baixar</button>
                    </div>
                </div>

                <form class="m-5 border-2 p-3 rounded bg-white">
                    <div class="flex flex-wrap gap-7 mb-2 items-center">
                        <div class="">
                            <span class="font-semibold text-gray-700">Cliente/Empresa</span>

                            <label for="" class="flex gap-1">
                                <input type="text" value="{{ $clienteDocumento->nome ?? '' }}"
                                    class="p-2 border-gray-200 rounded text-md text-gray-500 font-semibold shadow-xl">

                                <button wire:click.prevent="visualizarClientes()"
                                    class="p-2 w-10 rounded text-white bg-blue-500 hover:border-blue-500">

                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </button>
                            </label>
                        </div>

                        <div class="">
                            <label for="decricao" class="flex flex-col">
                                <span class="font-semibold text-gray-700">Descrição</span>
                                <input wire:model="descricao"
                                    class="p-2 w-full md:w-80 border-gray-200 rounded text-md font-semibold text-gray-600 shadow-xl bg-white">
                            </label>
                        </div>

                        <div class="">
                            <label for="data" class="flex flex-col">
                                <span class="font-semibold text-gray-700">Dt. Lançamento</span>
                                <input type="date" wire:model="dataLancamento"
<<<<<<< HEAD
                                    value="{{ date('m/d/Y', strtotime($conta->data_vencimento)) }}"
=======
                                    value=""
>>>>>>> master
                                    class="p-2 w-36 border-gray-200 rounded text-md font-semibold shadow-xl text-gray-600 bg-white">
                            </label>
                        </div>

                    </div>
                    <div class="flex flex-wrap gap-5">
                        <div class="">
                            <label for="data" class="flex flex-col">
                                <span class="font-semibold text-gray-700">Ag. Cobrador</span>
                                <select type="date" wire:model="agenteCobrador"
                                    class="p-2 w-32 border-gray-200 rounded text-md font-semibold shadow-xl text-gray-600 bg-white">

                                    <option value=""></option>

                                    @foreach ($agenteCobradores as $agenteCobrador)
                                        <option class="font-semibold text-gray-700" value="{{ $agenteCobrador->id }}">
                                            {{ $agenteCobrador->nome }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>

                        <div class="">
                            <label for="data" class="flex flex-col">
                                <span class="font-semibold text-gray-700">Dt. Vencimento</span>
                                <input type="date" wire:model.lazy="dataVencimento"
                                    class="p-2 w-36 border-gray-200 rounded text-md font-semibold shadow-xl text-gray-600 bg-white">
                            </label>
                        </div>

                        <div class="">
                            <label for="decricao" class="flex flex-col">
                                <span class="font-semibold text-gray-700">Vl. Documento</span>
                                <input wire:model.lazy="valorDocumento" placeholder="R$"
                                    class="p-2 w-28 border-gray-200 rounded text-md font-semibold text-gray-600 shadow-xl bg-white">
                            </label>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    @endif

    @if ($showClientes)
        <div class="flex justify-center">
            <div class="fixed top-11 bg-white border border-gray-300 shadow-2xl rounded-lg sm:top-28 sm:w-1/3">

                <div>
                    <button wire:click="visualizarClientes()"
                        class="p-1 m-1 border rounded float-right hover:text-white hover:bg-red-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <h1 class="text-xl font-semibold text-center m-3">Clientes</h1>

                <div class="flex justify-center items-center m-4 gap-1">
                    <input wire:model.live="search" type="text" id="table-search"
                        class="p-2 text-sm text-gray-900 border border-gray-200 rounded w-80 focus:ring-gray-100 focus:border-gray-100"
                        placeholder="Pesquisar Cliente">

                    <button wire:click="pesquisaClientes()" class="p-2 bg-blue-500 rounded">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </button>
                </div>

                @if ($clientes)
<<<<<<< HEAD
                    <div class="flex justify-center flex-wrap m-3 overflow-auto h-60">
=======
                    <div class="flex justify-center flex-wrap m-3 overflow-auto h-auto max-h-60">
>>>>>>> master
                        @foreach ($clientes as $cliente)
                            <div wire:click="selecioneCliente({{ $cliente->id }})"
                                class="m-2 p-2 text-gray-400 shadow border rounded w-44 h-24 hover:bg-gray-100 hover:shadow-xl hover:border-2 cursor-pointer">
                                <h1 class="text-sm  font-semibold">#{{ $cliente->id }}</h1>
                                <h1 class="text-lg font-semibold text-gray-500">{{ $cliente->nome }}</h1>
                                <h1 class="text-sm  font-semibold">{{ $cliente->whatsapp }}</h1>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    @endif

    @if ($showBaixa)
        <div class="flex justify-center">
            <div class="fixed top-11 bg-gray-50 border border-gray-300 shadow-2xl rounded-lg sm:top-16 sm:w-1/3">

                <div class="flex justify-between items-center m-2">
                    <h1 class="text-xl font-semibold text-gray-800">Baixa Documento</h1>

                    <button wire:click="baixaDocumento()"
                        class="p-1 m-1 border rounded float-right hover:text-white hover:bg-red-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <div class="m-2 ">
                    <form wire:submit.prevent="confirmarBaixa()">

                        <div class="border p-3 rounded bg-white mb-2">
                            <div class="mb-2">
                                <label for="data" class="flex items-center justify-between">
                                    <span class="font-semibold text-gray-700">Data Vencimento</span>
                                    <input type="date" wire:model.lazy="dataVencimento"
                                        @disabled(true)
                                        class="p-2 w-36 border-gray-200 rounded text-md font-semibold shadow-xl text-gray-600 bg-white">
                                </label>
                            </div>

                            <div class="mb-2">
                                <label for="decricao" class="flex items-center justify-between">
                                    <span class="font-semibold text-gray-700">Data do Pagamento</span>
                                    <input wire:model.lazy="dataPagamento" type="date"
                                        class="p-2 w-36 border-gray-200 rounded text-md font-semibold text-gray-600 shadow-lg bg-white">
                                </label>
                            </div>
                        </div>

                        <div class="border p-3 rounded bg-white mb-2">
                            <div class="">
                                <label for="" class="flex items-center justify-between">
                                    <span class="font-semibold text-gray-700">Forma Pagamento</span>
                                    <select type="date" wire:model="formaPagamento"
                                        class="p-2 w-44 border-gray-200 rounded text-md font-semibold shadow-lg text-gray-600 bg-white">

                                        <option value=""></option>

                                        @foreach ($formasPagamentos as $formaPagamento)
                                            <option class="font-semibold text-gray-700"
                                                value="{{ $formaPagamento->id }}">
                                                {{ $formaPagamento->nome }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>

                            <div class="my-3">
                                <label for="decricao" class="flex items-center justify-between">
                                    <span class="font-semibold text-gray-700">Valor a Pagar:</span>
                                    <input wire:model.lazy="valorDocumento" placeholder="R$"
                                        class="p-2 w-36 border-gray-200 rounded text-md font-semibold text-gray-600 shadow-lg bg-white">
                                </label>
                            </div>

                            <div class="">
                                <label for="decricao" class="flex items-center justify-between">
                                    <span class="font-semibold text-gray-700">Valor:</span>
                                    <input wire:model.lazy="valorPago" placeholder="R$"
                                        class="p-2 w-36 border-gray-200 rounded text-md font-semibold text-gray-600 shadow-lg bg-white">
                                </label>
                            </div>
                        </div>

                        <div class="flex justify-center m-5">
                            <button type="submit"
                                class="p-2 border-2 rounded shadow-xl font-semibold text-gray-600 hover:text-white hover:bg-green-500 hover:border-green-500">
                                Confirma Baixa
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    @endif
</div>
