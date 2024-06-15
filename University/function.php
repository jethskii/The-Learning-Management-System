<?php

require 'connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $gmail = mysqli_real_escape_string($conn, $_POST['gmail']);
    $phonenum = mysqli_real_escape_string($conn, $_POST['phonenum']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $student_type = mysqli_real_escape_string($conn, $_POST['student_type']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    $insert = "INSERT INTO students (full_name, email, phone_num, birth_date, gender, address, student_type, course) 
               VALUES ('$name', '$gmail', '$phonenum', '$birthdate', '$gender', '$address', '$student_type', '$course')";

    if (mysqli_query($conn, $insert)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insert . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>

        setTimeout(function() {
            window.location.href = "enrollment.html";
        }, 2000);
    </script>
</body>
</html>
