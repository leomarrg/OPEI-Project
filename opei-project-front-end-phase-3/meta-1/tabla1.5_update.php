<?php
include_once "db_info.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $table15ID = $_POST['table15ID'];

    // Query to get the current values of the row
    $sql = "SELECT * FROM table15 WHERE table15ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $table15ID);
    $stmt->execute();
    $currentValues = $stmt->get_result()->fetch_assoc();

    // Start building the SQL query
    $sql = "UPDATE table15 SET ";
    $fieldsToUpdate = [];
    $params = [];
    $types = '';

    // Adjust the range based on the number of fields in table15
    for ($i = 1; $i <= 6; $i++) { // Change 20 to the number of fields in table15 if different
        $field = "field" . $i;
        if (isset($_POST[$field])) {
            $fieldsToUpdate[] = "$field = ?";
            $params[] = $_POST[$field];
        } else {
            $fieldsToUpdate[] = "$field = ?";
            $params[] = $currentValues[$field];
        }
        $types .= 's';
    }

    // Add the table15ID to the params
    $params[] = $table15ID;
    $types .= 's';

    // Join the fields to update with commas
    $sql .= implode(", ", $fieldsToUpdate);
    $sql .= " WHERE table15ID = ?";

    // Prepare and execute the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types, ...$params);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'failure';
    }
}
?>
