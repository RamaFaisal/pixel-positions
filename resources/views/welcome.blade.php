<x-layout>

    <div class="space-y-10">
        <section class="welcome text-center pt-10">
            <h1 class="font-bold text-4xl">Let's Find You A Great Job</h1>

            <form action="" class="mt-6">
                <input type="text" placeholder="Search for jobs" class="border border-white/10 rounded-xl px-4 py-3 bg-white/10 w-full max-w-2xl">
                {{-- <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg ml-2">Search</button> --}}
            </form>
        </section>

        <section class="featured-jobs pt-10">
            <x-section-heading>Featured Jobs</x-section-heading>

            <div class="grid grid-cols-3 gap-6 mt-6">
                <x-job-card></x-job-card>
                <x-job-card></x-job-card>
                <x-job-card></x-job-card>
            </div>
        </section>

        <section class="tags">
            <x-section-heading>Tags</x-section-heading>

            <div class="space-x-2 mt-6">
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
            </div>
        </section>

        <section class="recent-jobs">
            <x-section-heading>Recent Jobs</x-section-heading>

            <div class="space-y-6 mt-6">
                <x-job-card-wide></x-job-card-wide>
                <x-job-card-wide></x-job-card-wide>
                <x-job-card-wide></x-job-card-wide>
            </div>
        </section>
    </div>

</x-layout>
