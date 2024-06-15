<?php
require "connection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $student_name = $_POST['student_name'];
    $assignment_name = $_POST['assignment_name'];
    $submission_date = $_POST['submission_date'];

    // Insert data into MySQL
    $sql = "INSERT INTO assignments (student_name, assignment_name, submission_date) 
            VALUES ('$student_name', '$assignment_name', '$submission_date')";

    if (mysqli_query($conn, $sql)) {
        // Redirect back to the main page
        header("Location: index.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn); // Close connection
?>
