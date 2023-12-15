<div>
    <div class="flex justify-between flex-wrap my-2 mx-7">
        <div class="">
            <label for="table-search" class="sr-only">Pesquisa</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input wire:model.live="search" type="text" id="table-search"
                    class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg md:w-80 bg-white focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Pesquisar Pedido">
            </div>
        </div>


        <div class="flex flex-wrap items-center">
            <div class="flex gap-1 items-start m-1">
                <label for="data" class="mb-2 text-lg font-semibold text-gray-600">
                    <input wire:model.lazy="startDate" id="startData" type="date"
                        class="border border-gray-300 text-gray-600 text-md font-semibold rounded w-36 p-1">
                </label>
            </div>

            <span class="font-semibold text-gray-700 text-lg mx-2">á</span>

            <div class="flex gap-1 items-start m-1">
                <label for="data" class="mb-2 text-lg font-semibold text-gray-600">
                    <input wire:model.lazy="endDate" id="endData" type="date"
                        class="border border-gray-300 text-gray-600 text-md font-semibold rounded w-36 p-1">
                </label>
            </div>
        </div>


        <button wire:click="novoPedido()"
            class="flex flex-row gap-2 text-white font-semibold border p-3 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 19 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm1-4H5m0 0L3 4m0 0h5.501M3 4l-.792-3H1m11 3h6m-3 3V1" />
            </svg>
            Novo Pedido
        </button>
    </div>

    <div class="mx-7 relative overflow-x-auto shadow-md rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs font-semibold text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 ">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Cliente
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Forma de Pagamento
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Total Itens
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Desconto
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Total Pedido
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Data do Pedido
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">

                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">
                            {{ $pedido->id }}
                        </th>
                        <th scope="row" class="px-6 py-3 text-center font-semibold  whitespace-nowrap">
                            <button wire:click.prevent="detalheCliente({{ $pedido->id }})">
                                {{ $pedido->cliente->nome }}
                            </button>
                        </th>
                        <td class="px-6 py-3 text-center font-semibold">
                            {{ $pedido->formaPagamento->nome }}
                        </td>
                        <td
                            class="px-6 py-3 text-center font-semibold {{ $pedido->status == 'Concluido' ? 'text-green-600' : '' }} {{ $pedido->status == 'Finalizado' ? 'text-blue-500' : '' }} {{ $pedido->status == 'Autenticado' ? 'text-yellow-500' : '' }} {{ $pedido->status == 'Pendente Pagamento' ? 'text-red-400' : '' }} {{ $pedido->status == 'Encomenda' ? 'text-purple-500' : '' }}">
                            {{ $pedido->status }}
                        </td>
                        <td class="px-6 py-3 text-center font-semibold">
                            {{ number_format($pedido->total_itens, 2, ',') }}
                        </td>
                        <td class="px-6 py-3 text-center font-semibold">
                            {{ number_format($pedido->desconto, 2, ',') }}
                        </td>
                        <td class="px-6 py-3 text-center font-semibold">
                            {{ number_format($pedido->total_pedido, 2, ',') }}
                        </td>
                        <td class="px-6 py-3 text-center font-semibold">
                            {{ date('d/m/Y', strtotime($pedido->created_at)) }}
                        </td>
                        <td class="px-6 py-3 text-center">
                            @if ($pedido->status == 'Aberto')
                                <button wire:click="visualizarPedido({{ $pedido->id }})"
                                    class="font-semibold text-blue-500 hover:underline">
                                    Adicionar Itens
                                </button>
                            @endif

                            @if ($pedido->status != 'Aberto')
                                <button wire:click="visualizarPedido({{ $pedido->id }})"
                                    class="font-semibold text-blue-500 hover:underline">
                                    Visualizar Pedido
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mx-7 mt-2">
        {{ $pedidos->links('layouts.paginate') }}
    </div>

    @if ($newPedido)
        <div class="flex justify-center">
            <div class="fixed top-11 bg-gray-50 border shadow-2xl rounded-lg sm:top-28 sm:w-1/2">

                <div>
                    <button wire:click="fecharPedido()"
                        class="p-1 m-1 border rounded float-right hover:text-white hover:bg-red-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <h1 class="text-xl font-semibold text-center m-3">Criar Pedido</h1>

                <form wire:submit.prevent="save()">
                    <div class="flex justify-center">
                        <button wire:click.prevent="visualizarClientes()"
                            class=" text-white bg-blue-500 p-2 border-blue-500 rounded text-md font-semibold hover:shadow-xl hover:bg-blue-600">{{ $clientePedido->nome ?? 'Selecione Um Cliente' }}</button>
                    </div>

                    <div class="m-3">
                        <label for="pagamento" class="block mb-2 text-xl font-semibold text-gray-900 ">Forma de
                            Pagamento</label>
                        <select wire:model="formaDePagamento" id="pagamento"
                            class="bg-white border-2 border-gray-300 text-gray-600 text-md font-semibold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-44 p-2.5 ">
                            <option selected></option>

                            @foreach ($formasPagamentos as $formaPagamento)
                                <option value="{{ $formaPagamento->id }}"
                                    class="font-semibold text-md text-gray-600 bg-white">
                                    {{ $formaPagamento->nome }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="m-3">
                        <textarea wire:model="descricao" id="message" rows="4"
                            class="block p-2.5 w-full font-semibold text-md text-gray-600 bg-white rounded-lg border-2 border-gray-300 focus:border-blue-500 "
                            placeholder="Adicione uma descrição..."></textarea>
                    </div>

                    <div class="flex justify-center m-4">
                        <button type="submit"
                            class="p-2 border-2 border-gray-300 rounded text-md font-semibold bg-white hover:shadow-xl hover:text-white hover:bg-blue-500 hover:border-blue-500">Criar
                            Pedido</button>
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

    @if ($showPedido)
        <div class="flex justify-center">
            <div class="fixed top-11 bg-gray-50 border shadow-2xl rounded-lg sm:top-8 sm:w-1/2">
                <div>
                    <button wire:click.prevent="fecharPedido()"
                        class="p-1 m-1 border rounded float-right hover:text-white hover:bg-red-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <h1 class="text-xl font-semibold text-center m-3">Pedido</h1>

                <form
                    wire:submit.prevent="{{ $telaPedido->status == 'Aberto' ? 'finalizarPedido()' : 'editePedido()' }}">

                    <div class="m-3 flex justify-between items-center">
                        <div>
                            <label for="pagamento" class="block mb-2 text-xl font-semibold text-gray-900 ">Forma de
                                Pagamento</label>
                            <select wire:model="formaDePagamento" id="pagamento"
                                @if ($telaPedido->status == 'Concluido') @disabled(true) @endif
                                class=" bg-white border border-gray-300 text-gray-600 text-md font-semibold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-44 p-1 ">
                                <option selected></option>

                                @foreach ($formasPagamentos as $formaPagamento)
                                    <option value="{{ $formaPagamento->id }}"
                                        class="font-semibold text-md text-gray-600 bg-white">
                                        {{ $formaPagamento->nome }}</option>
                                @endforeach

                            </select>
                        </div>

                        @if ($telaPedido->status == 'Aberto')
                            <div class="">
                                <button wire:click.prevent="telaItens()"
                                    class="p-1 border-2 rounded-md font-semibold bg-white text-gray-700 hover:bg-blue-500 hover:text-white">
                                    Adicionar Itens
                                </button>
                            </div>
                        @else
                            <div class="">
                                <label for="status" class="block mb-2 text-lg font-semibold text-gray-900 ">Status
                                    do Pedido</label>
                                <select wire:model="status" id="status"
                                    @if ($telaPedido->status == 'Concluido') @disabled(true) @endif
                                    class=" bg-white border border-gray-300 text-gray-600 text-md font-semibold rounded focus:ring-blue-500 focus:border-blue-500 block w-48 p-1 ">
                                    <option selected></option>

                                    @foreach ($statusPedido as $pedidoStatus)
                                        <option value="{{ $pedidoStatus->nome }}"
                                            class="font-semibold text-md text-gray-600 bg-white">
                                            {{ $pedidoStatus->nome }}</option>
                                    @endforeach

                                </select>
                            </div>
                        @endif

                    </div>

                    <div class="m-3">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border">
                            <table class="w-full text-sm text-left">
                                <thead class="text-xs font-semibold text-gray-800 uppercase bg-gray-100">
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
                                        @if ($telaPedido->status == 'Aberto')
                                            <th scope="col" class="px-6 py-3">

                                            </th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($telaPedido->itens as $item)
                                        <tr class="border-gray-200 font-semibold bg-white">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                                                {{ $item->nome }}
                                            </th>
                                            <td class="px-6 py-4 bg-white">
                                                {{ $item->descricao }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-50">
                                                {{ number_format($item->preco_1, '2', ',') }}
                                            </td>
                                            <td class="px-6 py-4 bg-white">
                                                {{ $item->pivot->quantidade }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-50">
                                                {{ number_format($item->pivot->total, '2', ',') }}
                                            </td>
                                            @if ($telaPedido->status == 'Aberto')
                                                <td class="px-6 py-4">
                                                    <button wire:click.prevent="removerItem({{ $item->id }})"
                                                        class="font-semibold text-red-500 cursor-pointer hover:underline">
                                                        remover
                                                    </button>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="font-semibold bg-white text-gray-900">
                                        <th scope="row" class="px-6 py-3 text-base bg-gray-50">Total</th>
                                        <td colspan="3" class="px-6 py-3"></td>
                                        <td class="px-6 py-3 bg-gray-50">
                                            <h1 wire:model.live="totalPedido">
                                                {{ number_format($totalItens, 2, ',') }}</h1>
                                        </td>
                                        @if ($telaPedido->status == 'Aberto')
                                            <td class="px-6 py-3"></td>
                                        @endif
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>

                    <div class="m-3">
                        <textarea wire:model="descricao" id="message" rows="3"
                            @if ($telaPedido->status == 'Concluido') @disabled(true) @endif
                            class="block p-2.5 w-full font-semibold text-md text-gray-600 bg-white rounded-lg border border-gray-300 focus:border-blue-500 "
                            placeholder="Adicione uma descrição..."></textarea>
                    </div>

                    <div class="flex justify-center m-4 gap-3">
                        @if ($telaPedido->status == 'Finalizado')
                            <button wire:click.prevent="mostrarAutenticacao()"
                                class="p-2 border rounded text-md font-semibold bg-white hover:shadow-xl hover:text-white hover:bg-yellow-400">
                                Autenticar Pedido
                            </button>
                        @endif

                        @if ($telaPedido->status != 'Concluido')
                            <button type="submit"
                                class="p-2 border rounded text-md font-semibold bg-white hover:shadow-xl hover:text-white hover:bg-blue-500">
                                {{ $telaPedido->status == 'Aberto' ? 'Finalizar Pedido' : 'Salvar Pedido' }}
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    @endif

    @if ($showAutenticacao)
        <div class="flex justify-center">
            <div class="fixed top-11 bg-gray-50 border-2 shadow-xl rounded sm:top-16 sm:w-80">

                <div class="flex flex-col m-3">
                    <div class="flex items-center flex-col mb-2">
                        <label for="pagamento" class="block mb-2 text-xl font-semibold text-gray-900 ">Forma de
                            Pagamento</label>
                        <select wire:model="formaDePagamento" id="pagamento"
                            class=" bg-gray-50 border border-gray-300 text-gray-600 text-md font-semibold rounded block w-52 p-1 ">
                            <option selected></option>

                            @foreach ($formasPagamentos as $formaPagamento)
                                <option value="{{ $formaPagamento->id }}"
                                    class="font-semibold text-md text-gray-600">
                                    {{ $formaPagamento->nome }}</option>
                            @endforeach

                        </select>
                    </div>

                    {{-- <div class="flex m-1 gap-2">
                        <div class="flex items-center gap-1 mb-3">
                            <label for="pagamento" class="block mb-2 text-xl font-semibold text-gray-900 ">Valor
                                Pago</label>
                            <input wire:model.live="valorPago" type="text"
                                class="border-gray-300 bg-gray-50 rounded w-20 text-md font-semibold text-center"
                                value="">
                        </div>

                        @php
                            $valor = $this->totalPedido - $this->valorPago;
                            $this->troco = $valor;
                        @endphp

                        <div class="flex items-center gap-4 m-1 mb-3">
                            <label for="pagamento"
                                class="block mb-2 text-xl font-semibold text-gray-900 ">Troco</label>
                            <h1 wire:model.lazy="troco" type="number"
                                class="border-gray-300 bg-gray-50 rounded w-20 text-md font-semibold text-center">
                                {{ number_format($this->troco, 2, ',') }}</h1>
                        </div>
                    </div> --}}

                    <div class="flex items-center justify-end  gap-1 m-2 mb-3">
                        <label for="pagamento"
                            class="block mb-2 text-xl font-semibold text-gray-900 ">Desconto</label>
                        <input wire:model.live="desconto" type="number"
                            class="border-gray-300 bg-gray-50 rounded w-20 text-md font-semibold text-center"
                            value="">
                    </div>

                    @php
                        $this->total = $this->totalPedido - $desconto;
                    @endphp

                    <div class="flex justify-end items-center gap-1 m-2">
                        <label for="pagamento" class="block mb-2 text-xl font-semibold text-gray-900 ">Total do
                            Pedido</label>
                        <h1 wire:model.live="totalPedido"
                            class="p-2 border-gray-300 bg-gray-50 rounded w-24 text-md font-semibold text-center"
                            value="">{{ number_format($this->total, 2, ',') }}</h1>
                    </div>
                </div>

                <div class="flex justify-center m-2">
                    <button wire:click.prevent="autenticarPedido()"
                        class="p-2 border rounded text-md font-semibold">Confirmar</button>
                </div>
            </div>
        </div>
    @endif

    @if ($showItem)
        <div class="flex justify-center">
            <div class="fixed top-11 bg-white border shadow-2xl rounded-lg sm:top-11 sm:w-2/3">
                <div>
                    <button wire:click="fecharTelaItens()"
                        class="p-1 m-1 border rounded float-right hover:text-white hover:bg-red-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <h1 class="text-xl font-semibold text-center m-3">Adicione os Itens ao Pedido</h1>

                <div class="flex justify-center items-center m-4 gap-1">
                    <input wire:model.live="search" type="text" id="table-search"
                        class="p-2 text-sm text-gray-900 border border-gray-200 rounded w-80 focus:ring-gray-100 focus:border-gray-100"
                        placeholder="Pesquisar Item">

                    <button class="p-2 bg-blue-500 rounded">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </button>
                </div>

                <div class="flex justify-center flex-wrap gap-3 m-3 overflow-auto h-auto max-h-80">
                    @foreach ($itens as $item)
                        <div wire:click="quantidadeItem({{ $item->id }})"
                            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:w-1/3 hover:bg-gray-100 cursor-pointer">

                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">{{ $item->nome }}
                                </h5>
                                <p class="mb-1 font-semibold text-gray-600">{{ $item->descricao }}</p>
                                <p class="mb-1 font-semibold text-gray-900">
                                    R${{ number_format($item->preco_1, 2, ',', '.') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if ($clienteDetalhe)
        <div class="flex justify-center">
            <div class="fixed top-11 left-14 bg-gray-50 border shadow-xl rounded-lg sm:top-40 sm:w-1/3">
                <div>
                    <button wire:click="fecharDetalheCliente()"
                        class="p-1 m-1 border rounded float-right hover:text-white hover:bg-red-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <h1 class="text-xl font-semibold text-center m-3">Informações do Cliente</h1>

                <div class="m-3 flex flex-wrap gap-2">
                    <h1 class="text-md font-semibold text-gray-900 bg-gray-300 p-2 rounded">
                        #{{ $informacoesCliente->id }}
                    </h1>
                    <h1 class="text-md font-semibold text-gray-800 bg-gray-100 p-2 rounded w-44">
                        {{ $informacoesCliente->cliente->nome }}
                    </h1>

                    <button
                        class="flex items-center gap-1 text-md font-semibold text-gray-800 bg-gray-100 p-2 rounded w-44 hover:underline hover:text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path
                                d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                        </svg>
                        {{ $informacoesCliente->cliente->whatsapp }}
                    </button>

                    <h1 class="text-md font-semibold text-gray-800 bg-gray-100 p-2 rounded w-52">
                        {{ $informacoesCliente->cliente->email }}
                    </h1>
                </div>
            </div>
        </div>
    @endif

    @if ($detalheItem)
        <div class="flex justify-center">
            <div class="fixed top-11 bg-white border shadow-xl rounded-lg sm:top-40 sm:w-80">
                <div>
                    <button wire:click="fecharDetalhe()"
                        class="p-1 m-1 border rounded float-right hover:text-white hover:bg-red-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <h1 class="text-xl font-semibold text-center m-3">Quantidade</h1>

                <div class="flex flex-col items-center gap-3 m-3">
                    <input wire:model.lazy="quantidade" type="number"
                        class="rounded-xl border border-gray-400 w-28 text-lg font-semibold text-center"
                        value="{{ $quantidade }}">

                    <button wire:click.prevent="adicionarItem()"
                        class="p-2 border rounded text-lg font-semibold w-28 hover:text-white hover:bg-blue-500">Salvar</button>
                </div>

            </div>
        </div>
    @endif
</div>
