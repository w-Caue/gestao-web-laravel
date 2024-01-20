<div>
    <div class="flex justify-normal sm:justify-between items-end gap-2 sm:gap-0 flex-wrap my-2 ">
        <div class="md:mb-0">
            <label for="table-search" class="sr-only">Pesquisa</label>
            <div class="relative mt-2">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input wire:model.live="pesquisa" type="text" id="table-search"
                    class="p-2 pl-10 text-sm text-gray-600 font-semibold rounded-lg sm:w-80 bg-white dark:bg-gray-800 dark:text-white"
                    placeholder="Pesquisar">
            </div>
        </div>

        <button x-data x-on:click="$dispatch('open-modalfilter')"
            class="flex justify-center sm:w-44 gap-2 text-white font-semibold border p-2 rounded-md bg-indigo-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-600 dark:border-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
            </svg>

            <p class="hidden sm:block">Busca Avançada</p>
        </button>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs hidden sm:block">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Nome</th>
                        <th class="px-4 py-3">Whatsapp</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Data Cadastro</th>
                        <th class="px-4 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($pessoas as $pessoa)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $pessoa->id }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden mx-2 md:block">
                                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{ $pessoa->nome }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            @if ($pessoa->tipo_cliente == 'S') Cliente @endif  @if ($pessoa->tipo_funcionario == 'S') Funcionario @endif @if ($pessoa->tipo_fornecedor == 'S') Fornecedor @endif
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $pessoa->whatsapp }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                @if ($pessoa->status == 'Ativo')
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{ $pessoa->status }}
                                    </span>
                                @else
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-green-100 rounded-full dark:bg-red-700 dark:text-green-100">
                                        {{ $pessoa->status }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ date('d/m/Y', strtotime($pessoa->created_at)) }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-2 text-sm">
                                    <a href=" {{ route('pessoal.show', ['codigo' => $pessoa->id]) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg hover:scale-105 dark:hover:text-purple-600 dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>

                                    <button wire:click="remover({{ $pessoa->id }})"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg hover:scale-95 dark:hover:text-purple-600
                                         dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>

                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <div class="w-full sm:hidden md:hidden lg:hidden">
        <div class="flex flex-col justify-center">
            @foreach ($pessoas as $pessoa)
                <div
                    class="text-md font-semibold text-gray-700 p-2 my-1 bg-gray-50 rounded-lg dark:text-white dark:bg-gray-800">
                    <div class="flex justify-between items-center">
                        <span class="text-blue-500">#{{ $pessoa->id }}</span>

                        <a href=" {{ route('pessoal.show', ['codigo' => $pessoa->id]) }}"
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg hover:scale-105 dark:hover:text-purple-600 dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                </path>
                            </svg>
                        </a>
                    </div>
                    <div class="flex justify-between my-2">
                        <p class="flex flex-wrap">{{ $pessoa->nome }}</p>
                        <p class="text-gray-400">{{ $pessoa->tipo }}</p>
                    </div>

                    <p class="flex flex-wrap">{{ $pessoa->email }}</p>

                    <div class="flex justify-between items-center">
                        <p class="text-gray-400">{{ $pessoa->whatsapp }}</p>

                        @if ($pessoa->status == 'Ativo')
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                {{ $pessoa->status }}
                            </span>
                        @else
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-green-100 rounded-full dark:bg-red-700 dark:text-green-100">
                                {{ $pessoa->status }}
                            </span>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="mx-2 mt-2">
        {{ $pessoas->links('layouts.paginate') }}
    </div>

    <div x-cloak x-data=" isModalOpen : false" x-on:open-modalfilter.window="isModalOpen = true" x-on:close-modalfilter.window="isModalOpen = false"  >
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
            <!-- Modal -->
            <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0  transform translate-y-1/2" x-on:click.away="isModalOpen = false"
                x-on:keydown.escape="isModalOpen = false"
                class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                role="dialog" id="modal">
                <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                <header class="flex justify-end">
                    <button
                        class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                        aria-label="close" x-on:click="isModalOpen = false">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img"
                            aria-hidden="true">
                            <path
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </header>
                <!-- Modal body -->
                <div class="mt-4 mb-6">
                    <!-- Modal title -->
                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                        Modal header
                    </p>
                    <!-- Modal description -->
                    <p class="text-sm text-gray-700 dark:text-gray-400">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum et
                        eligendi repudiandae voluptatem tempore!
                    </p>
                </div>
                <footer
                    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                    <button x-on:click="isModalOpen = false"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                        Cancelar
                    </button>
                    <button
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Buscar
                    </button>
                </footer>
            </div>
        </div>
    </div>


</div>
