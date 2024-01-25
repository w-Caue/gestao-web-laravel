<div>

    <button x-data x-on:click="$dispatch('open-modal')"
        class="flex justify-center w-44 gap-2 text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 dark:border-none">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
        </svg>

        Novo Cadastro
    </button>

    <x-modal-web :javaScript="false" title="Cadastro Rapido" wire:model="modal">

        @slot('body')
            <button x-on:click="$dispatch('close-modal')"
                class=" absolute right-2 top-4 p-1 m-1 border rounded dark:text-white hover:bg-red-500 hover:border-red-500">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>

            <div class="mx-2 flex justify-center">
                <form wire:submit.prevent="save()"
                    class="w-full max-w-2xl font-semibold rounded-lg text-sm text-gray-700 bg-white dark:text-white dark:bg-gray-700">

                    <div class="flex px-3 my-3">
                        <label for="countries" class="block uppercase tracking-wide font-bold mb-2">
                            <span>Tipo</span>

                            <div class="w-56 flex flex-wrap gap-3">
                                <label for="">
                                    <input wire:model.live="form.tipoCliente"
                                        class="h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] bg-white outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] dark:bg-gray-700"
                                        type="checkbox" value="S" id="checkboxChecked" />
                                    <span class="text-gray-600 dark:text-gray-300">Cliente</span>
                                </label>
                                <label for="">
                                    <input wire:model.live="form.tipoFuncionario"
                                        class="h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] bg-white outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] dark:bg-gray-700"
                                        type="checkbox" value="S" id="checkboxChecked" />
                                    <span class="text-gray-600 dark:text-gray-300">Funcionario</span>
                                </label>
                                <label for="">
                                    <input wire:model.live="form.tipoFornecedor"
                                        class="h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] bg-white outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] dark:bg-gray-700"
                                        type="checkbox" value="S" id="checkboxChecked" />
                                    <span class="text-gray-600 dark:text-gray-300">Fornecedor</span>
                                </label>
                            </div>

                            @error('form.tipo')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <div class="w-full px-3 mb-2">
                        <label class="block uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                            Nome
                        </label>

                        <x-input wire:model="form.nome" class="w-full" placeholder="Nome da Pessoa"></x-input>

                        @error('form.nome')
                            <span class="error dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full px-3 mb-2">
                        <label class="block uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                            Email
                        </label>

                        <x-input wire:model="form.email" class="w-full" placeholder="E-mail para Contato"></x-input>

                        @error('form.email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full px-3 mb-3">
                        <label class="block uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                            Whatsapp
                        </label>
                        <x-input wire:model="form.whatsapp" class="w-60" placeholder="Whatsapp para Contato"></x-input>

                        @error('form.whatsapp')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-center mt-3">
                        <button
                            class="text-white text-lg font-semibold border p-2 my-2 rounded-md bg-green-600 transition-all duration-300 hover:scale-95 hover:bg-green-700 dark:border-none">
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>

        @endslot
    </x-modal-web>
</div>
