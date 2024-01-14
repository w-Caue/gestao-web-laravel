<div x-cloak x-data="{ form: 'cadastro' }">

    <div class="flex gap-2 mx-2 text-lg text-white">
        <button :class="{ 'active font-bold text-purple-500 rounded-t bg-white dark:bg-gray-700': form === 'cadastro' }"
            class="p-1 font-semibold" x-on:click="form = 'cadastro'">Cadastro</button>

        <button :class="{ 'active font-bold text-purple-500 rounded-t bg-white dark:bg-gray-700': form === 'informacoes' }"
            class="p-1 font-semibold" x-on:click="form = 'informacoes'">Mais Info.</button>

    </div>

    <div class="mx-2">
        <form wire:submit.prevent="save()"
            class="w-full font-semibold rounded-b-lg rounded-tr-lg text-sm text-gray-700 bg-white dark:text-white dark:bg-gray-700">
            <div x-show=" form === 'cadastro'">
                <div class="flex justify-between flex-wrap gap-4 px-3 py-3">

                    <label class="uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                        <span>Código</span>

                        <input wire:model="form.codigo"
                            class="appearance-none block w-20 text-gray-700 bg-white border-2 border-gray-300 rounded py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                            id="grid-first-name" type="text" disabled>

                    </label>

                    <label for="countries" class="block uppercase tracking-wide font-bold mb-2">
                        <span>Tipo</span>

                        <div class="sm:w-56 flex flex-wrap gap-3">
                            <label for="">
                                <input wire:model.live="form.tipo"
                                    class="h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-['']"
                                    type="checkbox" value="C" id="checkboxChecked" />
                                <span class="text-gray-600 dark:text-gray-300">Cliente</span>
                            </label>
                            <label for="">
                                <input wire:model.live="form.tipo"
                                    class="h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-['']"
                                    type="checkbox" value="F" id="checkboxChecked" />
                                <span class="text-gray-600 dark:text-gray-300">Funcionario</span>
                            </label>
                            <label for="">
                                <input wire:model.live="form.tipo"
                                    class="h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-['']"
                                    type="checkbox" value="E" id="checkboxChecked" />
                                <span class="text-gray-600 dark:text-gray-300">Empresa</span>
                            </label>
                        </div>

                        @error('form.tipo')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div class="flex gap-3  w-full px-3">
                    <label class="flex flex-col uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                        <span>Nome</span>

                        <input wire:model.defer="form.nome"
                            class="appearance-none w-full sm:w-96 text-gray-700 bg-white border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                            id="grid-first-name" type="text">

                        @error('form.nome')
                            <span class="error dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="flex flex-col uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                        <span>Nome P/ Contato</span>

                        <input wire:model="form.nomeContato"
                            class="appearance-none w-full sm:w-64 text-gray-700 bg-white border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                            id="grid-first-name" type="text">

                        @error('form.nomeContato')
                            <span class="error dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </label>

                </div>

                <div class="flex flex-wrap gap-2 px-3">
                    <label class="flex flex-col uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                        <span>Email</span>

                        <input wire:model.defer="form.email"
                            class="appearance-none block w-full sm:w-96 text-gray-700 bg-white border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                            id="grid-first-name" type="text" placeholder="">

                        @error('form.email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="flex flex-col uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                        <span>Data Nascimento</span>

                        <input wire:model="form.dataNasc"
                            class="appearance-none w-full sm:w-44 text-gray-700 bg-white border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                            id="grid-first-name" type="date">

                        @error('form.dataNasc')
                            <span class="error dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="flex flex-col uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                        <span>Data do Cadastro</span>

                        <input wire:model="form.dataNasc"
                            class="appearance-none w-full sm:w-44 text-gray-700 bg-white border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                            id="grid-first-name" type="date">

                        @error('form.dataNasc')
                            <span class="error dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div class="flex gap-7 items-center ml-3">
                    <div class="flex flex-wrap -mx-3 m-4">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                                Whatsapp
                            </label>
                            <input wire:model="form.whatsapp"
                                class="appearance-none block w-full text-gray-700 bg-white border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                                id="grid-first-name" type="text" placeholder="">

                            @error('form.whatsapp')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>

            <div x-show=" form === 'informacoes'">
                <div class="flex flex-wrap gap-4 mx-2">
                    <label class="my-2">
                        <span for="cep" class="font-semibold">CEP</span>
                        <div class="flex items-center">
                            <input wire:model.lazy="cep" type="number"
                                class="appearance-none w-32 text-gray-700 bg-white border-2 border-gray-300 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                                id="cep" placeholder="">
                            <button type="button" class="rounded py-2 px-1 text-white bg-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>

                            </button>
                        </div>
                    </label>

                    <label class="my-2 flex flex-col">
                        <span class="font-semibold">ENDEREÇO</span>
                        <input wire:model.defer="endereco" type="text"
                            class="appearance-none w-full sm:w-80 text-gray-700 bg-white border-2 border-gray-300 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                            id="endereco" placeholder="">
                    </label>

                    <label class="my-2 flex flex-col">
                        <span class="font-semibold">NÚMERO</span>
                        <input wire:model.defer="numero" type="number"
                            class="appearance-none w-20 text-gray-700 bg-white border-2 border-gray-300 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                            id="numero" placeholder="">
                    </label>

                    <label class="my-2 flex flex-col">
                        <span class="font-semibold">COMPLEMENTO</span>
                        <input wire:model.defer="complemento" type="text"
                            class="appearance-none w-44 sm:w-80 text-gray-700 bg-white border-2 border-gray-300 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                            id="complemento" placeholder="">
                    </label>

                    <label class="my-2 flex flex-col">
                        <span class="font-semibold">REFERENCIA</span>
                        <input wire:model.defer="referencia" type="text"
                            class="appearance-none w-32 text-gray-700 bg-white border-2 border-gray-300 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                            id="complemento" placeholder="">
                    </label>

                    <label class="my-2 flex flex-col">
                        <span class="font-semibold">BAIRRO</span>
                        <input wire:model.defer="bairro" type="text"
                            class="appearance-none w-32 text-gray-700 bg-white border-2 border-gray-300 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                            id="bairro" placeholder="">
                    </label>

                    <label class="my-2 flex flex-col">
                        <span class="font-semibold">ESTADO</span>
                        <input wire:model.defer="bairro" type="text"
                            class="appearance-none w-32 text-gray-700 bg-white border-2 border-gray-300 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                            id="estado" placeholder="">
                    </label>

                </div>
            </div>
        </form>
    </div>
</div>
