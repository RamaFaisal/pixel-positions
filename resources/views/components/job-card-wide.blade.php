@props(['job'])

<a href="/jobs/{{ $job->slug }}" class="mb-6 group block">
    <x-panel class="flex gap-x-6 justify-between">
        <div>
            <x-employer-logo :job="$job" :width="90" />
        </div>

        <div class="flex-1 flex flex-col">
            <div>
                <p class="text-gray-500 text-sm ">{{ $job->employer->name }}</p>
                <h2 class="font-bold text-xl group-hover:text-blue-500 transition-colors duration-300">
                    {{ $job->title }}
                </h2>
            </div>

            <span class="text-sm text-gray-500">{{ $job->schedule }} - From {{ $job->salary }}</span>

            <div class="flex self-end gap-2 mt-auto">
                @if ($job->tags->count() >= 3)
                    @foreach ($job->tags->take(3) as $tag)
                        <x-tag :$tag size="small" />
                    @endforeach
                    <span class="text-sm text-gray-500">+{{ $job->tags->count() - 3 }} more</span>
                @endif
                {{-- @foreach ($job->tags as $tag)
                    <x-tag :$tag size="small" />
                @endforeach --}}
            </div>
        </div>
    </x-panel>
</a>
