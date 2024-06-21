<div>

    <div x-cloak x-data="{ show: 'pagar' }">

        <div class="flex gap-2">
            <button :class="{ 'active font-bold text-gray-800 bg-white dark:text-white dark:bg-gray-800': show === 'pagar' }"
                class="py-2 px-4 text-sm uppercase font-semibold border border-b-0 border-white rounded-t hover:text-gray-500 dark:border-gray-800 dark:text-gray-600 dark:hover:text-white"
                x-on:click="show = 'pagar'">
                A pagar
            </button>

            <button :class="{ 'active font-bold text-gray-800 bg-white dark:text-white dark:bg-gray-800': show === 'receber' }"
                class="py-2 px-4 text-sm uppercase font-semibold border border-b-0 border-white rounded-t hover:text-gray-500 dark:border-gray-800 dark:text-gray-600 dark:hover:text-white"
                x-on:click="show = 'receber'">
                A receber
            </button>
        </div>

        <div x-show="show === 'pagar'">
            @livewire('Contas.ListagemContasPagar')
        </div>
    </div>

    <x-modal.modal-medium title="Contas a Pagar" name="cadastro">
        @slot('body')
            <x-modal-detalhes name="clientes" title="Clientes">
                @slot('body')
                
                    <div class="flex justify-center mt-5">
                        <div class="relative w-96">
                            <input wire:model.live="search" value="{{ $form->clienteDocumento->nome ?? '' }}"
                                class="block p-3 w-full shadow-md font-semibold border-2 rounded-md text-sm tracking-widest focus:outline-none dark:text-gray-200 dark:bg-gray-800 dark:border-gray-600"
                                placeholder="Pesquisa Cliente / Empresa ">

                            <button wire:click.prevent="pesquisaClientes()"
                                class="absolute top-0 right-0 p-3 text-sm text-blue-500 font-medium rounded transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    @if ($clientes)
                        <div class="flex justify-center items-center flex-wrap m-3 overflow-auto h-auto max-h-60">
                            @foreach ($clientes as $cliente)
                                <div wire:click="selecioneCliente({{ $cliente->id }})"
                                    class="m-2 p-3 text-sm font-semibold text-gray-500 border-2 rounded w-44 shadow-xl hover:scale-105 cursor-pointer transition-all dark:text-gray-400 dark:bg-gray-800 dark:border-gray-700">

                                    <div class="flex items-center gap-1 mb-1">
                                        <h1 class="dark:text-blue-500">#{{ $cliente->id }} </h1>
                                        <span class="uppercase text-xs">- {{ $cliente->tipo }}</span>

                                    </div>
                                    <h1 class="uppercase mb-1 text-gray-100">
                                        {{ $cliente->nome }}
                                    </h1>
                                    <h1 class="text-xs uppercase dark:text-gray-500">
                                        {{ $cliente->telefone }}
                                    </h1>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endslot
            </x-modal-detalhes>

            <form wire:submit="save()" class="m-5 rounded">
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

                    <div class="flex flex-wrap gap-3">
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
                                <span class="text-xs uppercase error dark:text-red-500 font-semibold">{{ $message }}</span>
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
                        <x-inputs.label value="Descrição" />
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
