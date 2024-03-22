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

    <nav class="navbar navbar-expand-lg bg-nav">
        <div class="container-fluid w-75">
            <div class="d-flex flex-column py-1">
                <a class="navbar-brand p-0 fw-bold text-light fs-3" href="#">Bismarck Business Group, LLC</a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="change-password.php">Change Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        </nav>


    
    <nav class="navbar navbar-expand-lg bg-light text-primary border-bottom border-primary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 fw-semibold">
                <li class="nav-item">
                    <a class="nav-link text-primary" href="index.php">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="bank-reg.php">Bank Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="software-reg.php">Software Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="production.php">Production</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="registration-codes.php">Registration Codes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="installation.php">Installation & Updates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="la-biblia.php">La Biblia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="software.php">Software Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="inquiries.php">Inquiries</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
	
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

	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>