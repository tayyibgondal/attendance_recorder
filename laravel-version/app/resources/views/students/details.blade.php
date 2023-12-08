<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>

<body>
    <h1>Your attendance for this course is as follows.</h1>

    <p><strong>Teacher:</strong> {{ $teacherName }}</p>
    <p><strong>Course:</strong> {{ $courseName }}</p>
    <hr>

    @foreach ($attendances as $attendance)
    <p><strong>Date:</strong> {{ $attendance->created_at }}</p>
    <p><strong>Status:</strong> {{ $attendance->attendance_status }}</p>
    <hr>
    @endforeach
</body>

</html>