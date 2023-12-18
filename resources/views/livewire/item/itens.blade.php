<div>

    <div class="flex justify-between flex-wrap my-2 mx-7">
        <div class="mb-4 md:mb-0">
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
                    class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 dark:bg-gray-600 dark:text-white"
                    placeholder="Pesquisar Item">
            </div>
        </div>
        <button wire:click="novoItem()"
            class="flex flex-row gap-2 text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 dark:border-none">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            Novo Item
        </button>
    </div>

    <div class="mx-7 relative overflow-x-auto shadow-md rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-white">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:text-white dark:bg-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Descrição
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Marca
                    </th>
                    <th scope="col" class="px-6 py-3  ">
                        Unidade de Medida
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Preço
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Vl. Custo
                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($itens as $item)
                    <tr class="bg-white border-b hover:bg-gray-50 dark:text-gray-100 dark:bg-gray-500 dark:hover:bg-gray-600 dark:border-gray-400">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray-200">
                            {{ $item->id }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray-200">
                            {{ $item->nome }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->descricao }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->marca }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->unidadeMedida->nome }}
                        </td>
                        <td class="px-6 py-4">
                            {{ number_format($item->preco_1, '2', ',') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ number_format($item->valor_custo, '2', ',') }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button wire:click="edit({{ $item->id }})" class="text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 dark:border-none">
                                <span class="text-md font-semibold text-white">Editar</span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mx-5 mt-2">
        {{ $itens->links('layouts.paginate') }}
    </div>

    @if ($newItem)
        <div class="flex justify-center ">
            <div class="fixed top-11 w-80 bg-gray-50 border shadow-2xl rounded-lg sm:top-14 sm:w-1/2 h-auto dark:bg-gray-600 dark:border-gray-400 dark:border-none">

                <div class="py-3 flex items-center justify-between mx-3 my-2">
                    <h1 class="text-xl font-semibold text-center dark:text-white">Item</h1>
                    <button wire:click="fecharItem()"
                        class="p-1 border rounded hover:text-white hover:bg-red-500 dark:text-white">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <div class="flex justify-center m-2">
                    <form wire:submit.prevent="{{ $form->itemId ? 'update()' : 'save()' }}"
                        class="w-full max-w-2xl font-semibold">
                        <div class="flex flex-wrap mb-2 md:mb-3">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 dark:text-white"
                                    for="grid-first-name">
                                    Nome
                                </label>
                                <input wire:model="form.nome"
                                    class="appearance-none block w-full bg-white text-gray-700 border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                                    id="grid-first-name" type="text" placeholder="">

                            </div>

                        </div>
                        <div class="flex flex-wrap mb-2 md:mb-3">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 dark:text-white"
                                    for="grid-first-name">
                                    Descrição
                                </label>
                                <input wire:model="form.descricao"
                                    class="appearance-none block w-full bg-white text-gray-700 border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                                    id="grid-first-name" type="text" placeholder="">

                            </div>
                        </div>
                        <div class="flex flex-wrap m-1">
                            <div class="w-44 md:w-1/3 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 dark:text-white"
                                    for="grid-city">
                                    Marca
                                </label>
                                <input wire:model="form.marca"
                                    class="appearance-none block w-full font-semibold text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none dark:bg-gray-300"
                                    id="grid-city" type="text" placeholder="">
                            </div>
                            <div class="w-44 md:w-1/3 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 dark:text-white"
                                    for="grid-state">
                                    Unidade de Medida
                                </label>
                                <div class="relative">
                                    <select wire:model="form.unidadeMedida"
                                        class="block appearance-none w-full border border-gray-200 font-semibold text-gray-600 py-3 px-4 pr-8 rounded leading-tight focus:outline-none dark:bg-gray-300"
                                        id="grid-state">
                                        <option value=""></option>

                                        @foreach ($unidadeMedidas as $medida)
                                            <option class="font-semibold" value="{{ $medida->id }}">
                                                {{ $medida->nome }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="my-5 ml-4">
                            <a wire:click="precificacao"
                                class="flex flex-row gap-2 w-40 text-white font-semibold border p-2 rounded-md bg-green-500 transition-all duration-300 hover:scale-95 hover:bg-green-600 cursor-pointer dark:border-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                                Precificação
                            </a>
                            <div class="flex justify-center">
                                <button type="submit"
                                    class="flex flex-row gap-2 text-white font-semibold border p-3 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 cursor-pointer dark:border-none">
                                    {{ $form->itemId ? 'Salvar' : 'Cadastrar' }}

                                </button>
                            </div>
                        </div>

                        @if ($precoItem)
                            <div class="flex justify-center">
                                <div class="fixed top-20 bg-white border shadow-2xl rounded-lg sm:top-28 w-96 dark:bg-gray-600 dark:border-gray-500">
                                    <div class="flex justify-between m-2">
                                        <h1 class="text-xl font-semibold text-center text-gray-600 dark:text-white">Precificação</h1>

                                        <button wire:click.prevent="precificacao()"
                                            class="p-1 border rounded  hover:text-white hover:bg-red-500 dark:text-white">
                                            <svg class="w-6 h-6" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12.5 4.046H9V2.119c0-.921-.9-1.446-1.524-.894l-5.108 4.49a1.2 1.2 0 0 0 0 1.739l5.108 4.49C8.1 12.5 9 11.971 9 11.051V9.123h2a3.023 3.023 0 0 1 3 3.046V15a5.593 5.593 0 0 0-1.5-10.954Z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="flex justify-center">
                                        <div class="flex flex-col m-4">

                                            <div class="flex flex-wrap -mx-3 mb-2 ">
                                                <div class="w-36 px-3 md:mb-0">
                                                    <label
                                                        class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                                        for="grid-city">
                                                        Estoque
                                                    </label>
                                                    <input
                                                        class="appearance-none block w-full text-gray-700 border-2 border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none dark:bg-gray-300"
                                                        id="grid-city" type="text" placeholder="" disabled>
                                                </div>


                                                <div class="w-44 px-3 md:mb-0">
                                                    <label
                                                        class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                                        for="grid-city">
                                                        Valor De Custo
                                                    </label>
                                                    <input wire:model.live="form.vlcusto"
                                                        class="appearance-none block w-full text-gray-700 border-2 border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none dark:bg-gray-300"
                                                        id="grid-city" type="text" placeholder="">
                                                </div>
                                            </div>

                                            <div class="flex flex-wrap -mx-3 m-7">

                                                <div class="w-44 px-3 md:mb-0">
                                                    <label
                                                        class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                                        for="grid-city">
                                                        Preço 1
                                                    </label>
                                                    <input wire:model.live="form.preco1"
                                                        class="appearance-none block w-full text-gray-700 border-2 border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none dark:bg-gray-300"
                                                        id="grid-city" type="text" placeholder="">
                                                </div>

                                                <div class="w-44 px-3 md:mb-0">
                                                    <label
                                                        class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                                        for="grid-city">
                                                        Preço 2
                                                    </label>
                                                    <input wire:model.live="form.preco2"
                                                        class="appearance-none block w-full text-gray-700 border-2 border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none dark:bg-gray-300"
                                                        id="grid-city" type="text" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif

                    </form>
                </div>

            </div>
        </div>
    @endif

</div>
