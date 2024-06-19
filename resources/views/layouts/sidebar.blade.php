 <!-- Desktop sidebar -->

 <div class="h-screen z-20 flex-shrink-0 bg-white transition-all duration-300 space-y-2 hidden sm:block dark:bg-gray-800"
     x-bind:class="{
         'w-44': sidebar.full,
         'w-44 sm:w-16': !sidebar.full,
         'top-0 left-0': sidebar
             .navOpen,
         'top-0 -left-44 sm:left-0': !sidebar.navOpen
     }">
     {{-- <h1 class=" py-4  font-extrabold text-transparent text-gradient-to-r from-purple-700 to-blue-600 bg-clip-text bg-gradient-to-br"
                x-bind:class="sidebar.full ? 'text-3xl px-4' : 'hidden'">
                Rica Admin
            </h1>

            <h1 class="text-white font-black py-4" x-bind:class="sidebar.full ? 'hidden' : 'text-xl px-4 xm:px-2'">
                LOGO
            </h1>

            <h1 class="text-white font-black py-4 bg-gray-100 dark:bg-gray-700"
                x-bind:class="sidebar.full ? 'text-lg  px-4' : 'hidden'">
                Usuario
            </h1> --}}

     <div class="mt-12 bg-white dark:bg-gray-900">

         <ul>
             <li
                 class="relative px-1 py-4 {{ request()->routeIs('dashboard') ? 'bg-gray-900' : 'bg-gray-800' }} {{ request()->routeIs('pessoal.*') ? 'bg-gray-800 rounded-br-lg' : '' }}">
                 <!-- Active items have the snippet below -->
                 @if (request()->routeIs('dashboard'))
                     @include('includes.ative-sidebar')
                 @endif

                 <a href="{{ route('dashboard') }}"
                     class="relative flex justify-between items-center font-semibold space-x-2 rounded-md p-2 cursor-pointer {{ request()->routeIs('dashboard') ? 'text-purple-500' : 'text-gray-500 dark:text-gray-400' }}"
                     x-bind:class="{
                         'justify-start': sidebar.full,
                         'sm:justify-center': !sidebar.full,
                     }">
                     <div class="flex items-center space-x-2">
                         <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                             height="24" fill="currentColor" viewBox="0 0 24 24">
                             <path fill-rule="evenodd"
                                 d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                                 clip-rule="evenodd" />
                         </svg>


                         <h1 x-clock
                             x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                                 'sm:hidden' : ''">
                             Inicio
                         </h1>
                     </div>
                 </a>
             </li>

             <li
                 class="relative px-1 py-3 {{ request()->routeIs('pessoal.*') ? 'bg-gray-900 ' : 'bg-gray-800' }} {{ request()->routeIs('dashboard') ? 'bg-gray-800 rounded-tr-lg' : '' }} {{ request()->routeIs('contas.*') ? 'bg-gray-800 rounded-br-lg' : '' }}">
                 <!-- Active items have the snippet below -->
                 @if (request()->routeIs('pessoal.*'))
                     @include('includes.ative-sidebar')
                 @endif

                 <a href="{{ route('pessoal.index') }}"
                     class="relative flex justify-between items-center font-semibold space-x-2 rounded-md p-2 cursor-pointer {{ request()->routeIs('pessoal.*') ? 'text-purple-500' : 'text-gray-500 dark:text-gray-400' }}"
                     x-bind:class="{
                         'justify-start': sidebar.full,
                         'sm:justify-center': !sidebar.full,
                     }">
                     <div class="flex items-center space-x-2">
                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-6 h-6">
                             <path fill-rule="evenodd"
                                 d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                                 clip-rule="evenodd" />
                             <path
                                 d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                         </svg>

                         <h1 x-clock
                             x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                                 'sm:hidden' : ''">
                             Pessoal
                         </h1>
                     </div>
                 </a>
             </li>

             {{-- <li class="relative px-6 py-3">
                 <!-- Active items have the snippet below -->
                 @if (request()->routeIs('produto.*'))
                     @include('includes.ative-sidebar')
                 @endif

                 <a href="{{ route('produto.index') }}"
                     class="relative flex justify-between items-center font-semibold space-x-2 rounded-md p-2 cursor-pointer {{ request()->routeIs('admin.dashboard') ? 'text-purple-500 border-2 border-purple-500' : 'text-gray-500 dark:text-gray-400' }}"
                     x-bind:class="{
                         'justify-start': sidebar.full,
                         'sm:justify-center': !sidebar.full,
                     }">
                     <div class="flex items-center space-x-2">
                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-6 h-6">
                             <path fill-rule="evenodd"
                                 d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                                 clip-rule="evenodd" />
                             <path
                                 d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                         </svg>

                         <h1 x-clock
                             x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                                 'sm:hidden' : ''">
                             Produtos
                         </h1>
                     </div>
                 </a>
             </li> --}}

             {{-- <li class="relative px-6 py-3">
                 <!-- Active items have the snippet below -->
                 @if (request()->routeIs('pedidos.*'))
                     @include('includes.ative-sidebar')
                 @endif

                 <a href="{{ route('pedidos.index') }}"
                     class="relative flex justify-between items-center font-semibold space-x-2 rounded-md p-2 cursor-pointer {{ request()->routeIs('admin.dashboard') ? 'text-purple-500 border-2 border-purple-500' : 'text-gray-500 dark:text-gray-400' }}"
                     x-bind:class="{
                         'justify-start': sidebar.full,
                         'sm:justify-center': !sidebar.full,
                     }">
                     <div class="flex items-center space-x-2">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                             stroke="currentColor" class="w-5 h-5">
                             <path stroke-linecap="round" stroke-linejoin="round"
                                 d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                         </svg>

                         <h1 x-clock
                             x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                                 'sm:hidden' : ''">
                             Pedidos
                         </h1>
                     </div>
                 </a>
             </li> --}}

             <li
                 class="relative px-1 py-3 {{ request()->routeIs('contas.*') ? 'bg-gray-900 ' : 'bg-gray-800' }} {{ request()->routeIs('pessoal.*') ? 'bg-gray-800 rounded-tr-lg' : '' }} {{ request()->routeIs('relatorios') ? 'bg-gray-800 rounded-br-lg' : '' }}">
                 <!-- Active items have the snippet below -->
                 @if (request()->routeIs('contas.*'))
                     @include('includes.ative-sidebar')
                 @endif

                 <a href="{{ route('contas.index') }}"
                     class="relative flex justify-between items-center font-semibold space-x-2 rounded-md p-2 cursor-pointer {{ request()->routeIs('contas.*') ? 'text-purple-500' : 'text-gray-500 dark:text-gray-400' }}"
                     x-bind:class="{
                         'justify-start': sidebar.full,
                         'sm:justify-center': !sidebar.full,
                     }">
                     <div class="flex items-center space-x-2">
                         <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                             fill="currentColor">
                             <path
                                 d="M9.3349 11.5023L11.5049 11.5028C13.9902 11.5028 16.0049 13.5175 16.0049 16.0028H9.00388L9.00488 17.0028L17.0049 17.002V16.0028C17.0049 14.9204 16.6867 13.8997 16.1188 13.002L19.0049 13.0028C20.9972 13.0028 22.7173 14.1681 23.521 15.8542C21.1562 18.9748 17.3268 21.0028 13.0049 21.0028C10.2436 21.0028 7.90445 20.4122 6.00456 19.378L6.00592 10.0738C7.25147 10.2522 8.39122 10.7585 9.3349 11.5023ZM5.00488 19.0028C5.00488 19.5551 4.55717 20.0028 4.00488 20.0028H2.00488C1.4526 20.0028 1.00488 19.5551 1.00488 19.0028V10.0028C1.00488 9.45052 1.4526 9.00281 2.00488 9.00281H4.00488C4.55717 9.00281 5.00488 9.45052 5.00488 10.0028V19.0028ZM18.0049 5.00281C19.6617 5.00281 21.0049 6.34595 21.0049 8.00281C21.0049 9.65966 19.6617 11.0028 18.0049 11.0028C16.348 11.0028 15.0049 9.65966 15.0049 8.00281C15.0049 6.34595 16.348 5.00281 18.0049 5.00281ZM11.0049 2.00281C12.6617 2.00281 14.0049 3.34595 14.0049 5.00281C14.0049 6.65966 12.6617 8.00281 11.0049 8.00281C9.34803 8.00281 8.00488 6.65966 8.00488 5.00281C8.00488 3.34595 9.34803 2.00281 11.0049 2.00281Z">
                             </path>
                         </svg>

                         <h1 x-clock
                             x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                                 'sm:hidden' : ''">
                             Contas
                         </h1>
                     </div>
                 </a>
             </li>

             <li
                 class="relative px-1 py-3 {{ request()->routeIs('relatorios') ? 'bg-gray-900 ' : 'bg-gray-800' }} {{ request()->routeIs('contas.*') ? 'bg-gray-800 rounded-tr-lg' : '' }} {{ request()->routeIs('configuracao') ? 'bg-gray-800 rounded-br-lg' : '' }}">
                 <!-- Active items have the snippet below -->
                 @if (request()->routeIs('relatorios'))
                     @include('includes.ative-sidebar')
                 @endif

                 <a href="{{ route('relatorios') }}"
                     class="relative flex justify-between items-center font-semibold space-x-2 rounded-md p-2 cursor-pointer {{ request()->routeIs('relatorios') ? 'text-purple-500' : 'text-gray-500 dark:text-gray-400' }}"
                     x-bind:class="{
                         'justify-start': sidebar.full,
                         'sm:justify-center': !sidebar.full,
                     }">
                     <div class="flex items-center space-x-2">
                         <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                             fill="currentColor">
                             <path d="M2 13H8V21H2V13ZM9 3H15V21H9V3ZM16 8H22V21H16V8Z"></path>
                         </svg>

                         <h1 x-clock
                             x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                                 'sm:hidden' : ''">
                             Relatorios
                         </h1>
                     </div>
                 </a>
             </li>

             <li
                 class="relative px-1 py-3 {{ request()->routeIs('configuracao') ? 'bg-gray-900 ' : 'bg-gray-800' }} {{ request()->routeIs('relatorios') ? 'bg-gray-800 rounded-tr-lg' : '' }}">
                 <!-- Active items have the snippet below -->
                 @if (request()->routeIs('configuracao'))
                     @include('includes.ative-sidebar')
                 @endif

                 <a href="{{ route('configuracao') }}"
                     class="relative flex justify-between items-center font-semibold space-x-2 rounded-md p-2 cursor-pointer {{ request()->routeIs('configuracao') ? 'text-purple-500' : 'text-gray-500 dark:text-gray-400' }}"
                     x-bind:class="{
                         'justify-start': sidebar.full,
                         'sm:justify-center': !sidebar.full,
                     }">
                     <div class="flex items-center space-x-2">
                         <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                             <path
                                 d="M2.13127 13.6308C1.9492 12.5349 1.95521 11.434 2.13216 10.3695C3.23337 10.3963 4.22374 9.86798 4.60865 8.93871C4.99357 8.00944 4.66685 6.93557 3.86926 6.17581C4.49685 5.29798 5.27105 4.51528 6.17471 3.86911C6.9345 4.66716 8.0087 4.99416 8.93822 4.60914C9.86774 4.22412 10.3961 3.23332 10.369 2.13176C11.4649 1.94969 12.5658 1.9557 13.6303 2.13265C13.6036 3.23385 14.1319 4.22422 15.0612 4.60914C15.9904 4.99406 17.0643 4.66733 17.8241 3.86975C18.7019 4.49734 19.4846 5.27153 20.1308 6.1752C19.3327 6.93499 19.0057 8.00919 19.3907 8.93871C19.7757 9.86823 20.7665 10.3966 21.8681 10.3695C22.0502 11.4654 22.0442 12.5663 21.8672 13.6308C20.766 13.6041 19.7756 14.1324 19.3907 15.0616C19.0058 15.9909 19.3325 17.0648 20.1301 17.8245C19.5025 18.7024 18.7283 19.4851 17.8247 20.1312C17.0649 19.3332 15.9907 19.0062 15.0612 19.3912C14.1316 19.7762 13.6033 20.767 13.6303 21.8686C12.5344 22.0507 11.4335 22.0447 10.3691 21.8677C10.3958 20.7665 9.86749 19.7761 8.93822 19.3912C8.00895 19.0063 6.93508 19.333 6.17532 20.1306C5.29749 19.503 4.51479 18.7288 3.86862 17.8252C4.66667 17.0654 4.99367 15.9912 4.60865 15.0616C4.22363 14.1321 3.23284 13.6038 2.13127 13.6308ZM11.9997 15.0002C13.6565 15.0002 14.9997 13.657 14.9997 12.0002C14.9997 10.3433 13.6565 9.00018 11.9997 9.00018C10.3428 9.00018 8.99969 10.3433 8.99969 12.0002C8.99969 13.657 10.3428 15.0002 11.9997 15.0002Z">
                             </path>
                         </svg>

                         <h1 x-clock
                             x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                                 'sm:hidden' : ''">
                             Configuração
                         </h1>
                     </div>
                 </a>
             </li>

             {{-- <li class="relative px-6 py-3">
                 <!-- Active items have the snippet below -->
                 @if (request()->routeIs('configuracao'))
                     @include('includes.ative-sidebar')
                 @endif

                 <a href="{{ route('configuracao') }}"
                     class="relative flex justify-between items-center font-semibold space-x-2 rounded-md p-2 cursor-pointer {{ request()->routeIs('admin.dashboard') ? 'text-purple-500 border-2 border-purple-500' : 'text-gray-500 dark:text-gray-400' }}"
                     x-bind:class="{
                         'justify-start': sidebar.full,
                         'sm:justify-center': !sidebar.full,
                     }">
                     <div class="flex items-center space-x-2">
                         <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                             stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                             <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                         </svg>

                         <h1 x-clock
                             x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                                 'sm:hidden' : ''">
                             Sair
                         </h1>
                     </div>

                     <form method="POST" action="{{ route('logout') }}" x-data>
                         @csrf

                         <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                             {{ __('Sair') }}
                         </x-dropdown-link>
                     </form>
                 </a>
             </li> --}}
         </ul>
     </div>
 </div>

 <!-- Mobile -->
 <div class="flex justify-between ">

     <!--  Mobile menu Toggle -->


     <div class="fixed z-50 flex-shrink-0 h-screen space-y-2 transition-all duration-300 bg-white sm:hidden dark:bg-gray-800"
         x-bind:class="{
             'w-64': sidebar.full,
             'w-64 sm:w-20': !sidebar.full,
             'top-0 left-0': sidebar
                 .navOpen,
             'top-0 -left-64 sm:left-0': !sidebar.navOpen
         }">

         <div class="px-4 space-y-2">

             <button x-on:click="sidebar.navOpen = false"
                 class="absolute block p-1 text-blue-500 bg-gray-100 rounded-full shadow-md sm:hidden focus:outline-none -right-3 top-10 dark:bg-gray-800">
                 <button x-bind:class="sidebar.navOpen ? '' : 'hidden'">
                     x
                 </button>
             </button>

             <ul>
                 <li class="relative px-6 py-3">
                     <!-- Active items have the snippet below -->
                     @if (request()->routeIs('dashboard'))
                         @include('includes.ative-sidebar')
                     @endif

                     <a href="{{ route('dashboard') }}"
                         class="relative flex justify-between items-center font-semibold space-x-2 rounded-md p-2 cursor-pointer {{ request()->routeIs('admin.dashboard') ? 'text-purple-500 border-2 border-purple-500' : 'text-gray-500 dark:text-gray-400' }}"
                         x-bind:class="{
                             'justify-start': sidebar.full,
                             'sm:justify-center': !sidebar.full,
                         }">
                         <div class="flex items-center space-x-2">
                             <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                 height="24" fill="currentColor" viewBox="0 0 24 24">
                                 <path fill-rule="evenodd"
                                     d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                                     clip-rule="evenodd" />
                             </svg>


                             <h1 x-clock
                                 x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                                     'sm:hidden' : ''">
                                 Inicio
                             </h1>
                         </div>
                     </a>
                 </li>

                 <li class="relative px-6 py-3">
                     <!-- Active items have the snippet below -->
                     @if (request()->routeIs('pessoal.*'))
                         @include('includes.ative-sidebar')
                     @endif

                     <a href="{{ route('pessoal.index') }}"
                         class="relative flex justify-between items-center font-semibold space-x-2 rounded-md p-2 cursor-pointer {{ request()->routeIs('admin.dashboard') ? 'text-purple-500 border-2 border-purple-500' : 'text-gray-500 dark:text-gray-400' }}"
                         x-bind:class="{
                             'justify-start': sidebar.full,
                             'sm:justify-center': !sidebar.full,
                         }">
                         <div class="flex items-center space-x-2">
                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                 class="w-6 h-6">
                                 <path fill-rule="evenodd"
                                     d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                                     clip-rule="evenodd" />
                                 <path
                                     d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                             </svg>

                             <h1 x-clock
                                 x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                                     'sm:hidden' : ''">
                                 Pessoal
                             </h1>
                         </div>
                     </a>
                 </li>

                 {{-- <li class="relative px-6 py-3">
                    <!-- Active items have the snippet below -->
                    @if (request()->routeIs('produto.*'))
                        @include('includes.ative-sidebar')
                    @endif

                    <a href="{{ route('produto.index') }}"
                        class="relative flex justify-between items-center font-semibold space-x-2 rounded-md p-2 cursor-pointer {{ request()->routeIs('admin.dashboard') ? 'text-purple-500 border-2 border-purple-500' : 'text-gray-500 dark:text-gray-400' }}"
                        x-bind:class="{
                            'justify-start': sidebar.full,
                            'sm:justify-center': !sidebar.full,
                        }">
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                                    clip-rule="evenodd" />
                                <path
                                    d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                            </svg>

                            <h1 x-clock
                                x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                                    'sm:hidden' : ''">
                                Produtos
                            </h1>
                        </div>
                    </a>
                </li> --}}

                 {{-- <li class="relative px-6 py-3">
                     <!-- Active items have the snippet below -->
                     @if (request()->routeIs('produto.*'))
                         @include('includes.ative-sidebar')
                     @endif

                     <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                         href="{{ route('produto.index') }}">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                             <path stroke-linecap="round" stroke-linejoin="round"
                                 d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                         </svg>

                         <span class="ml-4">Produtos</span>
                     </a>
                 </li> --}}

                 {{-- <li class="relative px-6 py-3">
                     <!-- Active items have the snippet below -->
                     @if (request()->routeIs('pedidos.*'))
                         @include('includes.ative-sidebar')
                     @endif

                     <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                         href="{{ route('pedidos.index') }}">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                             stroke="currentColor" class="w-5 h-5">
                             <path stroke-linecap="round" stroke-linejoin="round"
                                 d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                         </svg>
                         <span class="ml-4">Pedidos</span>
                     </a>
                 </li> --}}

                 <li class="relative px-6 py-3">
                     <!-- Active items have the snippet below -->
                     @if (request()->routeIs('contas.*'))
                         @include('includes.ative-sidebar')
                     @endif

                     <button
                         class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                         x-on:click="togglePagesMenu" aria-haspopup="true">
                         <span class="inline-flex items-center">
                             <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                 fill="currentColor">
                                 <path
                                     d="M9.3349 11.5023L11.5049 11.5028C13.9902 11.5028 16.0049 13.5175 16.0049 16.0028H9.00388L9.00488 17.0028L17.0049 17.002V16.0028C17.0049 14.9204 16.6867 13.8997 16.1188 13.002L19.0049 13.0028C20.9972 13.0028 22.7173 14.1681 23.521 15.8542C21.1562 18.9748 17.3268 21.0028 13.0049 21.0028C10.2436 21.0028 7.90445 20.4122 6.00456 19.378L6.00592 10.0738C7.25147 10.2522 8.39122 10.7585 9.3349 11.5023ZM5.00488 19.0028C5.00488 19.5551 4.55717 20.0028 4.00488 20.0028H2.00488C1.4526 20.0028 1.00488 19.5551 1.00488 19.0028V10.0028C1.00488 9.45052 1.4526 9.00281 2.00488 9.00281H4.00488C4.55717 9.00281 5.00488 9.45052 5.00488 10.0028V19.0028ZM18.0049 5.00281C19.6617 5.00281 21.0049 6.34595 21.0049 8.00281C21.0049 9.65966 19.6617 11.0028 18.0049 11.0028C16.348 11.0028 15.0049 9.65966 15.0049 8.00281C15.0049 6.34595 16.348 5.00281 18.0049 5.00281ZM11.0049 2.00281C12.6617 2.00281 14.0049 3.34595 14.0049 5.00281C14.0049 6.65966 12.6617 8.00281 11.0049 8.00281C9.34803 8.00281 8.00488 6.65966 8.00488 5.00281C8.00488 3.34595 9.34803 2.00281 11.0049 2.00281Z">
                                 </path>
                             </svg>
                             <span class="ml-4">Contas</span>
                         </span>
                         <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                             <path fill-rule="evenodd"
                                 d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                 clip-rule="evenodd"></path>
                         </svg>
                     </button>
                     <template x-if="isPagesMenuOpen">
                         <ul x-transition:enter="transition-all ease-in-out duration-300"
                             x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                             x-transition:leave="transition-all ease-in-out duration-300"
                             x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                             class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                             aria-label="submenu">
                             <li
                                 class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                 <a class="w-full" href="./login.html">
                                     Contas A Receber
                                 </a>
                             </li>
                             <li
                                 class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                 {{-- <a class="w-full" href="{{ route('contas') }}">
                                     Contas A Pagar
                                 </a> --}}
                             </li>

                         </ul>
                     </template>
                 </li>

                 <li class="relative px-6 py-3">
                     <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                         href="../modals.html">
                         <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                             stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                             <path
                                 d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                             </path>
                         </svg>
                         <span class="ml-4">Relatorios</span>
                     </a>
                 </li>

                 <li class="relative px-6 py-3">
                     <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                         href="../tables.html">
                         <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                             stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                             <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                         </svg>
                         <span class="ml-4">Configuração</span>
                     </a>
                 </li>

             </ul>
         </div>
     </div>
 </div>
