<?php
// Establish a database connection
$servername = "localhost";
$username = "leomarrg"; // Your database username
$password = "1234"; // Your database password
$dbname = "opei-database"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID parameter is provided
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    // SQL to delete a record
    $sql = "DELETE FROM table31 WHERE table31ID = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "ID parameter is missing";
}

// Close connection
$conn->close();
?>
