@props(['name' ,'title'])
{{-- <div class="flex justify-center">
    <div x-data="{ open: false , name : '{{ $name }}'}" x-show="open" x-cloak x-on:open-detalhes.window="open = ($event.detail.name === name)"
        x-on:close-detalhes.window="open = false" x-on:keydown.escape.window="open = false"
        x-transition.duration.300ms
        class="fixed mt-5 z-50 bg-gray-100 border border-gray-300 shadow-2xl rounded-lg sm:top-28 sm:w-1/3 dark:bg-gray-500 dark:border-none">
        <div x-on:click ="open = false" class="fixed">
        </div>

        <div class="flex justify-between m-1 dark:text-white">
            <h1 class="text-xl font-semibold text-center">{{$title}}</h1>
            <button x-on:click="open = false"
                class="p-1 m-1 border rounded float-right hover:text-white hover:bg-red-500">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>

        {{ $body }}
        
    </div>
</div> --}}

<div x-cloak x-data=" isModalOpen: false" x-on:open-detalhes.window="isModalOpen = true"
    x-on:close-detalhes.window="isModalOpen = false">
    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" x-on:click.away="isModalOpen = false"
            x-on:keydown.escape="isModalOpen = false"
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-end">
                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" x-on:click="isModalOpen = false">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                {{ $body }}
                
            </div>
        </div>
    </div>
</div>
