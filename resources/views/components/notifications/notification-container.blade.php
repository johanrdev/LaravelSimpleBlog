@php
    $classes = Auth::user()->id == $source->user->id ? 'border-l-4 border-l-teal-500' : ''
@endphp

<div {{ $attributes->merge(['class' => 'flex border-gray-300 border-b items-center odd:bg-slate-100 ' . $classes ])}}>
    {{ $slot }}
</div>