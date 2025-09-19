<form {{ $attributes(["class" => "max-w-2xl mx-auto space-y-6 bg-primary/10 p-10 rounded-lg text-white", "method" => "GET"]) }}>
    @if ($attributes->get('method', 'GET') !== 'GET')
        @csrf
        @method($attributes->get('method'))
    @endif

    {{ $slot }}
</form>