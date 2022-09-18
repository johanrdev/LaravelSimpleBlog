@php
    $classes = $isLarge ? 'w-20 h-20 md:w-40 md:h-40' : 'w-10 h-10';
@endphp

<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOSIZ6hZseAPKb42yOVWSqt00bWSi8yusbMQ&usqp=CAU" 
{{ $attributes->merge(['class' => 'shrink-0 border rounded ' . $classes ]) }} />