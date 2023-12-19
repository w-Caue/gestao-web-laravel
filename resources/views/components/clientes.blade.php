<div class="flex justify-center">
    <div x-data="{ showClientes: false }" x-show="showClientes" x-cloak x-on:open-clientes.window="showClientes = true"
        x-on:close-clientes.window="showClientes = false" x-on:keydown.escape.window="showClientes = false"
        x-transition.duration.300ms
        class="fixed z-50 bg-white border border-gray-300 shadow-2xl rounded-lg sm:top-28 sm:w-1/3 dark:bg-gray-600 dark:border-gray-500">
        <div x-on:click ="showClientes = false" class="fixed">
        </div>

        <div class="m-3 dark:text-white">
            <h1 class="text-xl font-semibold text-center">Clientes</h1>
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

        {{ $body }}

    </div>
</div>
