<?php

require_once('../includes/config.php');

// Check if parameters are present in the URL
if (isset($_GET['delName']) && isset($_GET['delID'])) {
    // Sanitize inputs to prevent SQL injection
    $delName = mysqli_real_escape_string($conn, $_GET['delName']);
    $delID = mysqli_real_escape_string($conn, $_GET['delID']);

    // Prepare SQL statement to delete record from the database
    $sql = "DELETE FROM biblia_taxwise WHERE id = $delID AND data = '$delName'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Missing parameters for deletion.";
}

?>