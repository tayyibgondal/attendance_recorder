# attendance_recorder
Implement the attendance recorder application: We developed a web-based application using HTML5, CSS3, JavaScript, PHP, and MySQL, ensuring a seamless and efficient user experience.

Authenticate the user: Implemented a robust user authentication system to secure the application. Users need to enter valid credentials to access their roles.

Allow the teacher to view sessions: Teachers are provided with a master view displaying current attendance sessions, along with lists of previous and upcoming sessions.

Enable attendance marking for teachers: Teachers can mark attendance for any student in any session effortlessly. The system ensures a user-friendly experience for our educators.

Enable students to view their attendance: Created a dedicated page for students to easily view their attendance records. This ensures transparency and keeps students in the loop.

Color code the attendance: Implemented a color-coded system for visualizing attendance records. Attendance below 75% is bolded and shown in red, below 85% in yellow, and 85% and above in green.

Single master view interface: Designed a clean and intuitive interface with a single master view, making navigation straightforward for users.

Database Structure
We structured the MySQL database with three essential tables:

attendance: Records attendance details including class ID, student ID, presence status, and comments.
class: Stores information about classes, including the teacher ID, start and end times, and credit hours.
user: Manages user information such as full name, email, class, and role ('teacher', 'student', or 'admin').
Implementation Details
User Authentication: Implemented a secure login system using PHP to authenticate users based on their roles. This ensures that only authorized individuals access specific features.

Master View Interface: Created a master view featuring navigation links for teachers and students, simplifying access to their respective pages.

Teacher Page:

Displays the current attendance session.
Shows lists of previous and upcoming sessions.
Allows marking attendance for any student in any session.
Student Page:

Enables students to view their attendance records.
Implements color-coded visualization based on specified criteria.
Color Coding Logic:

Developed logic to dynamically apply color codes to attendance records, enhancing the visual representation of student performance.
Nice Interface:

Utilized HTML5, CSS3, and JavaScript to design an aesthetically pleasing and responsive user interface, ensuring an enjoyable user experience.
Tools/Software Requirement
Frontend Development:
HTML5, CSS3, and JavaScript.
Backend Development:
PHP for server-side scripting.
MySQL for the database.
Development Environment:
Web server (e.g., Apache).
MySQL Database Server.
Code editor (e.g., Visual Studio Code).
