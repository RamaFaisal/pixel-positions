<x-layout>
    <main class="max-w-6xl mx-auto space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-7 lg:text-center pt-10">
                <img src="{{ asset('storage/gambar/' . $job->gambar) }}" alt="{{ $job->employer->name }} logo" class="rounded-xl h-96 w-auto object-cover mx-auto">
                
                <h4 class="font-bold text-gray-700 mt-4">{{ $job->employer->name }}</h4>
            </div>

            <div class="col-span-5">
                <div class="flex justify-between items-center mt-6">
                    <h1 class="text-3xl font-bold text-blue-500 uppercase">
                        {{ $job->title }}
                    </h1>
                </div>

                <div class="space-y-4 mt-6">
                    <p class="text-lg font-semibold text-gray-400">
                        {{ $job->description }}
                    </p>
                    <p class="text-gray-400">
                        <strong>Salary:</strong> {{ $job->salary }}
                    </p>
                    <p class="text-gray-400">
                        <strong>Location:</strong> {{ $job->location }}
                    </p>
                    <p class="text-gray-400">
                        <strong>Schedule:</strong> {{ $job->schedule }}
                    </p>
                    <p class="mt-8">
                        <a href="{{ $job->url }}" class="bg-blue-500 text-white font-bold py-2 px-6 rounded-full text-center hover:bg-blue-600 transition-colors">
                            Apply Now
                        </a>
                    </p>
                    <div class="mt-6">
                        @foreach ($job->tags as $tag)
                            <x-tag :$tag />
                        @endforeach
                    </div>
                </div>
            </div>
        </article>
    </main>
    <div class="related-jobs max-w-4xl mx-auto mt-10 mb-20">
        <h2 class="font-bold text-2xl mt-10 mb-6 text-center">Related Jobs by Tags</h2>
        @if ($relatedJobs->count() == 0)
            <p class="text-center text-gray-500">No related jobs found.</p>
        @endif
        @foreach ($relatedJobs as $related)
            <x-job-card-wide :job="$related"></x-job-card-wide>
        @endforeach
    </div>
</x-layout>