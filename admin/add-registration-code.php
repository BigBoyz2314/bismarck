<?php

    require_once('../includes/config.php');
    
    if(isset($_POST["year"])) {
        $year = $_POST['year'];
        $efin = $_POST['efin'];
        $registrationCode = $_POST['regCode'];
        $user_id = $_POST['user'];
        $password = $_POST['password'];

        $stmt1 = "SELECT * FROM users WHERE id = '$user_id'";
        $result1 = $conn->query($stmt1);
        if($result1->num_rows > 0) {
            $row = $result1->fetch_assoc();
            $username = $row['name'];

            $stmt2 = "INSERT INTO registration_codes (year, efin, reg_code, user_id, username, password, created_at, updated_at) VALUES ('$year', '$efin', '$registrationCode', '$user_id', '$username', '$password', NOW(), NOW())";
            $result2 = $conn->query($stmt2);
            if($result2) {
                header("Location: registration-codes.php?msg=success");
            } else {
                header("Location: registration-codes.php?msg=error");
            }
        }
        else {
            header("Location: registration-codes.php?msg=error");
        }


    }

?>