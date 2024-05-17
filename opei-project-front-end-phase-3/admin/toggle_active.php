<?php
// Include database connection info
include 'db_info.php';

// Check if the request contains the ID and new active state
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['value'])) {
    $id = $_POST['id'];
    $value = $_POST['value'];

    // Update active state in the database
    $updateQuery = "UPDATE admin SET Active = $value WHERE adminID = $id";
    mysqli_query($conn, $updateQuery); // Assuming $conn is the database connection

    // Return success response
    http_response_code(200);
    echo "Active state updated successfully.";
} else {
    // Return error response if the request is invalid
    http_response_code(400);
    echo "Invalid request.";
}
// Check if the request contains the ID and new active state
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['value'])) {
    $id = $_POST['id'];
    $value = $_POST['value'];

    // Update active state in the database
    $updateQuery = "UPDATE usuario SET Active = $value WHERE userID = $id";
    mysqli_query($conn, $updateQuery); // Assuming $conn is the database connection

    // Return success response
    http_response_code(200);
    echo "Active state updated successfully.";
} else {
    // Return error response if the request is invalid
    http_response_code(400);
    echo "Invalid request.";
}
?>
