<?php
// Establish a database connection
$servername = "localhost";
$username = "leomarrg";
$password = "1234";
$dbname = "opei-database";
//$username = "leomar";
//$password = "italia101pr";
//$dbname = "opei";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servicioEval = $_POST['servicioEval'];
    $indicExe = $_POST['indicExe'];
    $stratEval = $_POST['stratEval'];
    $resultObt = $_POST['resultObt'];
    $usoResultados = $_POST['usoResultados'];
    $accCorrectivas = $_POST['accCorrectivas']; // Added a semicolon here

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table14b (field1, field2, field3, field4, field5, field6) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $servicioEval, $indicExe, $stratEval, $resultObt, $usoResultados, $accCorrectivas);

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
