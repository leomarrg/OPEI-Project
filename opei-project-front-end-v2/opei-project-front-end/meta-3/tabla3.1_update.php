<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a database connection
    $servername = "localhost";
 /*   $username = "leomar";
    $password = "italia101pr";
    $dbname = "opei";*/
    $username = "leomarrg";
    $password = "1234";
    $dbname = "opei-database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Retrieve data from the POST request
    $table31ID = $_POST['table31ID'];
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];

    // Prepare and execute the SQL statement to update the record
    $sql = "UPDATE table31 SET field1='$field1', field2='$field2', field3='$field3', field4='$field4' WHERE table31ID='$table31ID'";

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