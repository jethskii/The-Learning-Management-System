<?php
require "connection.php";

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $link = $_POST['link'];

    // Insert data into database
    $sql = "INSERT INTO learningm (title, link) VALUES ('$title', '$link')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add to Database</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    /* Your CSS styles */
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: url(image/Global.jpg) no-repeat;
      background-size: cover;
      background-position: center;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .wrapper {
      width: 420px;
      background: rgba(0, 0, 0, 0.7); /* Adjust transparency */
      color: #fff;
      border-radius: 12px;
      padding: 40px;
      box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.5);
    }

    .wrapper h1 {
      font-size: 36px;
      text-align: center;
      margin-bottom: 20px;
    }

    .input-box {
      margin-bottom: 20px;

    }

    .input-box input {
      width: 100%;
      height: 45px;
      background: rgba(255, 255, 255, 0.1);
      border: none;
      outline: none;
      border-radius: 25px;
      color: #fff;
      font-size: 16px;
    }

    .input-box input::placeholder {
      color: #ccc;
      padding: 20px;
    }

    .btn {
      width: 100%;
      height: 45px;
      background: #fff;
      border: none;
      outline: none;
      border-radius: 25px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      color: #333;
      transition: background 0.3s ease;
    }

    .btn:hover {
      background: #ddd;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <h1>Add to Database</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="input-box">
        <input type="text" name="title" placeholder="Title" required>
      </div>
      <div class="input-box">
        <input type="text" name="link" placeholder="Link" required>
      </div>
      <button type="submit" class="btn">Add</button>
    </form>
  </div>
</body>
</html>
