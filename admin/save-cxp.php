<?php

require_once('../includes/config.php');

// Retrieve data from the AJAX request
$office_id = $_POST['office_id'];
$year1 = $_POST['year1'];
$entries = $_POST['entries'];


$sqlDelete = "DELETE FROM cxp WHERE office_id = '$office_id' AND year1 = '$year1'";

if ($conn->query($sqlDelete) === TRUE) {
    foreach ($entries as $entry) {
        $amount = $entry['amount'];
        $receipt = $entry['receipt'];
        $date = $entry['date'];
        $notes = $entry['notes'];

        // Perform the SQL INSERT operation (replace with your actual table and column names)
        $sqlInsert = "INSERT INTO cxp (office_id, year1, amount, receipt, date, notes) VALUES ('$office_id', '$year1', '$amount', '$receipt', '$date', '$notes')";

        if ($conn->query($sqlInsert) !== TRUE) {
            echo "Error: " . $sqlInsert . "<br>" . $conn->error;
            exit; // Terminate the script if an error occurs
        }
    }

    // Close the database connection
    $conn->close();

    // Send a response back to the client
    echo "Data saved successfully";
} else {
    echo "Error: " . $sqlDelete . "<br>" . $conn->error;
}

?>