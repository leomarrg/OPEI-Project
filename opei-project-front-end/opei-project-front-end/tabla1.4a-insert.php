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
    $curso = $_POST['curso'];
    $stratEval = $_POST['stratEval'];
    $indicadores = $_POST['indicadores'];
    $resultObt = $_POST['resultObt'];
    $accCorrectivas = $_POST['accCorrectivas'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table14a (field1, field2, field3, field4, field5) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $curso, $stratEval, $indicadores, $resultObt, $accCorrectivas);

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
