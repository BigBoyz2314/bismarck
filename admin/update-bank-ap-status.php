<?php

include '../includes/config.php';

$id = $_POST['officeId'];
$status = $_POST['bankApStatus'];

$sql = "UPDATE offices SET bank_status = '$status' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Bank Status Updated Successfully";
    // header('Location: office.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>