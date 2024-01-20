<div x-cloak x-data="{ form: 'cadastro' }">

    <div class="flex gap-2 mx-2 text-lg text-gray-700 dark:text-white">
        <button :class="{ 'active font-bold rounded-t bg-white dark:bg-gray-800': form === 'cadastro' }"
            class="p-1 font-semibold" x-on:click="form = 'cadastro'">
            Cadastro
        </button>

        <button :class="{ 'active font-bold rounded-t bg-white dark:bg-gray-800': form === 'estoque' }"
            class="p-1 font-semibold" x-on:click="form = 'estoque'">
            Estoque
        </button>

    </div>

    <div class="mx-2">
        <div class=" rounded-tr-lg bg-white dark:bg-gray-800">
            <button wire:click="update()"
                class="m-2 w-20 gap-2 text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-purple-600 dark:border-none">
                Salvar
            </button>
        </div>
        <form
            class="w-full font-semibold rounded-b-lg  text-sm text-gray-700 bg-white dark:text-white dark:bg-gray-800">
            <div x-show=" form === 'cadastro'">
                <div class="flex justify-between flex-wrap gap-4 px-3 py-2">

                    <label class="uppercase tracking-wide font-bold" for="grid-first-name">
                        <span>Código</span>

                        <input wire:model="form.codigoProduto"
                            class="appearance-none block w-20 text-gray-700 bg-white border-2 border-gray-300 rounded py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                            id="grid-first-name" type="text" disabled>

                    </label>
                </div>

                <div class="px-3">
                    <label class="flex flex-col uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                        <span>Nome</span>

                        <input wire:model.live="form.nome"
                            class="block appearance-none w-full text-gray-700 bg-white border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                            id="grid-first-name" type="text">

                        @error('form.nome')
                            <span class="error dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div class="px-3">
                    <label class="flex flex-col uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                        <span>Descrição</span>

                        <input wire:model.defer="form.descricao"
                            class="appearance-none block w-full  text-gray-700 bg-white border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                            id="grid-first-name" type="text" placeholder="">

                        @error('form.email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div class="flex flex-wrap items-end">
                    <div class="w-32 sm:w-44 px-3">
                        <label
                            class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                            for="grid-state">
                            Unidade de Medida
                        </label>
                        <div class="relative">
                            <select wire:model="form.unidadeMedida"
                                class="appearance-none block w-full text-gray-700 bg-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-100 dark:bg-gray-300"
                                id="grid-state">
                                <option value=""></option>

                                @foreach ($unidadeMedidas as $medida)
                                    <option class="font-semibold" value="{{ $medida->id }}">
                                        {{ $medida->nome }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="w-32 sm:w-44 px-3">
                        <label
                            class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                            for="grid-state">
                            Marca
                        </label>
                        <div class="relative">
                            <select wire:model="form.marca"
                                class="appearance-none block w-full text-gray-700 bg-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-100 dark:bg-gray-300"
                                id="grid-state">
                                <option value=""></option>

                                @foreach ($marcas as $marca)
                                    <option class="font-semibold" value="{{ $marca->id }}">
                                        {{ $marca->nome }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="w-48 px-3">
                        <label class="block uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                            Código de Barras
                        </label>
                        <input wire:model="form.codigoBarras"
                            class="appearance-none block w-full text-gray-700 bg-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-100 dark:bg-gray-300"
                            id="grid-first-name" type="text" placeholder="">

                        @error('form.codigoBarras')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-wrap items-end">
                        <div class="w-32 sm:w-44 px-3">
                            <label
                                class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                for="grid-state">
                                Grupo
                            </label>
                            <div class="relative">
                                <select wire:model="form.grupo"
                                    class="appearance-none block w-full text-gray-700 bg-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-100 dark:bg-gray-300"
                                    id="grid-state">
                                    <option value=""></option>

                                    @foreach ($grupos as $grupo)
                                        <option class="font-semibold" value="{{ $grupo->id }}">
                                            {{ $grupo->nome }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="w-32 sm:w-44 px-3">
                            <label
                                class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                for="grid-state">
                                Sub-Grupo
                            </label>
                            <div class="relative">
                                <select wire:model="form.subgrupo"
                                    class="appearance-none block w-full text-gray-700 bg-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-100 dark:bg-gray-300"
                                    id="grid-state">
                                    <option value=""></option>

                                    @foreach ($subgrupos as $subgrupo)
                                        <option class="font-semibold" value="{{ $subgrupo->id }}">
                                            {{ $subgrupo->nome }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show=" form === 'estoque'">
                <div class="flex flex-wrap items-end">
                    <div class="w-32 sm:w-44 px-3">
                        <label class="block uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                            Estoque
                        </label>
                        <input wire:model="form.estoque"
                            class="appearance-none block w-full text-gray-700 bg-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-100 dark:bg-gray-300"
                            id="grid-first-name" type="text" placeholder="">

                        @error('form.codigoBarras')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap items-end">
                    <div class="w-32 sm:w-44 px-3">
                        <label class="block uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                            Vl. de Custo
                        </label>
                        <input wire:model="form.vlCusto"
                            class="appearance-none block w-full text-gray-700 bg-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-100 dark:bg-gray-300"
                            id="grid-first-name" type="text" placeholder="">

                        @error('form.codigoBarras')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-32 sm:w-44 px-3">
                        <label class="block uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                            Vl. de Custo Real
                        </label>
                        <input wire:model="form.vlCustoReal"
                            class="appearance-none block w-full text-gray-700 bg-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-100 dark:bg-gray-300"
                            id="grid-first-name" type="text" placeholder="">

                        @error('form.codigoBarras')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-32 sm:w-44 px-3">
                        <label class="block uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                            Preço 1
                        </label>
                        <input wire:model="form.preco1"
                            class="appearance-none block w-full text-gray-700 bg-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-100 dark:bg-gray-300"
                            id="grid-first-name" type="text" placeholder="">

                        @error('form.codigoBarras')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-32 sm:w-44 px-3">
                        <label class="block uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                            Preço 2
                        </label>
                        <input wire:model="form.preco2"
                            class="appearance-none block w-full text-gray-700 bg-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-100 dark:bg-gray-300"
                            id="grid-first-name" type="text" placeholder="">

                        @error('form.codigoBarras')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
