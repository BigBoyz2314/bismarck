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
    <title>La Biblia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <style>
    </style>
</head>
<body>

    <?php include("header.php"); ?>
	
    <div class="container-fluid px-5">
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>La Biblia</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 rounded-4">
                <table class="biblia-table table-bordered">
                    <thead class="text-center">
                        <tr class="bg-danger-subtle fs-3">
                            <th colspan="6">Bismarck Business Group, LLC</th>
                        </tr>
                        <tr class="bg-warning-subtle fs-5">
                            <th>Sr.</th>
                            <th colspan="6">Si Taxpayer nos Trae el siguiente documento o situacion:</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include_once('../includes/config.php');

                        $stmt = "SELECT * FROM biblia_consider";
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
                                    echo "<td>". $i++ ."</td>";
                                    echo "<td>$data</td>";
                                    echo "<td><a href='../uploads/$file_en' target='_blank'>EN</a></td>";
                                    echo "<td><a href='../uploads/$file_es' target='_blank'>ES</a></td>";
                                }
                                else {
                                echo "<tr>";
                                echo "<td>". $i++ ."</td>";
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
            <div class="col-md-6 rounded-4">
                <table class="biblia-table table-bordered">
                    <thead class="text-center">
                        <tr class="bg-danger-subtle fs-5">
                            <th colspan="6">La Biblia para preparar los Taxes Personales (1040) del 2022</th>
                        </tr>
                        <tr class="bg-warning-subtle fs-5">
                            <th>Sr.</th>
                            <th colspan="6">De que se trata o que debemos considerar:</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include_once('../includes/config.php');

                        $stmt = "SELECT * FROM biblia_personal";
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
                                    echo "<td>". $i++ ."</td>";
                                    echo "<td>$data</td>";
                                    echo "<td><a href='../uploads/$file_en' target='_blank'>EN</a></td>";
                                    echo "<td><a href='../uploads/$file_es' target='_blank'>ES</a></td>";
                                }
                                else {
                                    echo "<tr>";
                                    echo "<td>". $i++ ."</td>";
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
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
            <table class="biblia-table table-bordered">
                    <thead class="text-center">
                        <tr class="bg-danger-subtle fs-5">
                            <th colspan="6">Hecha por Bismarck Valdez - 347-681-1111</th>
                        </tr>
                        <tr class="bg-warning-subtle fs-5">
                            <th>Sr.</th>
                            <th colspan="6">Como debemos registrarlos en TaxWise:</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include_once('../includes/config.php');

                        $stmt = "SELECT * FROM biblia_taxwise";
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
                                    echo "<td>". $i++ ."</td>";
                                    echo "<td>$data</td>";
                                    echo "<td><a href='../uploads/$file_en' target='_blank'>EN</a></td>";
                                    echo "<td><a href='../uploads/$file_es' target='_blank'>ES</a></td>";
                                }
                                else {
                                    echo "<tr>";
                                    echo "<td>". $i++ ."</td>";
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