<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a database connection
    include 'db_info.php';
    // Retrieve data from the POST request
    $table52ID = $_POST['table52ID'];
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];

    // Prepare and execute the SQL statement to update the record
    $sql = "UPDATE table52 SET field1='$field1', field2='$field2', field3='$field3' WHERE table52ID='$table52ID'";

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