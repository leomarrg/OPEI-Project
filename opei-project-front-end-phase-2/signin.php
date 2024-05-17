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

    // Fetch user from the usuario table
    $sql_user = "SELECT * FROM usuario WHERE Email = '$email'";
    $result_user = $conn->query($sql_user);

    // Fetch admin from the admin table
    $sql_admin = "SELECT * FROM admin WHERE Email = '$email'";
    $result_admin = $conn->query($sql_admin);

    // Check if the user exists
    if ($result_user->num_rows > 0) {
        $user = $result_user->fetch_assoc();
        // Check if user account is active
        if ($user['Active'] == 1 && password_verify($password, $user['Password'])) {
            // Start session and store UserID and DepartmentID for future use
            session_start();
            $_SESSION['UserID'] = $user['UserID'];
            $_SESSION['DepartmentID'] = $user['DepartmentID'];
            // Redirect to user page
            header("Location: meta-1/tabla1.1.php");
            exit();
        } else {
            // User does not exist or invalid password
            echo '<script>alert("Invalid email or password. USER DOESNT EXIST OR INVALID PASSWORD");</script>';
            echo '<script>window.location.href = "signin.html";</script>';
            exit();
        }
    } elseif ($result_admin->num_rows > 0) {
        $admin = $result_admin->fetch_assoc();
        // Check if admin account is active
        if ($admin['Active'] == 1 && password_verify($password, $admin['Password'])) {
            // Start session and store admin ID, email, name, etc.
            session_start();
            $_SESSION['adminID'] = $admin['adminID'];
            $_SESSION['adminEmail'] = $admin['Email'];
            $_SESSION['adminName'] = $admin['Name'];
            $_SESSION['adminLastName'] = $admin['LastName'];
            // Redirect admin to admin page
            header("Location: admin/website.php");
            exit();
        } else {
            // Admin does not exist or invalid password
            echo '<script>alert("Invalid email or password. THIS IS THE MESSAGES");</script>';
            echo '<script>window.location.href = "signin.html";</script>';
            exit();
        }
    } else {
        // Neither user nor admin exists
        echo '<script>alert("Invalid email or password. USER NOR ADMIN EXISTS");</script>';
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
