<div>
    <div class="flex gap-3">
        {{-- Card --}}
        <a href="{{ route('pessoal.index') }}"
            class="flex p-3 items-center w-56 bg-white rounded-lg shadow md:flex-row cursor-pointer dark:bg-gray-800 dark:hover:bg-gray-700">
            <div class="border p-2 rounded-full bg-purple-500 dark:border-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-white">
                    <path fill-rule="evenodd"
                        d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z"
                        clip-rule="evenodd" />
                    <path
                        d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
                </svg>

            </div>
            <div class="w-full leading-normal dark:text-gray-300">
                <p class="text-center text-lg font-bold tracking-tight">Clientes</p>
                <p class="text-center text-lg font-semibold">{{ $clientes }}</p>
            </div>
        </a>
        {{-- /Card --}}

        {{-- Card --}}
        <a href="{{ route('pedidos') }}"
            class="flex p-3 items-center w-56 bg-white rounded-lg shadow md:flex-row cursor-pointer dark:bg-gray-800 dark:hover:bg-gray-700">
            <div class="border p-2 rounded-full bg-blue-500 dark:border-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-7 h-7 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>

            </div>
            <div class="w-full leading-normal dark:text-gray-300">
                <p class="text-center text-lg font-bold tracking-tight">Pedidos (Aberto)</p>
                <p class="text-center text-lg font-semibold">{{ $pedidos }}</p>
            </div>
        </a>
        {{-- /Card --}}

        {{-- Card --}}
        <a href="{{ route('contas') }}"
            class="flex p-3 items-center w-56 bg-white rounded-lg shadow md:flex-row cursor-pointer dark:bg-gray-800 dark:hover:bg-gray-700">
            <div class="border p-2 rounded-full bg-red-500 dark:border-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-7 h-7 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                </svg>

            </div>
            <div class="w-full leading-normal dark:text-gray-300">
                <p class="text-center text-lg font-bold tracking-tight">Contas (Vencidas)</p>
                <p class="text-center text-lg font-semibold">{{ $contas }}</p>
            </div>
        </a>
        {{-- /Card --}}

    </div>
</div>
