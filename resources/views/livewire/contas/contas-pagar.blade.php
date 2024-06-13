<div>

    <div x-cloak x-data="{ show: 'pagar' }">

        <div class="flex gap-2">
            <button :class="{ 'active font-bold text-white bg-white dark:bg-gray-800': show === 'pagar' }"
                class="py-2 px-4 text-sm uppercase font-semibold text-gray-600 border border-b-0 rounded-t hover:text-white dark:border-gray-800"
                x-on:click="show = 'pagar'">
                A pagar
            </button>

            <button :class="{ 'active font-bold text-white bg-white dark:bg-gray-800': show === 'receber' }"
                class="py-2 px-4 text-sm uppercase font-semibold text-gray-600 border border-b-0 rounded-t hover:text-white dark:border-gray-800"
                x-on:click="show = 'receber'">
                A receber
            </button>
        </div>

        <div x-show="show === 'pagar'" class="w-full bg-gray-50 rounded-b-lg rounded-tr-lg dark:bg-gray-800">
            @livewire('Contas.ListagemContasPagar')
        </div>
    </div>

    <x-modal.modal-medium title="Contas a Pagar" name="cadastro">
        @slot('body')
            <x-modal-detalhes name="clientes" title="Clientes">
                @slot('body')
                    <div class="flex gap-3 mx-7 md:mb-0">
                        <label for="">
                            <input wire:model.live='tipo' value="Cliente"
                                class=" h-5 w-5 appearance-none rounded-full border-2 border-solid border-gray-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-blue-600 checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s]"
                                type="radio" name="tipo" id="radioNoLabel01" />
                            <span class="text-md font-semibold text-gray-500 dark:text-gray-200">Pessoa</span>
                        </label>

                        <label for="">
                            <input wire:model.live='tipo' value="Empresa"
                                class=" h-5 w-5 appearance-none rounded-full border-2 border-solid border-gray-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-blue-600 checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s]"
                                type="radio" name="tipo" id="radioNoLabel01" />
                            <span class="text-md font-semibold text-gray-500 dark:text-gray-200">Empresa</span>
                        </label>
                    </div>

                    <div class="flex justify-center items-center m-4 gap-1">
                        <input wire:model.live="search" type="text" id="table-search"
                            class="p-2 text-md font-semibold text-gray-900 border border-gray-200 rounded w-80 focus:ring-gray-100 focus:border-gray-100 dark:bg-gray-300 dark:border-none"
                            placeholder="Pesquisar Cliente">

                        <button wire:click.prevent="pesquisaClientes()"
                            class="text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 cursor-pointer dark:border-none">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </button>
                    </div>

                    @if ($clientes)
                        <div class="flex justify-center flex-wrap m-3 overflow-auto h-auto max-h-60">
                            @foreach ($clientes as $cliente)
                                <div wire:click="selecioneCliente({{ $cliente->id }})"
                                    class="m-2 p-2 text-gray-400 shadow border rounded w-44 h-24 hover:bg-gray-100 hover:shadow-xl hover:border-2 cursor-pointer dark:bg-gray-300 dark:hover:bg-gray-400 dark:border-none">
                                    <h1 class="text-sm  font-semibold dark:text-gray-600">#{{ $cliente->id }}</h1>
                                    <h1 class="text-lg font-semibold text-gray-500 dark:text-gray-700">
                                        {{ $cliente->nome }}</h1>
                                    <h1 class="text-sm  font-semibold dark:text-gray-600">{{ $cliente->whatsapp }}</h1>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endslot
            </x-modal-detalhes>

            {{-- <x-modal-detalhes name="autenticacao" title="Autenticação">
                @slot('body')
                    <form wire:submit.prevent="confirmarBaixa()">
                        <div class="border-2 p-3 m-2 rounded bg-gray-200 mb-2 dark:bg-gray-600 dark:border-gray-400">
                            <div class="mb-2">
                                <label for="data" class="flex items-center justify-between">
                                    <span class="font-semibold text-gray-700 dark:text-white">Data Vencimento</span>
                                    <input type="date" wire:model.lazy="form.dataVencimento" @disabled(true)
                                        class="p-2 w-36 border-gray-200 rounded text-md font-semibold shadow-xl text-gray-600 bg-white dark:bg-gray-200">
                                </label>
                                @error('form.dataVencimento')
                                    <span class="error dark:text-red-500 font-semibold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="decricao" class="flex items-center justify-between">
                                    <span class="font-semibold text-gray-700 dark:text-white">Data do Pagamento</span>
                                    <input wire:model.lazy="form.dataPagamento" type="date"
                                        class="p-2 w-36 border-gray-200 rounded text-md font-semibold text-gray-600 shadow-lg bg-white dark:bg-gray-200">
                                </label>
                                @error('form.dataPagamento')
                                    <span class="error dark:text-red-500 font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="border-2 m-2 p-3 rounded bg-gray-200 mb-2 dark:bg-gray-600 dark:border-gray-400">
                            <div class="">
                                <label for="" class="flex items-center justify-between">
                                    <span class="font-semibold text-gray-700 dark:text-white">Forma Pagamento</span>
                                    <select type="date" wire:model="form.formaPagamento"
                                        class="p-2 w-44 border-gray-200 rounded text-md font-semibold shadow-lg text-gray-600 bg-white dark:bg-gray-200">

                                        <option value=""></option>

                                        @foreach ($formasPagamentos as $formaPagamento)
                                            <option class="font-semibold text-gray-700" value="{{ $formaPagamento->id }}">
                                                {{ $formaPagamento->nome }}</option>
                                        @endforeach
                                    </select>
                                </label>
                                @error('form.formaPagamento')
                                    <span class="error dark:text-red-500 font-semibold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="my-3">
                                <label for="decricao" class="flex items-center justify-between">
                                    <span class="font-semibold text-gray-700 dark:text-white">Valor a Pagar:</span>
                                    <input wire:model.lazy="form.valorDocumento" placeholder="R$"
                                        class="p-2 w-36 border-gray-200 rounded text-md font-semibold text-gray-600 shadow-lg bg-white dark:bg-gray-200">
                                </label>
                            </div>

                            <div class="">
                                <label for="decricao" class="flex items-center justify-between">
                                    <span class="font-semibold text-gray-700 dark:text-white">Valor:</span>
                                    <input wire:model.lazy="form.valorPago" placeholder="R$"
                                        class="p-2 w-36 border-gray-200 rounded text-md font-semibold text-gray-600 shadow-lg bg-white dark:bg-gray-200">
                                </label>
                                @error('form.valorPago')
                                    <span class="error dark:text-red-500 font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-center m-5">
                            <button type="submit"
                                class="text-white font-semibold border p-2 rounded-md bg-green-500 transition-all duration-300 hover:scale-95 hover:bg-green-600 dark:border-none">
                                Confirma Baixa
                            </button>
                        </div>

                    </form>
                @endslot
            </x-modal-detalhes> --}}

            {{-- <button wire:click.prevent="closeModal()"
                class=" absolute right-2 top-4 p-1 m-1 border rounded hover:text-white hover:bg-red-500 hover:border-red-500 dark:text-white">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button> --}}

            <form wire:submit="criarDocumento()" class="m-5 rounded">
                <div class="flex flex-wrap gap-3 mb-2">
                    <div class="">
                        <x-inputs.label value="Cliente / Empresa" />

                        <div class="relative w-60">
                            <input wire:model.live="search" value="{{ $form->clienteDocumento->nome ?? '' }}"
                                class="block p-3 w-full shadow-md font-semibold border-2 rounded-md text-sm tracking-widest focus:outline-none dark:text-gray-200 dark:bg-gray-800 dark:border-gray-600"
                                placeholder="Pesquisa pelo o ">

                            <button x-data x-on:click.prevent="$dispatch('open-detalhes', { name : 'clientes' })"
                                class="absolute top-0 right-0 p-3 text-sm text-blue-500 font-medium rounded transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <div class="flex flex-col">
                            <x-inputs.label value="Dt. Lançamento" />

                            <x-inputs.text-dark type="date" wire:model="form.dataLancamento" class="w-36" />

                            @error('form.dataLancamento')
                                <span class="text-xs uppercase error dark:text-red-500 font-semibold">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="">
                            <label for="data" class="flex flex-col">
                                <x-inputs.label value="Ag. Cobrador" />
                
                                <x-inputs.select wire:model="form.agenteCobrador" class="w-36">
                                    @foreach ($agenteCobradores as $agenteCobrador)
                                        <option class="font-semibold text-gray-300" value="{{ $agenteCobrador->id }}">
                                            {{ $agenteCobrador->nome }}</option>
                                    @endforeach
                                </x-inputs.select>
                            </label>
                            
                            @error('form.agenteCobrador')
                                <span
                                    class="text-xs uppercase error dark:text-red-500 font-semibold">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <x-inputs.label value="Dt. Vencimento" />

                            <x-inputs.text-dark type="date" wire:model="form.dataVencimento" class="w-36" />

                            @error('form.dataVencimento')
                                <span
                                    class="text-xs uppercase error dark:text-red-500 font-semibold">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <x-inputs.label value="Vl. Documento" />

                            <x-inputs.text-dark onkeyup="this.value=this.value.replace(/[^\d]/,'')" type="text"
                                wire:model.lazy="form.valorDocumento" class="w-28" />

                            @error('form.valorDocumento')
                                <span
                                    class="text-xs uppercase error dark:text-red-500 font-semibold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="">
                    <label for="decricao" class="flex flex-col">
                        <span class="font-semibold text-gray-700 dark:text-white">Descrição</span>
                        <textarea wire:model="form.descricao" id="message" rows="3"
                            class="block p-2.5 w-full font-semibold text-md text-gray-300 bg-white rounded-lg border border-gray-500 dark:bg-gray-800"
                            placeholder="Adicione uma descrição..."></textarea>
                    </label>
                </div>

                <div class="mt-4">
                    <x-button.success>
                        Salvar
                    </x-button.success>
                </div>
            </form>
        @endslot
    </x-modal.modal-medium>

</div>
