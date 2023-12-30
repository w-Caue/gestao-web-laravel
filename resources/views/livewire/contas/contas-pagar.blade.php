<div>
    <div class="flex justify-between items-center flex-wrap my-2 mx-7">
        <div class="">
            <label for="table-search" class="sr-only">Pesquisa</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input wire:model.live="search" type="text" id="table-search"
                    class="block p-2 pl-10 text-sm font-semibold text-gray-900 border border-gray-300 rounded-lg md:w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-none"
                    placeholder="Pesquisar Pedido">
            </div>
        </div>

        <div class="flex gap-3 my-3 md:my-0">
            <label for="">
                <input wire:model.live='status' value="Ativo"
                    class=" h-5 w-5 appearance-none rounded-full border-2 border-solid border-gray-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-blue-600 checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s]"
                    type="radio" name="status" id="radioNoLabel01" />
                <span class="text-md font-semibold text-gray-500 dark:text-white">Á Pagar</span>
            </label>

            {{-- <label for="">
                    <input wire:model.live='' value="Pago"
                        class=" h-5 w-5 appearance-none rounded-full border-2 border-solid border-gray-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-blue-600 checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s]"
                        type="radio" name="" id="radioNoLabel01" />
                    <span class="text-md font-semibold text-gray-500">Pagos</span>
                </label> --}}

            <label for="">
                <input wire:model.live='status' value="Deletado"
                    class=" h-5 w-5 appearance-none rounded-full border-2 border-solid border-gray-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-blue-600 checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s]"
                    type="radio" name="status" id="radioNoLabel01" />
                <span class="text-md font-semibold text-gray-500 dark:text-white">Deletados</span>
            </label>
        </div>

        <button wire:click.prevent="openModal()"
            class="flex justify-center gap-2 w-full sm:w-56 text-white font-semibold border p-3 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 dark:border-none">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 19H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2v4M6 1v4a1 1 0 0 1-1 1H1m11 8h4m-2 2v-4m5 2a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z" />
            </svg>
            Novo Documento
        </button>
    </div>


    <div class="mx-7 relative overflow-x-auto shadow-md rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-white">
            <thead class="text-xs font-semibold text-gray-700 uppercase bg-gray-100 dark:text-white dark:bg-gray-700">
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
                </tr>
            </thead>
            <tbody>
                @foreach ($contas as $conta)
                    <tr wire:key="{{ $conta->id }}" wire:click.prevent="show({{ $conta->id }})"
                        class="border-b {{ $conta->status_documento == 'Pagar' ? 'text-gray-800 bg-white hover:bg-gray-50 dark:text-white dark:bg-gray-500 dark:hover:bg-gray-600' : '' }} {{ $conta->status == 'Deletado' ? 'text-white bg-red-400 hover:bg-red-500' : 'dark:text-white dark:bg-gray-500' }} cursor-pointer">
                        <th scope="row" class="px-4 py-3 font-semibold whitespace-nowrap">
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mx-7 mt-2">
        {{ $contas->links('layouts.paginate') }}
    </div>

    @if ($modal)
        <x-modal-web title="Contas a Pagar" wire:model="modal">
            @slot('body')
                <x-modal-detalhes name="clientes" title="Clientes">
                    @slot('body')
                        <div class="flex justify-center items-center m-4 gap-1">
                            <input wire:model.live="search" type="text" id="table-search"
                                class="p-2 text-md font-semibold text-gray-900 border border-gray-200 rounded w-80 focus:ring-gray-100 focus:border-gray-100 dark:bg-gray-300 dark:border-none"
                                placeholder="Pesquisar Cliente">

                            <button wire:click.prevent="pesquisaClientes()"
                                class="text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 cursor-pointer dark:border-none">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </button>
                        </div>

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
                </x-modal-detalhes>

                <x-modal-detalhes name="autenticacao" title="Autenticação">
                    @slot('body')
                        <form wire:submit.prevent="confirmarBaixa()">
                            <div class="border-2 p-3 m-2 rounded bg-gray-200 mb-2 dark:bg-gray-600 dark:border-gray-400">
                                <div class="mb-2">
                                    <label for="data" class="flex items-center justify-between">
                                        <span class="font-semibold text-gray-700 dark:text-white">Data Vencimento</span>
                                        <input type="date" wire:model.lazy="form.dataVencimento"
                                            @disabled(true)
                                            class="p-2 w-36 border-gray-200 rounded text-md font-semibold shadow-xl text-gray-600 bg-white dark:bg-gray-200">
                                    </label>
                                    @error('form.dataVencimento')
                                        <span class="error dark:text-red-500 font-semibold">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label for="decricao" class="flex items-center justify-between">
                                        <span class="font-semibold text-gray-700 dark:text-white">Data do Pagamento</span>
                                        <input wire:model.lazy="form.dataPagamento" type="date"
                                            class="p-2 w-36 border-gray-200 rounded text-md font-semibold text-gray-600 shadow-lg bg-white dark:bg-gray-200">
                                    </label>
                                    @error('form.dataPagamento')
                                        <span class="error dark:text-red-500 font-semibold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="border-2 m-2 p-3 rounded bg-gray-200 mb-2 dark:bg-gray-600 dark:border-gray-400">
                                <div class="">
                                    <label for="" class="flex items-center justify-between">
                                        <span class="font-semibold text-gray-700 dark:text-white">Forma Pagamento</span>
                                        <select type="date" wire:model="form.formaPagamento"
                                            class="p-2 w-44 border-gray-200 rounded text-md font-semibold shadow-lg text-gray-600 bg-white dark:bg-gray-200">

                                            <option value=""></option>

                                            @foreach ($formasPagamentos as $formaPagamento)
                                                <option class="font-semibold text-gray-700"
                                                    value="{{ $formaPagamento->id }}">
                                                    {{ $formaPagamento->nome }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                    @error('form.formaPagamento')
                                        <span class="error dark:text-red-500 font-semibold">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="my-3">
                                    <label for="decricao" class="flex items-center justify-between">
                                        <span class="font-semibold text-gray-700 dark:text-white">Valor a Pagar:</span>
                                        <input wire:model.lazy="form.valorDocumento" placeholder="R$"
                                            class="p-2 w-36 border-gray-200 rounded text-md font-semibold text-gray-600 shadow-lg bg-white dark:bg-gray-200">
                                    </label>
                                </div>

                                <div class="">
                                    <label for="decricao" class="flex items-center justify-between">
                                        <span class="font-semibold text-gray-700 dark:text-white">Valor:</span>
                                        <input wire:model.lazy="form.valorPago" placeholder="R$"
                                            class="p-2 w-36 border-gray-200 rounded text-md font-semibold text-gray-600 shadow-lg bg-white dark:bg-gray-200">
                                    </label>
                                    @error('form.valorPago')
                                        <span class="error dark:text-red-500 font-semibold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-center m-5">
                                <button type="submit"
                                    class="text-white font-semibold border p-2 rounded-md bg-green-500 transition-all duration-300 hover:scale-95 hover:bg-green-600 dark:border-none">
                                    Confirma Baixa
                                </button>
                            </div>

                        </form>
                    @endslot
                </x-modal-detalhes>

                <button wire:click.prevent="closeModal()"
                    class=" absolute right-2 top-4 p-1 m-1 border rounded hover:text-white hover:bg-red-500 hover:border-red-500 dark:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>

                <div class="mx-5 flex justify-between items-center gap-3">
                    @if ($documento == null or $documento->status == 'Ativo')
                        <div class="">
                            <button wire:click.prevent="{{ $documento != null ? 'editarDocumento' : 'criarDocumento()' }}"
                                class="flex flex-row gap-2 text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-blue-600 dark:border-none">
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
                                <button x-data x-on:click.prevent="$dispatch('open-detalhes', { name : 'autenticacao' })"
                                    class="flex flex-row gap-2 text-white font-semibold border p-2 rounded-md bg-green-500 transition-all duration-300 hover:scale-95 hover:bg-green-600 {{ $documento == null ? ' opacity-50' : 'opacity-100' }} dark:border-none">
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
                                    class="flex flex-row gap-2 text-white font-semibold border p-2 rounded-md bg-purple-500 transition-all duration-300 hover:scale-95 hover:bg-purple-600{{ $documento == null ? ' opacity-50' : 'opacity-100' }} dark:border-none">
                                    <svg class="w-6 h-6 hover:animate-spin" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
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
                                    class="flex flex-row gap-2 text-white font-semibold border p-2 rounded-md bg-red-500 transition-all duration-300 hover:scale-95 hover:bg-red-600 {{ $documento == null ? ' opacity-50' : 'opacity-100' }} dark:border-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                    Deleter
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                <form class="m-5 rounded">
                    <div class="flex flex-wrap gap-3 mb-2">
                        <div class="">
                            <span class="font-semibold text-gray-700 dark:text-white">Cliente/Empresa</span>

                            <label for="" class="flex gap-1">
                                <input type="text" value="{{ $form->clienteDocumento->nome ?? '' }}"
                                    class="p-2 border-gray-200 rounded text-md text-gray-500 font-semibold shadow-xl dark:bg-gray-200">

                                <button x-data x-on:click.prevent="$dispatch('open-detalhes', { name : 'clientes' })"
                                    class="p-2 w-10 rounded text-white bg-blue-500 hover:border-blue-500">

                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </button>
                            </label>
                        </div>

                        <div class="flex gap-3">
                            <div class="">
                                <label for="data" class="flex flex-col">
                                    <span class="font-semibold text-gray-700 dark:text-white">Dt. Lançamento</span>
                                    <input type="date" wire:model="form.dataLancamento" value=""
                                        class="p-2 w-36 border-gray-200 rounded text-md font-semibold shadow-xl text-gray-600 bg-white dark:bg-gray-200">
                                </label>
                                @error('form.dataLancamento')
                                    <span class="error dark:text-red-500 font-semibold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="">
                                <label for="data" class="flex flex-col">
                                    <span class="font-semibold text-gray-700 dark:text-white">Ag. Cobrador</span>
                                    <select type="date" wire:model="form.agenteCobrador"
                                        class="p-2 w-32 border-gray-200 rounded text-md font-semibold shadow-xl text-gray-600 bg-white dark:bg-gray-200">

                                        <option value=""></option>

                                        @foreach ($agenteCobradores as $agenteCobrador)
                                            <option class="font-semibold text-gray-700"
                                                value="{{ $agenteCobrador->id }}">
                                                {{ $agenteCobrador->nome }}</option>
                                        @endforeach
                                    </select>
                                </label>
                                @error('form.agenteCobrador')
                                    <span class="error dark:text-red-500 font-semibold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="">
                                <label for="data" class="flex flex-col">
                                    <span class="font-semibold text-gray-700 dark:text-white">Dt. Vencimento</span>
                                    <input type="date" wire:model.lazy="form.dataVencimento"
                                        class="p-2 w-36 border-gray-200 rounded text-md font-semibold shadow-xl text-gray-600 bg-white dark:bg-gray-200">
                                </label>
                                @error('form.dataVencimento')
                                    <span class="error dark:text-red-500 font-semibold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="">
                                <label for="decricao" class="flex flex-col">
                                    <span class="font-semibold text-gray-700 dark:text-white">Vl. Documento</span>
                                    <input wire:model.lazy="form.valorDocumento" placeholder="R$"
                                        class="p-2 w-28 border-gray-200 rounded text-md font-semibold text-gray-600 shadow-lg bg-white dark:bg-gray-200">
                                </label>
                                @error('form.valorDocumento')
                                    <span class="error dark:text-red-500 font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <label for="decricao" class="flex flex-col">
                            <span class="font-semibold text-gray-700 dark:text-white">Descrição</span>
                            <textarea wire:model="form.descricao" id="message" rows="3"
                                class="block p-2.5 w-full font-semibold text-md text-gray-600 bg-white rounded-lg border-2 border-gray-300 dark:bg-gray-300"
                                placeholder="Adicione uma descrição..."></textarea>
                        </label>
                    </div>
                </form>
            @endslot
        </x-modal-web>
    @endif
</div>
