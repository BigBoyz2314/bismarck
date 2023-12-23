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
                <a class="navbar-brand p-0 fw-bold text-light fs-3" href="#">Central Office Manager</a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Manage Users</a>
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
                    <a class="nav-link text-primary" href="office.php">Offices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="#">Clients by States</a>
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
                <li class="nav-item">
                    <a class="nav-link text-primary" href="courses.php">Courses</a>
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
            <h4>Add New Entry</h4>
            <div class="col-md-4">
                <form action="add-biblia-consider.php" method="post">
                    <div class="mb-3">
                        <label for="consider" class="form-label">Consider</label>
                        <input type="text" class="form-control" id="consider" name="consider" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Add" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <form action="add-biblia-personal.php" method="post">
                    <div class="mb-3">
                        <label for="personal" class="form-label">Personal</label>
                        <input type="text" class="form-control" id="personal" name="personal" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Add" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <form action="add-biblia-taxwise.php" method="post">
                    <div class="mb-3">
                        <label for="taxwise" class="form-label">Taxwise</label>
                        <input type="text" class="form-control" id="taxwise" name="taxwise" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Add" class="btn btn-primary">
                    </div>
                </form>
        </div>
        <div class="row">
            <div class="col-md-6 rounded-4">
                <table class="biblia-table table-bordered">
                    <thead class="text-center">
                        <tr class="bg-danger-subtle fs-3">
                            <th colspan="4">Bismarck Business Group, LLC</th>
                        </tr>
                        <tr class="bg-warning-subtle fs-5">
                            <th>Sr.</th>
                            <th colspan="4">Si Taxpayer nos Trae el siguiente documento o situacion:</th>
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

                                echo "<tr>";
                                echo "<td>". $i++ ."</td>";
                                echo "<td>$data</td>";

                                if ($_SESSION['role'] == '1') {
                                    echo "<td><form action='edit-biblia-consider.php' method='get'><input type='hidden' name='desigName' value='". $data ."'><input type='hidden' name='id' value='". $id ."'><input type='submit' value='Edit' class='btn btn-warning'></form></td>";
                                    echo "<td><form action='' method='get'><input type='hidden' name='desigName' value='". $data ."'><input type='hidden' name='id' value='". $id ."'><input type='submit' value='Delete' class='btn btn-danger'></form></td>";
                                }

                                echo "</tr>";
                            }
                        }

                            if (isset($_GET['id'])) {
                                $delID = $_GET['id'];
                                $delName = $_GET['desigName'];
                                  
                                echo '<script type="text/javascript"> ';  
                                echo '  if (confirm("Are you sure you want to DELETE '. "'$delName'" .'?")) {';  
                                echo '    window.location.href = "del-biblia-consider.php?delName='. $delName .'&delID='. $delID .'";';  
                                echo '  }';
                                echo '</script>';  
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 rounded-4">
                <table class="biblia-table table-bordered">
                    <thead class="text-center">
                        <tr class="bg-danger-subtle fs-5">
                            <th colspan="4">La Biblia para preparar los Taxes Personales (1040) del 2022</th>
                        </tr>
                        <tr class="bg-warning-subtle fs-5">
                            <th>Sr.</th>
                            <th colspan="4">De que se trata o que debemos considerar:</th>
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

                                echo "<tr>";
                                echo "<td>". $i++ ."</td>";
                                echo "<td>$data</td>";

                                if ($_SESSION['role'] == '1') {
                                    echo "<td><form action='edit-biblia-personal.php' method='get'><input type='hidden' name='data' value='". $data ."'><input type='hidden' name='id' value='". $id ."'><input type='submit' value='Edit' class='btn btn-warning'></form></td>";
                                    echo "<td><form action='' method='get'><input type='hidden' name='data' value='". $data ."'><input type='hidden' name='id' value='". $id ."'><input type='submit' value='Delete' class='btn btn-danger'></form></td>";
                                }

                                echo "</tr>";
                            }
                        }

                            if (isset($_GET['id'])) {
                                $delID = $_GET['id'];
                                $delName = $_GET['data'];
                                  
                                echo '<script type="text/javascript"> ';  
                                echo '  if (confirm("Are you sure you want to DELETE '. "'$delName'" .'?")) {';  
                                echo '    window.location.href = "del-biblia-personal.php?delName='. $delName .'&delID='. $delID .'";';  
                                echo '  }';
                                echo '</script>';  
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
                            <th colspan="4">Hecha por Bismarck Valdez - 347-681-1111</th>
                        </tr>
                        <tr class="bg-warning-subtle fs-5">
                            <th>Sr.</th>
                            <th colspan="4">Como debemos registrarlos en TaxWise:</th>
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

                                echo "<tr>";
                                echo "<td>". $i++ ."</td>";
                                echo "<td>$data</td>";

                                if ($_SESSION['role'] == '1') {
                                    echo "<td><form action='edit-biblia-taxwise.php' method='get'><input type='hidden' name='data' value='". $data ."'><input type='hidden' name='id' value='". $id ."'><input type='submit' value='Edit' class='btn btn-warning'></form></td>";
                                    echo "<td><form action='' method='get'><input type='hidden' name='data' value='". $data ."'><input type='hidden' name='id' value='". $id ."'><input type='submit' value='Delete' class='btn btn-danger'></form></td>";
                                }

                                echo "</tr>";
                            }
                        }

                            if (isset($_GET['id'])) {
                                $delID = $_GET['id'];
                                $delName = $_GET['data'];
                                  
                                echo '<script type="text/javascript"> ';  
                                echo '  if (confirm("Are you sure you want to DELETE '. "'$delName'" .'?")) {';  
                                echo '    window.location.href = "del-biblia-taxwise.php?delName='. $delName .'&delID='. $delID .'";';  
                                echo '  }';
                                echo '</script>';  
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