<x-layout>
    <x-page-heading>Results For "{{ request('search') }}"</x-page-heading>

    <x-forms.form class="bg-transparent" action="/search">
        <x-forms.input :label="false" name="search" placeholder="Search for jobs" />
    </x-forms>

        <div class="space-y-6 mt-6">
            @foreach ($jobs as $results)
                <x-job-card-wide :job="$results"></x-job-card-wide>
            @endforeach
            {{ $jobs->links() }}
        </div>
</x-layout>
