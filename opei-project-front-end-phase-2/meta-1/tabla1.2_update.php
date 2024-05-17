<?php
include_once "db_info.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $table12ID = $_POST['table12ID'];

    // Query to get the current values of the row
    $sql = "SELECT * FROM table12 WHERE table12ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $table12ID);
    $stmt->execute();
    $currentValues = $stmt->get_result()->fetch_assoc();

    // Start building the SQL query
    $sql = "UPDATE table12 SET ";
    $fieldsToUpdate = [];
    $params = [];
    $types = '';

    for ($i = 1; $i <= 18; $i++) {
        $field = "field" . $i;
        if (isset($_POST[$field])) {
            $fieldsToUpdate[] = "$field = ?";
            $params[] = $_POST[$field];
        } else {
            $fieldsToUpdate[] = "$field = ?";
            $params[] = $currentValues[$field];
        }
        $types .= 'i';
    }

    // Add the table12ID to the params
    $params[] = $table12ID;
    $types .= 'i';

    // Join the fields to update with commas
    $sql .= implode(", ", $fieldsToUpdate);
    $sql .= " WHERE table12ID = ?";

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
