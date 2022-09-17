@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-4 pt-1 border-b-4 border-yellow-400 bg-teal-400 text-md font-bold leading-5 text-white focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-4 pt-1 border-b-4 border-transparent text-md font-bold leading-5 text-teal-200 hover:text-white hover:border-teal-200 focus:outline-none focus:text-white focus:border-teal-200 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
