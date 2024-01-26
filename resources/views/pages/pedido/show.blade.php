<x-app-layout>
    <div class="flex justify-between">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Pedidos
        </h2>

        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('pedidos.index') }}"
                        class="inline-flex items-center text-sm font-semibold text-purple-500 hover:text-purple-600 dark:text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 me-2.5">
                            <path
                                d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                        </svg>

                        Pedidos
                    </a>
                </li>
                {{-- <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-purple-500 dark:text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ route('pedidos.index') }}"
                            class="ms-1 text-sm font-semibold text-purple-500 hover:text-purple-600 dark:text-gray-500">Pedidos</a>
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
                            class="ms-1 text-sm font-semibold text-purple-500 hover:text-purple-600 dark:text-gray-500">Pedido
                            {{ $codigo }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    @livewire('Pedidos.DetalhePedidos', ['codigo' => $codigo])

</x-app-layout>
