<div>
    <div class="grid grid-cols-5 items-start gap-2">

        <div class="w-full col-span-3">
            <div class="px-4 py-3 mb-8 bg-white rounded-b-lg rounded-tr-lg shadow-md dark:bg-gray-800">

                <div class="flex justify-between items-start my-2 text-sm">

                    <div class="flex flex-col">
                        <x-inputs.label value="Código" />

                        <x-inputs.text-dark wire:model="form.codigo" disabled class="w-10" />
                    </div>

                    <div class="flex">
                        <label for="types">
                            <x-inputs.label value="Tipo" />

                            {{-- <div class="w-56 flex flex-wrap gap-3">
                                <label class="flex items-center gap-1">
                                    <x-checkbox.primary wire:model.live="form.tipoCliente" value="S"
                                        id="checkboxChecked" check="{{ $form->tipoCliente }}" />

                                    <x-inputs.label value="Cliente" />
                                </label>

                                <label class="flex items-center gap-1">
                                    <x-checkbox.primary wire:model.live="form.tipoFuncionario" value="S"
                                        id="checkboxChecked" check="{{ $form->tipoFuncionario }}" />

                                    <x-inputs.label value="Funcionario" />
                                </label>

                                <label class="flex items-center gap-1">
                                    <x-checkbox.primary wire:model.live="form.tipoFornecedor" value="S"
                                        id="checkboxChecked" check="{{ $form->tipoFornecedor }}" />

                                    <x-inputs.label value="Fornecedor" />
                                </label>
                            </div> --}}

                            @error('form.tipo')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                </div>

                <div class="flex flex-col w-full mb-2">
                    <x-inputs.label value="Nome" />

                    <x-inputs.text-dark wire:model="form.nome" class="w-72" placeholder="insira o nome aqui" />

                    @error('form.nome')
                        <span class="error dark:text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full mb-2">
                    <x-inputs.label value="Descrição" />

                    <x-inputs.text-dark wire:model="form.descricao" class="w-full"
                        placeholder="insira o descricao aqui" />

                    @error('form.descricao')
                        <span class="error dark:text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex gap-3 my-2">
                    <div class="w-36">
                        <x-inputs.label value="Data Lançamento" />

                        <x-inputs.text-dark type="date" wire:model="form.dataCadastro" class="w-full" />

                        @error('form.dataCadastro')
                            <span class="error dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-36">
                        <x-inputs.label value="Data Vencimento" />

                        <x-inputs.text-dark type="date" wire:model="form.dataCadastro" class="w-full" />

                        @error('form.dataCadastro')
                            <span class="error dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="py-4 flex gap-3">
                    <x-button.primary type="button" wire:click="update()">Salvar</x-button.primary>
                    <x-button.danger>Deletar</x-button.danger>
                </div>
            </div>
        </div>

        <div class="w-full col-span-2">
            <div class="items-center px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                <div class="flex justify-between items-center mb-7">
                    <x-inputs.label value="Ag. Cobrador" />

                    <x-inputs.select class="w-44"></x-inputs.select>
                </div>
                <div class="flex justify-between items-center mb-7">
                    <x-inputs.label value="Valor" />
                    {{-- <x-inputs.select class="w-44"></x-inputs.select> --}}
                </div>
            </div>
        </div>
    </div>
</div>
