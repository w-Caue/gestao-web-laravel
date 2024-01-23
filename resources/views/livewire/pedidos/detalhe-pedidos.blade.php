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
                    <button class="bg-gray-700 p-1 rounded-lg">{{ $form->pedido->formaPagamento->nome }}</button>
                </div>
            </div>
            <div class="m-2">
                <p class="text-sm">{{ date('d/m/Y', strtotime($form->pedido->created_at)) }}</p>
            </div>
        </div>

        <div class="my-3">
            <button x-data x-on:click.prevent="$dispatch('open-detalhes')"
                class="flex justify-center w-full sm:w-44 gap-2 text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 dark:border-none">

                Adicionar Itens
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
                        @foreach ($form->pedido->produtos as $produtos)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">
                                    {{ $produto->id }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div>
                                            <p class="font-semibold">{{ $produto->nome }}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                {{ $produto->descricao }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $produto->marca->nome }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{ number_format($produto->preco_1, 2, ',', '.') }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $produto->quantidade }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ number_format($produto->total, 2, ',', '.') }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-2 text-sm">
                                        <button
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

                <button wire:click="pedidoProdutos()" class="p-2 bg-blue-500 rounded">
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </button>
            </div>

            <div class="flex justify-center flex-wrap gap-3 m-3 ">
                <div class="w-full mt-3 overflow-hidden rounded-lg shadow-lg border border-gray-700 hidden sm:block">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">#</th>
                                    <th class="px-4 py-3">Nome</th>
                                    <th class="px-4 py-3">Marca</th>
                                    <th class="px-4 py-3">Código de Barras</th>
                                    <th class="px-4 py-3">Preço</th>
                                    <th class="px-4 py-3">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @foreach ($produtos as $produto)
                                    <tr wire:click="detalheProduto({{ $produto->id }})" class="text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                        <td class="px-4 py-3 text-sm">
                                            {{ $produto->id }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <!-- Avatar with inset shadow -->
                                                <div>
                                                    <p class="font-semibold">{{ $produto->nome }}</p>
                                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                                        {{ $produto->descricao }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            @if ($produto->marca)
                                                {{ $produto->marca->nome }}
                                            @else
                                                Sem Marca
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $produto->codigo_barras }}
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                {{ number_format($produto->preco_1, 2, ',', '.') }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center space-x-2 text-sm">
                                                <a href="{{ route('produto.show', ['codigo' => $produto->id]) }}"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 20 20" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endslot
    </x-modal-detalhes>
</div>
