@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'p-3 pl-5 text-sm text-gray-600 font-semibold rounded border shadow-sm bg-white dark:bg-gray-700 dark:text-white']) !!}>
