<div>

    <div class="mx-7 my-2">
        <div class="flex justify-between items-center">
            <div class="">
                <label for="table-search" class="sr-only">Pesquisa</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input wire:model.live="search" type="text" id="table-search"
                        class="block p-2 pl-10 text-sm font-semibold text-gray-900 border border-gray-300 rounded-lg md:w-80 bg-white focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Pesquisar Pedido">
                </div>
            </div>

            <div class="flex gap-3 mb-4 md:mb-0">
                <label for="">
                    <input wire:model.live='status' value="Ativo"
                        class=" h-5 w-5 appearance-none rounded-full border-2 border-solid border-gray-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-blue-600 checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s]"
                        type="radio" name="status" id="radioNoLabel01" />
                    <span class="text-md font-semibold text-gray-500">Á Pagar</span>
                </label>

                <label for="">
                    <input wire:model.live='status' value="Deletado"
                        class=" h-5 w-5 appearance-none rounded-full border-2 border-solid border-gray-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-blue-600 checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s]"
                        type="radio" name="status" id="radioNoLabel01" />
                    <span class="text-md font-semibold text-gray-500">Deletados</span>
                </label>
            </div>

            <button wire:click.prevent="novoDocumento()"
                class="flex gap-1 p-2 border rounded-lg shadow-lg font-semibold text-gray-600 bg-white hover:text-white hover:bg-blue-500 hover:border-blue-500">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 19H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2v4M6 1v4a1 1 0 0 1-1 1H1m11 8h4m-2 2v-4m5 2a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z" />
                </svg>
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
                    <tr
                        class="bg-white border-b hover:bg-gray-50 {{ $conta->status_documento == 'Finalizado' ? 'text-gray-500' : '' }}">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                            {{ $conta->id }}
                        </th>
                        <td class="px-4 py-3 text-center font-semibold">
                            {{ $conta->cliente->nome }}
                        </td>
                        <td class="px-6 py-3 text-center font-semibold">
                            {{ $conta->descricao ? $conta->descricao : '-' }}
                        </td>
                        <td class="px-6 py-3 text-center font-semibold">
                            {{ date('d/m/Y', strtotime($conta->data_lancamento)) }}
                        </td>
                        <td class="px-6 py-3 text-center font-semibold">
                            {{ date('d/m/Y', strtotime($conta->data_vencimento)) }}
                        </td>
                        <td class="px-6 py-3 text-center font-semibold">
                            {{ number_format($conta->valor_documento, 2, ',', '.') }}
                        </td>
                        <td class="px-6 py-3 text-center font-semibold">
                            {{ $conta->data_pagamento ? date('d/m/Y', strtotime($conta->data_pagamento)) : '-' }}
                        </td>
                        <td class="px-6 py-3 text-center font-semibold">
                            {{ $conta->valor_pago ? number_format($conta->valor_pago, 2, ',', '.') : '-' }}
                        </td>
                        <td class="px-6 py-2 text-center">
                            <button wire:click.prevent="mostrarDocumento({{ $conta->id }})"
                                class="hover:text-blue-500">
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

    <div class="mx-7 mt-2">
        {{ $contas->links('layouts.paginate') }}
    </div>

    @if ($showDocumento)
        <div class="flex justify-center">
            <div
                class="fixed top-11 w-80 h-auto bg-gray-50 border shadow-2xl rounded-lg max-h-96 sm:top-28 sm:h-auto sm:w-2/3 overflow-auto">

                <div class="flex justify-between items-center m-2">
                    <h1 class="text-xl font-semibold text-gray-800">Contas a Pagar</h1>

                    <button wire:click="fecharDocumento()"
                        class="p-1 m-1 border rounded float-right hover:text-white hover:bg-red-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <div class="mx-5 flex justify-between items-center gap-3">
                    @if ($documento == null or $documento->status == 'Ativo')
                        <div class="">
                            <button wire:click.prevent="{{$documento != null ? 'editarDocumento' : 'criarDocumento()'}}"
                                class="flex gap-1 p-2 border rounded shadow-xl font-semibold text-md text-white bg-blue-500 border-blue-500 hover:bg-blue-600 hover:border-blue-600">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m7 10 2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Salvar
                            </button>
                        </div>
                    @endif

                    <div class="flex gap-1">
                        @if ($documento != null and $documento->status != 'Deletado')
                            <div>
                                <button wire:click.prevent="{{ $documento == null ? '' : 'baixaDocumento()' }} "
                                    class="flex gap-1 p-2 border rounded shadow-xl font-semibold text-md {{ $documento == null ? ' opacity-50' : 'opacity-100' }} text-white bg-green-500 border-green-500 hover:bg-green-600 hover:border-green-600">
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M11.905 1.316 15.633 6M18 10h-5a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h5m0-5a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1m0-5V7a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h15a1 1 0 0 0 1-1v-3m-6.367-9L7.905 1.316 2.352 6h9.281Z" />
                                    </svg>
                                    Baixar
                                </button>
                            </div>
                        @endif

                        @if ($documento != null and $documento->status == 'Deletado')
                            <div class="">
                                <button wire:click.prevent="{{ $documento == null ? '' : 'deletarDocumento()' }}"
                                    class="flex gap-1 p-2 border rounded shadow-xl font-semibold text-md {{ $documento == null ? ' opacity-50' : 'opacity-100' }} text-white bg-purple-500 border-purple-500 hover:bg-purple-600 hover:border-purple-600">
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 18 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97" />
                                    </svg>
                                    Retornar
                                </button>
                            </div>
                        @else
                            <div class="">
                                <button wire:click.prevent="{{ $documento == null ? '' : 'deletarDocumento()' }}"
                                    class="flex gap-1 p-2 border rounded shadow-xl font-semibold text-md {{ $documento == null ? ' opacity-50' : 'opacity-100' }} text-white bg-red-500 border-red-500 hover:bg-red-600 hover:border-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                    Deleter
                                </button>
                            </div>
                        @endif
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
                                <input type="date" wire:model="dataLancamento" value=""
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
                                        <option class="font-semibold text-gray-700"
                                            value="{{ $agenteCobrador->id }}">
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
                                    class="p-2 w-28 border-gray-200 rounded text-md font-semibold text-gray-600 shadow-lg bg-white">
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
                    <div class="flex justify-center flex-wrap m-3 overflow-auto h-auto max-h-60">
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
