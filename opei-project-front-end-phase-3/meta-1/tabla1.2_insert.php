<?php
session_start();
// Establish a database connection
include 'db_info.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comPrimerSemestre = $_POST['comPrimerSemestre'];
    $comSegundoSemestre = $_POST['comSegundoSemestre'];
    $comVerano = $_POST['comVerano'];
    $eduPrimerSemestre = $_POST['eduPrimerSemestre'];
    $eduSegundoSemestre = $_POST['eduSegundoSemestre'];
    $eduVerano = $_POST['eduVerano'];
    $coopPrimerSemestre = $_POST['coopPrimerSemestre'];
    $coopSegundoSemestre = $_POST['coopSegundoSemestre'];
    $coopVerano = $_POST['coopVerano'];
    $inveprimerSemestre = $_POST['inveprimerSemestre'];
    $inveSegundoSemestre = $_POST['inveSegundoSemestre'];
    $inveVerano = $_POST['inveVerano'];
    $interPrimerSemestre = $_POST['interPrimerSemestre'];
    $interSegundoSemestre = $_POST['interSegundoSemestre'];
    $interVerano = $_POST['interVerano'];
    $nocturnos = $_POST['nocturnos'];
    $sabatino = $_POST['sabatino'];
    $trimestral = $_POST['trimestral'];

    // Fetch department ID from session (assuming it's stored in $_SESSION['DepartmentID'])
    $departmentID = $_SESSION['DepartmentID'];

    // Get the current year
    $currentYear = date("Y");
    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table12 (DepartmentID, year, field1, field2, field3, field4, field5, field6, field7,
    field8, field9, field10, field11, field12, field13, field14, field15, field16, field17, field18) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissssssssssssssssss", $departmentID, $currentYear, $comPrimerSemestre, $comSegundoSemestre,  $comVerano, $eduPrimerSemestre,
    $eduSegundoSemestre, $eduVerano, $coopPrimerSemestre, $coopSegundoSemestre,  $coopVerano, $inveprimerSemestre, $inveSegundoSemestre, $inveVerano,
    $interPrimerSemestre, $interSegundoSemestre,  $interVerano, $nocturnos, $sabatino, $trimestral);

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