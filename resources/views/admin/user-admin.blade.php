<x-admin-layout>
    <h2 class="font-bold text-2xl text-center">User Controller {{ auth()->user()->name }}</h2>

    <table id="user-admin-table" class="w-full mt-6 border-2 border-primary">
        <tr class="bg-primary">
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        @foreach ($users as $user)
            <tr class="border-b border-gray-300">
                <td class="text-left">{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="text-center">{{ $user->role }}</td>
                <td class="text-center">
                    <button onclick="editUser({{ $user->id }}, '{{ $user->name }}')">Edit</button>
                    <button onclick="deleteUser({{ $user->id }})">Delete</button>
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
            <p id="isi"></p>
            <select name="role" id="role" class="mt-1 block w-full border border-primary rounded-md shadow-sm p-2">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <button onclick="modalEdit()" class="mt-4 bg-primary text-white px-4 py-2 rounded-md cursor-pointer inline-block">
                Close
            </button>
        </div>
    </div>


    <script>
        function modalEdit() {
            document.getElementById('modalEdit').classList.add('hidden');
        }

        function editUser(userId, name) {
            document.getElementById('isi').textContent = `Halo blade ${userId} ${name}`;
            document.getElementById('modalEdit').classList.remove('hidden');
        }
    </script>
</x-admin-layout>
