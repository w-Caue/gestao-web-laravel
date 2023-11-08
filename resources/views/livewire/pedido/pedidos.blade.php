<div>
    <div class="flex justify-between flex-wrap mb-4 m-7">
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
                    class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Pesquisar Pedido">
            </div>
        </div>
        <button wire:click="novoPedido()"
            class="flex flex-row gap-2 text-gray-600 font-semibold border p-2 rounded-md bg-white hover:bg-gray-50 hover:shadow-lg">
            <svg class="w-6 h-6 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 19 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm1-4H5m0 0L3 4m0 0h5.501M3 4l-.792-3H1m11 3h6m-3 3V1" />
            </svg>
            Novo Pedido
        </button>
    </div>

    <div class="mx-7 relative overflow-x-auto shadow-md rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 ">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Cliente
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Descrição
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Forma de Pagamento
                    </th>

                    <th scope="col" class="px-6 py-3 text-center">
                        Status
                    </th>

                    <th scope="col" class="px-6 py-3 text-center">

                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $pedido->id }}
                        </th>
                        <th scope="row" class="px-6 py-4 text-center font-semibold text-gray-600 whitespace-nowrap">
                            {{ $pedido->cliente->nome }}
                        </th>
                        <td class="px-6 py-4 text-center font-semibold">
                            {{ $pedido->descricao }}
                        </td>
                        <td class="px-6 py-4 text-center font-semibold">
                            {{ $pedido->formaPagamento->nome }}
                        </td>

                        <td class="px-6 py-4 text-center text-gray-400 font-semibold">
                            {{ $pedido->status }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button wire:click="visualizarPedido({{ $pedido->id }})"
                                class="font-semibold text-blue-500 hover:underline">
                                Adicionar Itens
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
                            class="bg-gray-50 border border-gray-300 text-gray-600 text-md font-semibold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-44 p-2.5 ">
                            <option selected></option>

                            @foreach ($formasPagamentos as $formaPagamento)
                                <option value="{{ $formaPagamento->id }}" class="font-semibold text-md text-gray-600">
                                    {{ $formaPagamento->nome }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="m-3">
                        <textarea wire:model="descricao" id="message" rows="4"
                            class="block p-2.5 w-full font-semibold text-md text-gray-600 bg-gray-50 rounded-lg border border-gray-300 focus:border-blue-500 "
                            placeholder="Adicione uma descrição..."></textarea>
                    </div>

                    <div class="flex justify-center m-4">
                        <button type="submit"
                            class="p-2 border rounded text-md font-semibold bg-white hover:shadow-xl hover:text-white hover:bg-blue-500">Criar
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
                    <div class="flex justify-center flex-wrap m-3">
                        @foreach ($clientes as $cliente)
                            <div wire:click="selecioneCliente({{ $cliente->id }})"
                                class="m-2 p-2 text-gray-400 shadow border rounded w-44 hover:bg-gray-100 hover:shadow-xl hover:border-2 cursor-pointer">
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
            <div class="fixed top-11 bg-gray-50 border shadow-2xl rounded-lg sm:top-28 sm:w-1/2">
                <div>
                    <button wire:click="fecharPedido()"
                        class="p-1 m-1 border rounded float-right hover:text-white hover:bg-red-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <h1 class="text-xl font-semibold text-center m-3">Pedido</h1>

                <form wire:submit.prevent="">

                    <div class="m-3 flex justify-between items-center">
                        <div>
                            <label for="pagamento" class="block mb-2 text-xl font-semibold text-gray-900 ">Forma de
                                Pagamento</label>
                            <select wire:model="formaDePagamento" id="pagamento"
                                class="bg-gray-50 border border-gray-300 text-gray-600 text-md font-semibold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-44 p-1 ">
                                <option selected></option>

                                @foreach ($formasPagamentos as $formaPagamento)
                                    <option value="{{ $formaPagamento->id }}"
                                        class="font-semibold text-md text-gray-600">
                                        {{ $formaPagamento->nome }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="">
                            <button wire:click="telaItens()"
                                class="p-1 border rounded font-semibold text-gray-600 hover:bg-blue-500 hover:text-white">
                                Adicionar Itens
                            </button>
                        </div>
                    </div>

                    <div class="m-3">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs font-semibold text-gray-700 uppercase bg-gray-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nome Item
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Descrição
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Marca
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Preço
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-gray-200 font-semibold">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50">

                                        </th>
                                        <td class="px-6 py-4 bg-white">
                                            Black
                                        </td>
                                        <td class="px-6 py-4 bg-gray-50">
                                            Accessories
                                        </td>
                                        <td class="px-6 py-4 bg-white">
                                            $99
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="m-3">
                        <textarea wire:model="descricao" id="message" rows="3"
                            class="block p-2.5 w-full font-semibold text-md text-gray-600 bg-gray-50 rounded-lg border border-gray-300 focus:border-blue-500 "
                            placeholder="Adicione uma descrição..."></textarea>
                    </div>

                    <div class="flex justify-center m-4">
                        <button type="submit"
                            class="p-2 border rounded text-md font-semibold bg-white hover:shadow-xl hover:text-white hover:bg-blue-500">Finalizar
                            Pedido</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    @if ($showItem)
        <div class="flex justify-center">
            <div class="fixed top-11 bg-gray-50 border shadow-2xl rounded-lg sm:top-28 sm:w-1/2">
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

                <h1 class="text-xl font-semibold text-center m-3">Itens</h1>

                <div class="flex justify-center flex-wrap gap-3 m-3">
                    @foreach ($itens as $item)
                        <div wire:click="adicionarItem({{ $item->id }})"
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
</div>
