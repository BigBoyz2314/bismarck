<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        include '../includes/config.php';   

        $id = $_POST["id"];
        $company_contact_name = $_POST["company_contact_name"];
        $company_name = $_POST["company_name"];
        $office_ClientID = $_POST["office_ClientID"];
        $company_address = $_POST["company_address"];
        $company_city = $_POST["company_city"];
        $company_state = $_POST["company_state"];
        $company_zip = $_POST["company_zip"];
        $company_contact_phone = $_POST["company_contact_phone"];
        $company_contact_email = $_POST["company_contact_email"];
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
        $instalation_type = $_POST["instalation_type"];
        $server_name = $_POST["server_name"];
        $server_type = $_POST["server_type"];
        $os_version = $_POST["os_version"];
        $num_stations = $_POST["num_stations"];
        $num_vpc = $_POST["num_vpc"];
        $printer_ip_address = $_POST["printer_ip_address"];
        $ip_address = $_POST["ip_address"];

        $company_contact_name = str_replace(' ', '_', $company_contact_name);
        $stmt1 = "SELECT * FROM `offices` WHERE `user_id` = '$id'";
        $result1 = mysqli_query($conn, $stmt1);
        $row1 = mysqli_fetch_assoc($result1);
        if ($row1 == 0) {
            $stmt2 = "INSERT INTO `offices` (`user_id`, `office_ClientID`, `company_contact_name`, `company_name`, `company_address`, `company_city`, `company_state`, 
			`company_zip`, `company_contact_phone`,`company_contact_email`, `company_fax`, `company_tax_id`, `preparer_id`, `preparer_name`, 
			`preparer_company_name`, `preparer_address`, `preparer_city`, `preparer_state`, `preparer_zip`, `preparer_phone`, 
			`preparer_efin`, `preparer_ptin`, `preparer_nytprin`, `preparer_ein`, `preparer_ero_pin`, `preparer_pin`,
            `instalation_type`,`server_name`,`server_type`,`os_version`,`num_stations`,`num_vpc`,`printer_ip_address`,`ip_address`
            )
			VALUES ('$id', '$office_ClientID','$company_contact_name', '$company_name', '$company_address', '$company_city', '$company_state',
			'$company_zip', '$company_contact_phone','$company_contact_email', '$company_fax', '$company_tax_id', '$preparer_id', '$preparer_name', 
			'$preparer_company_name', '$preparer_address', '$preparer_city', '$preparer_state', '$preparer_zip', '$preparer_phone',
			'$preparer_efin', '$preparer_ptin', '$preparer_nytprin', '$preparer_ein', '$preparer_ero_pin', '$preparer_pin',
            '$instalation_type','$server_name','$server_type','$os_version','$num_stations','$num_vpc','$printer_ip_address','$ip_address'
            )";
            $result2 = mysqli_query($conn, $stmt2);
            if ($result2) {
                echo "Office information added successfully";
                header("Location:office-info.php?office=added&name=$id");
                // echo $result2;
            }
            else {
                echo "Error: " . $stmt2 . "<br>" . mysqli_error($conn);
            }
        }
        else {
            $stmt3 = "UPDATE `offices` SET  `office_ClientID` = '$office_ClientID',  `company_contact_name` = '$company_contact_name', 
            `company_name` = '$company_name', `company_address` = '$company_address', `company_city` = '$company_city', `company_state` = '$company_state', 
            `company_zip` = '$company_zip', `company_contact_phone` = '$company_contact_phone',`company_contact_email` = '$company_contact_email',
			`company_fax` = '$company_fax', `company_tax_id` = '$company_tax_id', `preparer_id` = '$preparer_id', `preparer_name` = '$preparer_name', 
			`preparer_company_name` = '$preparer_company_name', `preparer_address` = '$preparer_address', `preparer_city` = '$preparer_city', 
			`preparer_state` = '$preparer_state', `preparer_zip` = '$preparer_zip', `preparer_phone` = '$preparer_phone', `preparer_efin` = '$preparer_efin',
			`preparer_ptin` = '$preparer_ptin', `preparer_nytprin` = '$preparer_nytprin', `preparer_ein` = '$preparer_ein', `preparer_ero_pin` = '$preparer_ero_pin',
			`preparer_pin` = '$preparer_pin', `instalation_type` = '$instalation_type', `server_type` = '$server_type', `os_version` = '$os_version' , `num_vpc` = '$num_vpc',
             `server_name` = '$server_name' , `num_stations` = '$num_stations',`printer_ip_address`='$printer_ip_address' , `ip_address`='$ip_address' WHERE `user_id` = '$id'";

            $result3 = mysqli_query($conn, $stmt3);
            if ($result3) {
                echo "Office information updated successfully";
                header("Location:office-info.php?office=updated&name=$id");

            }
            else {
                echo "Error: " . $stmt3 . "<br>" . mysqli_error($conn);
            }
        }
    }


?>