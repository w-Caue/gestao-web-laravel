<div x-cloak x-data="{ form: 'cadastro' }">

    <div class="flex gap-2 mx-2 text-lg text-gray-700 dark:text-white">
        <button :class="{ 'active font-bold rounded-t bg-white dark:bg-gray-800': form === 'cadastro' }"
            class="p-1 font-semibold" x-on:click="form = 'cadastro'">
            Cadastro
        </button>

        <button :class="{ 'active font-bold rounded-t bg-white dark:bg-gray-800': form === 'endereco' }"
            class="p-1 font-semibold" x-on:click="form = 'endereco'">
            Endereço
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
                <div class="flex justify-between flex-wrap gap-2 px-3 py-3">

                    <label class="uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                        <p>Código</p>

                        <x-input wire:model="form.codigo" class="w-12" disabled></x-input>

                    </label>

                    <label for="countries" class="block uppercase tracking-wide font-bold mb-2">
                        <span>Tipo</span>

                        <div class="sm:w-56 flex flex-wrap gap-3">
                            <label for="cliente">
                                <input wire:model="form.tipoCliente"
                                    class="h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] dark:bg-gray-700"
                                    type="checkbox" id="checkboxChecked"
                                    @if ($form->tipoCliente == 'S') checked @endif />
                                <span class="text-gray-600 dark:text-gray-300">Cliente</span>
                            </label>
                            <label for="">
                                <input wire:model="form.tipoFuncionario"
                                    class="h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] dark:bg-gray-700"
                                    type="checkbox" id="checkboxChecked"
                                    @if ($form->tipoFuncionario == 'S') checked @endif />
                                <span class="text-gray-600 dark:text-gray-300">Funcionario</span>
                            </label>
                            <label for="">
                                <input wire:model="form.tipoFornecedor"
                                    class="h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] dark:bg-gray-700"
                                    type="checkbox" id="checkboxChecked"
                                    @if ($form->tipoFornecedor == 'S') checked @endif />
                                <span class="text-gray-600 dark:text-gray-300">Fornecedor</span>
                            </label>
                        </div>

                        @error('form.tipo')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 w-full px-3">
                    <label class="flex flex-col uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                        <span>Nome</span>

                        <x-input wire:model="form.nome" class="w-full sm:w-96"></x-input>

                        @error('form.nome')
                            <span class="error dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="flex flex-col uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                        <span>Nome P/ Contato</span>

                        <x-input wire:model="form.nomeContato" class="w-full sm:w-64"></x-input>

                        @error('form.nomeContato')
                            <span class="error dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </label>

                </div>

                <div class="flex flex-col sm:flex-row flex-wrap w-full gap-2 px-3">
                    <label class="flex flex-col uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                        <span>Email</span>

                        <x-input wire:model="form.email" class="w-full sm:w-96"></x-input>

                        @error('form.email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </label>

                    <div class="flex items-end gap-2 sm:gap-3">
                        <label class="flex flex-col uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                            <span>Data Nascimento</span>

                            <x-input wire:model="form.dataNascimento" class="w-36 sm:w-40" type="date"></x-input>

                            @error('form.dataNascimento')
                                <span class="error dark:text-red-500">{{ $message }}</span>
                            @enderror
                        </label>

                        <label class="flex flex-col uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                            <span>Data Cadastro</span>

                            <x-input wire:model="form.dataCadastro" class="w-36 sm:w-40" type="date"
                                disabled></x-input>

                            @error('form.dataCadastro')
                                <span class="error dark:text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 px-3">
                    <label class="flex flex-col uppercase tracking-wide font-bold mb-2">
                        <span>Whatsapp</span>

                        <x-input wire:model="form.whatsapp" class="w-full sm:w-60"></x-input>

                        @error('form.whatsapp')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
            </div>
            <div x-show=" form === 'endereco'">
                <div class="flex flex-wrap gap-2 border-gray-300 p-2 mx-2 dark:border-white">
                    <label class="my-2">
                        <span for="cep" class="font-semibold">CEP</span>

                        <div class="flex items-center">
                            
                            <x-input wire:model.lazy="cep" class="w-32" type="number" id="cep"></x-input>

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
                        <x-input wire:model.defer="endereco" class="w-full sm:w-80"></x-input>
                    </label>

                    <label class="my-2 flex flex-col">
                        <span class="font-semibold">NÚMERO</span>
                        <x-input wire:model.defer="numero" class="w-20" type="number"></x-input>
                    </label>

                    <label class="my-2 flex flex-col">
                        <span class="font-semibold">COMPLEMENTO</span>
                        <x-input wire:model.defer="complemento" class="w-44 sm:w-80"></x-input>
                    </label>

                    <label class="my-2 flex flex-col">
                        <span class="font-semibold">REFERENCIA</span>
                        <x-input wire:model.defer="referencia" class="w-32"></x-input>
                    </label>

                    <label class="my-2 flex flex-col">
                        <span class="font-semibold">BAIRRO</span>
                        <x-input wire:model.defer="bairro" class="w-32"></x-input>
                    </label>

                    <label class="my-2 flex flex-col">
                        <span class="font-semibold">ESTADO</span>
                        <x-input wire:model.defer="estado" class="w-32"></x-input>
                    </label>

                </div>
            </div>
        </form>
    </div>
</div>
