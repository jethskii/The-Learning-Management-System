<?php
require "connection.php";

// If the form is submitted to edit a record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_record'])) {
    $id = $_POST['record_id'];
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    $phoneNum = $_POST['phone_num'];
    $birthDate = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $studentType = $_POST['student_type'];
    $course = $_POST['course'];

    // Update the record
    $sql = "UPDATE students SET full_name='$fullName', email='$email', phone_num='$phoneNum', birth_date='$birthDate', gender='$gender', address='$address', student_type='$studentType', course='$course' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// If the form is submitted to delete a record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_record'])) {
    $id = $_POST['record_id'];

    // Delete the record
    $sql = "DELETE FROM students WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch all records from the students table
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Student Database</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
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
  width: 80%; /* Adjusted width */
  max-width: 200vh; /* Added max-width */
  background: rgba(0, 0, 0, 0.7); /* Adjust transparency */
  border-radius: 12px;
  padding: 40px;
  box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.5);
  position: relative; /* Add position relative for absolute positioning */
  margin: auto; /* Center the wrapper horizontally */
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
  width: calc(100% - 20px); /* Adjusted width */
  height: 45px;
  background: rgba(255, 255, 255, 0.1);
  border: none;
  outline: none;
  border-radius: 25px;
  color: #fff;
  font-size: 16px;
  padding: 10px;
  margin: 0;
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
  margin-top: 10px; /* Added margin */
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
    
    <h1>Edit Student Database</h1>
    
    <!-- Display records from students table -->
    <h2>Records in Students Table</h2>
    <?php if ($result->num_rows > 0): ?>
      <table>
        <tr>
          <th>ID</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Birth Date</th>
          <th>Gender</th>
          <th>Address</th>
          <th>Student Type</th>
          <th>Course</th>
          <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td class="editable" contenteditable="true" data-column="full_name"><?php echo $row['full_name']; ?></td>
            <td class="editable" contenteditable="true" data-column="email"><?php echo $row['email']; ?></td>
            <td class="editable" contenteditable="true" data-column="phone_num"><?php echo $row['phone_num']; ?></td>
            <td class="editable" contenteditable="true" data-column="birth_date"><?php echo $row['birth_date']; ?></td>
            <td class="editable" contenteditable="true" data-column="gender"><?php echo $row['gender']; ?></td>
            <td class="editable" contenteditable="true" data-column="address"><?php echo $row['address']; ?></td>
            <td class="editable" contenteditable="true" data-column="student_type"><?php echo $row['student_type']; ?></td>
            <td class="editable" contenteditable="true" data-column="course"><?php echo $row['course']; ?></td>
            <td>
              <form class="edit-form" method="post" action="">
                <input type="hidden" name="record_id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="full_name" value="">
                <input type="hidden" name="email" value="">
                <input type="hidden" name="phone_num" value="">
                <input type="hidden" name="birth_date" value="">
                <input type="hidden" name="gender" value="">
                <input type="hidden" name="address" value="">
                <input type="hidden" name="student_type" value="">
                <input type="hidden" name="course" value="">
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
