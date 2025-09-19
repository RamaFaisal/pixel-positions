<x-layout>
    <section class="max-w-4xl mx-auto mt-12">
        <h2 class="font-bold text-2xl mt-10 mb-6 text-center">Jobs for tag "{{ $tags->name }}"</h2>

        <div class="flex flex-wrap gap-2 mb-6 mx-auto max-w-4xl">
          <h1>Other Tags: </h1>
            @foreach ($tagList as $tag)
                <x-tag :$tag />
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            @forelse ($jobs as $job)
                <x-job-card :job="$job" class="mb-6"></x-job-card>
            @empty
                <li>No jobs found for this tag.</li>
            @endforelse
        </div>
        {{ $jobs->links() }}
    </section>
</x-layout>
