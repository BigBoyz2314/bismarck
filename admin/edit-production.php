<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        include '../includes/config.php';   

        $office_id = $_POST["office_id"];
        
        //Years
        $year1 = $_POST["year1"];
        $year2 = $_POST["year2"];
        $year3 = $_POST["year3"];

        //Personal Tax
        $personal_tax_1 = $_POST["personal_tax-". $year1 .""];
        $personal_tax_2 = $_POST["personal_tax-". $year2 .""];
        $personal_tax_3 = $_POST["personal_tax-". $year3 .""];

        //Corporate Tax C
        $corporate_tax_c_1 = $_POST["corporate_tax_c-". $year1 .""];
        $corporate_tax_c_2 = $_POST["corporate_tax_c-". $year2 .""];
        $corporate_tax_c_3 = $_POST["corporate_tax_c-". $year3 .""];

        //Corporate Tax S
        $corporate_tax_s_1 = $_POST["corporate_tax_s-". $year1 .""];
        $corporate_tax_s_2 = $_POST["corporate_tax_s-". $year2 .""];
        $corporate_tax_s_3 = $_POST["corporate_tax_s-". $year3 .""];

        //Partnership Tax
        $partnership_tax_1 = $_POST["partnership_tax-". $year1 .""];
        $partnership_tax_2 = $_POST["partnership_tax-". $year2 .""];
        $partnership_tax_3 = $_POST["partnership_tax-". $year3 .""];

        //To Collect
        $to_collect = $_POST["to_collect-total"];

        //Total Production
        $total_1 = $personal_tax_1 + $corporate_tax_c_1 + $corporate_tax_s_1 + $partnership_tax_1;
        $total_2 = $personal_tax_2 + $corporate_tax_c_2 + $corporate_tax_s_2 + $partnership_tax_2;
        $total_3 = $personal_tax_3 + $corporate_tax_c_3 + $corporate_tax_s_3 + $partnership_tax_3;

        $stmt = "SELECT * FROM `to_collect` WHERE `office_id` = '$office_id'";
        $result = mysqli_query($conn, $stmt);
        $row = mysqli_fetch_assoc($result);
        if ($row == 0) {
            $stmt0 = "INSERT INTO `to_collect` (`office_id`, `to_collect`) VALUES ('$office_id', '$to_collect')";
            $result0 = mysqli_query($conn, $stmt0);
        }
        else {
            $stmt00 = "UPDATE `to_collect` SET `to_collect` = '$to_collect' WHERE `office_id` = '$office_id'";
            $result00 = mysqli_query($conn, $stmt00);
        }

        $stmt1 = "SELECT * FROM `production` WHERE `office_id` = '$office_id' AND `year` = '$year1'";
        $result1 = mysqli_query($conn, $stmt1);
        $row1 = mysqli_fetch_assoc($result1);
        if ($row1 == 0) {
            $stmt2 = "INSERT INTO `production` (`office_id`, `year`, `personal_tax`, `corporate_tax_c`, `corporate_tax_s`, `partnership_tax`, `to_collect` , `total_transmissions`) VALUES ('$office_id', '$year1', '$personal_tax_1', '$corporate_tax_c_1', '$corporate_tax_s_1', '$partnership_tax_1', '$to_collect_1' , '$total_1')";
            $result2 = mysqli_query($conn, $stmt2);
        }
        else {
            $stmt3 = "UPDATE `production` SET `personal_tax` = '$personal_tax_1', `corporate_tax_c` = '$corporate_tax_c_1', `corporate_tax_s` = '$corporate_tax_s_1', `partnership_tax` = '$partnership_tax_1', `to_collect` = '$to_collect_1', `total_transmissions` = '$total_1' WHERE `office_id` = '$office_id' AND `year` = '$year1'";
            $result3 = mysqli_query($conn, $stmt3);
        }

        $stmt4 = "SELECT * FROM `production` WHERE `office_id` = '$office_id' AND `year` = '$year2'";
        $result4 = mysqli_query($conn, $stmt4);
        $row4 = mysqli_fetch_assoc($result4);
        if ($row4 == 0) {
            $stmt5 = "INSERT INTO `production` (`office_id`, `year`, `personal_tax`, `corporate_tax_c`, `corporate_tax_s`, `partnership_tax`, `to_collect`, `total_transmissions`) VALUES ('$office_id', '$year2', '$personal_tax_2', '$corporate_tax_c_2', '$corporate_tax_s_2', '$partnership_tax_2', '$to_collect_2', '$total_2')";
            $result5 = mysqli_query($conn, $stmt5);
        }
        else {
            $stmt6 = "UPDATE `production` SET `personal_tax` = '$personal_tax_2', `corporate_tax_c` = '$corporate_tax_c_2', `corporate_tax_s` = '$corporate_tax_s_2', `partnership_tax` = '$partnership_tax_2', `to_collect` = '$to_collect_2', `total_transmissions` = '$total_2' WHERE `office_id` = '$office_id' AND `year` = '$year2'";
            $result6 = mysqli_query($conn, $stmt6);
        }

        $stmt7 = "SELECT * FROM `production` WHERE `office_id` = '$office_id' AND `year` = '$year3'";
        $result7 = mysqli_query($conn, $stmt7);
        $row7 = mysqli_fetch_assoc($result7);
        if ($row7 == 0) {
            $stmt8 = "INSERT INTO `production` (`office_id`, `year`, `personal_tax`, `corporate_tax_c`, `corporate_tax_s`, `partnership_tax`, `to_collect` , `total_transmissions`) VALUES ('$office_id', '$year3', '$personal_tax_3', '$corporate_tax_c_3', '$corporate_tax_s_3', '$partnership_tax_3', '$to_collect_3', '$total_3')";
            $result8 = mysqli_query($conn, $stmt8);
        }
        else {
            $stmt9 = "UPDATE `production` SET `personal_tax` = '$personal_tax_3', `corporate_tax_c` = '$corporate_tax_c_3', `corporate_tax_s` = '$corporate_tax_s_3', `partnership_tax` = '$partnership_tax_3', `to_collect` = '$to_collect_3', `total_transmissions` = '$total_3' WHERE `office_id` = '$office_id' AND `year` = '$year3'";
            $result9 = mysqli_query($conn, $stmt9);
        }

        if ($result2 || $result3 || $result5 || $result6 || $result8 || $result9) {
            echo "Production information added successfully";
            header("Location:production.php?production=added");
            
        }
        else {
            echo "Error: " . $stmt2 . "<br>" . mysqli_error($conn);
        }
    }



?>