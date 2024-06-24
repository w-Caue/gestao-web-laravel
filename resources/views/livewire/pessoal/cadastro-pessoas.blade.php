<div x-cloak x-data="{ show: 'cadastro' }">

    <div class="flex gap-2">
        <button
            :class="{ 'active font-bold text-gray-800 bg-white dark:text-white dark:bg-gray-800': show === 'cadastro' }"
            class="py-2 px-4 text-sm uppercase font-semibold border border-b-0 border-white rounded-t hover:text-gray-500 dark:border-gray-800 dark:text-gray-600 dark:hover:text-white"
            x-on:click="show = 'cadastro'">
            Cadastro
        </button>

        <button
            :class="{ 'active font-bold text-gray-800 bg-white dark:text-white dark:bg-gray-800': show === 'contas' }"
            class="py-2 px-4 text-sm uppercase font-semibold border border-b-0 border-white rounded-t hover:text-gray-500 dark:border-gray-800 dark:text-gray-600 dark:hover:text-white"
            x-on:click="show = 'contas'">
            Hist. de contas
        </button>
    </div>

    <div class="grid items-start gap-5 sm:grid-cols-5 sm:gap-2">

        <div class="w-full sm:col-span-3">
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

                            <div class="sm:w-56 flex flex-wrap gap-3">
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

                <div class="flex flex-wrap gap-3 my-2">
                    <div class="w-40">
                        <x-inputs.label value="Telefone" />

                        <x-inputs.text-dark wire:model="form.telefone" class="w-full"
                            placeholder="insira o whatsapp aqui" />

                        @error('form.whatsapp')
                            <span class="error dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-32">
                        <x-inputs.label value="Data Cadastro" />

                        <x-inputs.text-dark disabled type="date" wire:model="form.dataCadastro" class="w-full" />

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
                class="px-4 py-4 bg-white rounded-b-lg rounded-tr-lg shadow-md dark:bg-gray-800">

                <div class="">
                    <div
                        class="flex justify-between px-2 text-sm uppercase font-semibold tracking-widest text-gray-800 dark:text-gray-300 my-1">
                        <h1>Documento</h1>
                        <h1 class="mr-10 ml-7 sm:mr-0">Status</h1>
                        <h1 class="hidden sm:block">Valor Documento</h1>
                    </div>

                    @foreach ($form->contas as $conta)
                        <div x-data="{ conta: false }" wire:key="{{ $conta->id }}"
                            class="flex flex-col px-2 py-3 my-4 text-gray-700 tracking-widest border shadow-md rounded-xl p-1 border-gray-100 dark:text-gray-300 dark:shadow-gray-700 dark:border-gray-500">
                            <div class="flex justify-between items-center w-full">
                                <div class="flex flex-col">
                                    <a href="{{ route('contas.show', ['codigo' => $conta->id]) }}"
                                        class="text-md font-bold text-blue-500 hover:underline cursor-pointer">#{{ $conta->id }}</a>
                                    {{-- <span class="text-xs">{{ date('d/m/Y', strtotime($conta->data_lancamento)) }}</span>
                                     --}}
                                    <div
                                        class="text-xs uppercase tracking-widest font-bold text-gray-700 mb-2 dark:text-gray-300">
                                        conta a <span
                                            class="{{ $conta->tipo == 'P' ? 'text-red-500' : 'text-green-500' }}">{{ $conta->tipo == 'P' ? 'Pagar' : 'Receber' }}</span>
                                    </div>
                                </div>

                                <div class="flex items-center gap-2">
                                    <span
                                        class="p-2 text-xs font-semibold uppercase border-2 rounded-full {{ $conta->status == 'Aberto' ? 'text-gray-400 border-gray-400' : '' }} {{ $conta->status == 'Paga' ? 'text-yellow-400 border-yellow-400' : '' }} {{ $conta->status == 'Hoje' ? 'text-green-400 border-green-400' : '' }} {{ $conta->status == 'Vencida' ? 'text-red-400 border-red-400' : '' }}">
                                        {{ $conta->status == 'Hoje' ? 'Vence' : 'Conta' }} {{ $conta->status }}
                                    </span>

                                    <button x-on:click="conta = !conta" class="sm:hidden">
                                        <svg class="w-6 h-6 transition-all duration-300 transform"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            x-bind:class="conta ? 'rotate-180' : '-rotate-50'" fill="currentColor">
                                            <path
                                                d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>

                                <div class="sm:flex gap-1 font-semibold hidden">
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
                                <div
                                    class="mt-5 text-xs uppercase tracking-widest font-bold text-gray-700 mb-2 dark:text-gray-300">
                                    descrição: {{ $conta->descricao }}
                                </div>

                                <div class="mt-5 grid sm:grid-cols-2 gap-4">
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

                                            <div class="flex justify-between sm:hidden">
                                                <p>Valor Documento:</p>
                                                <span>R${{ number_format($conta->valor_documento, '2', ',') }}</span>
                                            </div>

                                            <div class="flex justify-between">
                                                <p>Forma de Pagamento:</p>
                                                <span class="">{{ $conta->pagamento->nome ?? '' }}</span>
                                            </div>

                                            <div class="flex justify-between text-lg">
                                                <p>Total:</p>
                                                <span>R${{ number_format($conta->valor_pago, '2', ',') }}</span>
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

        <div x-show=" show === 'cadastro'" class="w-full sm:col-span-2">
            {{-- @livewire('Ecommerce.Conta.Cadastro') --}}
        </div>

        <div class="w-full sm:col-span-2">
            <div x-show=" show === 'contas'" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                <h1 class="text-sm mb-4 text-center font-semibold uppercase tracking-widest dark:text-gray-300">Totais
                </h1>

                <div class="flex justify-between text-gray-400">
                    <div class="flex flex-col gap-2">
                        <x-inputs.label-text value="Contas Abertas:" />

                        <x-inputs.label-text value="Total:" />
                    </div>
                    <div class="flex flex-col items-end gap-2">
                        <x-inputs.label-text value="{{ $form->contasAberto }}" />

                        <x-inputs.label-text value="{{ 'R$' . number_format($form->totalAberto, 2, ',') }}" />
                    </div>
                </div>

                <div class="border my-6 dark:border-gray-700"></div>

                <div class="flex justify-between text-green-600">
                    <div class="flex flex-col gap-2">
                        <x-inputs.label-text value="Contas Pagas:" />

                        <x-inputs.label-text value="Total:" />
                    </div>
                    <div class="flex flex-col items-end gap-2">
                        <x-inputs.label-text value="{{ $form->contasPaga }}" />

                        <x-inputs.label-text value="{{ 'R$' . number_format($form->totalPaga, 2, ',') }}" />
                    </div>
                </div>

                <div class="border my-6 dark:border-gray-700"></div>

                <div class="flex justify-between text-red-500">
                    <div class="flex flex-col gap-2">
                        <x-inputs.label-text value="Contas Vencidas:" />

                        <x-inputs.label-text value="Total:" />
                    </div>
                    <div class="flex flex-col items-end gap-2">
                        <x-inputs.label-text value="{{ $form->contasVencida }}" />

                        <x-inputs.label-text value="{{ 'R$' . number_format($form->totalVencida, 2, ',') }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
