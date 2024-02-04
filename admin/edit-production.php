<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        include '../includes/config.php';   

        $office_id = $_POST["office_id"];
        
        //Years
        $year1 = $_POST["year1"];

        //Personal Tax
        $personal_tax = $_POST["personal_tax"];
        $personal_tax_1 = $_POST["personal_tax_1"];
        $personal_tax_2 = $_POST["personal_tax_2"];

        //Corporate Tax C
        $corporate_tax_c = $_POST["corporate_tax_c"];
        $corporate_tax_c_1 = $_POST["corporate_tax_c_1"];
        $corporate_tax_c_2 = $_POST["corporate_tax_c_2"];

        //Corporate Tax S
        $corporate_tax_s = $_POST["corporate_tax_s"];
        $corporate_tax_s_1 = $_POST["corporate_tax_s_1"];
        $corporate_tax_s_2 = $_POST["corporate_tax_s_2"];

        //Partnership Tax
        $partnership_tax = $_POST["partnership_tax"];
        $partnership_tax_1 = $_POST["partnership_tax_1"];
        $partnership_tax_2 = $_POST["partnership_tax_2"];

        //To Collect
        $to_collect = $_POST["to_collect"];

        //Total Production
        $total = $personal_tax + $corporate_tax_c + $corporate_tax_s + $partnership_tax;
        $total_1 = $personal_tax_1 + $corporate_tax_c_1 + $corporate_tax_s_1 + $partnership_tax_1;
        $total_2 = $personal_tax_2 + $corporate_tax_c_2 + $corporate_tax_s_2 + $partnership_tax_2;
        $total_all = $personal_tax + $personal_tax_1 + $personal_tax_2 + $corporate_tax_c + $corporate_tax_c_1 + $corporate_tax_c_2 + $corporate_tax_s_1 + $corporate_tax_s_2 + $partnership_tax + $partnership_tax_1 + $partnership_tax_2;

        $stmt = "SELECT * FROM `production` WHERE `office_id` = '$office_id' AND `year` = '$year1'";
        $result = mysqli_query($conn, $stmt);
        $row = mysqli_fetch_assoc($result);
        if ($row == 0) {
            $stmt0 = "INSERT INTO `production` 
            (`office_id`, `year`, `personal_tax`, `personal_tax_1`, `personal_tax_2`, `corporate_tax_c`, `corporate_tax_c_1`, `corporate_tax_c_2`, `corporate_tax_s`, `corporate_tax_s_1`, `corporate_tax_s_2`, `partnership_tax`, `partnership_tax_1`, `partnership_tax_2`, `to_collect`, `total_transmissions`, `total_transmissions_1`, `total_transmissions_2`, `total_transmissions_total`) 
            VALUES 
            ('$office_id', '$year1', '$personal_tax', '$personal_tax_1', '$personal_tax_2', '$corporate_tax_c', '$corporate_tax_c_1', '$corporate_tax_c_2', '$corporate_tax_s', '$corporate_tax_s_1', '$corporate_tax_s_2', '$partnership_tax', '$partnership_tax_1', '$partnership_tax_2', '$to_collect', '$total', '$total_1', '$total_2', '$total_all')";
            $result0 = mysqli_query($conn, $stmt0);
            echo "Production information added successfully";
            header("Location:production.php?production=added");
        }
        else {
            $stmt00 = "UPDATE `production` SET 
            `personal_tax` = '$personal_tax', 
            `personal_tax_1` = '$personal_tax_1', 
            `personal_tax_2` = '$personal_tax_2', 
            `corporate_tax_c` = '$corporate_tax_c', 
            `corporate_tax_c_1` = '$corporate_tax_c_1', 
            `corporate_tax_c_2` = '$corporate_tax_c_2', 
            `corporate_tax_s` = '$corporate_tax_s', 
            `corporate_tax_s_1` = '$corporate_tax_s_1', 
            `corporate_tax_s_2` = '$corporate_tax_s_2', 
            `partnership_tax` = '$partnership_tax', 
            `partnership_tax_1` = '$partnership_tax_1', 
            `partnership_tax_2` = '$partnership_tax_2', 
            `to_collect` = '$to_collect', 
            `total_transmissions` = '$total',
            `total_transmissions_1` = '$total_1',
            `total_transmissions_2` = '$total_2',
            `total_transmissions_total` = '$total_all'
            WHERE `office_id` = '$office_id' AND `year` = '$year1'";
            $result00 = mysqli_query($conn, $stmt00);
            echo "Production information updated successfully";
            header("Location:production.php?production=updated");
        }
    }



?>