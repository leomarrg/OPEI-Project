<?php
session_start();
// Establish a database connection
include 'db_info.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $nameStud = mysqli_real_escape_string($conn, $_POST['nameStud']);
    $progAcadem = mysqli_real_escape_string($conn, $_POST['progAcadem']);
    $lugarEmpleo = mysqli_real_escape_string($conn, $_POST['lugarEmpleo']);
    $gradYear = mysqli_real_escape_string($conn, $_POST['gradYear']);
    $emplRelUPRA = mysqli_real_escape_string($conn, $_POST['emplRelUPRA']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    // Fetch department ID from session (assuming it's stored in $_SESSION['DepartmentID'])
    $departmentID = $_SESSION['DepartmentID'];

    // Get the current year
    $currentYear = date("Y");


    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table32b (DepartmentID, year, field1, field2, field3, field4, field5, field6) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissssss", $departmentID, $currentYear,  $nameStud, $progAcadem, $lugarEmpleo, $gradYear, $emplRelUPRA, $comment);

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
