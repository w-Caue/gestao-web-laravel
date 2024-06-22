<div>

    @include('includes.loading')

    <div class="w-full bg-white rounded-lg dark:bg-gray-800">
        <div class="flex flex-col sm:flex-row justify-center sm:justify-between items-center gap-2 sm:gap-0 p-3">

            <div class="w-full sm:w-72">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input wire:model.live="search" type="text" id="table-search"
                        class="p-2 pl-10 text-sm text-gray-600 font-semibold rounded w-full bg-white dark:bg-gray-800 dark:text-white"
                        placeholder="Pesquisar {{ $sortField }}">
                </div>
            </div>

            <x-button.primary x-data x-on:click="$dispatch('open-modal', { name : 'cadastro' })"
                class="flex items-center gap-1 mx-4">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                </svg>
                Novo Cadastro
            </x-button.primary>

        </div>

        <div class="border my-4 mx-32 dark:border-gray-700"></div>

        <div wire:init="load" class="w-full overflow-hidden rounded-lg shadow-xs hidden sm:block">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 dark:text-gray-400">
                            <th class="px-2 py-3">
                                <div class="flex items-center justify-center cursor-pointer"
                                    wire:click="sortFilter('id')">
                                    <button class="text-xs font-medium leading-4 tracking-wider uppercase">Cod</button>
                                    @include('includes.icon-filter', ['field' => 'id'])
                                </div>
                            </th>
                            <th class="px-4 py-3">
                                <div class="flex items-center justify-center cursor-pointer"
                                    wire:click="sortFilter('Nome')">
                                    <button class="text-xs font-medium leading-4 tracking-wider uppercase">Nome</button>
                                    @include('includes.icon-filter', ['field' => 'nome'])
                                </div>
                            </th>
                            <th class="px-4 py-3">
                                <div class="flex items-center justify-center cursor-pointer"
                                    wire:click="sortFilter('Email')">
                                    <button
                                        class="text-xs font-medium leading-4 tracking-wider uppercase">Email</button>
                                    @include('includes.icon-filter', ['field' => 'email'])
                                </div>
                            </th>
                            <th class="px-4 py-3">
                                <div class="flex items-center justify-center cursor-pointer"
                                    wire:click="sortFilter('Telefone')">
                                    <button
                                        class="text-xs font-medium leading-4 tracking-wider uppercase">Telefone</button>
                                    @include('includes.icon-filter', ['field' => 'telefone'])
                                </div>
                            </th>
                            <th class="px-4 py-3 text-center">Status</th>
                            <th class="px-4 py-3 text-center">Data Cadastro</th>
                            <th class="px-4 py-3 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y font-semibold dark:divide-gray-700">
                        @foreach ($pessoas as $pessoa)
                            <tr wire:key="{{ $pessoa->id }}" class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm text-center">
                                    {{ $pessoa->id }}
                                </td>
                                <td class="px-2 py-3">
                                    <div class="flex items-center justify-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div class="relative hidden mx-2 md:block">
                                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5"
                                                    d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-semibold">{{ $pessoa->nome }}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                {{ $pessoa->tipo }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm text-center">
                                    {{ $pessoa->email }}
                                </td>
                                <td class="px-4 py-3 text-sm text-center">
                                    {{ $pessoa->telefone }}
                                </td>
                                <td class="px-4 py-3 text-xs text-center">
                                    @if ($pessoa->status == 'Ativo')
                                        <span
                                            class="py-2 px-3 font-semibold uppercase leading-tight text-green-100 bg-green-400 rounded-full dark:bg-green-200 dark:text-green-600">
                                            {{ $pessoa->status }}
                                        </span>
                                    @else
                                        <span
                                            class="py-1 px-3 font-semibold uppercase leading-tight text-red-700 bg-green-100 rounded-full dark:bg-red-700 dark:text-green-100">
                                            {{ $pessoa->status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm text-center">
                                    {{ date('d/m/Y', strtotime($pessoa->created_at)) }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-center space-x-2 text-sm">
                                        <a href=" {{ route('pessoal.show', ['codigo' => $pessoa->id]) }}"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg hover:scale-105 dark:hover:text-purple-600 dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <path
                                                    d="M11 2C15.968 2 20 6.032 20 11C20 15.968 15.968 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2ZM11 18C14.8675 18 18 14.8675 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18ZM19.4853 18.0711L22.3137 20.8995L20.8995 22.3137L18.0711 19.4853L19.4853 18.0711Z">
                                                </path>
                                            </svg>
                                        </a>

                                        <button wire:click="remover({{ $pessoa->id }})"
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
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mx-2 mt-2">
            {{ $this->dados()->links('layouts.paginate') }}
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
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M11 2C15.968 2 20 6.032 20 11C20 15.968 15.968 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2ZM11 18C14.8675 18 18 14.8675 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18ZM19.4853 18.0711L22.3137 20.8995L20.8995 22.3137L18.0711 19.4853L19.4853 18.0711Z">
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

</div>
