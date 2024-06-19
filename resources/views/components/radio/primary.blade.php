@props(['disabled' => false , 'check' => 'N'])

<input type="radio" {{ $disabled ? 'disabled' : '' }} @if($check == 'S') checked @endif {!! $attributes->merge(['class' => 'text-blue-500 transition-all duration-500 ease-in-out dark:hover:scale-100 dark:checked:scale-100 w-5 h-5 rounded-lg dark:bg-gray-800 dark:border-white-400/20 dark:scale-95']) !!}>
