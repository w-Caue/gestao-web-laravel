<div x-cloak x-data="{ show: 'cadastro' }">

    <div class="flex gap-2">
        <button :class="{ 'active font-bold text-white bg-white dark:bg-gray-800': show === 'cadastro' }"
            class="py-2 px-4 text-sm uppercase font-semibold text-gray-600 border border-b-0 rounded-t hover:text-white dark:border-gray-800"
            x-on:click="show = 'cadastro'">
            Cadastro
        </button>

        <button :class="{ 'active font-bold text-white bg-white dark:bg-gray-800': show === 'contas' }"
            class="py-2 px-4 text-sm uppercase font-semibold text-gray-600 border border-b-0 rounded-t hover:text-white dark:border-gray-800"
            x-on:click="show = 'contas'">
            Hist. de contas
        </button>
    </div>

    <div class="grid grid-cols-5 items-start gap-2">

        <div class="w-full col-span-3">
            <div x-show=" show === 'cadastro'"
                class="px-4 py-3 mb-8 bg-white rounded-b-lg rounded-tr-lg shadow-md dark:bg-gray-800">

                <div class="flex justify-between items-start my-2 text-sm">

                    <div class="flex flex-col">
                        <x-inputs.label value="Código" />

                        <x-inputs.text-dark wire:model="form.codigo" disabled class="w-10" />
                    </div>

                    <div class="flex">
                        <label for="types">
                            <x-inputs.label value="Tipo" />

                            <div class="w-56 flex flex-wrap gap-3">
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
                            </div>

                            @error('form.tipo')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                </div>

                <div class="w-full mb-2">
                    <x-inputs.label value="Nome" />

                    <x-inputs.text-dark wire:model="form.nome" class="w-full" placeholder="insira o nome aqui" />

                    @error('form.nome')
                        <span class="error dark:text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full mb-2">
                    <x-inputs.label value="Email" />

                    <x-inputs.text-dark wire:model="form.email" class="w-full" placeholder="insira o email aqui" />

                    @error('form.email')
                        <span class="error dark:text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex gap-3 my-2">
                    <div class="w-40">
                        <x-inputs.label value="Telefone" />

                        <x-inputs.text-dark wire:model="form.whatsapp" class="w-full"
                            placeholder="insira o whatsapp aqui" />

                        @error('form.whatsapp')
                            <span class="error dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-36">
                        <x-inputs.label value="Data Cadastro" />

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

            <div x-show=" show === 'contas'"
                class="px-4 py-4 mb-8 bg-white rounded-b-lg rounded-tr-lg shadow-md dark:bg-gray-800">

                <div class="">
                    <div
                        class="flex justify-between px-2 text-sm uppercase font-semibold tracking-widest text-gray-800 dark:text-gray-300 my-1">
                        <h1>Documento</h1>
                        <h1 class="ml-7">Status</h1>
                        <h1>Valor Documento</h1>
                    </div>

                    @foreach ($form->contas as $conta)
                        <div x-data="{ conta: false }" wire:key="{{ $conta->id }}"
                            class="flex flex-col px-2 py-3 my-2 text-gray-700 tracking-widest border shadow-xl rounded-xl p-1 dark:text-gray-300 border-gray-100 dark:border-gray-500">
                            <div class="flex justify-between items-center w-full">
                                <div class="flex flex-col">
                                    <a href="{{ route('contas.show', ['codigo' => $conta->id]) }}" class="text-md font-bold text-blue-500 hover:underline cursor-pointer">#{{ $conta->id }}</a>
                                    <span
                                        class="text-xs">{{ date('d/m/Y', strtotime($conta->data_lancamento)) }}</span>
                                </div>

                                <span
                                    class="p-2 text-xs font-semibold uppercase border-2 rounded-full {{ $conta->status == 'Aberto' ? 'text-gray-400 border-gray-400' : '' }} {{ $conta->status == 'Paga' ? 'text-green-400 border-green-400' : '' }}">
                                    Conta {{ $conta->status }}
                                </span>

                                <div class="flex gap-1 font-semibold">
                                    <h1>R${{ number_format($conta->valor_documento, '2', ',') }}</h1>

                                    <button x-on:click="conta = !conta">
                                        <svg class="w-6 h-6 transition-all duration-300 transform"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            x-bind:class="conta ? 'rotate-180' : '-rotate-50'" fill="currentColor">
                                            <path
                                                d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div x-show="conta" class="">

                                <div class="mt-10 grid grid-cols-2 gap-4">
                                    <div class="">
                                        <h1
                                            class="text-xs uppercase tracking-widest font-bold text-gray-700 mb-2 dark:text-gray-300">
                                            informações
                                        </h1>

                                        <div
                                            class="flex flex-col gap-2 font-semibold border rounded-md p-2 mx-1 dark:border-gray-500">
                                            <div class="flex justify-between text-sm">
                                                <p>Lançamento:</p>
                                                <span
                                                    class="text-xs">{{ date('d/m/Y', strtotime($conta->data_lancamento)) }}</span>
                                            </div>
                                            <div class="flex justify-between text-sm">
                                                <p>Vencimento:</p>
                                                <span
                                                    class="text-xs">{{ date('d/m/Y', strtotime($conta->data_vencimento)) }}</span>
                                            </div>

                                            @if ($conta->status == 'Paga')
                                            <div class="border my-2 dark:border-gray-700"></div>

                                                <div class="flex justify-between text-sm">
                                                    <p>Pagamento:</p>
                                                    <span
                                                        class="text-xs">{{ date('d/m/Y', strtotime($conta->data_pagamento)) }}</span>
                                                </div>
                                            @endif


                                        </div>
                                    </div>

                                    <div class=" text-gray-500 dark:text-gray-300">
                                        <h1
                                            class="text-xs uppercase tracking-widest font-bold text-gray-700 mb-2 dark:text-gray-300">
                                            Dados de Pagamento
                                        </h1>

                                        <div
                                            class="flex flex-col gap-4 font-semibold border rounded-md p-2 mx-1 text-sm dark:border-gray-500">

                                            <div class="flex justify-between">
                                                <p>Forma de Pagamento:</p>
                                                <span class="">{{ $conta->pagamento->nome ?? '' }}</span>
                                            </div>

                                            <div class="flex justify-between text-lg">
                                                <p>Total:</p>
                                                <span >R${{ number_format($conta->valor_pago, '2', ',') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <div x-show=" show === 'cadastro'" class="w-full col-span-2">
            {{-- @livewire('Ecommerce.Conta.Cadastro') --}}
        </div>

        <div class="w-full col-span-2">
            <div x-show=" show === 'contas'" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                <h1 class="text-sm font-semibold text-gray-400 uppercase tracking-widest">Totais</h1>
            </div>
        </div>
    </div>
</div>
