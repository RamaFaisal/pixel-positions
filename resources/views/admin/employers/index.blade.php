<x-admin-layout>
    <x-page-heading>Employers Admin Controller</x-page-heading>

    <div>
        <table id="user-admin-table" class="w-full mt-6 border-2 border-primary">
            <tr class="bg-primary">
                <th>User</th>
                <th>Employer</th>
                <th>Logo</th>
                <th>Action</th>
            </tr>
            <tbody>
                @foreach ($employers as $employer)
                    <tr class="border-b border-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <td class="text-left">{{ $employer->user->name ?? 'N/A' }}</td>
                        <td>{{ $employer->name }}</td>
                        <td><img src="{{ Str::startsWith($employer->logo, ['http://', 'https://'])
                            ? $employer->logo
                            : ($employer->logo
                                ? asset('storage/logo/' . $employer->logo)
                                : asset('images/no-image.png')) }}"
                                alt="Logo {{ $employer->name }}" class="rounded-xl object-cover" width="50" height="50"></td>
                        <td>
                            <form action="/admin/employers/{{ $employer->id }}" method="post"
                                id="formDelete{{ $employer->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-xl text-white"
                                    onclick="deleteEmployer('{{ $employer->id }}', '{{ $employer->name }}')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $employers->links() }}
    </div>

    <script>
        function deleteEmployer(id, name) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this " + name + "!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formDelete' + id).submit();
                }
            });
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
