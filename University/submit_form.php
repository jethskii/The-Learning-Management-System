<?php
// Database connection parameters
$servername = "localhost"; // Replace with your server name if different
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "registration_form"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["name"];
    $email = $_POST["gmail"];
    $phone_number = $_POST["phonenum"];
    $birth_date = $_POST["birthdate"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $type_of_student = $_POST["type_of_student"]; // Assuming you fix the HTML to include this
    $course = $_POST["course"];

    // Prepare SQL statement
    $sql = "INSERT INTO users (full_name, email, phone_number, birth_date, gender, address, type_of_student, course)
            VALUES ('$full_name', '$email', '$phone_number', '$birth_date', '$gender', '$address', '$type_of_student', '$course')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
