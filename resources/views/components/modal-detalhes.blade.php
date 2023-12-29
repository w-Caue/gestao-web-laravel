@props(['name' ,'title'])
<div class="flex justify-center">
    <div x-data="{ open: false , name : '{{ $name }}'}" x-show="open" x-cloak x-on:open-detalhes.window="open = ($event.detail.name === name)"
        x-on:close-detalhes.window="open = false" x-on:keydown.escape.window="open = false"
        x-transition.duration.300ms
        class="fixed mt-5 z-50 bg-white border border-gray-300 shadow-2xl rounded-lg sm:top-28 sm:w-1/3 dark:bg-gray-500 dark:border-none">
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
</div>
