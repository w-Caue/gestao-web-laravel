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
                    placeholder="Pesquisar Item">
            </div>
        </div>
        <button wire:click="novoItem()" class="flex flex-row gap-2 text-gray-600 font-semibold border p-2 rounded-md bg-white hover:bg-gray-50 hover:shadow-lg">
            <svg class="w-6 h-6 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            Novo Item
        </button>
    </div>

    <div class="mx-7 relative overflow-x-auto shadow-md rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
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
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $item->id }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $item->nome }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->descricao }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->marca }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->unidadeMedida->nome}}
                        </td>
                        <td class="px-6 py-4">
                            {{ number_format($item->preco_1, '2', ',') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ number_format($item->valor_custo, '2', ',') }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button wire:click="edit({{ $item->id }})" class="p-1 border rounded bg-blue-500">
                                <span class="text-md font-semibold text-white">Editar</span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($newItem)
        <div class="flex justify-center">
            <div class="fixed top-11 bg-white border shadow-2xl rounded-lg sm:top-28 sm:w-3/4">

                <div>
                    <button wire:click="fecharItem()"
                        class="p-1 m-1 border rounded float-right hover:text-white hover:bg-red-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <h1 class="text-xl font-semibold text-center m-3">Item</h1>

                <div class="flex justify-center m-2">
                    <form wire:submit.prevent="{{$form->itemId ? 'update()' : 'save()' }}" class="w-full max-w-2xl">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full  px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Nome
                                </label>
                                <input wire:model="form.nome"
                                    class="appearance-none block w-full bg-white text-gray-700 border border-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name" type="text" placeholder="">

                            </div>

                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full  px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Descrição
                                </label>
                                <input wire:model="form.descricao"
                                    class="appearance-none block w-full bg-white text-gray-700 border border-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name" type="text" placeholder="">

                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 m-7">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-city">
                                    Marca
                                </label>
                                <input wire:model="form.marca"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-city" type="text" placeholder="">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-state">
                                    Unidade de Medida
                                </label>
                                <div class="relative">
                                    <select wire:model="form.unidadeMedida"
                                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-state">
                                        <option value=""></option>

                                        @foreach ($unidadeMedidas as $medida)
                                            <option value="{{ $medida->id }}">{{ $medida->nome }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <a wire:click="precificacao"
                                class="text-gray-700 font-semibold p-3 border rounded cursor-pointer">
                                Precificação
                            </a>
                            <div class="flex justify-center">
                                <button type="submit"
                                    class="text-white  bg-blue-500 font-semibold p-2 border rounded">
                                    {{$form->itemId ? 'Salvar' : 'Cadastrar' }}
                                    
                                </button>
                            </div>
                        </div>

                        @if ($precoItem)
                            <div class="flex justify-center">
                                <div class="fixed top-20 bg-white  border shadow-2xl rounded-lg sm:top-28 w-3/4">
                                    <div class="">
                                        <button wire:click.prevent="precificacao()"
                                            class="p-1 m-1 border rounded float-right hover:text-white hover:bg-red-500">
                                            <svg class="w-6 h-6" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12.5 4.046H9V2.119c0-.921-.9-1.446-1.524-.894l-5.108 4.49a1.2 1.2 0 0 0 0 1.739l5.108 4.49C8.1 12.5 9 11.971 9 11.051V9.123h2a3.023 3.023 0 0 1 3 3.046V15a5.593 5.593 0 0 0-1.5-10.954Z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <h1 class="text-xl font-semibold text-center m-7">Precificação</h1>

                                    <div class="flex justify-center">
                                        <div class="w-full max-w-2xl m-4">

                                            <div class="flex flex-wrap -mx-3 mb-2 ">
                                                <div class="w-full md:w-1/3 px-3 md:mb-0">
                                                    <label
                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                        for="grid-city">
                                                        Estoque
                                                    </label>
                                                    <input
                                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                        id="grid-city" type="text" placeholder="" disabled>
                                                </div>


                                                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                                    <label
                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                        for="grid-city">
                                                        Valor De Custo
                                                    </label>
                                                    <input wire:model.live="form.vlcusto"
                                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                        id="grid-city" type="text" placeholder="">
                                                </div>
                                            </div>

                                            <div class="flex flex-wrap -mx-3 m-7">

                                                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                                    <label
                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                        for="grid-city">
                                                        Preço 1
                                                    </label>
                                                    <input wire:model.live="form.preco1"
                                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                        id="grid-city" type="text" placeholder="">
                                                </div>

                                                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                                    <label
                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                        for="grid-city">
                                                        Preço 2
                                                    </label>
                                                    <input wire:model.live="form.preco2"
                                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                        id="grid-city" type="text" placeholder="">
                                                </div>

                                                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                                    <label
                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                        for="grid-city">
                                                        Preço 3
                                                    </label>
                                                    <input wire:model.live="form.preco3"
                                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
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
