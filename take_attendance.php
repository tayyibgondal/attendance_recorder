    <?php
    include('database.php');

    if (isset($_GET['cid'])) {
        $cid = $_GET['cid'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Handle form submission for taking attendance
            // Extract attendance data from $_POST and process accordingly
            // Insert/update attendance records into the classAttendance table for the selected course
            // Redirect to a confirmation page or back to teacher_dashboard.php after taking attendance
        } else {
            // Fetch enrolled students for the selected course
            $students_sql = "SELECT s.sid, s.name as student_name
                            FROM student s
                            INNER JOIN enrollments e ON s.sid = e.sid
                            WHERE e.cid = $cid";
            $students_result = mysqli_query($conn, $students_sql);

            // Display form for taking attendance
            echo "<h2>Take Attendance</h2>";
            echo "<form action='take_attendance.php?cid=$cid' method='POST'>";
            echo "<h3>Course ID: $cid</h3>";

            if (mysqli_num_rows($students_result) > 0) {
                while ($student_row = mysqli_fetch_assoc($students_result)) {
                    echo "<label for='attendance{$student_row['sid']}'>
                            <input type='checkbox' id='attendance{$student_row['sid']}' 
                                name='attendance[]' value='{$student_row['sid']}' />
                            {$student_row['student_name']}
                        </label><br />";
                }
            } else {
                echo "No students enrolled in this course.";
            }

            echo "<br /><input type='submit' value='Submit Attendance' />";
            echo "</form>";
        }
    } else {
        echo "Course ID not provided.";
    }

    mysqli_close($conn);
