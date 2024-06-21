<div>
    <div class="bg-gray-50 rounded-lg shadow-xl flex flex-col sm:w-1/2 dark:bg-gray-800">

        {{-- <div class="m-3 text-gray-700 flex justify-between items-center dark:text-white">
            <h1 class="font-bold text-xl">Relatório</h1>
            <h1 class="font-bold text-xl">Contas</h1>
        </div> --}}

        <form class="p-4">
            <div class="">
                <x-inputs.label value="Cliente / Empresa" />

                <div class="relative sm:w-96">
                    <input value="{{ $pessoaRelatorio->nome ?? '' }}"
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

            <div class="flex flex-wrap sm:justify-between items-start my-4">
                <div class="">
                    <label for="cobrador" class="flex flex-col">
                        <x-inputs.label value="Ag. Cobrador" />

                        <x-inputs.select wire:model="cobrador" class="w-36">
                            <option value="" class="font-semibold text-gray-300">Todos</option>
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

                <div class="mt-3 sm:mt-0">
                    <label for="types">
                        <x-inputs.label value="Status" />

                        <div class="sm:w-80 flex flex-wrap gap-3">
                            <label class="flex items-center gap-1">
                                <x-radio.primary wire:model.live="status" value="" check="S" name="status"
                                    id="checkboxChecked" />

                                <x-inputs.label value="Todos" />
                            </label>

                            <label class="flex items-center gap-1">
                                <x-radio.primary wire:model.live="status" value="Aberto" name="status"
                                    id="checkboxChecked" />

                                <x-inputs.label value="Aberto" />
                            </label>

                            <label class="flex items-center gap-1">
                                <x-radio.primary wire:model.live="status" value="Paga" name="status"
                                    id="checkboxChecked" />

                                <x-inputs.label value="Pago" />
                            </label>

                            <label class="flex items-center gap-1">
                                <x-radio.primary wire:model.live="status" value="Pendente" name="status"
                                    id="checkboxChecked" />

                                <x-inputs.label value="Pendente" />
                            </label>

                            <label class="flex items-center gap-1">
                                <x-radio.primary wire:model.live="status" value="Vencimento" name="status"
                                    id="checkboxChecked" />

                                <x-inputs.label value="Vencimento" />
                            </label>
                        </div>
                    </label>
                </div>

            </div>

            <div class="border my-6 mx-5 dark:border-gray-600"></div>

            <div class="flex flex-wrap flex-col my-4">
                <x-inputs.label value="Dt. Lançamento" />

                <div class="flex items-center gap-1 sm:gap-4">
                    <x-inputs.text-dark type="date" wire:model="inicioDataLancamento" class="sm:w-36" />

                    <span class="text-gray-500 font-semibold uppercase">á</span>

                    <x-inputs.text-dark type="date" wire:model="finalDataLancamento" class="sm:w-36" />
                </div>

                @error('inicioDataLancamento')
                    <span class="text-xs uppercase error dark:text-red-500 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <x-inputs.label value="Dt. Vencimento" />

                <div class="flex items-center gap-1 sm:gap-4">
                    <x-inputs.text-dark type="date" wire:model="inicioDataVencimento" class="sm:w-36" />

                    <span class="text-gray-500 font-semibold uppercase">á</span>

                    <x-inputs.text-dark type="date" wire:model="finalDataVencimento" class="sm:w-36" />
                </div>

                @error('form.dataLancamento')
                    <span class="text-xs uppercase error dark:text-red-500 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-center mt-4">
                <x-button.primary x-data x-on:click.prevent="$dispatch('open-modal', {name : 'relatorio'})"
                    wire:click.prevent="relatorio()">
                    Visualizar
                </x-button.primary>
            </div>

        </form>

    </div>

    <x-modal.modal-large title="Relatorio de Contas" name="relatorio">
        @slot('body')
            <div class="w-full overflow-hidden rounded-lg shadow-xs hidden sm:block">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 dark:text-gray-400">
                                <th class="px-4 py-3 text-center">Código</th>
                                <th class="px-4 py-3 text-center">Cliente / Empresa</th>
                                <th class="px-4 py-3 text-center">Agente Cobrador</th>
                                <th class="px-4 py-3 text-center">Valor Documento</th>
                                <th class="px-4 py-3 text-center">Data Lançamento</th>
                                <th class="px-4 py-3 text-center">Data Vencimento</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y dark:divide-gray-700">
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

            <!-- LISTAGEM MOBILE -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs block sm:hidden">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 dark:text-gray-400">
                                <th class="px-4 py-3 text-center">Cód</th>
                                <th class="px-4 py-3 text-center">Cliente / Empresa</th>
                                {{-- <th class="px-4 py-3 text-center">Agente Cobrador</th> --}}
                                <th class="px-4 py-3 text-center">Valor</th>
                                <th class="px-4 py-3 text-center">venc</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y dark:divide-gray-700">
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
                                            R${{ number_format($documento->valor_documento, 2, ',', '.') }}
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
            <!-- /LISTAGEM MOBILE -->
        @endslot
    </x-modal.modal-large>

    {{-- Clientes --}}
    <x-modal-detalhes name="clientes" title="Clientes">
        @slot('body')

            <div class="flex justify-center mt-5">
                <div class="relative w-96">
                    <input wire:model.live="search"
                        class="block p-3 w-full shadow-md font-semibold border-2 rounded-md text-sm tracking-widest focus:outline-none dark:text-gray-200 dark:bg-gray-800 dark:border-gray-600"
                        placeholder="Pesquisa Cliente / Empresa ">

                    <button wire:click.prevent="pesquisaPessoas()"
                        class="absolute top-0 right-0 p-3 text-sm text-blue-500 font-medium rounded transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            @if ($pessoas)
                <div class="flex justify-center items-center flex-wrap m-3 overflow-auto h-auto max-h-60">
                    @foreach ($pessoas as $pessoa)
                        <div wire:click="selecionePessoa({{ $pessoa->id }})"
                            class="m-2 p-3 text-sm font-semibold text-gray-500 border-2 rounded w-44 shadow-xl hover:scale-105 cursor-pointer transition-all dark:text-gray-400 dark:bg-gray-800 dark:border-gray-700">

                            <div class="flex items-center gap-1 mb-1">
                                <h1 class="dark:text-blue-500">#{{ $pessoa->id }} </h1>
                                <span class="uppercase text-xs">- {{ $pessoa->tipo }}</span>

                            </div>
                            <h1 class="uppercase mb-1 text-gray-100">
                                {{ $pessoa->nome }}
                            </h1>
                            <h1 class="text-xs uppercase dark:text-gray-500">
                                {{ $pessoa->telefone }}
                            </h1>
                        </div>
                    @endforeach
                </div>
            @endif
        @endslot
    </x-modal-detalhes>
</div>
