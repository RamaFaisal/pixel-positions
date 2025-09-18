<x-layout>

    <div class="space-y-10">
        <section class="welcome text-center pt-10">
            <h1 class="font-bold text-4xl">Let's Find You A Great Job</h1>

            <form action="/" method="GET" class="mt-6">
                <input type="text" placeholder="Search for jobs" name="search" value="{{ old('search') }}"
                    class="border border-white/10 rounded-xl px-4 py-3 bg-white/10 w-full max-w-2xl">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg ml-2">Search</button>
            </form>

            @if (request('search'))
                <div id="search-results" class="grid grid-cols-3 gap-4 mt-6 max-w-3xl mx-auto text-left">
                    @if ($hasil->count() > 0)
                        @foreach ($hasil as $hasil1)
                            {{-- <li class="py-2 border-b border-white/10"><a href="/jobs/{{ $hasil1->slug }}">{{ $hasil1->title }} at
                                    {{ $hasil1->employer->name }}</a></li> --}}
                            <a href="/jobs/{{ $hasil1->slug }}"><div class="text-sm border text-center bg-gray-300 text-black rounded-4xl py-2 px-4 hover:bg-white hover:underline">{{ $hasil1->title }}</div></a>
                        @endforeach
                    @else
                        <p>No results for "{{ request('search') }}"</p>
                    @endif
                </div>
            @else
                <h2 class="font-bold text-2xl mt-6">Popular Searches:</h2>
                <p class="text-gray-400">Web Developer, Designer, Frontend, Backend, Fullstack, Remote</p>
            @endif
        </section>

        <section class="featured-jobs pt-10">
            <x-section-heading>Featured Jobs</x-section-heading>

            <div class="grid grid-cols-3 gap-6 mt-6">
                @if ($featuredJobs->count() > 3)
                    @php
                        $featuredJobs = $featuredJobs->random(3);
                    @endphp
                @endif
                @foreach ($featuredJobs as $job)
                    <x-job-card :$job></x-job-card>
                @endforeach
            </div>
        </section>

        <section class="tags">
            <x-section-heading>Tags</x-section-heading>

            <div class="space-x-2 mt-6">
                @foreach ($tags as $tag)
                    <x-tag :$tag />
                @endforeach
            </div>
        </section>

        <section class="recent-jobs">
            <x-section-heading>Recent Jobs</x-section-heading>

            <div class="space-y-6 mt-6">
                @foreach ($recentJobs as $job)
                    <x-job-card-wide :job="$job"></x-job-card-wide>
                @endforeach
                {{ $recentJobs->links() }}
            </div>
        </section>
    </div>

    {{-- <script>
        if (window.location.search.includes('search=')) {
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    </script> --}}

</x-layout>
