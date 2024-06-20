<div>
    <div class="bg-gray-50 rounded-lg shadow-xl flex flex-col w-1/2 dark:bg-gray-800">

        {{-- <div class="m-3 text-gray-700 flex justify-between items-center dark:text-white">
            <h1 class="font-bold text-xl">Relatório</h1>
            <h1 class="font-bold text-xl">Contas</h1>
        </div> --}}

        <form class="p-4">
            <div class="">

                <x-inputs.label value="Cliente / Empresa" />

                <div class="relative w-96">
                    <input wire:model.live="clienteEmpresa" value=""
                        class="block p-3 w-full shadow-md font-semibold border-2 rounded-md text-sm tracking-widest focus:outline-none dark:text-gray-200 dark:bg-gray-800 dark:border-gray-600"
                        placeholder="Pesquisa Cliente / Empresa ">

                    <button x-data x-on:click.prevent="$dispatch('open-detalhes', {name : 'clientes'})"
                        class="absolute top-0 right-0 p-3 text-sm text-blue-500 font-medium rounded transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="my-4">
                <label for="data" class="flex flex-col">
                    <x-inputs.label value="Ag. Cobrador" />

                    <x-inputs.select wire:model="cobrador" class="w-36">
                        @foreach ($cobradores as $cobrador)
                            <option class="font-semibold text-gray-300" value="{{ $cobrador->id }}">
                                {{ $cobrador->nome }}
                            </option>
                        @endforeach
                    </x-inputs.select>
                </label>

                @error('cobrador')
                    <span class="text-xs uppercase error dark:text-red-500 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            <div class="border my-6 mx-5 dark:border-gray-600"></div>

            <div class="flex flex-col my-4">
                <x-inputs.label value="Dt. Lançamento" />

                <div class="flex items-center gap-4">
                    <x-inputs.text-dark type="date" wire:model="inicioDataLancamento" class="w-36" />

                    <span class="text-gray-500 font-semibold uppercase">á</span>

                    <x-inputs.text-dark type="date" wire:model="finalDataLancamento" class="w-36" />
                </div>

                @error('inicioDataLancamento')
                    <span class="text-xs uppercase error dark:text-red-500 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <x-inputs.label value="Dt. Vencimento" />

                <div class="flex items-center gap-4">
                    <x-inputs.text-dark type="date" wire:model="inicioDataVecimento" class="w-36" />

                    <span class="text-gray-500 font-semibold uppercase">á</span>

                    <x-inputs.text-dark type="date" wire:model="finalDataVecimento" class="w-36" />
                </div>

                @error('form.dataLancamento')
                    <span class="text-xs uppercase error dark:text-red-500 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            {{-- <div class="flex gap-2 flex-wrap m-3 w-64">
                    <label for="countries" class="block mb-2 text-lg font-semibold text-gray-900">
                        <span>Status</span>

                        <div class="flex flex-wrap gap-3">
                            <label for="">
                                <input id="link-radio" wire:model="status" name="status" type="radio"
                                    value="Pagar"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                <span class="text-sm">Pagar</span>
                            </label>
                            <label for="">
                                <input id="link-radio" wire:model="status" name="status" type="radio"
                                    value="Vencido"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                <span class="text-sm">Vencido</span>
                            </label>
                            <label for="">
                                <input id="link-radio" wire:model="status" name="status" type="radio"
                                    value="Aberto"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                <span class="text-sm">Aberto</span>
                            </label>
                            <label for="">
                                <input id="link-radio" wire:model="status" name="status" type="radio"
                                    value="Deletado"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                <span class="text-sm">Deletado</span>
                            </label>
                        </div>
                    </label>
                </div> --}}

            <div class="flex justify-center mt-4">
                <x-button.primary x-data x-on:click.prevent="$dispatch('open-modal', {name : 'relatorio'})"
                    wire:click.prevent="relatorio()">
                    Visualizar
                </x-button.primary>
            </div>

        </form>

    </div>

    {{-- @if ($visualizarDocumentos) --}}
    <x-modal.modal-large title="Relatorio de Contas" name="relatorio">
        @slot('body')
            <div class="w-full overflow-hidden rounded-lg shadow-xs hidden sm:block">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3 text-center">Código</th>
                                <th class="px-4 py-3 text-center">Cliente / Empresa</th>
                                <th class="px-4 py-3 text-center">Agente Cobrador</th>
                                <th class="px-4 py-3 text-center">Valor Documento</th>
                                <th class="px-4 py-3 text-center">Data Lançamento</th>
                                <th class="px-4 py-3 text-center">Data Vencimento</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @if ($documentos)
                                @foreach ($documentos as $documento)
                                    <tr wire:key="{{ $documento->id }}" class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm text-center">
                                            {{ $documento->id }}
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <p class="font-semibold">{{ $documento->pessoa->nome }}</p>
                                        </td>
                                        <td class="px-4 py-3 text-sm text-center">

                                        </td>
                                        <td class="px-4 py-3 text-sm text-center">
                                            R${{ number_format($documento->valor_documento, 2, ',', '.') }}
                                        </td>

                                        <td class="px-4 py-3 text-sm text-center">
                                            {{ date('d/m/Y', strtotime($documento->data_lancamento)) }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-center">
                                            {{ date('d/m/Y', strtotime($documento->data_vencimento)) }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                        <tfoot>
                            <tr class="font-semibold text-gray-500 dark:text-gray-400 border-t dark:border-gray-700">
                                <th scope="row" class="px-6 py-3 text-base text-center">Total</th>
                                <th colspan="5" class="px-6 py-3 text-center">
                                    R$ {{ number_format($totais, 2, ',', '.') }}
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        @endslot
    </x-modal.modal-large>
    {{-- @endif --}}

    {{-- Clientes --}}
    <x-modal-detalhes name="clientes" title="Pessoas">
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
</div>
