<?php
include 'db_info.php';

// Fetch all users from the usuario table
$sql_user = "SELECT * FROM usuario";
$result_user = $conn->query($sql_user);

while ($user = $result_user->fetch_assoc()) {
    // Hash the user's password
    $hashed_password = password_hash($user['Password'], PASSWORD_DEFAULT);

    // Update the user's password in the database
    $sql_update = "UPDATE usuario SET Password = '$hashed_password' WHERE UserID = " . $user['UserID'];
    $conn->query($sql_update);
}

// Fetch all admins from the admin table
$sql_admin = "SELECT * FROM admin";
$result_admin = $conn->query($sql_admin);

while ($admin = $result_admin->fetch_assoc()) {
    // Hash the admin's password
    $hashed_password = password_hash($admin['Password'], PASSWORD_DEFAULT);

    // Update the admin's password in the database
    $sql_update = "UPDATE admin SET Password = '$hashed_password' WHERE adminID = " . $admin['adminID'];
    $conn->query($sql_update);
}

$conn->close();
?>
