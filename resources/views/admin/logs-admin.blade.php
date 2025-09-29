<x-admin-layout>
    <h2 class="font-bold text-2xl text-center">Log Controller {{ auth()->user()->name }}</h2>

    <table class="w-full mt-6 border-2 border-primary">
        <tr class="bg-primary">
            <th>User</th>
            <th>Activity</th>
            <th>IP Address</th>
            <th>Browser</th>
            <th>Created At</th>
        </tr>
        @foreach ($logs as $log)
            <tr class="border-b border-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                <td>{{ $log->user->name }}</td>
                <td>{{ $log->activity }}</td>
                <td>{{ $log->ip_address }}</td>
                <td>{{ $log->browser }}</td>
                <td>{{ $log->created_at->format('Y-m-d') }}</td>
            </tr>
        @endforeach
    </table>
    {{ $logs->links() }}
</x-admin-layout>
