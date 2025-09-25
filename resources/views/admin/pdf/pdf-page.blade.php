<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download PDF Jobs</title>
    @vite('resources/css/app.css')

    <style>
        h1 {
            font: bold;
            text-align: center;
            color: #252A34;
        }

        table {
            border: 1px solid #ddd;
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            height: 40px;
            text-align: center;
            background-color: #1f5bff;
            color: #ffffff;
        }

        td {
            color: #555555;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
            /* Efek garis zebra */
        }
    </style>
</head>

<body style="font-family: sans-serif">
    <h1>Report Jobs</h1>

    <table id="jobAdminTable">
        <tr>
            <th>Job Title</th>
            <th>Employer</th>
            <th>Location</th>
            <th>Salary</th>
            <th>Schedule</th>
            <th>Created At</th>
        </tr>
        @foreach ($jobs as $job)
            <tr>
                <td>{{ $job->title }}</td>
                <td>{{ $job->employer->name }}</td>
                <td>{{ $job->location }}</td>
                <td style="width: 80px">$ {{ $job->salary }}</td>
                <td>{{ $job->schedule }}</td>
                <td style="width: 100px">{{ $job->created_at->format('Y-m-d') }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
