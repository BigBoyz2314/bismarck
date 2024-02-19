<?php

require_once('../includes/config.php');


// Retrieve data from the AJAX request
$office_id = $_POST['office_id'];
$year1 = $_POST['year1'];

// Perform the SQL SELECT operation (replace with your actual table and column names)
$sql = "SELECT * FROM cxp WHERE office_id = '$office_id' AND year1 = '$year1'";

$result = $conn->query($sql);

// Check if there are rows in the result
if ($result->num_rows > 0) {
    // Create an array to store the data
    $data = array();

    // Fetch each row from the result
    while ($row = $result->fetch_assoc()) {
        // Add each row to the data array
        $data[] = $row;
    }

    // Close the database connection
    $conn->close();

    // Send the data as JSON to the client
    echo json_encode($data);
} else {
    // If no rows found, return an empty array as JSON
    echo json_encode(array());
}

?>