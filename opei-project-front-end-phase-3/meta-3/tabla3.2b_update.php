<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a database connection
    include 'db_info.php';
    
    // Retrieve data from the POST request
    $table32bID = $_POST['table32bID'];
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];

    // Prepare and execute the SQL statement to update the record
    $sql = "UPDATE table32b SET field1='$field1', field2='$field2', field3='$field3', field4='$field4', field5='$field5', field6='$field6' WHERE table32bID='$table32bID'";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    // Close connection
    $conn->close();
    exit(); // Stop further execution
}
?>