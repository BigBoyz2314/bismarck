<?php

    require_once('../includes/config.php');
    
    if(isset($_POST["year"])) {
        $year = $_POST['year'];
        // $username = $_POST['username'];
        $company = $_POST['company'];
        $personal_tax = $_POST['personal_tax'];
        $corporate_tax_c = $_POST['corporate_tax_c'];
        $corporate_tax_s = $_POST['corporate_tax_s'];
        $partnership_tax = $_POST['partnership_tax'];

        $total = $personal_tax + $corporate_tax_c + $corporate_tax_s + $partnership_tax;

        $stmt2 = "INSERT INTO production (year, office_id, personal_tax, corporate_tax_c, corporate_tax_s, partnership_tax, total_transmissions, created_at, updated_at) VALUES ('$year', '$company', '$personal_tax', '$corporate_tax_c', '$corporate_tax_s', '$partnership_tax', $total, NOW(), NOW())";
        $result2 = $conn->query($stmt2);
        if($result2) {
            header("Location: production.php?msg=success");
        } else {
            header("Location: production.php?msg=error");
        }

    }

?>