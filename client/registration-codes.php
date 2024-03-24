<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Codes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <style>
    </style>
</head>
<body>

    <?php include("header.php"); ?>

	<div class="container-fluid w-75">
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Registration Codes</h3>
            </div>
            <div class="col-md-12 rounded-4">
                <table class="table table-bordered">
                    <thead class="table-info">
                    <tr>
                            <th>Year</th>
                            <th>EFIN</th>
                            <th>Reg Code</th>
                            <th>Username</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                        <?php

                            include_once('../includes/config.php');

                            $user = $_SESSION['id'];

                            $stmt = "SELECT * FROM registration_codes WHERE user_id = 2 OR user_id = $user ORDER BY year DESC";
                            $result = $conn->query($stmt);
                            $i = 1;

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {

                                    $id = $row['id'];
                                    $year = $row['year'];
                                    $efin = $row['efin'];
                                    $reg_code = $row['reg_code'];
                                    $username = $row['username'];
                                    $password = $row['password'];
                                    
                                        echo "<tr>";
                                        echo "<td>$year</td>";
                                        echo "<td>$efin</td>";
                                        echo "<td>$reg_code</td>";
                                        echo "<td>$username</td>";
                                        echo "<td>$password</td>";
                                        echo "</tr>";
                                }
                            }

                            


                        ?>
                        
                    </tbody>
                </table>
            </div>
	    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php include('translate.php'); ?>

</body>
</html>