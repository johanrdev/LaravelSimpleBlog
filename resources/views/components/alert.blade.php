@php
    $classes = 'bg-teal-500 border-slate-600';

    switch ($type) {
        case 'success':
            $classes = 'bg-teal-500 border-teal-800';
            break;
        case 'error':
            $classes = 'bg-rose-500 border-rose-800';
            break;
        case 'info':
            $classes = 'bg-slate-200 text-slate-500 border-slate-500';
            break;
        default:
            $classes = 'bg-teal-500 border-teal-800';
            break;
    }
@endphp

<div {{ $attributes->merge(['class' => 'p-3 mb-1 rounded font-bold text-white border-b-2 ' . $classes])}}>
    {{ $slot }}
</div>