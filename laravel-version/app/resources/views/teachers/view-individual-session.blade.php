<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Individual Session</title>
</head>
<body>
    <h1>This is the session for: {{ $createdAt }}</h1>
    <form action="{{ route('update-attendance', ['tid'=>$tid, 'startTime'=>$createdAt]) }}" method="post">
    @csrf
    @method('put')
    <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Attendance Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $index => $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>
                    <select name="{{ $student->id }}">
                        <option value="present" {{ $student_attendance_statuses[$index] }}>Present</option>
                        <option value="absent" {{ $student_attendance_statuses[$index] }}>Absent</option>
                    </select>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit">Update Attendance</button>
    </form>
</body>
</html>