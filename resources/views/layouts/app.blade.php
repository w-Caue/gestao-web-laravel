<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none;
        }
    </style>

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="flex h-screen bg-gray-200 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('layouts.sidebar')

        <div class="flex flex-col flex-1 w-full">
            @include('layouts.navbar')

            <main class="h-full pb-16 overflow-y-auto">
                <!-- Remove everything INSIDE this div to a really blank page -->
                <div class="container px-6 mx-auto grid">
                    {{ $slot }}
                </div>
            </main>
        </div>


    </div>

    @stack('modals')

    @livewireScripts
    @livewireScriptConfig

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />
</body>

<script>
    function data() {
        function getThemeFromLocalStorage() {
            // if user already changed the theme, use it
            if (window.localStorage.getItem('dark')) {
                return JSON.parse(window.localStorage.getItem('dark'))
            }

            // else return their preferences
            return (
                !!window.matchMedia &&
                window.matchMedia('(prefers-color-scheme: dark)').matches
            )
        }

        function setThemeToLocalStorage(value) {
            window.localStorage.setItem('dark', value)
        }

        return {
            // dark: getThemeFromLocalStorage(),
            // toggleTheme() {
            //     this.dark = !this.dark
            //     setThemeToLocalStorage(this.dark)
            // },

            isSideMenuOpen: false,
            toggleSideMenu() {
                this.isSideMenuOpen = true
            },
            closeSideMenu() {
                this.isSideMenuOpen = false
            },
            isNotificationsMenuOpen: false,
            toggleNotificationsMenu() {
                this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
            },
            closeNotificationsMenu() {
                this.isNotificationsMenuOpen = false
            },
            isProfileMenuOpen: false,
            toggleProfileMenu() {
                this.isProfileMenuOpen = !this.isProfileMenuOpen
            },
            closeProfileMenu() {
                this.isProfileMenuOpen = false
            },
            isPagesMenuOpen: false,
            togglePagesMenu() {
                this.isPagesMenuOpen = !this.isPagesMenuOpen
            },
            // Modal
            isModalOpen: false,
            trapCleanup: null,
            openModal() {
                this.isModalOpen = true
                this.trapCleanup = focusTrap(document.querySelector('#modal'))
            },
            closeModal() {
                this.isModalOpen = false
                this.trapCleanup()
            },
        }
    }
</script>

</html>
