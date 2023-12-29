@props(['title'])
<div x-data="{show : @entangle($attributes->wire('model'))}" x-show="show" x-on:open-modal.window="show = true" 
    x-on:close-modal.window="show = false" class="fixed z-50 inset-0"
    x-transition.duration.400ms style="display: none">
    <div  class="fixed inset-0 bg-gray-900 opacity-40">
    </div>
    <div class="bg-white rounded m-auto fixed inset-0 max-w-2xl h-auto dark:bg-gray-600 dark:border-gray-400"
        style="max-height: 500px">
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
