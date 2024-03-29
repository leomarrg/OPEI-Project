<?php
// Start session (optional but might be useful for future enhancements)
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form fields
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        $_SESSION["error_message"] = "Email and password are required";
        header("Location: signin.html");
        exit();
    }

    // Validate email format
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || substr($email, -8) !== '@upr.edu') {
        $_SESSION["error_message"] = "Invalid email format. Please enter a valid email ending with @upr.edu.";
        header("Location: index.html");
        exit();
    }

    // Sanitize user input (not necessary if using prepared statements)
    $password = $_POST["password"];

    // Connect to the database (replace with your actual database credentials)
    $servername = "localhost";
    $username = "leomarrg";
    $password_db = "root";
    $dbname = "metas_reports";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL statement to check user credentials
    $sql = "SELECT * FROM department_heads WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a matching record is found
    if ($result->num_rows == 1) {
        // User is authenticated, redirect to a certain page
        header("Location: tabla1.1.html");
        exit();
    } else {
        // User is not authenticated, display error message
        $_SESSION["error_message"] = "Invalid email or password";
        header("Location: signin.html");
        exit();
    }

    // Close statement and connection

}
?>
