@props(['tag', 'size' => 'base'])

@php
    $classes = "bg-primary/25 hover:bg-primary/50 rounded-xl font-medium transition-colors duration-300";

    if ($size === 'base') {
        $classes .= ' px-5 py-1 text-sm';
    } 
    
    if ($size === 'small') {
        $classes .= ' px-2 py-1 text-xs';
    } 
@endphp

<a href="/tags/{{ strtolower($tag->name) }}" class="{{ $classes }}">{{ $tag->name }}</a>
