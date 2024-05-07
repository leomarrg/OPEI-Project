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
    $nombreProgAcredit = $_POST['nombreProgAcredit'];
    $agenciaAcreditProg = $_POST['agenciaAcreditProg'];
    $lastYearAcredit = $_POST['lastYearAcredit'];
    $nextYearAcredit = $_POST['nextYearAcredit'];
    $numProgAcredit = $_POST['numProgAcredit'];
    $recomendaciones = $_POST['recomendaciones'];


    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table13 (field1, field2, field3, field4, field5, field6) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nombreProgAcredit, $agenciaAcreditProg, $lastYearAcredit, $nextYearAcredit, $numProgAcredit, $recomendaciones);

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
