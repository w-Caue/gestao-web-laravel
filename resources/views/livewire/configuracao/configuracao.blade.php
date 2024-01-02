<div>
    <div class="flex flex-wrap gap-4">
        <button x-data x-on:click="$dispatch('open-modal')"
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:w-1/3 hover:bg-gray-100 cursor-pointer m-5 dark:bg-gray-500 dark:border-none dark:hover:bg-gray-600">
            <div class="border p-4 m-2 rounded-full text-white bg-orange-500 dark:border-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-9 h-9">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3" />
                </svg>

            </div>
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Formas de Pagamentos
                </h5>
                <p class="mb-1 font-semibold text-gray-600 dark:text-gray-300">Crie as formas de pagamentos para seus
                    clientes</p>
            </div>
        </button>
    </div>

    @if ($modal)
        <x-modal-web title="Formas de Pagamentos">
            @slot('body')
                <div class="mx-3 flex items-center gap-3">

                    <div class="">
                        <button wire:click.prevent="mostrarForm()"
                            class="flex flex-row gap-2 text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-blue-600 dark:border-none">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m7 10 2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Novo
                        </button>
                    </div>

                    {{-- <div>
                    <button
                        class="flex flex-row gap-2 text-white font-semibold border p-2 rounded-md bg-green-500 transition-all duration-300 hover:scale-95 hover:bg-green-600 dark:border-none">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.905 1.316 15.633 6M18 10h-5a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h5m0-5a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1m0-5V7a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h15a1 1 0 0 0 1-1v-3m-6.367-9L7.905 1.316 2.352 6h9.281Z" />
                        </svg>
                        Baixar
                    </button>
                </div>

                <div class="">
                    <button
                        class="flex flex-row gap-2 text-white font-semibold border p-2 rounded-md bg-purple-500 transition-all duration-300 hover:scale-95 hover:bg-purple-600 dark:border-none">
                        <svg class="w-6 h-6 hover:animate-spin" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97" />
                        </svg>
                        Retornar
                    </button>
                </div> --}}

                </div>
                <div class="grid grid-cols-2">
                    <div class="m-3 overflow-auto h-80 ">
                        @foreach ($formasPagamentos as $formaPagamento)
                            <div wire:key="{{ $formaPagamento->id }}"
                                class="border-2 rounded p-2 my-2 {{ $formaPagamento->status == 'Deletado' ? 'border-red-500' : '' }}">
                                <button wire:click.prevent="formaPG({{ $formaPagamento }})"
                                    class="text-gray-800 font-semibold text-md rounded dark:text-gray-300 {{ $formaPagamento->status == 'Deletado' ? 'text-red-500 dark:text-red-500' : '' }}">{{ $formaPagamento->nome }}</button>
                            </div>
                        @endforeach
                    </div>

                    <div>
                        @if ($newFormaPG)
                            <div class=" p-2 mx-2">
                                <span class="text-gray-600 text-2xl font-semibold dark:text-white">
                                    Forma de Pagamento
                                </span>

                                <form wire:submit.prevent="{{ $formaDePagamento->id ? 'update()' : 'save()' }}"
                                    class="flex flex-col">
                                    <input wire:model.live="nome" type="text"
                                        class="text-gray-600 font-semibold rounded bg-gray-200">
                                    <div class="flex items-center gap-1">
                                        <button
                                            class="text-white font-semibold border p-2 my-2 w-72 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 dark:border-none"
                                            type="submit">
                                            Salvar
                                        </button>

                                        @if (isset($formaDePagamento->status) == 'Deletado')
                                            <button wire:click.prevent="deleteRetorno()"
                                                class="text-white font-semibold border p-2 my-2 rounded-md bg-indigo-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-700 dark:border-none"
                                                type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                </svg>
                                            </button>
                                        @else
                                            <button wire:click.prevent="deleteRetorno()"
                                                class="text-white font-semibold border p-2 my-2 rounded-md bg-red-500 transition-all duration-300 hover:scale-95 hover:bg-red-700 dark:border-none"
                                                type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>

                                            </button>
                                        @endif

                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @endslot
        </x-modal-web>
    @endif
</div>
