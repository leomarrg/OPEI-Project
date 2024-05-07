<?php
// Establish a database connection
$servername = "localhost";
$username = "leomarrg";
$password = "1234";
$dbname = "opei-database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT * FROM table11a"; // Replace 'your_table_name' with the actual table name
$result = $conn->query($sql);

?>