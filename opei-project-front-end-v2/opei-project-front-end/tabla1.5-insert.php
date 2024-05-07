<?php
// Establish a database connection
$servername = "localhost";
$username = "leomarrg";
$password = "1234";
$dbname = "opei-database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $obj1_1 = $_POST['obj1_1'];
    $obj1_2 = $_POST['obj1_2'];
    $obj1_3 = $_POST['obj1_3'];
    $obj1_4 = $_POST['obj1_4'];
    $obj1_5 = $_POST['obj1_5'];
    $obj1_6 = $_POST['obj1_6'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table15 (field1, field2, field3, field4, field5, field6) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $obj1_1, $obj1_2, $obj1_3, $obj1_4, $obj1_5, $obj1_6);

    // Execute the statement
    if ($stmt->execute()) {
        echo "success"; // Return "success" upon successful insertion
    } else {
        echo "error"; // Return "error" upon failure
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
