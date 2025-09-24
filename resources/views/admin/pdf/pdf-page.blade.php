<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Download PDF</title>
</head>
<body>
  <h1>Report Jobs</h1>

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
</body>
</html>