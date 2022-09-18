{{-- @props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label> --}}

<a {{ $attributes->merge(['class' => 'text-rose-500 underline font-bold'])}}>{{ $slot }}</a>