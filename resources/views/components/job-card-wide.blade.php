@props(['job'])

@php
    $classes = 'flex gap-x-6 justify-between';
@endphp

<a href="/jobs/{{ $job->slug }}" class="mb-6 group block">
    <x-panel {{ $attributes->merge(['class' => $classes]) }}>
        <div>
            <x-employer-logo :job="$job" />
        </div>

        <div class="flex-1 flex flex-col">
            <div>
                <p class="text-gray-500 text-sm ">{{ $job->employer->name }}</p>
                <h2 class="font-bold text-xl group-hover:text-primary transition-colors duration-300 capitalize">
                    {{ $job->title }}
                </h2>
            </div>

            <span class="text-sm text-gray-500">{{ $job->schedule }} - From ${{ $job->salary }}</span>

            <div class="flex self-end gap-2 mt-auto">
                @if ($job->tags->count() > 3)
                    @foreach ($job->tags->take(3) as $tag)
                        <x-tag :$tag size="small" />
                    @endforeach
                    <span id="tags" class="text-sm text-gray-500">+{{ $job->tags->count() - 3 }} more</span>
                @else
                    @foreach ($job->tags as $tag)
                        <x-tag :$tag size="small" />
                    @endforeach
                @endif
                {{-- @foreach ($job->tags as $tag)
                    <x-tag :$tag size="small" />
                @endforeach --}}
            </div>
        </div>
    </x-panel>
</a>
