<?php
require "connection.php";

// If the form is submitted to add a new record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_record'])) {
    $title = $_POST['title'];
    $link = $_POST['link'];

    // Insert data into database
    $sql = "INSERT INTO learningm (title, link) VALUES ('$title', '$link')";

    if ($conn->query($sql) === TRUE) {

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// If the form is submitted to edit a record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_record'])) {
    $id = $_POST['record_id'];
    $title = $_POST['title'];
    $link = $_POST['link'];

    // Update the record
    $sql = "UPDATE learningm SET title='$title', link='$link' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// If the form is submitted to delete a record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_record'])) {
    $id = $_POST['record_id'];

    // Delete the record
    $sql = "DELETE FROM learningm WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch all records from the learningm table
$sql = "SELECT * FROM learningm";
$result = $conn->query($sql);

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Database</title>
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
      color: #fff; /* Set font color to white */
    }

    .wrapper {
      width: 800px;
      background: rgba(0, 0, 0, 0.7); /* Adjust transparency */
      border-radius: 12px;
      padding: 40px;
      box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.5);
      position: relative; /* Add position relative for absolute positioning */
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
      padding: 10px;
    }

    .input-box input::placeholder {
      color: #ccc;
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

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
      text-align: center; /* Center align content in the table */
    }

    table th,
    table td {
      border: 1px solid #fff;
      padding: 10px;
    }

    .edit-form {
      display: flex; /* Use flex layout for action buttons */
      justify-content: center;
    }

    .editable {
      cursor: pointer;
    }

    .editable:focus {
      outline: none;
      background: #ddd;
    }

    /* Style for back button */
    .back-btn {
      position: absolute;
      left: 20px;
      top: 20px;
      background: transparent;
      border: none;
      font-size: 18px;
      color: #fff;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <!-- Back Button -->
    <a class="back-btn" href="Assigned.php"><i class="fas fa-arrow-left"></i> Back</a>
    
    <h1>Edit Database</h1>
    
    <!-- Form to add a new record -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="input-box">
        <input type="text" name="title" placeholder="Title" required>
      </div>
      <div class="input-box">
        <input type="text" name="link" placeholder="Link" required>
      </div>
      <button type="submit" class="btn" name="add_record">Add</button>
    </form>

    <!-- Display records from learningm table -->
    <h2>Records in learningm Table</h2>
    <?php if ($result->num_rows > 0): ?>
      <table>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Link</th>
          <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td class="editable" contenteditable="true" data-column="title"><?php echo $row['title']; ?></td>
            <td class="editable" contenteditable="true" data-column="link"><?php echo $row['link']; ?></td>
            <td>
              <form class="edit-form" method="post" action="">
                <input type="hidden" name="record_id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="title" value="">
                <input type="hidden" name="link" value="">
                <button type="submit" class="btn" name="edit_record">Edit</button>
                <button type="submit" class="btn" name="delete_record">Delete</button>
              </form>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
    <?php else: ?>
      <p>No records found.</p>
    <?php endif; ?>
  </div>

  <script>
    // JavaScript for inline editing
    document.addEventListener('DOMContentLoaded', function() {
      const editableFields = document.querySelectorAll('.editable');

      editableFields.forEach(field => {
        field.addEventListener('blur', function() {
          const id = this.parentNode.parentNode.querySelector('input[name="record_id"]').value; // Get the ID of the record
          const columnName = this.getAttribute('data-column'); // Get the column name
          const columnValue = this.textContent.trim(); // Get the updated value

          // Set the value to the hidden input
          this.parentNode.parentNode.querySelector(`input[name="${columnName}"]`).value = columnValue;
        });
      });
    });
  </script>
</body>
</html>
