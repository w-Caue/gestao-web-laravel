@aware(['error'])

@props(['value', 'name', 'for'])

<select
    {{ $attributes->class([
        'block p-3 text-xs uppercase bg-gray-100 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-800 form-select rounded-md focus:border-blue-400 border-2 focus:shadow-outline-blue focus:outline-none focus:shadow-outline-blue',
        'border-red-500' => $error,
    ]) }}
    @isset($name) name="{{ $name }}" @endif
    @isset($value) value="{{ $value }}" @endif
    {{ $attributes }}>
    {{ $slot }}
</select>
