<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Attendance</title>
</head>

<body>
    <h1>Take Attendance for Date: {{ $date }}</h1>
    
    <form action="{{ route('store-attendance', ['tid'=>$tid]) }}" method="POST">
        @csrf
        <table>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Attendance Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>
                        <select name="{{ $student->id }}">
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                        </select>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <input type="submit" value="Submit Attendance">
</body>

</html>