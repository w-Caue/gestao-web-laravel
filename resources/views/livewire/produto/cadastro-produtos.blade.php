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
                        <p>Código</p>

                        <x-input wire:model="form.codigoProduto" class="w-16" disabled></x-input>

                    </label>
                </div>

                <div class="px-3">
                    <label class="flex flex-col uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                        <span>Nome</span>

                        <x-input wire:model="form.nome" class="w-full"></x-input>

                        @error('form.nome')
                            <span class="error dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div class="px-3">
                    <label class="flex flex-col uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                        <span>Descrição</span>

                        <x-input wire:model="form.descricao" class="w-full"></x-input>

                        @error('form.email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div class="flex flex-wrap gap-2 items-end px-3">

                    <label class="">
                        <p class="uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white">
                            Unidade de Medida
                        </p>

                        <select wire:model="form.unidadeMedida"
                            class="w-32 sm:w-44 p-3 pl-5 text-md text-gray-600 font-semibold rounded border shadow-sm bg-white dark:bg-gray-700 dark:text-white">
                            <option value=""></option>

                            @foreach ($unidadeMedidas as $medida)
                                <option
                                    class="text-sm text-gray-600 font-semibold bg-white dark:bg-gray-700 dark:text-white"
                                    value="{{ $medida->id }}">
                                    {{ $medida->nome }}</option>
                            @endforeach

                        </select>
                    </label>

                    <label>
                        <p class="uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white">
                            Marca
                        </p>

                        <select wire:model="form.marca"
                            class="w-32 sm:w-44 p-3 pl-5 text-md text-gray-600 font-semibold rounded border shadow-sm bg-white dark:bg-gray-700 dark:text-white">
                            <option value=""></option>

                            @foreach ($marcas as $marca)
                                <option
                                    class="text-sm text-gray-600 font-semibold bg-white dark:bg-gray-700 dark:text-white"
                                    value="{{ $marca->id }}">
                                    {{ $marca->nome }}</option>
                            @endforeach

                        </select>
                    </label>

                    <label class="">
                        <p class=" uppercase tracking-wide font-bold mb-2">
                            Código de Barras
                        </p>
                        <x-input wire:model="form.codigoBarras" class="w-44"></x-input>

                        @error('form.codigoBarras')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </label>

                    <div class="flex flex-wrap gap-4 items-end">
                        <label class="">
                            <p class="uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white">
                                Grupo
                            </p>

                            <select wire:model="form.grupo"
                                class="w-32 sm:w-44 p-3 pl-5 text-md text-gray-600 font-semibold rounded border shadow-sm bg-white dark:bg-gray-700 dark:text-white">
                                <option value=""></option>

                                @foreach ($grupos as $grupo)
                                    <option
                                        class="text-sm text-gray-600 font-semibold bg-white dark:bg-gray-700 dark:text-white"
                                        value="{{ $grupo->id }}">
                                        {{ $grupo->nome }}</option>
                                @endforeach

                            </select>
                        </label>

                        <label class="">
                            <p class=" uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white">
                                Sub-Grupo
                            </p>
                            <select wire:model="form.subgrupo"
                                class="w-32 sm:w-44 p-3 pl-5 text-md text-gray-600 font-semibold rounded border shadow-sm bg-white dark:bg-gray-700 dark:text-white">
                                <option value=""></option>

                                @foreach ($subgrupos as $subgrupo)
                                    <option
                                        class="text-sm text-gray-600 font-semibold bg-white dark:bg-gray-700 dark:text-white"
                                        value="{{ $subgrupo->id }}">
                                        {{ $subgrupo->nome }}</option>
                                @endforeach

                            </select>
                        </label>

                    </div>
                </div>
            </div>
            <div x-show=" form === 'estoque'">
                <div class="flex flex-wrap items-end px-3">
                    <label class=" ">
                        <p class="uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                            Estoque
                        </p>

                        <x-input wire:model="form.estoque" class="w-32" disabled></x-input>

                        @error('form.codigoBarras')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div class="flex flex-wrap items-end gap-2 px-3">
                    <label class="">
                        <p class="uppercase tracking-wide font-bold mb-2">
                            Vl. de Custo
                        </p>

                        <x-input wire:model="form.vlcusto" class="w-32 sm:w-44"></x-input>

                        @error('form.codigoBarras')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="">
                        <p class="uppercase tracking-wide font-bold mb-2">
                            Vl. de Custo Real
                        </p>

                        <x-input wire:model="form.vlcustoReal" class="w-32 sm:w-44"></x-input>

                        @error('form.vlcustoReal')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="">
                        <p class="uppercase tracking-wide font-bold mb-2">
                            Preço 1
                        </p>

                        <x-input wire:model="form.preco1" class="w-32 sm:w-44"></x-input>

                        @error('form.preco1')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="">
                        <p class="uppercase tracking-wide font-bold mb-2">
                            Preço 2
                        </p>

                        <x-input wire:model="form.preco2" class="w-32 sm:w-44"></x-input>

                        @error('form.preco2')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </label>

                </div>
            </div>
        </form>
    </div>
</div>
