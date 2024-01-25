<div>
    <div class="mx-2">
        <div
            class="flex justify-between mb-7 w-full font-semibold rounded-lg text-lg text-gray-700 bg-white dark:text-white dark:bg-gray-800">
            <div class="m-2">
                <p class="text-purple-500">#{{ $form->pedido->id }}</p>
                <span class="">Cliente: {{ $form->pedido->pessoa->nome }}</span>
                <h1 class="text-gray-500">{{ $form->pedido->descricao ?? 'Sem Descrição' }}</h1>

                <div class="">
                    <span class="">Forma de Pagamento:</span>
                    <button
                        class="bg-gray-300 dark:bg-gray-700 p-1 rounded-lg">{{ $form->pedido->formaPagamento->nome }}</button>
                </div>
            </div>
            <div class="m-2">
                <p class="text-sm">{{ date('d/m/Y', strtotime($form->pedido->created_at)) }}</p>
            </div>
        </div>

        <div class="my-3">
            <button x-data x-on:click.prevent="$dispatch('open-detalhes')"
                class="flex justify-center w-full sm:w-32 gap-2 text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 dark:border-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>

                 Itens
            </button>
        </div>

        <div class="w-full mt-3 overflow-hidden rounded-lg shadow-xs hidden sm:block">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Item</th>
                            <th class="px-4 py-3">Marca</th>
                            <th class="px-4 py-3">Preço</th>
                            <th class="px-4 py-3">Quantidade</th>
                            <th class="px-4 py-3">Total</th>
                            <th class="px-4 py-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($form->pedido->produtos as $item)
                            <tr wire:key="{{ $item->id }}" class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">
                                    {{ $item->id }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div>
                                            <p class="font-semibold">{{ $item->nome }}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                {{ $item->descricao }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $item->marca->nome ?? 'Sem' }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{ number_format($item->preco_1, 2, ',', '.') }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $item->pivot->quantidade }}
                                </td>
                                <td class="px-4 py-3 text-sm text-center">
                                    {{ number_format($item->pivot->total, 2, ',', '.') }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-2 text-sm">
                                        <button wire:click="removerProduto({{ $item->id }})"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg hover:scale-95 dark:hover:text-purple-600
                                             dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
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
    </div>

    <x-modal-detalhes name="produtos" title="Produtos">
        @slot('body')
            <div class="flex justify-center items-center m-4 gap-1">
                <input wire:model.live="search" type="text" id="table-search"
                    class="p-2 pl-10 text-sm text-gray-600 font-semibold rounded-lg sm:w-80 bg-white dark:bg-gray-800 dark:text-white"
                    placeholder="Pesquisar Produto">

                <button wire:click="produtos()" class="p-2 bg-blue-500 rounded">
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </button>
            </div>

            @if ($produtos)
                <div class="flex flex-wrap gap-4 justify-center">
                    @foreach ($produtos as $produto)
                        <div wire:key="{{ $produto->id }}" wire:click="produtoPedido({{ $produto->id }})"
                            class=" w-56 text-md font-semibold text-gray-700 p-2 my-1 bg-gray-100 border rounded-lg hover:scale-95 transition-all dark:border-gray-700 dark:text-white dark:bg-gray-700 cursor-pointer">
                            <span class="text-blue-500">#{{ $produto->id }}</span>

                            <div class="flex justify-between my-1">
                                <p class="flex flex-wrap">{{ $produto->nome }}</p>
                                <p class="text-gray-600 dark:text-gray-400">{{ $produto->marca->nome ?? '' }}</p>
                            </div>

                            <p class="flex flex-wrap text-sm text-gray-600 dark:text-gray-400">{{ $produto->descricao }}
                            </p>

                            <div class="flex justify-between items-center mt-2">
                                @if ($produto->preco_1 > 0)
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-300 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{ number_format($produto->preco_1, 2, ',') }}
                                    </span>
                                @else
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-300 rounded-full dark:bg-red-700 dark:text-green-100">
                                        {{ $produto->preco_1 }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    <div class="mx-7 mt-2">
                        {{ $produtos->links('layouts.paginate') }}
                    </div>

                </div>
            @endif

        @endslot
    </x-modal-detalhes>

    <div class="flex justify-center">
        <div x-data="{ open: false }" x-show="open" x-cloak x-on:open-produto.window="open = true"
            x-on:close-produto.window="open = false" x-on:keydown.escape.window="open = false"
            x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
            <div x-on:click ="open = false" class="fixed">
            </div>
            <div
                class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl">
                <div class="flex justify-between m-1 text-purple-600 dark:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path
                            d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                    </svg>
                    {{-- <button
                        class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                        aria-label="close" x-on:click="open = false">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img"
                            aria-hidden="true">
                            <path
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button> --}}
                </div>

                <div class="grid grid-cols-2 my-4">
                    <div>

                    </div>
                    <div class="flex flex-col gap-3 dark:text-white">
                        <button x-on:click="open = false"
                            class="flex justify-center w-56 gap-2 py-2 border rounded font-semibold text-purple-600 dark:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                            </svg>
                            <span>Voltar ao Itens</span>
                        </button>

                        <h1 class="text-lg font-semibold">{{ $produtoDetalhe->nome ?? '' }}</h1>
                        <p class="text-sm font-semibold text-gray-400">{{ $produtoDetalhe->descricao ?? '' }}</p>
                        {{-- <p class="text-lg text-green-400">R${{ number_format($produtoDetalhe->preco_1, 2, ',')}}</p> --}}
                        <p class="text-lg text-green-400">R${{ $produtoDetalhe->preco_1 ?? '' }}</p>

                        <div>
                            <p>Quant.</p>
                            <input wire:model.live="quantidade" type="number" value="1"
                                class="w-14 text-purple-600 font-semibold bg-gray-100 rounded-lg dark:text-gray-700">
                        </div>

                        <button wire:click="adicionarProduto()"
                            class="flex justify-center w-56 gap-2 py-2 font-semibold text-purple-600 border rounded dark:text-white">
                            <span>Adicionar ao Pedido</span>

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-5 h-5">
                                <path
                                    d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
