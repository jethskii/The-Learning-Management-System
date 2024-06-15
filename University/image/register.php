<?php
// Include database connection
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // Prepare and execute the query
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

<form method="post" action="register.php">
  <h1>Register</h1>
  <div class="input-box">
    <input type="text" name="username" placeholder="Username" required>
  </div>
  <div class="input-box">
    <input type="password" name="password" placeholder="Password" required>
  </div>
  <button type="submit" class="btn">Register</button>
</form>
