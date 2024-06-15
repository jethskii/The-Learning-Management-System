<?php
require "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Website</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .sub-header {
            background: url(image/Global.jpg) no-repeat;
            padding: 20px 0;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: auto;
            padding: 0 20px;
        }

        nav img {
            width: 150px;
        }

        .nav-links ul {
            list-style: none;
            display: flex;
            align-items: center;
            padding: 0;
        }

        .nav-links ul li {
            margin: 0 15px;
        }

        .nav-links ul li a {
            text-decoration: none;
            color: #000;
            font-weight: 600;
        }

        nav .fa {
            display: none;
        }

        button {
            background-color: #000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .course {
            padding: 50px 20px;
            text-align: center;
        }

        .course h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .course p {
            font-size: 16px;
            color: #555;
            max-width: 800px;
            margin: auto;
            margin-bottom: 50px;
        }

        .course-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .course-card {
            background: url(image/OIP.jpg) no-repeat;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 200vh;
            text-align: left;
            background-size: cover;
            position: relative;
        }

        .course-card h2 {
            margin-top: 0;
        }

        .course-card p {
            margin: 10px 0;
        }

        .course-card .card-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .course-card .card-buttons button {
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        .footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        .footer .icons i {
            color: #fff;
            margin: 0 10px;
            cursor: pointer;
        }

        .footer p {
            margin: 10px 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links ul {
                flex-direction: column;
                position: fixed;
                background: #fff;
                width: 200px;
                height: 100vh;
                top: 0;
                right: -200px;
                transition: 0.3s;
            }

            .nav-links ul li {
                margin: 50px 0;
            }

            nav .fa {
                display: block;
                color: #000;
                font-size: 24px;
                cursor: pointer;
            }

            .nav-links.show {
                right: 0;
            }

            .course-cards {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <section class="sub-header">
        <nav>
            <a href="index.html"><img src="image/image logo.png" alt="University Logo"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="enrollment.html">ENROLLMENT</a></li>
                    <li><a href="test.php">SUBMISSION</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
                    <li><a href="login.html"><button>SIGN OUT</button></a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <h1>Learning Materials</h1>
    </section>

    <section class="course">
        <h1>Learning Materials Page System</h1>
        <p>Access a curated collection of educational resources, including articles, videos, e-books, and webinars. Click the links to start learning!</p>
        
        <div class="course-cards">
            <div class="course-card">
                <div class="card-buttons">
                    <a href="edit.php">Edit</a>
                </div>
                <h2>Learning Materials</h2>
      
                <!-- Table to display learning materials -->
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Assuming you have a database connection established

                        // Fetch data from the database
                        // Example: Assuming you have a table named 'learningm' with columns 'id', 'title', and 'link'
                        // Adjust your query according to your actual table structure
                        $query = "SELECT * FROM learningm";
                        $result = mysqli_query($conn, $query);

                        // Check if query executed successfully
                        if (!$result) {
                            die("Database query failed.");
                        }

                        // Fetch and display data rows
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['title']}</td>";
                            echo "<td><a href='{$row['link']}'>{$row['link']}</a></td>";
                            echo "</tr>";
                        }

                        // Release the result set
                        mysqli_free_result($result);

                        // Close the database connection
                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="footer">
        <h4>About Us</h4>
        <p>Welcome to the University, where academic excellence meets boundless opportunities. Our faculty are dedicated mentors fostering a dynamic learning environment. With state-of-the-art facilities and diverse programs, students explore their interests and prepare for success. Join our vibrant community and unleash your potential at University.</p>
        <div class="icons">
            <i class="fa fa-facebook-official"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-linkedin"></i>
        </div>
        <p>Made <i class="fa fa-heart-o"></i> by Jethro Mandalones</p>
    </section>

    <script>
        var navLinks = document.getElementById("navLinks");
        function showMenu() {
            navLinks.style.right = "0";
        }
        function hideMenu() {
            navLinks.style.right = "-200px";
        }
    </script>
</body>
</html>
