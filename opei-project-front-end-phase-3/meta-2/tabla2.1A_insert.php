<?php
session_start();
// Establish a database connection
include 'db_info.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $profe = mysqli_real_escape_string($conn, $_POST['profe']);
    $tituloActividad = mysqli_real_escape_string($conn, $_POST['tituloActividad']);
    $calendar = mysqli_real_escape_string($conn, $_POST['calendar']);
    $publ = mysqli_real_escape_string($conn, $_POST['publ']);
    $clasType = mysqli_real_escape_string($conn, $_POST['clasType']);
    $pubType = mysqli_real_escape_string($conn, $_POST['pubType']);
    $sponsoredCIC = mysqli_real_escape_string($conn, $_POST['sponsoredCIC']);
    $entityPubl = mysqli_real_escape_string($conn, $_POST['entityPubl']);

    // Fetch department ID from session (assuming it's stored in $_SESSION['DepartmentID'])
    $departmentID = $_SESSION['DepartmentID'];

    // Get the current year
    $currentYear = date("Y");

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table21a (DepartmentID, year, field1, field2, field3, field4, field5, field6, field7, field8) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissssssss", $departmentID, $currentYear,  $profe, $tituloActividad, $calendar, $publ, $clasType, $pubType, $sponsoredCIC, $entityPubl);

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
