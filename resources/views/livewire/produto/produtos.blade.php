<div>

    <button x-data x-on:click="$dispatch('open-modal')"
        class="flex justify-center w-44 gap-2 text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 dark:border-none">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
        </svg>

        Novo Produto
    </button>

    <x-modal-web title="Cadastro Rapido">
        @slot('body')
            <button x-on:click="$dispatch('close-modal')"
                class=" absolute right-2 top-4 p-1 m-1 border rounded hover:text-white hover:bg-red-500 hover:border-red-500 dark:text-white">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>

            <div>
                <div class="flex justify-center">
                    <form wire:submit.prevent="save()"
                        class="w-full max-w-2xl font-semibold m-2 text-sm rounded-lg text-gray-700 bg-white dark:text-white dark:bg-gray-700">
                        <div class="flex flex-wrap mt-3 md:mb-3">
                            <div class="w-full px-3">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                    for="grid-first-name">
                                    Nome
                                </label>
                                <input wire:model="form.nome"
                                    class="appearance-none block w-full text-gray-700 bg-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-100 dark:bg-gray-400"
                                    id="grid-first-name" type="text" placeholder="">

                            </div>

                        </div>
                        <div class="flex flex-wrap mb-2 md:mb-3">
                            <div class="w-full px-3">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                    for="grid-first-name">
                                    Descrição
                                </label>
                                <input wire:model="form.descricao"
                                    class="appearance-none block w-full text-gray-700 bg-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-100 dark:bg-gray-400"
                                    id="grid-first-name" type="text" placeholder="">

                            </div>
                        </div>
                        <div class="flex flex-wrap items-end sm:m-1">
                            <div class="w-44 px-3">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                    for="grid-state">
                                    Unidade de Medida
                                </label>
                                <div class="relative">
                                    <select wire:model="form.unidadeMedida"
                                        class="appearance-none block w-full text-gray-700 bg-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-100 dark:bg-gray-400"
                                        id="grid-state">
                                        <option value=""></option>

                                        @foreach ($unidadeMedidas as $medida)
                                            <option class="font-semibold" value="{{ $medida->id }}">
                                                {{ $medida->nome }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="w-44 px-3">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                    for="grid-state">
                                    Marca
                                </label>
                                <div class="relative">
                                    <select wire:model="form.unidadeMedida"
                                        class="appearance-none block w-full text-gray-700 bg-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-100 dark:bg-gray-400"
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
                        <div class="flex flex-wrap items-end sm:m-1">
                            <div class="w-44 px-3 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                    for="grid-city">
                                    Valor De Custo
                                </label>
                                <input wire:model.live="form.vlcusto"
                                    class="appearance-none block w-full text-gray-700 bg-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-100 dark:bg-gray-400"
                                    id="grid-city" type="text" placeholder="">
                            </div>

                            <div class="w-44 px-3 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                    for="grid-city">
                                    Preço
                                </label>
                                <input wire:model.live="form.preco1"
                                    class="appearance-none block w-full text-gray-700 bg-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-100 dark:bg-gray-400"
                                    id="grid-city" type="text" placeholder="">
                            </div>
                        </div>

                        <div class="flex justify-center">
                            <button
                                class="text-white text-lg font-semibold border p-2 my-2 rounded-md bg-green-600 transition-all duration-300 hover:scale-95 hover:bg-green-700 dark:border-none">
                                Cadastrar
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        @endslot
    </x-modal-web>
</div>
