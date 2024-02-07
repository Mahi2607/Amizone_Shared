<?php
// Establish a database connection (replace these variables with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "asco";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// // Retrieve form data
// $courseCode = $_POST['courseCode'];
// $courseName = $_POST['courseName'];
// // Add more variables for other fields

// // SQL query to insert data into the database
// $sql = "INSERT INTO courses (courseCode, courseName) VALUES ('$courseCode', '$courseName')";

// if ($conn->query($sql) === TRUE) {
//     echo "Course added successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
?>