<?php

require_once('../includes/config.php');

// Set error reporting


error_reporting(E_ALL);
ini_set('display_errors', 1);

/*
var_dump($_POST);
$file_path = 'save-cxp-dump-file.txt';

// Open the file in write mode (creates the file if it doesn't exist)
$file_handle = fopen($file_path, 'w');

// Dump the contents of $_POST array to the file
fwrite($file_handle, print_r($_POST, true));

// Close the file handle
fclose($file_handle);
*/


// Retrieve data from the AJAX request
$office_id = $_POST['office_id'];
$year1 = $_POST['year1'];
$balance = $_POST['balance'];
$entries = $_POST['entries'];
$total_paid = $_POST['total_paid'];

// Count the existing records for the given office_id and year1
$sqlCount = "SELECT COUNT(*) AS count FROM cxp WHERE office_id = '$office_id' AND year1 = '$year1'";
$result = $conn->query($sqlCount);
$row = $result->fetch_assoc();
$existingRecordsCount = (int) $row['count'];

// Check if the number of entries is the same as the number of existing records
if (count($entries) === $existingRecordsCount) {
    // Use the UPDATE branch
    $sqlUpdate = "UPDATE cxp SET ";
    foreach ($entries as $entry) {
        $amount = $entry['amount'];
        $receipt = $entry['receipt'];
        $date = $entry['date'];
        $notes = $entry['notes'];
        
        $sqlUpdate .= "receipt = CASE WHEN receipt = '$receipt' AND date = '$date' THEN '$receipt' ELSE receipt END, ";
        $sqlUpdate .= "date = CASE WHEN receipt = '$receipt' AND date = '$date' THEN '$date' ELSE date END, ";
        $sqlUpdate .= "amount = CASE WHEN receipt = '$receipt' AND date = '$date' THEN '$amount' ELSE amount END, ";
        $sqlUpdate .= "notes = CASE WHEN receipt = '$receipt' AND date = '$date' THEN '$notes' ELSE notes END, ";
    }
    
    // Remove the trailing comma from the query
    $sqlUpdate = rtrim($sqlUpdate, ', ');
    
    $sqlUpdate .= " WHERE office_id = '$office_id' AND year1 = '$year1'";
    
    if ($conn->query($sqlUpdate) !== TRUE) {
        echo "Error: " . $sqlUpdate . "<br>" . $conn->error;
        exit; // Terminate the script if an error occurs
    }






    
} else {
    // Insert new records
    foreach ($entries as $entry) {
        $amount = $entry['amount'];
        $receipt = $entry['receipt'];
        $date = $entry['date'];
        $notes = $entry['notes'];

        // Check if the record already exists
        $sqlCheck = "SELECT * FROM cxp WHERE office_id = '$office_id' AND year1 = '$year1' AND receipt = '$receipt' AND date = '$date'";
        $result = $conn->query($sqlCheck);

        if ($result->num_rows == 0) {
            // Perform the SQL INSERT operation if the record doesn't exist
            $sqlInsert = "INSERT INTO cxp (office_id, year1, amount, receipt, date, notes) VALUES ('$office_id', '$year1', '$amount', '$receipt', '$date', '$notes')";

            if ($conn->query($sqlInsert) !== TRUE) {
                echo "Error: " . $sqlInsert . "<br>" . $conn->error;
                exit; // Terminate the script if an error occurs
            }
        }
    }
}



// Update balance in production table
$sql = "UPDATE production SET balance = '$balance'  , total_paid = '$total_paid' WHERE office_id = '$office_id' AND year = '$year1'";
if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit; // Terminate the script if an error occurs
}   

// Close the database connection
$conn->close();

// Calculate the sum of amounts from the entries
$sum = 0;
foreach ($entries as $entry) {
    $sum += floatval($entry['amount']);
}

// Prepare the response
$response = [
    'status' => 'success',
    'message' => 'Data saved successfully',
    'sum' => $sum
];

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);

?>
