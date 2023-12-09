<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home</title>
</head>

<body>
    <h1>Student Information</h1>
    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Roll No:</strong> {{ $rollno }}</p>

    <hr>

    <h2>Courses</h2>
    @foreach ($attendanceData as $index => $data)
    <div>
        <h3>Course: {{ $data['course_name'] }}</h3>
        <p>Course Id: {{ $data['course_id'] }}</p>
        <p>Teacher: {{ $data['teacher_name'] }}</p>
        <p>Total Classes: {{ $data['total_attendance'] }}</p>
        <p>Classes Attended: {{ $data['total_attendance'] - $data['absent_count'] }}</p>
        <p>Percentage Attendance: {{ number_format($data['percentage_attendance'], 2) }}%</p>
        <a href="{{route('details', ['sid' => $id, 'cid' => $data['course_id']])}}">See Detailed Attendance</a>
    </div>
    <hr>
    @endforeach
</body>

</html>