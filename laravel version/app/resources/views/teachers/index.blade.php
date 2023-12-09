<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Home</title>
</head>
<body>
    <h1>Welcome to Teacher Dashboard</h1>

    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>

    <p>Teacher Name: {{ $name }}</p>
    <p>Teacher Email: {{ $email }}</p>
    <p>Course: {{ $course }}</p>
    <a href="{{ route('view-sessions', ['tid'=>$tid]) }}">View Attendance Sessions</a>
    <a href="{{ route('take-attendance', ['tid'=>$tid]) }}">Take Attendance</a>
</body>
</html>