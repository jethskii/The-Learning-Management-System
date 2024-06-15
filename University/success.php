<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Successful</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.classroom {
    width: 60%;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.header {
    background-color: #4285F4;
    color: white;
    padding: 20px;
    text-align: center;
}

.upcoming {
    margin: 20px 0;
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

textarea {
    width: 80%;
    height: 100px;
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    width: 80%;
    padding: 10px;
    background-color: #4285F4;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #357ae8;
}

/* Success page styles */

.success-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f4f4f4;
}

.message-box {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.message-box h1 {
    color: #4285F4;
}

.message-box p {
    margin: 20px 0;
}

.message-box .button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4285F4;
    color: white;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.message-box .button:hover {
    background-color: #357ae8;
}
</style>
<body>
    <div class="success-container">
        <div class="message-box">
            <h1>Post Successful</h1>
            <p>Your announcement has been posted successfully!</p>
            <a href="index.html" class="button">Go Back to Stream</a>
        </div>
    </div>
</body>
</html>
