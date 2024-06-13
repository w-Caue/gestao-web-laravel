@aware(['type'])

<button type="{{ $type }}"
    {{ $attributes->merge([
        'class' =>
            'px-2 py-1 font-medium leading-5 transition-colors duration-150 rounded focus:outline-blue focus:shadow-outline-blue',
    ]) }}>
    {{ $slot }}
</button>
