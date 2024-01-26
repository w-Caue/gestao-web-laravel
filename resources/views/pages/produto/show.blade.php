<x-app-layout>
    <title>Cadastro - Gestão S7</title>
    <div class="flex justify-between">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Cadastro Completo
        </h2>

        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('produto.index') }}"
                        class="inline-flex items-center text-sm font-semibold text-purple-500 hover:text-purple-600 dark:text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 me-2.5">
                            <path
                                d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                            <path fill-rule="evenodd"
                                d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.163 3.75A.75.75 0 0 1 10 12h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75Z"
                                clip-rule="evenodd" />
                        </svg>
                        Produtos
                    </a>
                </li>
                {{-- <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-purple-500 dark:text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ route('produto.index') }}"
                            class="ms-1 text-sm font-semibold text-purple-500 hover:text-purple-600 dark:text-gray-500">Produtos</a>
                    </div>
                </li> --}}
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-purple-500 dark:text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span
                            class="ms-1 text-sm font-semibold text-purple-500 hover:text-purple-600 dark:text-gray-500">Produto
                            {{ $codigo }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    @livewire('Produto.CadastroProdutos', ['codigo' => $codigo])

</x-app-layout>
