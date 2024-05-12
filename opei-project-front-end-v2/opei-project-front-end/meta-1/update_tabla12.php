<?php
include 'db_info.php';

// Check if the form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['table12ID'])) {
    // Retrieve form data
    $table12ID = $_POST['table12ID'];
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    // Retrieve other field values similarly

    // Prepare SQL statement to update the database
    $sql = "UPDATE table12 SET field1 = ?, field2 = ?, field3 = ?, field4 = ?, field5 = ?, field6 = ? WHERE table12ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $field1, $field2, $field3, $field4, $field5, $field6, $table12ID);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Changes saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // Redirect or handle invalid requests
    header("Location: error.php");
    exit();
}
?>