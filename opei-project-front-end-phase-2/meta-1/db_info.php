<?php
// Establish a database connection
// Localhost de Leomar
$servername = "localhost";
$username = "leomarrg";
$password = "1234";
$dbname = "opei-database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//Localhost de Jared
/*
$servername = 'localhost';
$dbname = 'opei-database';
$username = 'root';
$password = '';


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select the database
if (!mysqli_select_db($conn, $dbname)) {
    die("Error: " . mysqli_error($conn));
}
*/
?>