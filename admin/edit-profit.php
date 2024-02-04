<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        include '../includes/config.php';   

        $office_id = $_POST["officeId"];
        $year1 = $_POST["year"];

        $prev_year = $_POST["prevYear"];
        $sale_program = $_POST["saleProgram"];
        $pay_taxwise = $_POST["payTaxwise"];
        $efile_fee_unit = $_POST["efileFeeUnit"];
        $efile_fee = $_POST["efileFee"];
        $efile_taxwise_unit = $_POST["efileFeeUnit"];
        $efile_taxwise = $_POST["efileTaxwise"];
        $efile_fee_unit_1 = $_POST["efileFeeUnit1"];
        $efile_fee_1 = $_POST["efileFee1"];
        $efile_taxwise_unit_1 = $_POST["efileTaxwiseUnit"];
        $efile_taxwise_1 = $_POST["efileTaxwise"];
        $banking_fee_unit = $_POST["bankingFeeUnit"];
        $banking_fee = $_POST["bankingFee"];
        $commission_office_unit = $_POST["commissionOfficeUnit"];
        $commission_office = $_POST["commissionOffice"];
        $other_commission = $_POST["otherCommission"];

        $stmt = "SELECT * FROM `profit` WHERE `office_id` = '$office_id' AND `year` = '$year1'";
        $result = mysqli_query($conn, $stmt);
        $row = mysqli_fetch_assoc($result);
        if ($row == 0) {
            $stmt0 = "INSERT INTO `profit` 
            (`office_id`, `year`, `prev_year`, `sale_program`, `pay_taxwise`, `efile_fee_unit`, `efile_fee`, `efile_taxwise_unit`, `efile_taxwise`, `efile_fee_unit_1`, `efile_fee_1`, `efile_taxwise_unit_1`, `efile_taxwise_1`, `banking_fee_unit`, `banking_fee`, `commission_office_unit`, `commission_office`, `other_commission`) 
            VALUES 
            ('$office_id', '$year1', '$prev_year', '$sale_program', '$pay_taxwise', '$efile_fee_unit', '$efile_fee', '$efile_taxwise_unit', '$efile_taxwise', '$efile_fee_unit_1', '$efile_fee_1', '$efile_taxwise_unit_1', '$efile_taxwise_1', '$banking_fee_unit', '$banking_fee', '$commission_office_unit', '$commission_office', '$other_commission')";
            $result0 = mysqli_query($conn, $stmt0);
            echo "Profit information added successfully";
            header("Location:production.php?profit=added");
        }
        else {
            $stmt00 = "UPDATE `profit` SET 
            `prev_year` = '$prev_year', 
            `sale_program` = '$sale_program', 
            `pay_taxwise` = '$pay_taxwise', 
            `efile_fee_unit` = '$efile_fee_unit', 
            `efile_fee` = '$efile_fee', 
            `efile_taxwise_unit` = '$efile_taxwise_unit', 
            `efile_taxwise` = '$efile_taxwise', 
            `efile_fee_unit_1` = '$efile_fee_unit_1', 
            `efile_fee_1` = '$efile_fee_1', 
            `efile_taxwise_unit_1` = '$efile_taxwise_unit_1', 
            `efile_taxwise_1` = '$efile_taxwise_1', 
            `banking_fee_unit` = '$banking_fee_unit', 
            `banking_fee` = '$banking_fee', 
            `commission_office_unit` = '$commission_office_unit', 
            `commission_office` = '$commission_office', 
            `other_commission` = '$other_commission' 
            WHERE `office_id` = '$office_id' AND `year` = '$year1'";
            $result00 = mysqli_query($conn, $stmt00);
            echo "Profit information updated successfully";
            header("Location:production.php?profit=updated");
        }
    }



?>