@php
    $classes = 'p-4 bg-white/5 rounded-xl border border-secondary hover:border-primary hover:shadow-lg transition-colors duration-300 group';
@endphp

<div
    {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
