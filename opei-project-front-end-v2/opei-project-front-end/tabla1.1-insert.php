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
    // Validate and sanitize user input
    $curso = mysqli_real_escape_string($conn, $_POST['curso']);
    $accDeCurso = mysqli_real_escape_string($conn, $_POST['accDeCurso']);
    $estatus = mysqli_real_escape_string($conn, $_POST['estatus']);
    $breveDescrip = mysqli_real_escape_string($conn, $_POST['breveDescrip']);

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table11a (field1, field2, field3, field4) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $curso, $accDeCurso, $estatus, $breveDescrip);

    // Execute the statement
    if ($stmt->execute()) {
        // Data inserted successfully
        echo "success";
    } else {
        // Error occurred while inserting data
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // Request method is not POST
    echo "Invalid request method";
}

// Close the connection
$conn->close();
?>
