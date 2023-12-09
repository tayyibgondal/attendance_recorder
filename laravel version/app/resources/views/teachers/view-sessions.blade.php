<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Sessions</title>
</head>
<body>
    <h1>Previous Sessions</h1>
    
    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>

    <table>
        <thead>
            <tr>
                <th>Session Date</th>
                <th>View Attendance</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sessions as $session)
            <tr>
                <td>{{ $session->created_at }}</td>
                <td><a href="{{ route('view-individual-session', ['tid'=>$tid, 'startTime'=>$session->created_at]) }}">View Attendance</a></td>
            </tr>
            @endforeach
        </tbody>
</body>
</html>