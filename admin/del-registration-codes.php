<?php

require_once('../includes/config.php');

// Check if parameters are present in the URL
if (isset($_GET['year']) && isset($_GET['delID'])) {
    // Sanitize inputs to prevent SQL injection
    $delID = mysqli_real_escape_string($conn, $_GET['delID']);
    $year = mysqli_real_escape_string($conn, $_GET['year']);

    // Prepare SQL statement to delete record from the database
    $sql = "DELETE FROM registration_codes WHERE id = $delID AND year = '$year'";

    if ($conn->query($sql) === TRUE) {
        header("Location: registration-codes.php?msg=deleted");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Missing parameters for deletion.";
}

?>