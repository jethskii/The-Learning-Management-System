<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Submission</title>
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
            width: 90%;
            max-width: 800px; /* Limit maximum width */
            background: rgba(0, 0, 0, 0.7); /* Adjust transparency */
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.5);
            position: relative; /* Add position relative for absolute positioning */
        }

        .wrapper h2 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 30px;
        }

        .input-box {
            margin-bottom: 20px;
        }

        .input-box label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .input-box input {
            width: calc(100% - 20px); /* Adjust width */
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            outline: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            padding: 8px;
            box-sizing: border-box;
            transition: background 0.3s ease, border-color 0.3s ease;
        }

        .input-box input::placeholder {
            color: #ccc;
        }

        .input-box input:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: #fff;
        }

        .btn {
            width: 100%;
            height: 40px;
            background: #fff;
            border: none;
            border-radius: 4px;
            color: #333;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
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
            color: white;
        }

        table th {
            background-color: #f2f2f2;
        }
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
    <a class="back-btn" href="Assigned.php"><i class="fas fa-arrow-left"></i> Back</a>
        <h2>Assignment Submission</h2>
        <form action="submit_assignment.php" method="post">
    <div class="input-box">
        <label for="student_name" style="color: #fff;">Student Name:</label>
        <input type="text" id="student_name" name="student_name" required>
    </div>
    
    <div class="input-box">
        <label for="assignment_name" style="color: #fff;">Assignment Name:</label>
        <input type="text" id="assignment_name" name="assignment_name" required>
    </div>
    
    <div class="input-box">
        <label for="submission_date" style="color: #fff;">Submission Date:</label>
        <input type="date" id="submission_date" name="submission_date" required>
    </div>
    
    <input type="submit" class="btn" value="Submit Assignment">
</form>

        <h2>Submitted Assignments</h2>
        <table>
            <thead>
                <tr>
                    <th style="color: #000;">Student Name</th>
                    <th style="color: #000;">Assignment Name</th>
                    <th style="color: #000;">Submission Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require "connection.php";

                // Fetch submitted assignments
                $sql = "SELECT * FROM assignments";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['student_name'] . "</td>";
                        echo "<td>" . $row['assignment_name'] . "</td>";
                        echo "<td>" . $row['submission_date'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No assignments submitted yet.</td></tr>";
                }
                mysqli_close($conn); // Close connection
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
