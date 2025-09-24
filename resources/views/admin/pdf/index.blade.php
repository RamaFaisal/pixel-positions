<x-admin-layout>
  <h1 class="font-bold text-2xl text-center">Report Admin Page</h1>

  <table>
    <tr>
      <th>Job</th>
      <th>Employer</th>
      <th>Location</th>
      <th>Salary</th>
      <th>Schedule</th>
    </tr>
    @foreach ($jobs as $job)
      <tr>
        <td>{{ $job->title }}</td>
        <td>{{ $job->employer->name }}</td>
        <td>{{ $job->location }}</td>
        <td>{{ $job->salary }}</td>
        <td>{{ $job->schedule }}</td>
      </tr>
    @endforeach
  </table>

  <button class="bg-tertiary/75 text-white px-6 py-2 rounded-md font-semibold transition-colors duration-300 hover:bg-tertiary/100"><a href="{{ route('admin.reports.pdf') }}">Generate PDF</a></button>
</x-admin-layout>