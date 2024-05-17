<?php
// Establish a database connection
include 'db_info.php';
// Check if ID parameter is provided
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    // SQL to delete a record
    $sql = "DELETE FROM table13 WHERE table13ID = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirect to tabla1.1_display.php after deletion
        header("Location: tabla1.3_display.php");
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "ID parameter is missing";
}

// Close connection
$conn->close();
?>
