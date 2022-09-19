@php
    $classes = !is_null($comment->parent_id) ? 'ml-12 ' : '';
    $classes .= Auth::user()->id === $comment->user->id ? 'border-l-4 border-l-teal-500 ' : 'border-l-4 border-l-rose-500 ';
@endphp

<div {{ $attributes->merge(['class' => 'odd:bg-slate-100 border-gray-300 border my-3 rounded ' . $classes])}}>
    {{ $slot }}
</div>