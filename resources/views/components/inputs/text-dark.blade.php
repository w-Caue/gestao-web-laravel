@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'p-3 pl-3 text-xs text-gray-600 font-semibold uppercase rounded border-2 shadow-sm bg-white dark:text-gray-300 dark:bg-gray-800 dark:border-gray-700']) !!}>
