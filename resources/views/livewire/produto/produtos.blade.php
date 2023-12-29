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
        <button wire:click="show()"
            class="flex justify-center w-full sm:w-44 gap-2 text-white font-semibold border p-3 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 dark:border-none">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            Novo Produto
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
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr wire:key="{{ $produto->id }}" wire:click="show({{ $produto->id }})"
                        class="bg-white border-b hover:bg-gray-50 dark:text-gray-100 dark:bg-gray-500 dark:hover:bg-gray-600 dark:border-gray-400 cursor-pointer">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray-200">
                            {{ $produto->id }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray-200">
                            {{ $produto->nome }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $produto->descricao }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $produto->marca }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $produto->unidadeMedida->nome }}
                        </td>
                        <td class="px-6 py-4">
                            {{ number_format($produto->preco_1, '2', ',') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ number_format($produto->valor_custo, '2', ',') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mx-5 mt-2">
        {{ $produtos->links('layouts.paginate') }}
    </div>

    @if ($modal)
        <x-modal-web title="Produto">
            @slot('body')
                <button wire:click.prevent="closeModal()"
                    class=" absolute right-2 top-4 p-1 m-1 border rounded hover:text-white hover:bg-red-500 hover:border-red-500 dark:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>

                <div x-data="{ form: 'dados' }">

                    <div class="mx-5 flex gap-4 font-semibold text-gray-700 dark:text-white">
                        <button
                            :class="{ 'active font-bold text-blue-400': form === 'dados' }"
                            class="hover:text-blue-500" x-on:click="form = 'dados'">
                            Dados
                        </button>
                        <button :class="{ 'active font-bold text-blue-400': form === 'precificacao' }"
                            class="hover:text-blue-500" x-on:click="form = 'precificacao'">
                            Precificação
                        </button>
                    </div>

                    <div x-show="form ==='dados'">
                        <div class="flex justify-center">
                            <form wire:submit.prevent="{{ $form->codigoProduto ? 'update()' : 'save()' }}"
                                class="w-full max-w-2xl font-semibold m-2">
                                <div class="flex flex-wrap mb-2 md:mb-3">
                                    <div class="w-full px-3">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 dark:text-white"
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
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 dark:text-white"
                                            for="grid-first-name">
                                            Descrição
                                        </label>
                                        <input wire:model="form.descricao"
                                            class="appearance-none block w-full bg-white text-gray-700 border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                                            id="grid-first-name" type="text" placeholder="">

                                    </div>
                                </div>
                                <div class="flex flex-wrap sm:m-1">
                                    <div class="w-44 px-3">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 dark:text-white"
                                            for="grid-city">
                                            Marca
                                        </label>
                                        <input wire:model="form.marca"
                                            class="appearance-none block w-full font-semibold text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none dark:bg-gray-300"
                                            id="grid-city" type="text" placeholder="">
                                    </div>
                                    <div class="w-44 px-3">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 dark:text-white"
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
                                    <div class="flex justify-center">
                                        <button type="submit"
                                            class="flex flex-row gap-2 text-white font-semibold border p-3 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 cursor-pointer dark:border-none">
                                            {{ $form->codigoProduto ? 'Salvar' : 'Cadastrar' }}

                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div x-show="form ==='precificacao'">
                        <div class="flex sm:flex-col mx-3 my-3">
                            <div class="flex flex-wrap mb-2 ">
                                <div class="w-44 px-3 md:mb-0">
                                    <label
                                        class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                        for="grid-city">
                                        Estoque
                                    </label>
                                    <input
                                        class="appearance-none block w-full text-gray-700 font-semibold border-2 border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none dark:bg-gray-300"
                                        id="grid-city" type="text" placeholder="" disabled>
                                </div>

                                <div class="w-44 px-3 md:mb-0">
                                    <label
                                        class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                        for="grid-city">
                                        Valor De Custo
                                    </label>
                                    <input wire:model.live="form.vlcusto"
                                        class="appearance-none block w-full text-gray-700 font-semibold border-2 border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none dark:bg-gray-300"
                                        id="grid-city" type="text" placeholder="">
                                </div>
                            </div>

                            <div class="flex flex-wrap">

                                <div class="w-44 px-3 md:mb-0">
                                    <label
                                        class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                        for="grid-city">
                                        Preço 1
                                    </label>
                                    <input wire:model.live="form.preco1"
                                        class="appearance-none block w-full text-gray-700 font-semibold border-2 border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none dark:bg-gray-300"
                                        id="grid-city" type="text" placeholder="">
                                </div>

                                <div class="w-44 px-3 md:mb-0">
                                    <label
                                        class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                        for="grid-city">
                                        Preço 2
                                    </label>
                                    <input wire:model.live="form.preco2"
                                        class="appearance-none block w-full text-gray-700 font-semibold border-2 border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none dark:bg-gray-300"
                                        id="grid-city" type="text" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endslot
        </x-modal-web>
    @endif

</div>
