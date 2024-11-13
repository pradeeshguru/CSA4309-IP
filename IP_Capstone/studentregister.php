<?php
// Database connection
$connection = mysqli_connect("localhost", "root", "", "learningPlatform", 3307);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if (isset($_POST["register"])) {
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Insert the new student into the database
    $sql = "INSERT INTO students (name, phone, password) VALUES ('$name', '$phone', '$password')";

    if (mysqli_query($connection, $sql)) {
        echo '<script>location.replace("coursecatalog.html");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}

// Close database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
       /* Global Styles */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

/* Body Style */
body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f4f4f9;
}

/* Container Style */
.registration-container,
.login-container {
    background-color: #fff;
    padding: 2rem;
    width: 100%;
    max-width: 400px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
}

/* Title Style */
.registration-container h1,
.login-container h1 {
    font-size: 1.8rem;
    color: #333;
    margin-bottom: 1rem;
}

/* Label Style */
label {
    display: block;
    margin-top: 1rem;
    font-weight: bold;
    color: #333;
    text-align: left;
}

/* Input Style */
input[type="text"],
input[type="password"],
input[type="submit"],
button {
    width: 100%;
    padding: 0.75rem;
    margin-top: 0.5rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
}

input[type="text"]:focus,
input[type="password"]:focus {
    border-color: #4CAF50;
    outline: none;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.2);
}

/* Button Style */
button,
input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    cursor: pointer;
    font-weight: bold;
}

button:hover,
input[type="submit"]:hover {
    background-color: #45a049;
}

/* Link Style */
a {
    color: #4CAF50;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}

/* Error Message */
.error {
    color: red;
    font-size: 0.9rem;
    margin-top: 1rem;
}

</style>
</head>
<body>
    <div class="registration-container">
        <h1>Student Registration</h1>
        <form action="studentregistration.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="register">Register</button>
        </form>
        <br>
        <p>Already have an account? <a href="studentLogin.php">Login here</a></p>
    </div>
</body>
</html>
