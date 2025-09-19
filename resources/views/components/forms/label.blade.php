@props(['name', 'label'])

<div class="inline-flex items-center gap-x-2">
    <span class="w-2 h-2 bg-secondary inline-block"></span>
    <label class="font-bold text-secondary" for="{{ $name }}">{{ $label }}</label>
</div>