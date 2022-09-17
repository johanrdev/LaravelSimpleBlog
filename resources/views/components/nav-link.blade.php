@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-4 pt-1 border-b-4 border-yellow-500 bg-yellow-400 text-md font-bold leading-5 text-white focus:outline-none focus:border-yellow-500 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-4 pt-1 border-b-4 border-transparent text-md font-bold leading-5 text-teal-200 hover:text-white hover:border-teal-400 focus:outline-none focus:text-white focus:border-teal-400 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
