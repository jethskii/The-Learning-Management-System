<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
  $stmt->bind_param("ss", $username, $password);

  if ($stmt->execute()) {
    echo "Registration successful.";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale-1.0">
  <title>Register | Learning Management System</title>
  <link rel="stylesheet" href="styles.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
 <div class="wrapper">
   <form action="register.php" method="post">
     <h1>Register</h1>
     <div class="input-box">
       <input type="text" name="username" placeholder="Username" required>
       <i class='bx bxs-user-pin'></i>
     </div>
     <div class="input-box">
       <input type="password" name="password" placeholder="Password" required>
       <i class='bx bxs-lock-alt'></i>
     </div>
     <button type="submit" class="btn">Register</button>
   </form>
 </div>
</body>
</html>
