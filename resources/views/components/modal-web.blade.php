@props(['title'])
<div x-data="{ show: false }" x-show="show" x-on:open-modal.window="show = true" x-on:close-modal.window="show = false"
    class="fixed z-50 inset-0" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" style="display: none">
    <div class="fixed inset-0 bg-gray-900 opacity-40">
    </div>
    <div x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0  transform translate-y-1/2"  x-on:click.away="show: false"
        class="bg-gray-200 rounded m-auto fixed inset-0 max-w-2xl h-auto max-h-[550px] dark:bg-gray-800 dark:border-gray-400">
        @if (isset($title))
            <div class="py-3 flex items-center justify-between mx-3 my-2">
                <h1 class="text-xl font-semibold text-center dark:text-white">{{ $title }}</h1>

            </div>
        @endif
        <div>
            {{ $body }}
        </div>
    </div>
</div>
