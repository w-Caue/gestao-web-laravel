<div>
    @include('includes.loading')


    <div class="grid gap-6 mb-16 md:grid-cols-2 items-start" wfd-id="87">

        <div class="relative text-gray-500 bg-white rounded p-2 dark:bg-gray-800">

            <div x-data="{ open: false }"
                class="flex justify-between items-center gap-3 mx-4 border-b pb-2 dark:border-gray-700">

                <div class="flex items-center gap-2">
                    <x-icons.wallet class="text-yellow-500" />
                    <x-inputs.label-text value="Formas de Pagamentos"
                        class=" text-xs font-semibold tracking-widest uppercase text-gray-600 dark:text-gray-400" />
                </div>


                <button x-ref="button" x-on:mouseover="open = true" x-on:mouseout="open = false"
                    class="text-gray-600 dark:text-gray-500 dark:hover:text-gray-200">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 9.5C12.8284 9.5 13.5 8.82843 13.5 8C13.5 7.17157 12.8284 6.5 12 6.5C11.1716 6.5 10.5 7.17157 10.5 8C10.5 8.82843 11.1716 9.5 12 9.5ZM14 15H13V10.5H10V12.5H11V15H10V17H14V15Z">
                        </path>
                    </svg>
                </button>

                <div class="absolute right-2 top-8 border bg-white rounded-md p-3 dark:bg-gray-800 dark:border-gray-500"
                    x-show="open" x-anchor="$refs.button" x-transition x-transition.duration.300ms>
                    <div class="flex items-center gap-1">
                        <div class="h-3 w-3 rounded-full bg-red-500">
                        </div>

                        <span class="text-xs font-semibold tracking-widest uppercase text-red-500">deletado</span>
                    </div>
                </div>
            </div>

            <div class="relative overflow-x-auto mt-5 sm:mx-7">
                <table wire:init="load"
                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase border-b dark:text-gray-400 dark:border-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">
                                Código
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Nome
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Ação
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y font-semibold dark:divide-gray-700">
                        @foreach ($pagamentos as $pagamento)
                            <tr class=" border-gray-200  dark:border-gray-700">
                                <td class="py-4 text-center">
                                    #{{ $pagamento->id }}
                                </td>

                                <td scope="row"
                                    class="py-4 font-medium uppercase text-center text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $pagamento->nome }}
                                </td>
                                <td class="py-3 flex justify-center">
                                    <button wire:click="remover()"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-yellow-500 rounded-lg hover:scale-95 dark:hover:text-yellow-600
                                             dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-between items-start mt-5">
                <x-button.primary x-data x-on:click="$dispatch('open-modal', { name : 'pagamentos' })"
                    class="flex items-center gap-1 mx-4">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                    </svg>
                    incluir
                </x-button.primary>

                <label for="takePagamento">
                    <x-radio.hidden wire:model.live="takePagamento" id="takePagamento" value="15" />

                    <span for="takePagamento"
                        class="text-xs uppercase font-semibold hover:text-blue-500 hover:scale-95 transition-all cursor-pointer">ver
                        todos</span>

                </label>
            </div>

        </div>

        <div class="relative text-gray-500 bg-white rounded p-2 dark:bg-gray-800">

            <div x-data="{ open: false }"
                class="flex justify-between items-center gap-3 mx-4 border-b pb-2 dark:border-gray-700">

                <div class="flex items-center gap-2">
                    <x-icons.bank class="text-purple-500" />
                    <x-inputs.label-text value="Agentes Cobradores"
                        class=" text-xs font-semibold tracking-widest uppercase text-gray-600 dark:text-gray-400" />
                </div>


                <button x-ref="button" x-on:mouseover="open = true" x-on:mouseout="open = false"
                    class="text-gray-600 dark:text-gray-500 dark:hover:text-gray-200">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 9.5C12.8284 9.5 13.5 8.82843 13.5 8C13.5 7.17157 12.8284 6.5 12 6.5C11.1716 6.5 10.5 7.17157 10.5 8C10.5 8.82843 11.1716 9.5 12 9.5ZM14 15H13V10.5H10V12.5H11V15H10V17H14V15Z">
                        </path>
                    </svg>
                </button>

                <div class="absolute right-2 top-8 border bg-white rounded-md p-3 dark:bg-gray-800 dark:border-gray-500"
                    x-show="open" x-anchor="$refs.button" x-transition x-transition.duration.300ms>
                    <div class="flex items-center gap-1">
                        <div class="h-3 w-3 rounded-full bg-red-500">
                        </div>

                        <span class="text-xs font-semibold tracking-widest uppercase text-red-500">deletado</span>
                    </div>
                </div>
            </div>

            <div class="relative overflow-x-auto mt-5 sm:mx-7">
                <table wire:init="load"
                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase border-b dark:text-gray-400 dark:border-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">
                                Código
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Nome
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Ação
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y font-semibold dark:divide-gray-700">
                        @foreach ($cobradores as $cobrador)
                            <tr class=" border-gray-200  dark:border-gray-700">
                                <td class="py-4 text-center">
                                    #{{ $cobrador->id }}
                                </td>

                                <td scope="row"
                                    class="py-4 font-medium uppercase text-center text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $cobrador->nome }}
                                </td>
                                <td class="py-3 flex justify-center">
                                    <button wire:click="remover()"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg hover:scale-95 dark:hover:text-purple-600
                                             dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-between items-start mt-5">
                <x-button.primary x-data x-on:click="$dispatch('open-modal', { name : 'cobradores' })"
                    class="flex items-center gap-1 mx-4">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                    </svg>
                    incluir
                </x-button.primary>

                <label for="takeCobrador">
                    <x-radio.hidden wire:model.live="takeCobrador" id="takeCobrador" value="15" />

                    <span for="takeCobrador"
                        class="text-xs uppercase font-semibold hover:text-blue-500 hover:scale-95 transition-all cursor-pointer">ver
                        todos</span>

                </label>
            </div>

        </div>
    </div>

    <x-modal.modal-small title="Criar Pagamento" name="pagamentos">
        @slot('body')

            <form wire:submit.prevent="savePagamento()">
                <div class="w-full mb-2">

                    <x-inputs.label-text class="dark:text-gray-200" value="nome" />

                    <x-inputs.text-dark wire:model="nomePagamento" class="w-full" placeholder="insira o nome aqui" />

                    @error('nomePagamento')
                        <span class="error text-xs uppercase font-semibold dark:text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-center mt-5">
                    <x-button.success type="submit">
                        Salvar
                    </x-button.success>
                </div>
            </form>
        @endslot
    </x-modal.modal-small>

    <x-modal.modal-small title="Criar Agente Cobrador" name="cobradores">
        @slot('body')

            <form wire:submit.prevent="saveCobrador()">
                <div class="flex gap-3">
                    <div class="w-24 mb-2">

                        <x-inputs.label-text class="dark:text-gray-200" value="sigla" />

                        <x-inputs.text-dark wire:model="siglaCobrador" class="w-full" placeholder="" />

                        @error('siglaCobrador')
                            <span class="error text-xs uppercase font-semibold dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full mb-2">

                        <x-inputs.label-text class="dark:text-gray-200" value="nome" />

                        <x-inputs.text-dark wire:model="nomeCobrador" class="w-full" placeholder="insira o nome aqui" />

                        @error('nomeCobrador')
                            <span class="error text-xs uppercase font-semibold dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-center mt-5">
                    <x-button.success type="submit">
                        Salvar
                    </x-button.success>
                </div>
            </form>
        @endslot
    </x-modal.modal-small>

</div>
