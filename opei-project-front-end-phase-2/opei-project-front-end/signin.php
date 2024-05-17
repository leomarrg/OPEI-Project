<?php
// Establish a database connection
$servername = "localhost";
$username = "leomarrg";
$password = "1234";
$dbname = "opei-database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch input data
$email = $_POST['Email'];
$password = $_POST['Password'];

// Check if email and password are provided
if (empty($email) || empty($password)) {
    echo "Please fill in both email and password fields.";
    header("Location: signin.html");
    exit();
}

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit();
}

// Check if user exists in the database
$sql = "SELECT * FROM admin WHERE Email = '$email' AND Password = '$password' AND Active = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User exists and is active
    // Redirect to main.html
    header("Location: tabla1.1.html");
    exit();
} else {
    // User does not exist, password is incorrect, or account is inactive
    echo "Invalid email or password.";
    header("Location: signin.html");
}

$conn->close();
?>
