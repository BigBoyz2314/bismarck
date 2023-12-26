<?php

require_once('../includes/config.php');

// Check if parameters are present in the URL
if (isset($_GET['delName']) && isset($_GET['delID']) && isset($_GET['year'])) {
    // Sanitize inputs to prevent SQL injection
    $delName = mysqli_real_escape_string($conn, $_GET['delName']);
    $delID = mysqli_real_escape_string($conn, $_GET['delID']);
    $year = mysqli_real_escape_string($conn, $_GET['year']);

    // Prepare SQL statement to delete record from the database
    $sql = "DELETE FROM installation WHERE id = $delID AND data = '$delName' AND year = $year";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Missing parameters for deletion.";
}

?>