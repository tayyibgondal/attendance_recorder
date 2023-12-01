<?php
include('db_server.php');

if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];
    $tid = $_GET['tid'];

    // Fetch unique dates
    $attendance_dates = "SELECT UNIQUE(ca.startTime)
        FROM classAttendance ca
        WHERE tid = $tid
        ";

    // Fetch attendance records for the selected course
    $attendance_sql = "SELECT s.name as student_name, ca.startTime, ca.endTime, ca.attendance_status
                       FROM classAttendance ca
                       INNER JOIN student s ON ca.sid = s.sid
                       WHERE ca.cid = $cid";
    $attendance_result = mysqli_query($conn, $attendance_sql);

    // Display attendance records
    echo "<h2>View Attendance</h2>";
    echo "<h3>Course ID: $cid</h3>";

    if (mysqli_num_rows($attendance_result) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Student Name</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Status</th>
                </tr>";

        while ($attendance_row = mysqli_fetch_assoc($attendance_result)) {
            echo "<tr>";
            echo "<td>{$attendance_row['student_name']}</td>";
            echo "<td>{$attendance_row['startTime']}</td>";
            echo "<td>{$attendance_row['endTime']}</td>";
            echo "<td>{$attendance_row['attendance_status']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No attendance records found for this course.";
    }
} else {
    echo "Course ID not provided.";
}

mysqli_close($conn);
