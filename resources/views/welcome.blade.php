<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gestão</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="max-w-screen-xl mx-auto px-5">
    <header class="flex flex-col lg:flex-row justify-between items-center my-5" x-data="{ open: false }"
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
            <ul class="flex flex-col font-semibold lg:flex-row lg:gap-3">
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

            </ul>
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
                <a href="#" class="text-white font-semibold bg-purple-500 p-2 rounded">Virar Membro</a>
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
                <a href="#" class="text-white font-semibold bg-purple-500 p-2 rounded">Virar Membro</a>
            </div>
        </div>
    </header>

    <main class="grid lg:grid-cols-2 place-items-center pt-16 pb-8 md:pt-8">
        <div class="py-6 md:order-1 hidden md:block">
            <img src="https://private-user-images.githubusercontent.com/123313244/299048076-dd1c4271-0777-4c05-b4be-198ec5899800.png"
                alt="Astronaut in the air" loading="eager" format="avif" />
        </div>
        <div>
            <h1 class="text-5xl lg:text-6xl xl:text-7xl font-bold lg:tracking-tight">
                Sistema de Gestão, feito para sua empresa.
            </h1>
            <p class="text-lg mt-4 text-slate-600 max-w-xl">
                Transforme a maneira como você administra seu negócio com o nosso avançado Sistema de Gestão,
                um ERP online projetado para otimizar todos os aspectos da sua operação.
            </p>
            <div class="mt-6 flex flex-col sm:flex-row gap-3">
                <a href="#" class="text-white font-semibold bg-purple-500 p-2 rounded">Virar Membro</a>
                <a class="text-black font-semibold border-2 border-black p-2 rounded">Ver planos
                </a>
            </div>
        </div>
    </main>

    <div class="mt-16 md:mt-0">
        <h2 class="text-2xl lg:text-5xl font-bold lg:tracking-tight">
            Veja as nossa Funcionalidades
        </h2>
        <p class="text-lg mt-4 text-slate-600">
            Conheça o que nosso software e oque ele pode fazer para a sua empresa.
        </p>
    </div>

    <div class="grid sm:grid-cols-2 md:grid-cols-3 mt-16 gap-16">

        <div class="flex gap-4 items-start">
            <div class="mt-1 bg-black rounded-full text-white p-2 w-8 h-8 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                        clip-rule="evenodd" />
                    <path
                        d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-lg">Cadatros</h3>
                <p class="text-slate-500 mt-2 leading-relaxed">
                    Cadastro de cliente, funcionarios, forncedores, produtos e serviços.
                </p>
            </div>
        </div>

        <div class="flex gap-4 items-start">
            <div class="mt-1 bg-black rounded-full text-white p-2 w-8 h-8 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-lg">Vendas</h3>
                <p class="text-slate-500 mt-2 leading-relaxed">
                    Criar vendas rapidamente com muitas Funcionalidades.
                    Receber as vendas do seu E-commerce, que os seus cliente mesmo fazem.
                </p>
            </div>
        </div>

        <div class="flex gap-4 items-start">
            <div class="mt-1 bg-black rounded-full text-white p-2 w-8 h-8 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75ZM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 0 1-1.875-1.875V8.625ZM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 0 1 3 19.875v-6.75Z" />
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-lg">Controle Financeiro</h3>
                <p class="text-slate-500 mt-2 leading-relaxed">
                    Tenha um controle Financeiro com contas a pagar e a receber.
                </p>
            </div>
        </div>

        <div class="flex gap-4 items-start">
            <div class="mt-1 bg-black rounded-full text-white p-2 w-8 h-8 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M2.25 2.25a.75.75 0 0 0 0 1.5H3v10.5a3 3 0 0 0 3 3h1.21l-1.172 3.513a.75.75 0 0 0 1.424.474l.329-.987h8.418l.33.987a.75.75 0 0 0 1.422-.474l-1.17-3.513H18a3 3 0 0 0 3-3V3.75h.75a.75.75 0 0 0 0-1.5H2.25Zm6.04 16.5.5-1.5h6.42l.5 1.5H8.29Zm7.46-12a.75.75 0 0 0-1.5 0v6a.75.75 0 0 0 1.5 0v-6Zm-3 2.25a.75.75 0 0 0-1.5 0v3.75a.75.75 0 0 0 1.5 0V9Zm-3 2.25a.75.75 0 0 0-1.5 0v1.5a.75.75 0 0 0 1.5 0v-1.5Z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-lg">Relatórios</h3>
                <p class="text-slate-500 mt-2 leading-relaxed">
                    Tenha relatórios de cadastros, de vendas, de estoque e muito mais
                </p>
            </div>
        </div>
    </div>
    <!-- <div class="mt-24">
        <h2 class="text-center text-slate-500">Combine your idea with our technology</h2>
        <div class="flex gap-8 md:gap-20 items-center justify-center mt-10 flex-wrap">
            <Icon class="h-8 md:h-12" name="simple-icons:react" />
            <Icon class="h-8 md:h-12" name="simple-icons:svelte" />
            <Icon class="h-8 md:h-14" name="simple-icons:tailwindcss" />
            <Icon class="h-8 md:h-16" name="simple-icons:alpinedotjs" />
            <Icon class="h-8 md:h-12" name="simple-icons:vercel" />
            <Icon class="h-8 md:h-12" name="simple-icons:astro" />
        </div>
    </div>
    <div class="bg-black px-20 py-20 mt-20 mx-auto max-w-5xl rounded-lg flex flex-col items-center text-center">
        <h2 class="text-white text-3xl md:text-6xl">Crie sites mais rápidos.</h2>
        <p class="text-slate-500 mt-4 text-lg md:text-xl">
            Com a code sete você pode ter um site ou sistema so para você.
        </p>
        <div class="flex mt-5">
            <Link href="#">Conhecer</Link>
        </div>
    </div> -->


    <footer class="my-20">
        <p class="text-center text-sm font-semibold text-slate-500">
            Copyright © 2024
        </p>

        <p class="text-center text-xs font-semibold text-slate-500 mt-1">
            Desenvolvido por <a href="https://web3templates.com" target="_blank" rel="noopener"
                class="hover:underline">
                Code Sete
            </a>
        </p>
    </footer>
</body>

</html>
