<?php
// Include database connection
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            echo "Login successful.";
            header("Location: index.html");
            exit();
        } else {
  
        }
    } else {
        echo "No user found.";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale-1.0">
  <title>Login Form | Learning Management System</title>
  <link rel="stylesheet" href="styles.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }

  body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: url(image/Global.jpg) no-repeat;
    background-size: cover;
    background-position: center;
  }

  .wrapper {
    width: 420px;
    background: rgba(0, 0, 0, 0.5); /* Add some transparency */
    color: #fff; /* Change text color to white */
    border-radius: 12px;
    padding: 30px 40px;
  }

  .wrapper h1 {
    font-size: 36px;
    text-align: center;
    margin-bottom: 20px; /* Add some space below the header */
  }

  .wrapper .input-box {
    position: relative;
    width: 100%;
    height: 50px;
    margin: 30px 0;
  }

  .input-box input {
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid rgba(255, 255, 255, 0.2);
    border-radius: 40px;
    color: #fff;
    padding: 0 20px;
  }

  .input-box input::placeholder {
    color: #fff;
  }

  .input-box i {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 20px;
    color: #fff; /* Change icon color to white */
  }

  .wrapper .remember-forgot {
    display: flex;
    justify-content: space-between;
    font-size: 14.5px;
    margin: -15px 0 16px;
  }

  .remember-forgot label input {
    accent-color: #fff;
    margin-right: 3px;
  }

  .remember-forgot a {
    color: #fff;
    text-decoration: none;
  }

  .remember-forgot a:hover {
    text-decoration: underline;
  }

  .wrapper .btn {
    width: 100%;
    height: 45px;
    background: #fff;
    border: none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    font-size: 16px;
    color: #333;
    font-weight: 600;
  }

  .wrapper .register-link {
    font-size: 14.5px;
    text-align: center;
    margin: 20px 0 15px;
  }

  .register-link p a {
    color: #fff;
    text-decoration: none;
    font-weight: 600;
  }

  .register-link p a:hover {
    text-decoration: underline;
  }
</style>
<body>
 <div class="wrapper">
   <form action="login.php" method="post">
     <h1>Login</h1>
     <div class="input-box">
       <input type="text" name="username" placeholder="Username" required>
       <i class='bx bxs-user-pin'></i>
     </div>
     <div class="input-box">
       <input type="password" name="password" placeholder="Password" required>
       <i class='bx bxs-lock-alt'></i>
     </div>
     <div class="remember-forgot">
       <label><input type="checkbox">Remember me</label>
       <a href="forgot_password.php">Forgot Password</a>
     </div>
     <button type="submit" class="btn">Login</button>
     <div class="register-link">
       <p>Don't have an Account? <a href="register.php">Register</a></p>
     </div>
   </form>
 </div>
</body>
</html>
