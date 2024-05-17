<?php
include 'db_info.php'; // Include your database connection details

// Check if the form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $userID = $_POST['userID'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];

    // Prepare and execute the SQL query to update the user record
    $sql = "UPDATE usuario SET Email=?, DepartmentID=?, Name=?, LastName=? WHERE UserID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $email, $department, $name, $lastName, $userID);
    
    if ($stmt->execute()) {
        // Database update successful
        echo json_encode(array("success" => true));
    } else {
        // Database update failed
        echo json_encode(array("success" => false, "error" => "Failed to update user"));
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Handle the case where the request method is not POST
    echo json_encode(array("success" => false, "error" => "Invalid request method"));
}
?>
