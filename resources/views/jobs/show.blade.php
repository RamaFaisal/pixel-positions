<x-layout>
    <main class="max-w-6xl mx-auto space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center pt-10">
                <img src="{{ Str::startsWith($job->employer->logo, ['http://', 'https://'])
                    ? $job->employer->logo
                    : ($job->employer->logo
                        ? asset('storage/logo/' . $job->employer->logo)
                        : asset('images/no-image.png')) }}"
                    alt="{{ $job->employer->name }} logo"
                    class="rounded-xl h-60 w-60 object-cover mx-auto border outline-2 outline-offset-2 outline-primary">
                <h4 class="font-bold text-gray-700 mt-4">{{ $job->employer->name }}</h4>
            </div>

            <div class="col-span-8">
                <div class="flex justify-between items-center mt-6">
                    <h1 class="text-3xl font-bold text-primary uppercase">
                        {{ $job->title }}
                    </h1>
                </div>

                <div class="space-y-2 mt-6">
                    <p class="text-lg text-secondary/75">
                        {{ $job->description }}
                    </p>
                    <p class="text-secondary/75">
                        <strong>Salary:</strong> ${{ $job->salary }}
                    </p>
                    <p class="text-secondary/75">
                        <strong>Location:</strong> {{ $job->location }}
                    </p>
                    <p class="text-secondary/75">
                        <strong>Schedule:</strong> {{ $job->schedule }}
                    </p>
                    <p class="mt-6">
                        <a href="{{ $job->url }}"
                            class="bg-tertiary/75 text-white font-bold py-2 px-6 rounded-full text-center hover:bg-tertiary/90 transition-colors">
                            Apply Now
                        </a>
                    </p>
                    <div class="mt-8 flex flex-wrap gap-2">
                        @foreach ($job->tags as $tag)
                            <x-tag :$tag />
                        @endforeach
                    </div>
                </div>
            </div>
        </article>
    </main>

    <div class="related-jobs max-w-4xl mx-auto mt-12 mb-20">
        <h2 class="font-bold text-2xl mt-10 mb-6 text-center">Related Jobs by Tags</h2>
        @if ($relatedJobs->count() == 0)
            <p class="text-center text-gray-500">No related jobs found.</p>
        @endif
        @foreach ($relatedJobs as $related)
            <x-job-card-wide :job="$related" class="mb-6"></x-job-card-wide>
        @endforeach
        {{ $relatedJobs->links() }}
    </div>
</x-layout>
