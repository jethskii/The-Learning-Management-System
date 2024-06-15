<?php
require "connection.php";

// Retrieve form data
$message = $_POST['message'];
$file = $_FILES['file']['name']; // Get the name of the uploaded file
$link = $_POST['link'];

// File upload handling
$target_dir = "uploads/"; // Directory where uploaded files will be stored
$target_file = $target_dir . basename($_FILES["file"]["name"]); // Full path to the uploaded file

// Move uploaded file to designated location
if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}

// Insert data into the database
$sql = "INSERT INTO posts (message, file, link) VALUES ('$message', '$file', '$link')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}   

$conn->close();
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
    window.location.href = "ips.html";
}, 3000);
</script>
</body>
</html>
