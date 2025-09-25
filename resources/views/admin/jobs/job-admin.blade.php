<x-admin-layout>
    <h5 class="font-bold text-3xl text-center p-10">Job Controller {{ auth()->user()->name }}</h5>

    <div class="">
        <a class="bg-tertiary/75 text-white px-6 py-2 rounded-md font-semibold transition-colors duration-300 hover:bg-tertiary/100"
            href="{{ route('admin.reports.pdf') }}" target="_blank">Generate
            PDF</a>
        <a class="bg-green-400 text-white px-6 py-2 rounded-md font-semibold transition-colors duration-300 hover:bg-green-500"
            href="{{ route('admin.reports.excel') }}">Generate
            Excel</a>
    </div>

    <table id="user-admin-table" class="w-full mt-6 table-auto border-2 border-primary dark:border-white">
        <tr class="bg-primary">
            <th class="">Job</th>
            <th>Employer</th>
            <th>Location</th>
            <th>Salary</th>
            <th>Schedule</th>
            {{-- <th>Tags</th> --}}
            <th>Action</th>
        </tr>
        @foreach ($jobs as $job)
            <tr class="border-b border-gray-300">
                <td class="text-left">{{ $job->title }}</td>
                <td class="text-left">{{ $job->employer->name }}</td>
                <td class="text-left">{{ $job->location }}</td>
                <td class="text-left">${{ $job->salary }}</td>
                <td class="text-left">{{ $job->schedule }}</td>
                {{-- <td class="text-left">
                @foreach ($job->tags as $tag)
                    <x-tag :$tag />
                @endforeach
              </td> --}}
                <td class="text-center flex flex-row gap-4">
                    <a href="{{ route('admin.jobs.edit', $job->id) }}"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-xl">Edit</a>
                    <form action="/admin/jobs/{{ $job->id }}" method="post" id="formDelete{{ $job->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteJob('{{ $job->id }}')"
                            class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-xl text-white">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="mt-4">
        {{ $jobs->links() }}
    </div>

    <script>
        function deleteJob(jobId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formDelete' + jobId).submit();
                }
            })
        }

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</x-admin-layout>
