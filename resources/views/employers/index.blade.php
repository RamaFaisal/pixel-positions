<x-layout>
    <div class="">
        @if ($employer == null && $job == null)
            <div class="flex flex-col items-center">
                <p class="text-red-500 text-center italic">Employer data is not available, please create an Employer account</p>
                <a href="{{ route('employer.create') }}"
                    class="bg-primary/50 hover:bg-primary/100 py-2 px-4 rounded-full transition ease-in-out delay-150 duration-300 mt-4">Create
                    an Employer Account</a>
            </div>
        @else
            <x-page-heading>Employers Profile</x-page-heading>
            <div class="flex flex-col items-center gap-2">
                <img id="imgEmployer" src="{{ Str::startsWith($employer->logo, ['http://', 'https://'])
                    ? $employer->logo
                    : ($employer->logo
                        ? asset('storage/logo/' . $employer->logo)
                        : asset('images/no-image.png')) }}"
                    alt="Logo {{ $employer->name }}" class="h-14 lg:h-20 border rounded-full">
                <p class="font-bold mt-4 capitalize text-2xl">{{ $employer->name }}</p>
                <p>{{ $employer->user->email }}</p>

                <div class="grid grid-cols-3 gap-4 mt-5">
                    @foreach ($job as $jobs)
                        <x-job-card :job="$jobs" />
                    @endforeach
                </div>
            </div>
        @endif
    </div>
    <script>
        @if (session('error'))
            {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        @endif
    </script>
</x-layout>
