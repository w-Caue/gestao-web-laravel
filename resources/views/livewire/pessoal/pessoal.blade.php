<div>

    <x-modal.modal-medium title="Cadastro" name="cadastro">

        @slot('body')
            <div class="flex justify-center">
                <form wire:submit.prevent="save()"
                    class="w-full max-w-2xl font-semibold rounded-lg text-sm text-gray-700 dark:text-white">

                    <div class="flex my-3">
                        <label for="countries" class="block uppercase tracking-wide font-bold mb-2">
                            <span>Tipo</span>

                            <div class="w-56 flex flex-wrap gap-3">
                                <label class="flex items-center gap-1">
                                    <x-radio.primary wire:model.live="form.tipo" value="Cliente" name="tipo"
                                        id="checkboxChecked" />

                                    <x-inputs.label value="Cliente" />
                                </label>

                                <label class="flex items-center gap-1">
                                    <x-radio.primary wire:model.live="form.tipo" value="Empresa" name="tipo"
                                        id="checkboxChecked" />

                                    <x-inputs.label value="Empresa" />
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
                            Telefone
                        </label>
                        <x-inputs.text-dark wire:model="form.telefone" class="w-60"
                            placeholder="(00) 1 2345-6789" x-mask:dynamic="
                            $input.startsWith('34') || $input.startsWith('37')
                                ? '9999-9999' : '(99) 9 9999-9999'
                        "/>

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
