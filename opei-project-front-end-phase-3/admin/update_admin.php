<?php
include 'db_info.php';

// Check if the form data is received via POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the adminID and other field values from the form data
    $adminID = $_POST['adminID'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];

    // Prepare an SQL statement to update the admin table
    $sql = "UPDATE admin SET Email=?, Name=?, LastName=? WHERE adminID=?";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("sssi", $email, $name, $lastName, $adminID);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        // Return a success message
        echo json_encode(array("success" => true));
    } else {
        // Return an error message
        echo json_encode(array("success" => false, "message" => "Failed to update admin"));
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Return an error message if the request method is not POST
    echo json_encode(array("success" => false, "message" => "Invalid request method"));
}
?>