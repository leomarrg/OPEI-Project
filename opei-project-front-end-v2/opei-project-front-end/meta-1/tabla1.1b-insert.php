<?php
session_start();
// Establish a database connection
$servername = "localhost";
//$username = "leomar";
//$password = "italia101pr";
//$dbname = "opei";
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
    $cambAcademico = $_POST['cambAcademico'];
    $cambAcademicoMenor = $_POST['cambAcademicoMenor'];
    $cambAcademicoSig = $_POST['cambAcademicoSig'];
    $cambAcademicoSus = $_POST['cambAcademicoSus'];

    // Fetch department ID from session (assuming it's stored in $_SESSION['DepartmentID'])
    $departmentID = $_SESSION['DepartmentID'];

    // Get the current year
    $currentYear = date("Y");
    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table11b (DepartmentID, year, field1, field2, field3, field4) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissss", $departmentID, $currentYear,  $cambAcademico, $cambAcademicoMenor, $cambAcademicoSig, $cambAcademicoSus);

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
