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
    <title>Installation & Updates</title>
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
                <h3>Software Management</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 rounded-4">
                <table class="software-table table-bordered">
                    <thead class="bg-opacity-50 bg-success fs-5 text-center">
                        <tr>
                            <th colspan="5">Software Management</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include_once('../includes/config.php');

                    $stmt = "SELECT * FROM software_management";
                    $result = $conn->query($stmt);
                    $i = 1;

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {

                            $id = $row['id'];
                            $data = $row['data'];
                            $file_en = $row['file_en'];
                            $file_es = $row['file_es'];
                            
                            if ($file_en != '' or $file_es != '') {
                                echo "<tr>";
                                echo "<td>$data</td>";
                                echo "<td><a href='../uploads/$file_en' target='_blank'>EN</a></td>";
                                echo "<td><a href='../uploads/$file_es' target='_blank'>ES</a></td>";
                            }
                            else {
                                echo "<tr>";
                                echo "<td>$data</td>";
                                echo "<td></td>";
                                echo "<td></td>";
                            }

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