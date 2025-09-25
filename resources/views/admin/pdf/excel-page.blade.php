<table>
  <thead>
    <tr>
      <th>Job</th>
      <th>Employer</th>
      <th>Location</th>
      <th>Salary</th>
      <th>Schedule</th>
      <th>Created At</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($jobs as $job)
      <tr>
        <td>{{ $job->title }}</td>
        <td>{{ $job->employer->name }}</td>
        <td>{{ $job->location }}</td>
        <td>${{ $job->salary }}</td>
        <td>{{ $job->schedule }}</td>
        <td>{{ $job->created_at->format('Y-m-d') }}</td>
      </tr>
    @endforeach
  </tbody>
</table>