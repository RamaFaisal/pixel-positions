<x-admin-layout>
    <h2 class="font-bold text-2xl text-center">User Controller {{ auth()->user()->name }}</h2>

    <table id="user-admin-table" class="w-full mt-6 border-2 border-primary">
        <tr class="bg-primary">
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Employer</th>
            <th>Action</th>
        </tr>
        @foreach ($users as $user)
            <tr class="border-b border-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                <td class="text-left">{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="text-center">{{ $user->role }}</td>
                <td class="text-center">{{ $user->employer->name ?? 'N/A' }}</td>
                <td class="text-center flex flex-row gap-4 justify-center">
                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-xl"
                        onClick="editUser('{{ $user->id }}', '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')">Edit</button>
                    <form action="/admin/{{ $user->id }}" method="post" id="formDelete{{ $user->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-xl text-white"
                            onclick="deleteUser('{{ $user->id }}')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="mt-4">
        {{ $users->links() }}
    </div>

    {{-- modalEdit --}}
    <div id="modalEdit" class="fixed inset-0 flex items-center justify-center hidden bg-gray-500 bg-opacity-50">
        <div class="p-6 rounded-lg shadow-lg w-96 bg-white dark:bg-white">
            <h1 class="text-2xl font-bold mb-4 text-center">Form Edit User</h1>
            <form method="post" id="formEdit">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name"
                        class="mt-1 block w-full border border-primary rounded-md shadow-sm p-2">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" name="email" id="email"
                        class="mt-1 block w-full border border-primary rounded-md shadow-sm p-2">
                </div>

                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="role" id="role"
                        class="mt-1 block w-full border border-primary rounded-md shadow-sm p-2">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>

                <div>
                    <button type="submit"
                        class="mt-4 bg-primary/75 hover:bg-primary text-white px-4 py-2 rounded-md cursor-pointer inline-block">
                        Submit
                    </button>
                    <button type="button" onclick="modalEdit()"
                        class="mt-4 bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded-md cursor-pointer inline-block">
                        Close
                    </button>
                </div>
            </form>
        </div>
    </div>


    <script>
        function modalEdit() {
            document.getElementById('modalEdit').classList.add('hidden');
        }

        function editUser(userId, name, email, role) {
            document.getElementById('name').value = name;
            document.getElementById('email').value = email;
            document.getElementById('role').value = role;
            document.getElementById('formEdit').action = '/admin/users/' + userId;
            document.getElementById('modalEdit').classList.remove('hidden');
        }

        function deleteUser(userId) {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data kategori akan dihapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`formDelete${userId}`).submit();
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
