<?php

include '../includes/config.php';

$id = $_POST['officeId'];
$status = $_POST['officeStatus'];

$sql = "UPDATE offices SET status = '$status' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Status Updated Successfully";
    // header('Location: office.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>