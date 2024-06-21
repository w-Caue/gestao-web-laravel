<div>
    <div class="grid sm:grid-cols-5 items-start gap-2">

        <div class="w-full sm:col-span-3">
            <div class="px-4 py-3 mb-8 bg-white rounded-b-lg rounded-lg shadow-md dark:bg-gray-800">

                <div class="flex justify-between items-start my-2 text-sm">

                    <div class="flex flex-col">
                        <x-inputs.label value="Código" />

                        <x-inputs.text-dark wire:model="form.codigo" disabled class="w-10" />
                    </div>

                    <div class="flex">
                        <label for="status">
                            <div
                                class="py-2 px-4 text-md font-semibold uppercase border-2 rounded-full {{ $form->status == 'Aberto' ? 'text-gray-400 border-gray-400' : '' }} {{ $form->status == 'Paga' ? 'text-green-400 border-green-400' : '' }}">
                                Conta {{ $form->status }}
                            </div>

                            @error('form.tipo')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                </div>

                <div class="flex flex-col mb-2">
                    <x-inputs.label value="Cliente / Empresa" />

                    <x-inputs.text-dark disabled wire:model="form.pessoa" class="sm:w-80"
                        placeholder="insira o nome aqui" />

                    @error('form.pessoa')
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

                        <x-inputs.text-dark type="date" wire:model="form.dataLancamento" class="w-full" />

                        @error('form.dataLancamento')
                            <span class="error dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-36">
                        <x-inputs.label value="Data Vencimento" />

                        <x-inputs.text-dark type="date" wire:model="form.dataVencimento" class="w-full" />

                        @error('form.dataVencimento')
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

        <div class="w-full sm:col-span-2">
            <div class="items-center px-4 py-5 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                <div class="flex justify-between items-center mb-7">
                    <x-inputs.label value="Ag. Cobrador:" />

                    <x-inputs.result value="{{ $form->agCobrador }}" />
                </div>

                <div class="border my-6 dark:border-gray-700"></div>

                <div class="flex justify-between items-center mb-7">
                    <x-inputs.label value="Total:" />

                    <x-inputs.result value="{{ $form->valorDocumento }}" />
                </div>

                @if ($form->status == 'Paga')
                <div class="flex justify-between items-center mb-7">
                    <x-inputs.label value="Data do Pagamento" />

                    <x-inputs.text-dark disabled type="date" wire:model="form.dataPagamento" class=" w-32" />

                    @error('form.dataPagamento')
                        <span class="error dark:text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-between items-center mb-7">
                    <x-inputs.label value="Valor Pago:" />

                    <x-inputs.result value="{{ $form->valorPago }}" />
                </div>
                @endif

                <div class="border my-6 dark:border-gray-700"></div>

                @if ($form->status == 'Aberto')
                    <div class="py-4 flex gap-3">
                        <x-button.success type="button" x-data
                            x-on:click.prevent="$dispatch('open-detalhes', { name : 'baixar' })">
                            Baixar
                        </x-button.success>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <x-modal-detalhes name="baixar" title="Baixa de Conta">
        @slot('body')
            <form wire:submit.prevent="confirmarBaixa()">
                <div class="mx-1 my-3">

                    <div class="border my-6 dark:border-gray-700"></div>

                    <div class="my-2">
                        <label for="data" class="flex items-center justify-between">
                            <x-inputs.label value="Data Vencimento:" />

                            <x-inputs.result value="{{ date('d/m/Y', strtotime($form->dataVencimento)) }}" />
                        </label>
                        @error('form.dataVencimento')
                            <span class="error dark:text-red-500 font-semibold">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-y">
                        <label for="data" class="flex items-center justify-between">

                            <x-inputs.label value="Data Pagamento:" />

                            <x-inputs.text-dark type="date" wire:model="form.dataPago" class="w-36" />

                        </label>
                        @error('form.dataPago')
                            <span class="error dark:text-red-500 font-semibold">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="border my-6 dark:border-gray-700"></div>

                <div class="mx-1 my-3">
                    <div class="">
                        <label for="" class="flex items-center justify-between">
                            <x-inputs.label value="Forma Pagamento:" />

                            <x-inputs.select wire:model="form.pagamento" class="w-36">
                                <option value=""></option>
                                @foreach ($pagamentos as $pagamento)
                                    <option class="font-semibold text-gray-300" value="{{ $pagamento->id }}">
                                        {{ $pagamento->nome }}</option>
                                @endforeach
                            </x-inputs.select>
                        </label>
                        @error('form.pagamento')
                            <span class="error dark:text-red-500 font-semibold">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="my-6">
                        <label for="decricao" class="flex items-center justify-between">
                            <x-inputs.label value="Total:" />

                            <x-inputs.result value="{{ $form->valorDocumento }}" />

                        </label>
                    </div>

                    <div class="">
                        <label for="decricao" class="flex items-center justify-between">
                            <x-inputs.label value="Valor a Pagar:" />

                            <x-inputs.text-dark wire:model.live="form.valorPago" class="w-20" />

                        </label>
                        @error('form.valorPago')
                            <span class="error dark:text-red-500 font-semibold">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- @php
                        $calc = number_format($form->valor_documento, 2, ',') - $form->valorPago;

                        if ($calc > 0) {
                            $diferenca = $calc;
                        }
                    @endphp

                    <div>
                        {{ $diferenca }}
                    </div> --}}
                </div>

                <div class="flex justify-center m-5">
                    <x-button.primary wire:click="confirmarBaixa()" type="button">
                        Confirmar Baixa
                    </x-button.primary>
                </div>

            </form>
        @endslot
    </x-modal-detalhes>
</div>
