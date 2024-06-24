<div>
    <!-- Cards -->
    <div class="grid gap-6 mb-16 md:grid-cols-2 xl:grid-cols-4" wfd-id="87">

        <!-- Card -->
        <a href="{{ route('pessoal.index') }}" class="hover:shadow-lg" title="Total de clientes que você tem acesso">
            <x-card.icon-card title="Clientes" subtitle="{{ $clientesCard }}" color="yellow">
                <x-icons.pessoas />
            </x-card.icon-card>
        </a>

        <a href="{{ route('contas.index') }}" class="hover:shadow-lg" title="Total de produtos cadastrados">
            <x-card.icon-card title="Contas (mês atual)" subtitle="{{ $contasCard }}" color="gray">
                <x-icons.contas />
            </x-card.icon-card>
        </a>

        <a href="" class="hover:shadow-lg" title="Total de pedidos autenticados realizados">
            <x-card.icon-card title="Pedidos (Abertos)" subtitle="" color="blue">
                <x-icons.pedidos class="w-12" />
            </x-card.icon-card>
        </a>
    </div>
    <!--./Cards-->

    <div class="py-2 bg-white rounded-md w-full sm:w-1/2 px-4 dark:bg-gray-800">
        <div x-data="{ open: false }"
            class="relative flex justify-between items-center border-b pb-2 dark:border-gray-700">
            <span class="text-sm font-semibold tracking-widest uppercase text-gray-600 dark:text-gray-400">
                Contas (mês atual)
            </span>

            <button x-ref="button" x-on:mouseover="open = true" x-on:mouseout="open = false"
                class="text-gray-600 dark:text-gray-500 dark:hover:text-gray-200">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 9.5C12.8284 9.5 13.5 8.82843 13.5 8C13.5 7.17157 12.8284 6.5 12 6.5C11.1716 6.5 10.5 7.17157 10.5 8C10.5 8.82843 11.1716 9.5 12 9.5ZM14 15H13V10.5H10V12.5H11V15H10V17H14V15Z">
                    </path>
                </svg>
            </button>

            <div class="absolute right-2 top-8 bg-white border rounded-md p-3 dark:bg-gray-800 dark:border-gray-500" x-show="open" x-anchor="$refs.button" x-transition x-transition.duration.300ms>
                <div class="flex items-center gap-1">
                    <div class="h-3 w-3 rounded-full bg-green-500">
                    </div>

                    <span class="text-xs font-semibold tracking-widest uppercase text-green-500">a Receber</span>
                </div>
                <div class="flex items-center gap-1 mt-4">
                    <div class="h-3 w-3 rounded-full bg-red-500">
                    </div>

                    <span class="text-xs font-semibold tracking-widest uppercase text-red-500">a pagar</span>
                </div>
            </div>

        </div>


        <div class="my-4 divide-y dark:divide-gray-700">
            @foreach ($contasMes as $conta)
                <div class="flex justify-between items-center p-2">
                    <div class="flex items-center gap-2">
                        <div class="h-3 w-3 rounded-full {{ $conta->tipo == 'R' ? 'bg-green-500' : 'bg-red-500' }}">
                        </div>
                        <span class="text-gray-600 dark:text-gray-400">#{{ $conta->id }}</span>
                    </div>

                    <span
                        class="text-sm font-semibold  uppercase tracking-widest dark:text-gray-300">{{ $conta->pessoa->nome }}</span>

                    <span class="text-sm font-semibold text-gray-500 tracking-widest dark:text-gray-200">R$
                        {{ number_format($conta->valor_documento, 2, ',') }}</span>
                </div>
            @endforeach
        </div>

        <div class="flex justify-between items-center border-t pt-2 mt-1 dark:border-gray-700">
            <h1 class="text-xs font-semibold tracking-widest uppercase text-gray-600 dark:text-gray-400">Total:</h1>

            <span class="text-md font-semibold text-gray-500 tracking-widest dark:text-gray-200">
                R$ {{ number_format($totalContasMes, 2, ',') }}
            </span>

        </div>

        <div class="text-end">
            <a href="{{ route('contas.index') }}"
                class="text-xs text-gray-500 uppercase font-semibold hover:text-blue-500 hover:scale-95 transition-all cursor-pointer">
                ver contas
            </a>
        </div>

    </div>

</div>
