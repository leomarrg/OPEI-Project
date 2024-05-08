<?php
include 'db_info.php';

// Fetch all users from the database
$sql = "SELECT * FROM usuario";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through each user
    while($user = $result->fetch_assoc()) {
        // Get the plain text password
        $plain_password = $user['Password'];
        
        // Hash the password
        $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);
        
        // Update the hashed password in the database
        $sql = "UPDATE usuario SET Password = '$hashed_password' WHERE UserID = " . $user['UserID'];
        if ($conn->query($sql) === TRUE) {
            echo "Password updated successfully for user ID: " . $user['UserID'] . "\n";
        } else {
            echo "Error updating password for user ID: " . $user['UserID'] . ": " . $conn->error . "\n";
        }
    }
} else {
    echo "No users found in the database.\n";
}

$conn->close();
?>
