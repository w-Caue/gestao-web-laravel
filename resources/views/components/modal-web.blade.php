@props(['title'])
<div x-data="{show : false}" {{ $attributes }} x-show="show" x-on:open-modal.window="show = true" 
    x-on:close-modal.window="show = false" x-on:keydown.escape.window="show = false" class="fixed z-50 inset-0"
    x-transition.duration.300ms style="display: none">
    <div x-on:click = "show = false" class="fixed inset-0 bg-gray-900 opacity-40">
    </div>
    <div class="bg-white rounded m-auto fixed inset-0 max-w-2xl h-auto dark:bg-gray-600 dark:border-gray-400"
        style="max-height: 450px">
        @if (isset($title))
            <div class="py-3 flex items-center justify-between mx-3 my-2">
                <h1 class="text-xl font-semibold text-center dark:text-white">{{ $title }}</h1>
                <button x-on:click="$dispatch('close-modal')"
                    class="p-1 m-1 border rounded float-right hover:text-white hover:bg-red-500 dark:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        <div>
            {{ $body }}
        </div>
    </div>
</div>
