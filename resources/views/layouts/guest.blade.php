<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CodeGestão') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="">
    <header class="flex flex-col lg:flex-row justify-between items-center mx-2 my-3" x-data="{ open: false }"
        x-init="$watch('open', value => console.log(value))">
        <div class="flex w-full lg:w-auto items-center justify-between">
            <a href="/" class="text-lg"><span class="font-bold text-slate-800">Code</span><span
                    class="text-slate-500">gestão</span>
            </a>
            <div class="block lg:hidden">
                <button @click="open = !open" class="text-gray-800">
                    <svg fill="currentColor" class="w-4 h-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path x-cloak x-show="open" fill-rule="evenodd" clip-rule="evenodd"
                            d="M18.278 16.864a1 1 0 01-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 01-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 011.414-1.414l4.829 4.828 4.828-4.828a1 1 0 111.414 1.414l-4.828 4.829 4.828 4.828z">
                        </path>
                        <path x-show="!open" fill-rule="evenodd"
                            d="M4 5h16a1 1 0 010 2H4a1 1 0 110-2zm0 6h16a1 1 0 010 2H4a1 1 0 010-2zm0 6h16a1 1 0 010 2H4a1 1 0 010-2z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
        <nav class="hidden w-full lg:w-auto mt-2 lg:flex lg:mt-0" :class="{ 'block': open, 'hidden': !open }"
            x-transition>
            {{-- <ul class="flex flex-col font-semibold lg:flex-row lg:gap-3">
                <li class="">
                    <a href="" class="flex lg:px-3 py-2 text-gray-600 hover:text-gray-900">
                        Planos
                    </a>
                </li>
                <li class="">
                    <a href="" class="flex lg:px-3 py-2 text-gray-600 hover:text-gray-900">
                        Funcionalidades
                    </a>
                </li>
                <li class="">
                    <a href="" class="flex lg:px-3 py-2 text-gray-600 hover:text-gray-900">
                        Sobre Nos
                    </a>
                </li>

            </ul> --}}
            <div class="lg:hidden flex items-center font-semibold mt-3 gap-4">
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="font-semibold text-gray-800 hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-800 hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm">Entrar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-800 hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm">Cadastrar</a>
                        @endif
                    @endauth
                </div>
                {{-- <a href="#" class="text-white font-semibold bg-purple-500 p-2 rounded">Virar Membro</a> --}}
            </div>
        </nav>
        <div>
            <div class="hidden lg:flex items-center gap-4">
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="font-semibold text-gray-800 hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-800 hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm">Entrar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-800 hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm">Cadastrar</a>
                        @endif
                    @endauth
                </div>
                {{-- <a href="#" class="text-white font-semibold bg-purple-500 p-2 rounded">Virar Membro</a> --}}
            </div>
        </div>
    </header>

    <div class="font-sans antialiased">
        {{ $slot }}
    </div>

    @livewireScripts

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />
</body>

</html>
