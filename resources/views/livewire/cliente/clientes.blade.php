<div x-cloak x-data="{ form: 'cadastro' }">

    <button x-data x-on:click="$dispatch('open-modal')"
        class="flex justify-center w-full sm:w-44 gap-2 text-white font-semibold border p-3 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 dark:border-none">
        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
        </svg>
        Novo Cliente
    </button>

    <x-modal-web :javaScript="false" title="Cliente" wire:model="modal">

        @slot('body')
            <button x-on:click="$dispatch('close-modal')"
                class=" absolute right-2 top-4 p-1 m-1 border rounded hover:text-white hover:bg-red-500 hover:border-red-500">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>

            <div class="flex gap-2 mx-2 text-lg text-white">
                <button
                    :class="{ 'active font-bold text-blue-400 rounded-t bg-white dark:bg-gray-700': form === 'cadastro' }"
                    class="p-1 font-semibold" x-on:click="form = 'cadastro'">Cadastro</button>
                <button
                    :class="{ 'active font-bold text-blue-400 rounded-t bg-white dark:bg-gray-700': form === 'informacoes' }"
                    class="p-1 font-semibold" x-on:click="form = 'informacoes'">Mais Info.</button>

            </div>
            <div class="mx-2 flex justify-center">
                <form wire:submit.prevent="save()"
                    class="w-full max-w-2xl font-semibold rounded-b text-sm text-gray-700 bg-white dark:text-white dark:bg-gray-700">
                    <div x-show=" form === 'cadastro'">
                        <div class="flex px-3 my-3">
                            <label for="countries"
                                class="block uppercase tracking-wide font-bold mb-2">
                                <span>Tipo</span>

                                <div class="w-56 flex flex-wrap gap-3">
                                    <label for="">
                                        <input wire:model.live="cliente.tipo"
                                            class="h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-['']"
                                            type="checkbox" value="Empresa" id="checkboxChecked" />
                                        <span class="text-gray-600 dark:text-gray-300">Cliente</span>
                                    </label>
                                    <label for="">
                                        <input wire:model.live="cliente.tipo"
                                            class="h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-['']"
                                            type="checkbox" value="Empresa" id="checkboxChecked" />
                                        <span class="text-gray-600 dark:text-gray-300">Funcionario</span>
                                    </label>
                                    <label for="">
                                        <input wire:model.live="cliente.tipo"
                                            class="h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-['']"
                                            type="checkbox" value="Empresa" id="checkboxChecked" />
                                        <span class="text-gray-600 dark:text-gray-300">Empresa</span>
                                    </label>
                                </div>

                                @error('form.tipo')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>

                        <div class="w-full px-3">
                            <label
                                class="block uppercase tracking-wide font-bold mb-2"
                                for="grid-first-name">
                                Nome
                            </label>
                            <input wire:model="cliente.nome"
                                class="appearance-none block w-full text-gray-700 bg-white border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                                id="grid-first-name" type="text">

                            @error('cliente.nome')
                                <span class="error dark:text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full px-3">
                            <label
                                class="block uppercase tracking-wide font-bold mb-2"
                                for="grid-first-name">
                                Email
                            </label>
                            <input wire:model.defer="cliente.email"
                                class="appearance-none block w-full text-gray-700 bg-white border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                                id="grid-first-name" type="text" placeholder="">

                            @error('cliente.email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex gap-7 items-center ml-3">
                            <div class="flex flex-wrap -mx-3 m-4">
                                <div class="w-full px-3">
                                    <label
                                        class="block uppercase tracking-wide font-bold mb-2"
                                        for="grid-first-name">
                                        Whatsapp
                                    </label>
                                    <input wire:model="cliente.whatsapp"
                                        class="appearance-none block w-full text-gray-700 bg-white border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                                        id="grid-first-name" type="text" placeholder="">

                                    @error('cliente.whatsapp')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div x-show=" form === 'informacoes'">
                        <div class="flex flex-wrap gap-1">
                            <label class="m-2">
                                <span for="cep" class="font-semibold">CEP</span>
                                <div class="flex flex-row">
                                    <input wire:model.lazy="cep" type="number"
                                        class="appearance-none w-32 text-gray-700 bg-white border-2 border-gray-300 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300" id="cep"
                                        placeholder="">
                                    <button type="button" class="rounded p-1 text-white bg-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                        </svg>

                                    </button>
                                </div>
                            </label>

                            <label class="m-2 flex flex-col">
                                <span class="font-semibold">ENDEREÇO</span>
                                <input wire:model.defer="endereco" type="text"
                                    class="appearance-none w-32 text-gray-700 bg-white border-2 border-gray-300 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300" id="endereco"
                                    placeholder="">
                            </label>

                            <label class="m-2 flex flex-col">
                                <span class="font-semibold">NÚMERO</span>
                                <input wire:model.defer="numero" type="number"
                                    class="appearance-none w-32 text-gray-700 bg-white border-2 border-gray-300 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300" id="numero"
                                    placeholder="">
                            </label>

                            <label class="m-2 flex flex-col">
                                <span class="font-semibold">COMPLEMENTO</span>
                                <input wire:model.defer="complemento" type="text"
                                    class="appearance-none w-32 text-gray-700 bg-white border-2 border-gray-300 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300" id="complemento"
                                    placeholder="">
                            </label>

                            <label class="m-2 flex flex-col">
                                <span class="font-semibold">REFERENCIA</span>
                                <input wire:model.defer="referencia" type="text"
                                    class="appearance-none w-32 text-gray-700 bg-white border-2 border-gray-300 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300" id="complemento"
                                    placeholder="">
                            </label>

                            <label class="m-2 flex flex-col">
                                <span class="font-semibold">BAIRRO</span>
                                <input wire:model.defer="bairro" type="text"
                                    class="appearance-none w-32 text-gray-700 bg-white border-2 border-gray-300 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300" id="bairro"
                                    placeholder="">
                            </label>

                            <label class="m-2 flex flex-col">
                                <span class="font-semibold">ESTADO</span>
                                <input wire:model.defer="bairro" type="text"
                                    class="appearance-none w-32 text-gray-700 bg-white border-2 border-gray-300 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300" id="estado"
                                    placeholder="">
                            </label>

                        </div>
                    </div>
                </form>
            </div>
            <div class="flex justify-center mt-3">
                <button type="submit"
                    class="flex flex-row gap-2 text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 dark:border-none">
                    Salvar
                </button>
            </div>
        @endslot
    </x-modal-web>
</div>
