<div>

    @include('includes.loading')

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
                    placeholder="Pesquisar {{ $sortField }}">
            </div>
        </div>

        <x-button.primary x-data x-on:click="$dispatch('open-modal', { name : 'cadastro' })" class="flex items-center gap-1">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
            </svg>
            Novo Cadastro
        </x-button.primary>

        {{-- <button x-data x-on:click="$dispatch('open-modalfilter')"
            class="flex justify-center sm:w-44 gap-2 text-white font-semibold border p-2 rounded-md bg-indigo-500 transition-all duration-300 hover:scale-95 hover:bg-indigo-600 dark:border-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
            </svg>

            <p class="hidden sm:block">Busca Avançada</p>
        </button> --}}
    </div>

    <div wire:init="load" class="w-full overflow-hidden rounded-lg shadow-xs hidden sm:block">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-2 py-3">
                            <div class="flex items-center cursor-pointer" wire:click="sortFilter('id')">
                                <button class="text-xs font-medium leading-4 tracking-wider uppercase">Cod</button>
                                @include('includes.icon-filter', ['field' => 'id'])
                            </div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex items-center cursor-pointer" wire:click="sortFilter('Nome')">
                                <button class="text-xs font-medium leading-4 tracking-wider uppercase">Nome</button>
                                @include('includes.icon-filter', ['field' => 'nome'])
                            </div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex items-center cursor-pointer" wire:click="sortFilter('email')">
                                <button class="text-xs font-medium leading-4 tracking-wider uppercase">Email</button>
                                @include('includes.icon-filter', ['field' => 'email'])
                            </div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex items-center cursor-pointer" wire:click="sortFilter('Whatsapp')">
                                <button class="text-xs font-medium leading-4 tracking-wider uppercase">Whatsapp</button>
                                @include('includes.icon-filter', ['field' => 'whatsapp'])
                            </div>
                        </th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Data Cadastro</th>
                        <th class="px-4 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($pessoas as $pessoa)
                        <tr wire:key="{{ $pessoa->id }}" class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $pessoa->id }}
                            </td>
                            <td class="px-2 py-3">
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
                                            {{ $pessoa->type }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $pessoa->email }}
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
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path
                                                d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748ZM12.1779 7.17624C11.4834 7.48982 11 8.18846 11 9C11 10.1046 11.8954 11 13 11C13.8115 11 14.5102 10.5166 14.8238 9.82212C14.9383 10.1945 15 10.59 15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C11.41 7 11.8055 7.06167 12.1779 7.17624Z">
                                            </path>
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

    {{-- Listagem Mobile --}}
    <div class="w-full sm:hidden md:hidden lg:hidden">
        <div class="flex flex-col justify-center">
            @foreach ($pessoas as $pessoa)
                <div wire:key="{{ $pessoa->id }}"
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
    {{-- /Listagem Mobile --}}

    <div class="mx-2 mt-2">
        {{ $this->dados()->links('layouts.paginate') }}
    </div>

    <x-modal-filter>
        @slot('body')
            <div class="flex gap-4">
                <div>
                    <span class="font-semibold text-gray-700 dark:text-gray-400">Status</span>
                    <label class="flex">
                        <input wire:model="status" type="radio" name="status" value=""
                            class="shrink-0 mt-0.5 border-gray-200 rounded-full text-purple-600 focus:ring-purple-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-purple-500 dark:checked:border-purple-500 dark:focus:ring-offset-gray-800">
                        <label for="status" class="text-sm text-gray-500 ms-2 dark:text-gray-400">Todos</label>
                    </label>
                    <label class="flex">
                        <input wire:model="status" type="radio" name="status" value="Ativo"
                            class="shrink-0 mt-0.5 border-gray-200 rounded-full text-purple-600 focus:ring-purple-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-purple-500 dark:checked:border-purple-500 dark:focus:ring-offset-gray-800">
                        <label for="status" class="text-sm text-gray-500 ms-2 dark:text-gray-400">Ativos</label>
                    </label>
                    <label class="flex">
                        <input wire:model="status" type="radio" name="status" value="Deletado"
                            class="shrink-0 mt-0.5 border-gray-200 rounded-full text-purple-600 focus:ring-purple-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-purple-500 dark:checked:border-purple-500 dark:focus:ring-offset-gray-800">
                        <label for="status" class="text-sm text-gray-500 ms-2 dark:text-gray-400">Deletados</label>
                    </label>
                </div>
                <div>
                    <span class="font-semibold text-gray-700 dark:text-gray-400">Tipo</span>
                    <label class="flex">
                        <input wire:model="tipoCli" type="checkbox" name="tipo"
                            class="shrink-0 mt-0.5 border-gray-200 rounded-full text-purple-600 focus:ring-purple-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-purple-500 dark:checked:border-purple-500 dark:focus:ring-offset-gray-800">
                        <label for="tipo" class="text-sm text-gray-500 ms-2 dark:text-gray-400">Cliente</label>
                    </label>
                    <label class="flex">
                        <input wire:model="tipoFun" type="checkbox" name="tipo" value="Funcionario"
                            class="shrink-0 mt-0.5 border-gray-200 rounded-full text-purple-600 focus:ring-purple-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-purple-500 dark:checked:border-purple-500 dark:focus:ring-offset-gray-800">
                        <label for="tipo" class="text-sm text-gray-500 ms-2 dark:text-gray-400">Funcionario</label>
                    </label>
                    <label class="flex">
                        <input wire:model="tipoFor" type="checkbox" name="tipo" value="Fornecedor"
                            class="shrink-0 mt-0.5 border-gray-200 rounded-full text-purple-600 focus:ring-purple-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-purple-500 dark:checked:border-purple-500 dark:focus:ring-offset-gray-800">
                        <label for="tipo" class="text-sm text-gray-500 ms-2 dark:text-gray-400">Fornecedor</label>
                    </label>
                </div>
            </div>
        @endslot
        @slot('button')
            <button wire:click="dados()"
                class="w-full px-2 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Buscar
            </button>
        @endslot
    </x-modal-filter>

</div>
