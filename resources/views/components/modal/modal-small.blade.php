<div class="flex justify-center">
    <div x-data="{ open: false, name: '{{ $name }}' }" x-show="open" x-cloak x-on:open-modal.window="open = ($event.detail.name === name)"
        x-on:close-modal.window="open = false" x-on:keydown.escape.window="open = false"
        x-on:escape.window="open = false" x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <div x-on:click ="open = false" class="fixed">
        </div>
        <div
            class="w-full px-4 py-4 overflow-hidden dark:text-gray-400 bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-lg">
            <div class="flex justify-between items-center mx-1 mb-5">
                <h1 class="text-md tracking-widest uppercase text-gray-500 font-semibold">{{ $title ?? '' }}</h1>
                <button
                    class="inline-flex items-center justify-center  text-gray-400 transition-colors duration-150 rounded hover:text-gray-700"
                    aria-label="close" x-on:click="open = false">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            {{ $body }}
        </div>
    </div>
</div>
