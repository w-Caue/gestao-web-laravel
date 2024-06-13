<div>

    <x-modal.modal-medium title="Cadastro" name="cadastro">

        @slot('body')
            <button x-on:click="$dispatch('close-modal')"
                class=" absolute right-2 top-4 p-1 m-1 border rounded dark:text-white hover:bg-red-500 hover:border-red-500">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>

            <div class="flex justify-center">
                <form wire:submit.prevent="save()"
                    class="w-full max-w-2xl font-semibold rounded-lg text-sm text-gray-700 dark:text-white">

                    <div class="flex my-3">
                        <label for="countries" class="block uppercase tracking-wide font-bold mb-2">
                            <span>Tipo</span>

                            <div class="w-56 flex flex-wrap gap-3">
                                <label class="flex items-center gap-1">
                                    <x-checkbox.primary wire:model.live="form.tipoCliente" value="S"
                                        id="checkboxChecked" />

                                    <x-inputs.label value="Cliente" />
                                </label>

                                <label class="flex items-center gap-1">
                                    <x-checkbox.primary wire:model.live="form.tipoFuncionario" value="S"
                                        id="checkboxChecked" />

                                    <x-inputs.label value="Funcionario" />
                                </label>

                                <label class="flex items-center gap-1">
                                    <x-checkbox.primary wire:model.live="form.tipoFornecedor" value="S"
                                        id="checkboxChecked" />

                                    <x-inputs.label value="Fornecedor" />
                                </label>
                            </div>

                            @error('form.tipo')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <div class="w-full mb-2">
                        <label class="block uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                            Nome
                        </label>

                        <x-inputs.text-dark wire:model="form.nome" class="w-full" placeholder="insira o nome aqui" />

                        @error('form.nome')
                            <span class="error dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full mb-2">
                        <label class="block uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                            Email
                        </label>

                        <x-inputs.text-dark wire:model="form.email" class="w-full" placeholder="insira o email aqui" />

                        @error('form.email')
                            <span class="error dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full mb-3 flex flex-col">
                        <label class="block uppercase tracking-wide font-bold mb-2" for="grid-first-name">
                            Whatsapp
                        </label>
                        <x-inputs.text-dark wire:model="form.phone" class="w-60"
                            placeholder="insira o telefone aqui" />

                        @error('form.phone')
                            <span class="error dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-center">
                        <x-button.success class="text-md">
                            Salvar
                        </x-button.success>
                    </div>

                </form>
            </div>

        @endslot
    </x-modal.modal-medium>
</div>
