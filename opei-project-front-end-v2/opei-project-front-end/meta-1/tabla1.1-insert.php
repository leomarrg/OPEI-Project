<?php
session_start();
// Establish a database connection
$servername = "localhost";
$username = "leomarrg";
$password = "1234";
$dbname = "opei-database";
//$username = "leomar";
//$dbname = "opei";
//$password = "italia101pr";

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

    // Fetch department ID from session (assuming it's stored in $_SESSION['DepartmentID'])
    $departmentID = $_SESSION['DepartmentID'];

    // Get the current year
    $currentYear = date("Y");

    // Prepare and bind the SQL statement
   // Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO table11a (DepartmentID, year, field1, field2, field3, field4) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("iissss", $departmentID, $currentYear, $curso, $accDeCurso, $estatus, $breveDescrip);

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
