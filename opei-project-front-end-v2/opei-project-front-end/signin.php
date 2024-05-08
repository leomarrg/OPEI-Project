<?php
include 'db_info.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch input data and sanitize
    $email = $conn->real_escape_string($_POST['Email']);
    $password = $conn->real_escape_string($_POST['Password']);

    // Check if email and password are provided
    if (empty($email) || empty($password)) {
        echo '<script>alert("Please fill in both email and password fields.");</script>';
        echo '<script>window.location.href = "signin.html";</script>';
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Invalid email format.");</script>';
        echo '<script>window.location.href = "signin.html";</script>';
        exit();
    }

    // Check if the email domain is upr.edu
    if (substr($email, -8) !== "@upr.edu") {
        echo '<script>alert("Only users with email addresses ending in @upr.edu can log in.");</script>';
        echo '<script>window.location.href = "signin.html";</script>';
        exit();
    }

    // Fetch user from the database
    $sql = "SELECT * FROM usuario WHERE Email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Log hashed password and plain text password
        echo '<script>';
        echo 'console.log("Hashed Password from DB: ' . $user['Password'] . '");';
        echo 'console.log("Plain Text Password from User: ' . $password . '");';
        echo '</script>';

        // Verify the password
        if (password_verify($password, $user['Password'])) {
            // Check if user account is active
            if ($user['Active'] == 1) {
                // Start session and store UserID and DepartmentID for future use
                session_start();
                $_SESSION['UserID'] = $user['UserID'];
                $_SESSION['DepartmentID'] = $user['DepartmentID'];
                // Redirect to main page
                header("Location: meta-1/tabla1.1.html");
                exit();
            } else {
                // Account is inactive
                echo '<script>alert("Your account is inactive. Please contact the administrator.");</script>';
                echo '<script>window.location.href = "signin.html";</script>';
                exit();
            }
        } else {
            // Invalid password
            echo '<script>alert("Invalid email or password. ITS THE PASSWORD");</script>';
            echo '<script>window.location.href = "signin.html";</script>';
            exit();
        }
    } else {
        // User does not exist
        echo '<script>alert("Invalid email or password. ITS THE USER");</script>';
        echo '<script>window.location.href = "signin.html";</script>';
        exit();
    }
} else {
    // If the form is not submitted, redirect to the signin.html page
    header("Location: signin.html");
    exit();
}

$conn->close();
?>
