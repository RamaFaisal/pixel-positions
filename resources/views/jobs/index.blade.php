<x-layout>

    <div class="space-y-10">
        <section class="welcome text-center pt-10">
            <h1 class="font-bold text-4xl">Let's Find You A Great Job</h1>

            <x-forms.form class="bg-transparent" action="/search">
                <x-forms.input :label="false" name="search" placeholder="Search for jobs" />
                </x-forms>
        </section>

        <section class="featured-jobs">
            <x-section-heading>Poppular Jobs</x-section-heading>

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

            <div class="space-x-2 space-y-2 mt-6 flex flex-wrap mx-auto">
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
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            })
        @endif
    </script>
</x-layout>
