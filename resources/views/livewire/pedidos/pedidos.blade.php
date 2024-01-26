<div>

    <button x-data x-on:click="$dispatch('open-modal')"
        class="flex justify-center w-44 gap-2 text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 dark:border-none">
        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 19 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm1-4H5m0 0L3 4m0 0h5.501M3 4l-.792-3H1m11 3h6m-3 3V1" />
        </svg>
        Novo Pedido
    </button>

    <x-modal-web :javaScript="false" title="Criar Pedido" wire:model="modal">

        @slot('body')
            <button x-on:click="$dispatch('close-modal')"
                class=" absolute right-2 top-4 p-1 m-1 border rounded dark:text-white hover:bg-red-500 hover:border-red-500">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>

            <div class="mx-2">
                <form wire:submit.prevent="save()"
                    class="w-full max-w-2xl font-semibold rounded-lg text-md text-gray-700 bg-white dark:text-white dark:bg-gray-700">
                    <div class="mx-3">
                        <label for="pagamento" class="block mb-2 uppercase font-semibold text-gray-900 dark:text-white">
                            Cliente
                        </label>
                        <div class="flex gap-1 my-2">

                            <x-input class="w-60" value="{{ $pessoaPedido->nome ?? '' }}"
                                placeholder="Selecionar Cliente"></x-input>

                            <button x-data x-on:click.prevent="$dispatch('open-detalhes', { name : 'clientes' })"
                                class=" text-white bg-blue-500 p-2 border-blue-500 rounded text-md font-semibold hover:shadow-xl hover:bg-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="mx-3">
                        <label for="pagamento" class="block mb-2 uppercase font-semibold text-gray-900 dark:text-white">
                            Forma de Pagamento
                        </label>
                        <select wire:model="formaDePagamento" id="pagamento"
                            class="w-60 p-3 pl-5 text-sm text-gray-600 font-semibold rounded shadow-sm border-2 bg-white dark:bg-gray-700 dark:text-white">
                            <option class="bg-white dark:bg-gray-700 dark:text-white" selected></option>

                            @foreach ($formasPagamentos as $formaPagamento)
                                <option value="{{ $formaPagamento->id }}"
                                    class="text-gray-600 font-semibold bg-white dark:bg-gray-700 dark:text-white">
                                    {{ $formaPagamento->nome }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="m-3">
                        <textarea wire:model="descricao" id="message" rows="4"
                            class="w-full p-3 pl-5 text-sm text-gray-600 font-semibold rounded shadow-sm border-2 bg-white dark:bg-gray-700 dark:text-white"
                            placeholder="Adicione uma descrição..."></textarea>
                    </div>

                    <div class="flex justify-center m-4">
                        <button type="submit"
                            class="text-white text-lg font-semibold border p-2 my-2 rounded-md bg-green-600 transition-all duration-300 hover:scale-95 hover:bg-green-700 dark:border-none">
                            Criar Pedido
                        </button>
                    </div>
                </form>
            </div>

        @endslot
    </x-modal-web>

    <x-modal-detalhes name="clientes" title="Clientes">
        @slot('body')
            <div class="flex justify-center items-center m-4 gap-1">
                <input wire:model.live="search" type="text" id="table-search"
                    class="p-2 pl-10 text-sm text-gray-600 font-semibold rounded-lg sm:w-80 bg-white dark:bg-gray-800 dark:text-white"
                    placeholder="Pesquisar Cliente">

                <button wire:click.prevent="pesquisaPessoa()"
                    class="text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 cursor-pointer dark:border-none">
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </button>
            </div>

            @if ($pessoas)
                <div class="flex justify-center flex-wrap m-3 overflow-auto h-auto max-h-60">
                    @foreach ($pessoas as $pessoa)
                        <div wire:click="pedidoPessoa({{ $pessoa->id }})"
                            class="m-2 p-2 text-gray-700 shadow border rounded w-44 h-24 hover:bg-gray-100 hover:shadow-xl hover:border-2 cursor-pointer dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-none">
                            <h1 class="text-sm  font-semibold">#{{ $pessoa->id }}</h1>
                            <h1 class="text-lg font-semibold ">
                                {{ $pessoa->nome }}</h1>
                            <h1 class="text-sm  font-semibold ">{{ $pessoa->whatsapp }}</h1>
                        </div>
                    @endforeach
                </div>
            @endif
        @endslot
    </x-modal-detalhes>

    {{-- @if ($modal)
        <x-modal-web title="Novo Pedido" wire:model="modal">
            @slot('body')
                <button wire:click.prevent="closeModal()"
                    class=" absolute right-2 top-4 p-1 m-1 border rounded hover:text-white hover:bg-red-500 hover:border-red-500 dark:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>

                <x-modal-detalhes name="quantidade" title="Quantidade">
                    @slot('body')
                        <div class="flex flex-col items-center gap-3 m-3">
                            <input wire:model.lazy="quantidade" type="number"
                                class="rounded-xl border border-gray-400 w-28 text-lg font-semibold text-center"
                                value="{{ $quantidade }}">

                            <button wire:click.prevent="adicionarItem()"
                                class="text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 cursor-pointer dark:border-none">Salvar</button>
                        </div>
                    @endslot
                </x-modal-detalhes>

                <x-modal-detalhes name="autenticacao" title="Autenticação">
                    @slot('body')
                        <div class="flex flex-col m-3">
                            <div class="flex justify-between m-2">
                                <label for="pagamento"
                                    class="block mb-2 text-xl font-semibold text-gray-900 dark:text-white">Forma de
                                    Pagamento</label>
                                <select wire:model="formaDePagamento" id="pagamento"
                                    class="bg-gray-50 border border-gray-300 text-gray-600 text-md font-semibold rounded w-32 p-1 dark:bg-gray-200">
                                    <option selected></option>

                                    @foreach ($formasPagamentos as $formaPagamento)
                                        <option value="{{ $formaPagamento->id }}"
                                            class="font-semibold text-md text-gray-600">
                                            {{ $formaPagamento->nome }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="flex items-center justify-between gap-1 m-2 mb-3">
                                <label for="pagamento"
                                    class="block mb-2 text-xl font-semibold text-gray-900 dark:text-white">Desconto</label>
                                <input wire:model.live="desconto" type="number"
                                    class="border-gray-300 bg-gray-50 rounded w-20 text-md font-semibold text-center"
                                    value="">
                            </div>

                            @php
                                $this->total = $this->totalPedido - $desconto;
                            @endphp

                            <div class="flex justify-between items-center gap-1 m-2">
                                <label for="pagamento"
                                    class="block mb-2 text-xl font-semibold text-gray-900 dark:text-white">Total do
                                    Pedido</label>
                                <h1 wire:model.live="totalPedido"
                                    class="p-2 border-gray-300 bg-gray-50 rounded w-24 text-md font-semibold text-center"
                                    value="">{{ number_format($this->total, 2, ',') }}</h1>
                            </div>
                        </div>

                        <div class="flex justify-center m-2">
                            <button wire:click.prevent="autenticarPedido()"
                                class="text-white font-semibold border p-2 rounded-md bg-indigo-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-700 cursor-pointer dark:border-none">Confirmar</button>
                        </div>
                    @endslot
                </x-modal-detalhes>

                <div x-data="{ form: @entangle('formStatus') }">
                    <div x-show=" form === 'novo'">
                        <form wire:submit.prevent="save()">
                            <div class="flex justify-center">

                            </div>

                            <div class="mx-3">
                                <label for="pagamento"
                                    class="block mb-2 text-xl font-semibold text-gray-900 dark:text-white">
                                    Cliente
                                </label>
                                <div class="flex gap-1 my-2">
                                    <input
                                        class="appearance-none w-60 bg-white text-gray-700 font-semibold border-2 border-gray-300 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                                        id="grid-first-name" type="text" value="{{ $clientePedido->nome ?? '' }}">
                                    <button x-data x-on:click.prevent="$dispatch('open-detalhes', { name : 'clientes' })"
                                        class=" text-white bg-blue-500 p-2 border-blue-500 rounded text-md font-semibold hover:shadow-xl hover:bg-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="mx-3">
                                <label for="pagamento"
                                    class="block mb-2 text-xl font-semibold text-gray-900 dark:text-white">
                                    Forma de Pagamento
                                </label>
                                <select wire:model="formaDePagamento" id="pagamento"
                                    class="bg-white border-2 border-gray-300 text-gray-600 text-md font-semibold rounded-lg w-44 p-2.5 dark:bg-gray-300">
                                    <option selected></option>

                                    @foreach ($formasPagamentos as $formaPagamento)
                                        <option value="{{ $formaPagamento->id }}"
                                            class="font-semibold text-md text-gray-600 bg-white dark:bg-gray-300">
                                            {{ $formaPagamento->nome }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="m-3">
                                <textarea wire:model="descricao" id="message" rows="4"
                                    class="block p-2.5 w-full font-semibold text-md text-gray-600 bg-white rounded-lg border-2 border-gray-300 dark:bg-gray-300"
                                    placeholder="Adicione uma descrição..."></textarea>
                            </div>

                            <div class="flex justify-center m-4">
                                <button type="submit"
                                    class="text-white font-semibold border p-3 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 cursor-pointer dark:border-none">
                                    Criar Pedido
                                </button>
                            </div>
                        </form>
                    </div>
                    <div x-show=" form === 'visualizar'">
                        <form
                            wire:submit.prevent="{{ $telaPedido->status == 'Aberto' ? 'finalizarPedido()' : 'editePedido()' }}">

                            <div class="mx-3 flex justify-between items-center">
                                <div>
                                    <label for="pagamento"
                                        class="block mb-2 text-xl font-semibold text-gray-900 dark:text-white">Forma de
                                        Pagamento</label>
                                    <select wire:model="formaDePagamento" id="pagamento"
                                        @if ($telaPedido->status == 'Concluido') @disabled(true) @endif
                                        class="bg-white border border-gray-300 text-gray-600 text-md font-semibold rounded w-44 p-1 dark:bg-gray-100 dark:border-none">
                                        <option selected></option>

                                        @foreach ($formasPagamentos as $formaPagamento)
                                            <option value="{{ $formaPagamento->id }}"
                                                class="font-semibold text-md text-gray-600">
                                                {{ $formaPagamento->nome }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                @if ($telaPedido->status == 'Aberto')
                                    <div class="">
                                        <button x-data
                                            x-on:click.prevent="$dispatch('open-detalhes', { name : 'produtos' })"
                                            class="text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 cursor-pointer dark:border-none">
                                            Adicionar Produtos
                                        </button>
                                    </div>
                                @else
                                    <div class="">
                                        <label for="status"
                                            class="block mb-2 text-lg font-semibold text-gray-900 dark:text-white">Status
                                            do Pedido</label>
                                        <select wire:model="status" id="status"
                                            @if ($telaPedido->status == 'Concluido') @disabled(true) @endif
                                            class=" bg-white border border-gray-300 text-gray-600 text-md font-semibold rounded w-32 p-1 dark:bg-gray-300">
                                            <option selected></option>

                                            @foreach ($statusPedido as $pedidoStatus)
                                                <option value="{{ $pedidoStatus->nome }}"
                                                    class="font-semibold text-md text-gray-600">
                                                    {{ $pedidoStatus->nome }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                @endif

                            </div>

                            <div class="m-3">
                                <div
                                    class="relative overflow-auto shadow-md sm:rounded-lg border dark:border-gray-500 h-auto max-h-32">
                                    <table class="w-full text-sm text-left">
                                        <thead
                                            class="text-xs font-semibold text-gray-800 uppercase bg-gray-100 dark:text-white dark:bg-gray-700">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Nome Item
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Descrição
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Preço
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Quantidade
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Total
                                                </th>
                                                {{-- @if ($telaPedido->status == 'Aberto')
                                                    <th scope="col" class="px-6 py-3">

                                                    </th>
                                                @endif --}}
    {{-- </tr>
                                        </thead>
                                        <tbody class="">
                                            @foreach ($telaPedido->produtos as $produto)
                                                <tr
                                                    class="border-b border-gray-200 font-semibold bg-white dark:text-gray-100 dark:bg-gray-500 dark:hover:bg-gray-600 dark:border-gray-400">
                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $produto->nome }}
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        {{ $produto->descricao }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ number_format($produto->preco_1, '2', ',') }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $produto->pivot->quantidade }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ number_format($produto->pivot->total, '2', ',') }}
                                                    </td>
                                                    {{-- @if ($telaPedido->status == 'Aberto')
                                                        <td class="px-6 py-4">
                                                            <button wire:click.prevent="removerItem({{ $produto->id }})"
                                                                class="text-white font-semibold border p-1 rounded-md bg-red-500 transition-all duration-300 hover:scale-95 hover:bg-red-700 cursor-pointer dark:border-none">
                                                                remover
                                                            </button>
                                                        </td>
                                                    @endif --}}
    </tr>
    {{-- @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr
                                                class="font-semibold bg-white text-gray-900 dark:text-gray-100 dark:bg-gray-600">
                                                <th colspan="4" scope="row" class="px-6 py-3 text-base">Total
                                                </th>
                                                <td class="px-6 py-3">
                                                    <h1 wire:model.live="totalPedido">
                                                        {{ number_format($totalProdutos, 2, ',') ?? '' }}</h1>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>

                            <div class="m-3">
                                <textarea wire:model="descricao" id="message" rows="3"
                                    @if ($telaPedido->status == 'Concluido') @disabled(true) @endif
                                    class="block p-2.5 w-full font-semibold text-md text-gray-600 bg-white rounded-lg border border-gray-300 dark:bg-gray-100 "
                                    placeholder="Adicione uma descrição..."></textarea>
                            </div>

                            <div class="flex justify-center m-4 gap-3">
                                @if ($telaPedido->status == 'Finalizado')
                                    <button x-data
                                        x-on:click.prevent="$dispatch('open-detalhes', { name : 'autenticacao' })"
                                        class="text-white font-semibold border p-2 rounded-md bg-indigo-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-600 cursor-pointer dark:border-none">
                                        Autenticar Pedido
                                    </button>
                                @endif

                                @if ($telaPedido->status != 'Concluido')
                                    <button type="submit"
                                        class="text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 cursor-pointer dark:border-none">
                                        {{ $telaPedido->status == 'Aberto' ? 'Finalizar Pedido' : 'Salvar Pedido' }}
                                    </button>
                                @endif
                            </div>
                        </form>

                    </div>
                </div>
            @endslot
        </x-modal-web> --}}
    {{-- @endif --}}

</div>
