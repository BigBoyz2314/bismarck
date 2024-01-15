<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        include '../includes/config.php';   

        $id = $_POST["id"];
        $company_contact_name = $_POST["company_contact_name"];
        $company_name = $_POST["company_name"];
        $company_address = $_POST["company_address"];
        $company_city = $_POST["company_city"];
        $company_state = $_POST["company_state"];
        $company_zip = $_POST["company_zip"];
        $company_contact_phone = $_POST["company_contact_phone"];
        $company_fax = $_POST["company_fax"];
        $company_tax_id = $_POST["company_tax_id"];
        $preparer_id = $_POST["preparer_id"];
        $preparer_name = $_POST["preparer_name"];
        $preparer_phone = $_POST["preparer_phone"];
        $preparer_company_name = $_POST["preparer_company_name"];
        $preparer_address = $_POST["preparer_address"];
        $preparer_city = $_POST["preparer_city"];
        $preparer_state = $_POST["preparer_state"];
        $preparer_zip = $_POST["preparer_zip"];
        $preparer_efin = $_POST["preparer_efin"];
        $preparer_ptin = $_POST["preparer_ptin"];
        $preparer_ptin = $_POST["preparer_ptin"];
        $preparer_nytprin = $_POST["preparer_nytprin"];
        $preparer_ein = $_POST["preparer_ein"];
        $preparer_ero_pin = $_POST["preparer_ero_pin"];
        $preparer_pin = $_POST["preparer_pin"];

        $stmt1 = "SELECT * FROM `offices` WHERE `user_id` = '$id'";
        $result1 = mysqli_query($conn, $stmt1);
        $row1 = mysqli_fetch_assoc($result1);
        if ($row1 == 0) {
            $stmt2 = "INSERT INTO `offices` (`user_id`, `company_contact_name`, `company_name`, `company_address`, `company_city`, `company_state`, `company_zip`, `company_contact_phone`, `company_fax`, `company_tax_id`, `preparer_id`, `preparer_name`, `preparer_company_name`, `preparer_address`, `preparer_city`, `preparer_state`, `preparer_zip`, `preparer_phone`, `preparer_efin`, `preparer_ptin`, `preparer_nytprin`, `preparer_ein`, `preparer_ero_pin`, `preparer_pin`) VALUES ('$id', '$company_contact_name', '$company_name', '$company_address', '$company_city', '$company_state', '$company_zip', '$company_contact_phone', '$company_fax', '$company_tax_id', '$preparer_id', '$preparer_name', '$preparer_company_name', '$preparer_address', '$preparer_city', '$preparer_state', '$preparer_zip', '$preparer_phone', '$preparer_efin', '$preparer_ptin', '$preparer_nytprin', '$preparer_ein', '$preparer_ero_pin', '$preparer_pin')";
            $result2 = mysqli_query($conn, $stmt2);
            if ($result2) {
                echo "Office information added successfully";
                header("Location:index.php?office=added");
                // echo $result2;
            }
            else {
                echo "Error: " . $stmt2 . "<br>" . mysqli_error($conn);
            }
        }
        else {
            $stmt3 = "UPDATE `offices` SET `company_contact_name` = '$company_contact_name', `company_name` = '$company_name', `company_address` = '$company_address', `company_city` = '$company_city', `company_state` = '$company_state', `company_zip` = '$company_zip', `company_contact_phone` = '$company_contact_phone', `company_fax` = '$company_fax', `company_tax_id` = '$company_tax_id', `preparer_id` = '$preparer_id', `preparer_name` = '$preparer_name', `preparer_company_name` = '$preparer_company_name', `preparer_address` = '$preparer_address', `preparer_city` = '$preparer_city', `preparer_state` = '$preparer_state', `preparer_zip` = '$preparer_zip', `preparer_phone` = '$preparer_phone', `preparer_efin` = '$preparer_efin', `preparer_ptin` = '$preparer_ptin', `preparer_nytprin` = '$preparer_nytprin', `preparer_ein` = '$preparer_ein', `preparer_ero_pin` = '$preparer_ero_pin', `preparer_pin` = '$preparer_pin' WHERE `user_id` = '$id'";
            $result3 = mysqli_query($conn, $stmt3);
            if ($result3) {
                echo "Office information updated successfully";
                header("Location:index.php?office=updated");

            }
            else {
                echo "Error: " . $stmt3 . "<br>" . mysqli_error($conn);
            }
        }
    }



?>