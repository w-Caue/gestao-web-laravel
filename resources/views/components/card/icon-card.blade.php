@aware(['error'])

@props(['title', 'subtitle', 'color', 'url'])

<div {{ $attributes->merge(['class' => 'flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800']) }}>
    <div
        class="p-3 mr-4 text-{{ $color ?? 'blue' }}-500 bg-{{ $color ?? 'blue' }}-100 rounded-full dark:text-{{ $color ?? 'blue' }}-100 dark:bg-{{ $color ?? 'blue' }}-500">
        {{ $slot }}
    </div>

    <div>
        @isset($title)
            <p class="mb-2 text-xs font-semibold tracking-widest uppercase text-gray-600 dark:text-gray-400">
                {{ $title }}
            </p>
        @endisset
        @isset($subtitle)
            <p class="text-lg text-center font-semibold text-gray-700 dark:text-gray-200">
                {{ $subtitle }}
            </p>
        @endisset
    </div>
</div>
