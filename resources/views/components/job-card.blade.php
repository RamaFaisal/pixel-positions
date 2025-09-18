@props(['job'])

<x-panel class="flex flex-col text-center">
    <a href="/jobs/{{ $job->slug }}">
        <div class="text-sm font-normal text-white/50 mb-2 self-start">
            {{ $job->employer->name }}
        </div>
        <div class="py-8">
            <h3 class="group-hover:text-blue-500 transition-colors duration-300 font-bold">{{ $job->title }}</h3>
            <p class="mt-2 text-sm">{{ $job->schedule }} - {{ $job->salary }}</p>
        </div>
        <div class="flex justify-between items-center mt-auto">
            <div>
                @if ($job->tags->count() > 3)
                    @foreach ($job->tags->take(3) as $tag)
                        <x-tag :$tag size="small" />
                    @endforeach
                    <span class="text-xs text-gray-500">+{{ $job->tags->count() - 3 }} more</span>
                @else
                    @foreach ($job->tags as $tag)
                        <x-tag :$tag size="small" />
                    @endforeach
                @endif
                {{-- @foreach ($job->tags as $tag)
                <x-tag :$tag size="small" />
            @endforeach --}}
            </div>

            {{-- <img src="https://placehold.co/42" alt=""> --}}
            <x-employer-logo :width="42"></x-employer-logo>
        </div>
    </a>
</x-panel>
