@props(['job'])

<img src="{{ Str::startsWith($job->employer->logo, ['http://', 'https://'])
    ? $job->employer->logo
    : ($job->employer->logo
        ? asset('storage/logo/' . $job->employer->logo)
        : asset('images/no-image.png')) }}"
    alt="Logo {{ $job->employer->name }}" class="rounded-xl object-cover h-24 w-24">
