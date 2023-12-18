<div>

    <div class="flex justify-between items-center flex-wrap my-2 mx-7">
        <div class="mb-4 md:mb-0">
            <label for="table-search" class="sr-only">Pesquisa</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-600 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input wire:model.live="search" type="text" id="table-search"
                    class="block p-2 pl-10 text-sm text-gray-600 font-semibold border border-gray-300 rounded-lg w-80 bg-white dark:bg-gray-600 dark:text-white"
                    placeholder="Pesquisar Cliente">
            </div>
        </div>

        <div class="flex gap-3 mb-4 md:mb-0">
            <label for="">
                <input wire:model.live='tipo' value="Cliente"
                    class=" h-5 w-5 appearance-none rounded-full border-2 border-solid border-gray-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-blue-600 checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s]"
                    type="radio" name="tipo" id="radioNoLabel01" />
                <span class="text-md font-semibold text-gray-500 dark:text-gray-200">Cliente</span>
            </label>

            <label for="">
                <input wire:model.live='tipo' value="Empresa"
                    class=" h-5 w-5 appearance-none rounded-full border-2 border-solid border-gray-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-blue-600 checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s]"
                    type="radio" name="tipo" id="radioNoLabel01" />
                <span class="text-md font-semibold text-gray-500 dark:text-gray-200">Empresa</span>
            </label>
        </div>

        <button x-data x-on:click="$dispatch('open-modal')"
            class="flex flex-row gap-2 text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 dark:border-none">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
            </svg>
            Novo Cliente
        </button>

    </div>

    <div class="mx-7 relative overflow-x-auto shadow-md rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-white">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:text-white dark:bg-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Whatsapp
                    </th>

                    <th scope="col" class="px-6 py-3">

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr wire:key="{{ $cliente->id }}"
                        class="bg-white border-b hover:bg-gray-50 dark:text-gray-100 dark:bg-gray-500 dark:hover:bg-gray-600 dark:border-gray-400">
                        <th scope="row"
                            class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-gray-200">
                            {{ $cliente->id }}
                        </th>
                        <th scope="row"
                            class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-gray-200">
                            {{ $cliente->nome }}
                        </th>
                        <td class="px-6 py-3 ">
                            {{ $cliente->email }}
                        </td>
                        <td class="px-6 py-3">
                            <button class="flex gap-1 hover:underline hover:text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                    <path
                                        d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                </svg>
                                {{ $cliente->whatsapp }}
                            </button>
                        </td>

                        <td class="px-6 py-3 text-right">
                            <button wire:click="edit({{ $cliente->id }})"
                                class="text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 dark:border-none">
                                <span>Editar</span>
                            </button>

                            <button wire:click.prevent="remover({{ $cliente->id }})"
                                class="text-white font-semibold border p-2 rounded-md bg-red-500 transition-all duration-300 hover:scale-95 hover:bg-red-600 dark:border-none">
                                <span>Deletar</span>
                            </button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mx-7 mt-2">
        {{ $clientes->links('layouts.paginate') }}
    </div>

    <div x-data="{ show: false }" x-show="show" x-cloak x-on:open-modal.window="show = true"
        x-on:close-modal.window="show = false" x-on:keydown.escape.window="show = false" class="fixed z-50 inset-0"
        x-transition.duration.200ms>
        <div x-on:click ="show = false" class="fixed inset-0 bg-gray-900 opacity-40">
        </div>
        <div class="bg-white rounded m-auto fixed inset-0 max-w-2xl h-auto dark:bg-gray-600 dark:border-gray-400"
            style="max-height: 450px">
            <div class="py-3 flex items-center justify-between mx-3 my-2">
                <h1 class="text-xl font-semibold text-center dark:text-white">Cliente</h1>
                <button x-on:click="$dispatch('close-modal')"
                    class="p-1 m-1 border rounded float-right hover:text-white hover:bg-red-500 dark:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <div>
                <div class="m-2 flex justify-center">
                    <form wire:submit.prevent="{{ $form->clienteId ? 'update()' : 'save()' }}"
                        class="w-full max-w-2xl font-semibold">
                        <div class="w-full px-3">
                            <label
                                class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                for="grid-first-name">
                                Nome
                            </label>
                            <input wire:model="form.nome"
                                class="appearance-none block w-full bg-white text-gray-700 border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                                id="grid-first-name" type="text" value="">

                        </div>

                        <div class="w-full px-3">
                            <label
                                class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                for="grid-first-name">
                                Email
                            </label>
                            <input wire:model="form.email"
                                class="appearance-none block w-full bg-white text-gray-700 border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                                id="grid-first-name" type="text" placeholder="">

                        </div>

                        <div class="flex gap-7 items-center ml-3">
                            <div class="flex flex-wrap -mx-3 m-4">
                                <div class="w-full px-3">
                                    <label
                                        class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                        for="grid-first-name">
                                        Whatsapp
                                    </label>
                                    <input wire:model="form.whatsapp"
                                        class="appearance-none block w-full bg-white text-gray-700 border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                                        id="grid-first-name" type="text" placeholder="">

                                </div>
                            </div>

                            <div class="flex -mx-3 mb-4">
                                <label for="countries"
                                    class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white">
                                    <span>Tipo</span>

                                    <div class="flex flex-wrap gap-3">
                                        <label for="">
                                            <input wire:model.live="form.tipo"
                                                class="h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-gray-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-gray-400 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                                type="checkbox" value="Empresa" id="checkboxChecked" />
                                            <span class="text-gray-600 text-sm dark:text-gray-300">Empresa</span>
                                        </label>
                                    </div>
                                    @error('form.tipo')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>

                        </div>

                        <div class="mb-3 ">
                            <div class="flex justify-center">
                                <button type="submit"
                                    class="flex flex-row gap-2 text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 dark:border-none">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($mostrarEdicao)
        <div class="bg-white rounded m-auto fixed inset-0 max-w-2xl h-auto dark:bg-gray-600 dark:border-gray-400"
            style="max-height: 450px">
            <div class="py-3 flex items-center justify-between mx-3 my-2">
                <h1 class="text-xl font-semibold text-center dark:text-white">Cliente</h1>
                <button wire:click="novoCliente()"
                    class="p-1 m-1 border rounded float-right hover:text-white hover:bg-red-500 dark:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <div>
                <div class="m-2 flex justify-center">
                    <form wire:submit.prevent="{{ $form->clienteId ? 'update()' : 'save()' }}"
                        class="w-full max-w-2xl font-semibold">
                        <div class="w-full px-3">
                            <label
                                class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                for="grid-first-name">
                                Nome
                            </label>
                            <input wire:model="form.nome"
                                class="appearance-none block w-full bg-white text-gray-700 border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                                id="grid-first-name" type="text" value="">

                        </div>

                        <div class="w-full px-3">
                            <label
                                class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                for="grid-first-name">
                                Email
                            </label>
                            <input wire:model="form.email"
                                class="appearance-none block w-full bg-white text-gray-700 border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                                id="grid-first-name" type="text" placeholder="">

                        </div>

                        <div class="flex gap-7 items-center ml-3">
                            <div class="flex flex-wrap -mx-3 m-4">
                                <div class="w-full px-3">
                                    <label
                                        class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white"
                                        for="grid-first-name">
                                        Whatsapp
                                    </label>
                                    <input wire:model="form.whatsapp"
                                        class="appearance-none block w-full bg-white text-gray-700 border-2 border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-300"
                                        id="grid-first-name" type="text" placeholder="">

                                </div>
                            </div>

                            <div class="flex -mx-3 mb-4">
                                <label for="countries"
                                    class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 dark:text-white">
                                    <span>Tipo</span>

                                    <div class="flex flex-wrap gap-3">
                                        <label for="">
                                            <input wire:model.live="form.tipo"
                                                class="h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-gray-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-gray-400 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                                type="checkbox" value="Empresa" id="checkboxChecked" />
                                            <span class="text-gray-600 text-sm dark:text-gray-300">Empresa</span>
                                        </label>
                                    </div>
                                    @error('form.tipo')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>

                        </div>

                        <div class="mb-3 ">
                            <div class="flex justify-center">
                                <button type="submit"
                                    class="flex flex-row gap-2 text-white font-semibold border p-2 rounded-md bg-blue-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-500 dark:border-none">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

</div>
