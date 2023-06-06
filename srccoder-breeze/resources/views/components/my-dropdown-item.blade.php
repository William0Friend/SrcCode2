@props(['active' => false])

@php
    $classes = 'block px-3 leading-6 text-left text-s hover:bg-blue-500 focus:bg-blue-500 hover:text-white';
    
    if($active) $classes .= ' bg-blue-500 text-white';
    // ($active ?? false)
    //             ? 'block px-3 leading-6 text-left text-s hover:bg-blue-500 focus:bg-blue-500 hover:text-white'
    //             : 'block px-3 leading-6 text-left text-s hover:bg-blue-500 focus:bg-blue-500 hover:text-white';
@endphp
<a {{ $attributes(['class' => $classes ]) }}
    > {{$slot}}</a>
