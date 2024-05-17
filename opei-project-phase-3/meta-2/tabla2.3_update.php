<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a database connection
    include 'db_info.php';
    
    // Retrieve data from the POST request
    $table23ID = $_POST['table23ID'];
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];


    // Prepare and execute the SQL statement to update the record
    $sql = "UPDATE table23 SET field1='$field1', field2='$field2', field3='$field3', field4='$field4' WHERE table23ID='$table23ID'";

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