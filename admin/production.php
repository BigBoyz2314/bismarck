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
    <title>Overview</title>
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
                    <a class="nav-link active" href="production.php">Production</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="registration-codes.php">Registration Codes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="installation.php">Installation & Updates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="la-biblia.php">La Biblia</a>
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
	<div class="container-fluid w-75">
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Bismarck Business Group, LLC</h3>
            </div>
            <div class="col-md-6">
                <form action="" method="get">
                    <label for="username">Username</label>
                    <select name="username" class="form-select" id="username" required>
                        <option value="">Select</option>
                        <?php
                        
                            include '../includes/config.php'; 
                            $stmt = ("SELECT company_contact_name FROM offices");
                            $result = mysqli_query($conn, $stmt);
                            while($row = mysqli_fetch_array($result)) {
                                echo "<option value='" . $row['company_contact_name'] ."'>" . $row['company_contact_name'] ."</option>";
                            }

                        ?>
                    </select>
                    <!-- <label for="company">Company Name</label> -->
                    <!-- <select name="company" class="form-select" id="company" required>
                        <option value="">Select</option>
                        <?php
                        
                            // include '../includes/config.php'; 
                            // $stmt = ("SELECT id, company_name FROM offices");
                            // $result = mysqli_query($conn, $stmt);
                            // while($row = mysqli_fetch_array($result)) {
                            //     echo "<option value='" . $row['id'] ."'>" . $row['company_name'] ."</option>";
                            // }

                        ?>
                    </select> -->
                    <!-- <label for="year">Year</label>
                    <select name="year" id="year" class="form-select">
                        <option value="">Select</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                    </select> -->
                    <button class="btn btn-primary mt-2" type="submit">Search</button>
                </form>
            </div>
        </div>


        <?php
        
            if (isset($_GET['username'])) {

                $username = $_GET['username'];
                $stmt = "SELECT * FROM offices WHERE company_contact_name = '$username'";
                $result = $conn->query($stmt);
                $row = $result->fetch_assoc();
                $office = $row['id'];
                $officeName = $row['company_name'];
                $stmt2 = "SELECT * FROM production WHERE office_id = $office ORDER BY year DESC";
                $result2 = $conn->query($stmt2);
                $year1 = date('Y');
                $year2 = date('Y')-1;
                $year3 = date('Y')-2;

                if ($result2->num_rows > 0) {
                    echo '<div class="row mt-3">
                    <div class="col-md-12">
                    <h6 class="d-inline me-4">Name: ' . $_GET['username'] . '</h6>
                    <h6 class="d-inline me-4">Company: ' . $officeName . '</h6>
                    <form action="edit-production.php" method="post">
                        <input type="hidden" name="office_id" value="' . $office . '">
                        <input type="hidden" name="year1" value="' . $year1 . '">
                        <input type="hidden" name="year2" value="' . $year2 . '">
                        <input type="hidden" name="year3" value="' . $year3 . '">
                        <table class="table table-bordered table-responsive text-nowrap">
                            <thead class="table-warning">
                                <tr>
                                    <th>Production</th>
                                    <th>'. $year1 .'</th>
                                    <th>'. $year2 .'</th>
                                    <th>'. $year3 .'</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>';
                        echo '<tr>
                                <td>Transmision Taxes Personales - 1040</td>
                                ';
                                $stmt3 = "SELECT * FROM production WHERE office_id = $office AND year = $year1";
                                $result3 = $conn->query($stmt3);
                                if ($result3->num_rows > 0) {
                                while($row3 = $result3->fetch_assoc()) {
                                    echo '<td> <input class="form-control" value="' . $row3['personal_tax'] . '" name="personal_tax-' . $row3['year'] . '"> </td>';
                                }
                                }
                                else {
                                    echo '<td> <input class="form-control" value="0" name="personal_tax-' . $year1 . '"> </td>';
                                }
                                
                                $stmt4 = "SELECT * FROM production WHERE office_id = $office AND year = $year2";
                                $result4 = $conn->query($stmt4);
                                if ($result4->num_rows > 0) {
                                while($row4 = $result4->fetch_assoc()) {
                                    echo '<td> <input class="form-control" value="' . $row4['personal_tax'] . '" name="personal_tax-' . $row4['year'] . '"> </td>';
                                }
                                }
                                else {
                                    echo '<td> <input class="form-control" value="0" name="personal_tax-' . $year2 . '"> </td>';
                                }
                                $stmt5 = "SELECT * FROM production WHERE office_id = $office AND year = $year3";
                                $result5 = $conn->query($stmt5);
                                if ($result5->num_rows > 0) {
                                while($row5 = $result5->fetch_assoc()) {
                                        echo '<td> <input class="form-control" value="' . $row5['personal_tax'] . '" name="personal_tax-' . $row5['year'] . '"> </td>';
                                    }
                                }
                                else {
                                    echo '<td> <input class="form-control" value="0" name="personal_tax-' . $year3 . '"> </td>';
                                }
                                $stmt6 = "SELECT SUM(personal_tax) AS personal_total FROM production WHERE office_id = $office AND year = $year1 OR $year2 OR $year3";
                                $result6 = $conn->query($stmt6);
                                if ($result6->num_rows > 0) {
                                while($row6 = $result6->fetch_assoc()) {
                                        echo '<td> <input class="form-control" disabled value="' . $row6['personal_total'] . '"> </td>';
                                    }
                                }
                                else {
                                    echo '<td> <input class="form-control" disabled value="0"> </td>';
                                }
                                
                            echo '</tr>';
                            echo '<tr>
                            <td>Transmision Taxes Corporaciones C - 1120</td>
                            ';
                            $stmt3 = "SELECT * FROM production WHERE office_id = $office AND year = $year1";
                            $result3 = $conn->query($stmt3);
                            if ($result3->num_rows > 0) {
                            while($row3 = $result3->fetch_assoc()) {
                                echo '<td> <input class="form-control" value="' . $row3['corporate_tax_c'] . '" name="corporate_tax_c-' . $row3['year'] . '"> </td>';
                            }
                            }
                            else {
                                echo '<td> <input class="form-control" value="0" name="corporate_tax_c-' . $year1 . '"> </td>';
                            }
                            $stmt4 = "SELECT * FROM production WHERE office_id = $office AND year = $year2";
                            $result4 = $conn->query($stmt4);
                            if ($result4->num_rows > 0) {
                            while($row4 = $result4->fetch_assoc()) {
                                echo '<td> <input class="form-control" value="' . $row4['corporate_tax_c'] . '" name="corporate_tax_c-' . $row4['year'] . '"> </td>';
                            }
                            }
                            else {
                                echo '<td> <input class="form-control" value="0" name="corporate_tax_c-' . $year2 . '"> </td>';
                            }
                            $stmt5 = "SELECT * FROM production WHERE office_id = $office AND year = $year3";
                            $result5 = $conn->query($stmt5);
                            if ($result5->num_rows > 0) {
                            while($row5 = $result5->fetch_assoc()) {
                                echo '<td> <input class="form-control" value="' . $row5['corporate_tax_c'] . '" name="corporate_tax_c-' . $row5['year'] . '"> </td>';
                            }
                            }
                            else {
                                echo '<td> <input class="form-control" value="0" name="corporate_tax_c-' . $year3 . '"> </td>';
                            }
                            $stmt6 = "SELECT SUM(corporate_tax_c) AS corporate_tax_c_total FROM production WHERE office_id = $office AND year = $year1 OR $year2 OR $year3";
                            $result6 = $conn->query($stmt6);
                            if ($result6->num_rows > 0) {
                            while($row6 = $result6->fetch_assoc()) {
                                    echo '<td> <input class="form-control" disabled value="' . $row6['corporate_tax_c_total'] . '"> </td>';
                                }
                            }
                            else {
                                echo '<td> <input class="form-control" disabled value="0"> </td>';
                            }
                            
                        echo '</tr>';
                        echo '<tr>
                            <td>Transmision Taxes Corporaciones S - 1120-S</td>
                            ';
                            $stmt3 = "SELECT * FROM production WHERE office_id = $office AND year = $year1";
                            $result3 = $conn->query($stmt3);
                            if ($result3->num_rows > 0) {
                            while($row3 = $result3->fetch_assoc()) {
                                echo '<td> <input class="form-control" value="' . $row3['corporate_tax_s'] . '" name="corporate_tax_s-' . $row3['year'] . '"> </td>';
                            }
                            }
                            else {
                                echo '<td> <input class="form-control" value="0" name="corporate_tax_s-' . $year1 . '"> </td>';
                            }
                            $stmt4 = "SELECT * FROM production WHERE office_id = $office AND year = $year2";
                            $result4 = $conn->query($stmt4);
                            if ($result4->num_rows > 0) {
                            while($row4 = $result4->fetch_assoc()) {
                                echo '<td> <input class="form-control" value="' . $row4['corporate_tax_s'] . '" name="corporate_tax_s-' . $row4['year'] . '"> </td>';
                            }
                            }
                            else {
                                echo '<td> <input class="form-control" value="0" name="corporate_tax_s-' . $year2 . '"> </td>';
                            }
                            $stmt5 = "SELECT * FROM production WHERE office_id = $office AND year = $year3";
                            $result5 = $conn->query($stmt5);
                            if ($result5->num_rows > 0) {
                            while($row5 = $result5->fetch_assoc()) {
                                echo '<td> <input class="form-control" value="' . $row5['corporate_tax_s'] . '" name="corporate_tax_s-' . $row5['year'] . '"> </td>';
                            }
                            }
                            else {
                                echo '<td> <input class="form-control" value="0" name="corporate_tax_s-' . $year3 . '"> </td>';
                            }
                            $stmt6 = "SELECT SUM(corporate_tax_s) AS corporate_tax_s_total FROM production WHERE office_id = $office AND year = $year1 OR $year2 OR $year3";
                            $result6 = $conn->query($stmt6);
                            if ($result6->num_rows > 0) {
                            while($row6 = $result6->fetch_assoc()) {
                                    echo '<td> <input class="form-control" disabled value="' . $row6['corporate_tax_s_total'] . '"> </td>';
                                }
                            }
                            else {
                                echo '<td> <input class="form-control" disabled value="0"> </td>';
                            }
                            
                        echo '</tr>';
                        echo '<tr>
                            <td>Transmision Taxes Partneship - 1165</td>
                            ';
                            $stmt3 = "SELECT * FROM production WHERE office_id = $office AND year = $year1";
                            $result3 = $conn->query($stmt3);
                            if ($result3->num_rows > 0) {
                            while($row3 = $result3->fetch_assoc()) {
                                echo '<td> <input class="form-control" value="' . $row3['partnership_tax'] . '" name="partnership_tax-' . $row3['year'] . '"> </td>';
                            }
                            }
                            else {
                                echo '<td> <input class="form-control" value="0" name="partnership_tax-' . $year1 . '"> </td>';
                            }
                            $stmt4 = "SELECT * FROM production WHERE office_id = $office AND year = $year2";
                            $result4 = $conn->query($stmt4);
                            if ($result4->num_rows > 0) {
                            while($row4 = $result4->fetch_assoc()) {
                                echo '<td> <input class="form-control" value="' . $row4['partnership_tax'] . '" name="partnership_tax-' . $row4['year'] . '"> </td>';
                            }
                            }
                            else {
                                echo '<td> <input class="form-control" value="0" name="partnership_tax-' . $year2 . '"> </td>';
                            }
                            $stmt5 = "SELECT * FROM production WHERE office_id = $office AND year = $year3";
                            $result5 = $conn->query($stmt5);
                            if ($result5->num_rows > 0) {
                            while($row5 = $result5->fetch_assoc()) {
                                echo '<td> <input class="form-control" value="' . $row5['partnership_tax'] . '" name="partnership_tax-' . $row5['year'] . '"> </td>';
                            }
                            }
                            else {
                                echo '<td> <input class="form-control" value="0" name="partnership_tax-' . $year3 . '"> </td>';
                            }
                            $stmt6 = "SELECT SUM(partnership_tax) AS partnership_tax_total FROM production WHERE office_id = $office AND year = $year1 OR $year2 OR $year3";
                            $result6 = $conn->query($stmt6);
                            if ($result6->num_rows > 0) {
                            while($row6 = $result6->fetch_assoc()) {
                                    echo '<td> <input class="form-control" disabled value="' . $row6['partnership_tax_total'] . '"> </td>';
                                }
                            }
                            else {
                                echo '<td> <input class="form-control" disabled value="0"> </td>';
                            }
                            
                        echo '</tr>';

                        echo '<tr>
                            <td>Total Taxes con Fee Collect aprobados.</td>
                            ';
                            $stmt3 = "SELECT * FROM production WHERE office_id = $office AND year = $year1";
                            $result3 = $conn->query($stmt3);
                            if ($result3->num_rows > 0) {
                            while($row3 = $result3->fetch_assoc()) {
                                echo '<td class="bg-danger-subtle"> <input class="form-control" value="' . $row3['to_collect'] . '" name="to_collect-' . $row3['year'] . '"> </td>';
                            }
                            }
                            else {
                                echo '<td class="bg-danger-subtle"> <input class="form-control" value="0" name="to_collect-' . $year1 . '"> </td>';
                            }
                            $stmt4 = "SELECT * FROM production WHERE office_id = $office AND year = $year2";
                            $result4 = $conn->query($stmt4);
                            if ($result4->num_rows > 0) {
                            while($row4 = $result4->fetch_assoc()) {
                                echo '<td class="bg-danger-subtle"> <input class="form-control" value="' . $row4['to_collect'] . '" name="to_collect-' . $row4['year'] . '"> </td>';
                            }
                            }
                            else {
                                echo '<td class="bg-danger-subtle"> <input class="form-control" value="0" name="to_collect-' . $year2 . '"> </td>';
                            }
                            $stmt5 = "SELECT * FROM production WHERE office_id = $office AND year = $year3";
                            $result5 = $conn->query($stmt5);
                            if ($result5->num_rows > 0) {
                            while($row5 = $result5->fetch_assoc()) {
                                echo '<td class="bg-danger-subtle"> <input class="form-control" value="' . $row5['to_collect'] . '" name="to_collect-' . $row5['year'] . '"> </td>';
                            }
                            }
                            else {
                                echo '<td class="bg-danger-subtle"> <input class="form-control" value="0" name="to_collect-' . $year3 . '"> </td>';
                            }
                            $stmt6 = "SELECT SUM(to_collect) AS to_collect_total FROM production WHERE office_id = $office AND year = $year1 OR $year2 OR $year3";
                            $result6 = $conn->query($stmt6);
                            if ($result6->num_rows > 0) {
                            while($row6 = $result6->fetch_assoc()) {
                                    echo '<td class="bg-danger-subtle"> <input class="form-control" id="total-to-collect" disabled value="' . $row6['to_collect_total'] . '"> </td>';
                                }
                            }
                            else {
                                echo '<td class="bg-danger-subtle"> <input class="form-control" id="total-to-collect" disabled value="0"> </td>';
                            }

                        echo '</tr>';   

                        echo '<tr>
                            <td>Total Transmisiones</td>
                            ';
                            $stmt3 = "SELECT * FROM production WHERE office_id = $office AND year = $year1";
                            $result3 = $conn->query($stmt3);
                            while($row3 = $result3->fetch_assoc()) {
                                if ($result3->num_rows > 0) {
                                    echo '<td> <input class="form-control" disabled value="' . $row3['total_transmissions'] . '"> </td>';
                                }
                                else {
                                    echo '<td> <input class="form-control" disabled value="0"> </td>';
                                }
                            }
                            $stmt4 = "SELECT * FROM production WHERE office_id = $office AND year = $year2";
                            $result4 = $conn->query($stmt4);
                            while($row4 = $result4->fetch_assoc()) {
                                if ($result4->num_rows > 0) {
                                    echo '<td> <input class="form-control" disabled value="' . $row4['total_transmissions'] . '"> </td>';
                                }
                                else {
                                    echo '<td> <input class="form-control" disabled value="0"> </td>';
                                }
                            }
                            $stmt5 = "SELECT * FROM production WHERE office_id = $office AND year = $year3";
                            $result5 = $conn->query($stmt5);
                            if ($result5->num_rows > 0) {
                            while($row5 = $result5->fetch_assoc()) {
                                    echo '<td> <input class="form-control" disabled value="' . $row5['total_transmissions'] . '"> </td>';
                                }
                            }
                            else {
                                echo '<td> <input class="form-control" disabled value="0"> </td>';
                            }
                            $stmt6 = "SELECT SUM(total_transmissions) AS total_transmissions_total FROM production WHERE office_id = $office AND year = $year1 OR $year2 OR $year3";
                            $result6 = $conn->query($stmt6);
                            if ($result6->num_rows > 0) {
                            while($row6 = $result6->fetch_assoc()) {
                                    echo '<td> <input class="form-control" disabled value="' . $row6['total_transmissions_total'] . '"> </td>';
                                }
                            }
                            else {
                                echo '<td> <input class="form-control" sisabled value="0"> </td>';
                            }
                            
                        echo '</tr>
                        <tr>
                            <td>Total Taxes Efile Only transmitidos.</td>
                            <td></td>
                            <td></td>
                            <td></td>';

                            $stmt6 = "SELECT SUM(total_transmissions) AS total_transmissions_total FROM production WHERE office_id = $office AND year = $year1 OR $year2 OR $year3";
                            $result6 = $conn->query($stmt6);
                            if ($result6->num_rows > 0) {
                            while($row6 = $result6->fetch_assoc()) {
                                    echo '<td class="bg-warning-subtle"> <input class="form-control" id="total-efile" disabled value="' . $row6['total_transmissions_total'] . '"> </td>';
                                }
                            }
                            else {
                                echo '<td class="bg-warning-subtle"><input type="text" id="total-efile" disabled class="form-control" value="0"></td>';
                            }
                            
                        echo '</tr>';
                        

                    echo '</tbody>
                        </table>
                        <button class="btn btn-success mt-2" type="submit">Save</button>
                    </form>
                    </div>';
                }

                echo '<div class="col-md-12 mt-4">
                <table class="table table-bordered text-nowrap">
                    <thead class="table-warning">
                        <tr>
                            <th>Ganancia (Perdida) </th>
                            <th>Unit Cost</th>
                            <th>Profit</th>
                            <th>CXC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Carry on from previous year</td>
                            <td></td>';

                            $stmt7 = "SELECT prev_year FROM profit WHERE office_id = $office";
                            $result7 = $conn->query($stmt7);
                            if ($result7->num_rows > 0) {
                            while($row7 = $result7->fetch_assoc()) {
                                    echo '<td> <input type="number" class="form-control" name="prev-year" value="' . $row7['prev_year'] . '"> </td>';
                                    echo '<td> <input type="number" class="form-control" disabled name="prev-year1" id="prev-year1" value="' . $row7['prev_year'] . '">  </td>';
                                }
                            }
                            else {
                                echo '<td><input type="number" name="prev-year" id="prev-year" class="form-control" value="0"></td>';
                                echo '<td> <input type="number" class="form-control" disabled name="prev-year1" id="prev-year1" value="0">  </td>';
                            }
                            
                        echo '</tr>
                        <tr>
                            <td>Venta del Programa a Cobrar</td>
                            <td></td>';

                            $stmt7 = "SELECT sale_program FROM profit WHERE office_id = $office";
                            $result7 = $conn->query($stmt7);
                            if ($result7->num_rows > 0) {
                            while($row7 = $result7->fetch_assoc()) {
                                    echo '<td> <input type="number" class="form-control" name="sale-program" id="sale-program" value="' . $row7['sale_program'] . '"> </td>';
                                    echo '<td> <input type="number" class="form-control" disabled name="sale-program" id="sale-program1" value="' . $row7['sale_program'] . '">  </td>';
                                }
                            }
                            else {
                                echo '<td> <input type="number" name="sale-program" id="sale-program" class="form-control" value="0"> </td>';
                                echo '<td> <input type="number" class="form-control" disabled name="sale-program" id="sale-program1" value="0">  </td>';
                            }
                            
                        echo '</tr>
                        <tr>
                            <td>Costo del Programa a pagar a TaxWise</td>
                            <td></td>';

                            $stmt7 = "SELECT pay_taxwise FROM profit WHERE office_id = $office";
                            $result7 = $conn->query($stmt7);
                            if ($result7->num_rows > 0) {
                            while($row7 = $result7->fetch_assoc()) {
                                    echo '<td> <input type="number" class="form-control" name="pay-taxwise" id="pay-taxwise" value="' . $row7['pay_taxwise'] . '"> </td>';
                                }
                            }
                            else {
                                echo '<td><input type="number" name="pay-taxwise" id="pay-taxwise" class="form-control" value="0"></td>';
                            }
                            
                            echo '<td></td>
                        </tr>
                        <tr>
                            <td>Cargo a la Oficina por el Efile Fee</td>';

                            $stmt7 = "SELECT efile_fee_unit FROM profit WHERE office_id = $office";
                            $result7 = $conn->query($stmt7);
                            if ($result7->num_rows > 0) {
                            while($row7 = $result7->fetch_assoc()) {
                                    echo '<td> <input type="number" class="form-control" name="efile-fee-unit" id="efile-fee-unit" value="' . $row7['efile_fee_unit'] . '"> </td>';
                                }
                            }
                            else {
                                echo '<td><input type="number" name="efile-fee-unit" id="efile-fee-unit" class="form-control" value="0"></td>';
                            }
                            
                            
                            $stmt7 = "SELECT efile_fee FROM profit WHERE office_id = $office";
                            $result7 = $conn->query($stmt7);
                            if ($result7->num_rows > 0) {
                            while($row7 = $result7->fetch_assoc()) {
                                    echo '<td> <input type="number" class="form-control" disabled name="efile-fee" id="efile-fee" value="' . $row7['efile_fee'] . '"> <input type="number" class="form-control" hidden name="efile-fee" id="efile-fee" value="' . $row7['efile_fee'] . '">  </td>';
                                    echo '<td> <input type="number" class="form-control" disabled name="efile-fee1" id="efile-fee1" value="' . $row7['efile_fee'] . '">  </td>';
                                }
                            }
                            else {
                                echo '<td> <input type="number" name="efile-fee" id="efile-fee" disabled class="form-control" value="0"> <input type="number" class="form-control" hidden name="efile-fee" id="efile-fee" value="0">  </td>';
                                echo '<td> <input type="number" class="form-control" disabled name="efile-fee1" id="efile-fee1" value="0">  </td>';
                            }
                            
                        echo '</tr>
                        <tr>
                            <td>Costo del Efile Fee a pagar a TaxWise</td>';

                            $stmt7 = "SELECT efile_taxwise_unit FROM profit WHERE office_id = $office";
                            $result7 = $conn->query($stmt7);
                            if ($result7->num_rows > 0) {
                            while($row7 = $result7->fetch_assoc()) {
                                    echo '<td> <input type="number" class="form-control" name="efile-taxwise-unit" id="efile-taxwise-unit" value="' . $row7['efile_taxwise_unit'] . '"> </td>';
                                }
                            }
                            else {
                                echo '<td><input type="number" name="efile-taxwise-unit" id="efile-taxwise-unit" class="form-control" value="0"></td>';
                            }
                            
                            
                            $stmt7 = "SELECT efile_taxwise FROM profit WHERE office_id = $office";
                            $result7 = $conn->query($stmt7);
                            if ($result7->num_rows > 0) {
                            while($row7 = $result7->fetch_assoc()) {
                                    echo '<td> <input type="number" class="form-control" disabled name="efile-taxwise" id="efile-taxwise" value="' . $row7['efile_taxwise'] . '"> <input type="number" class="form-control" hidden name="efile-taxwise" id="efile-taxwise" value="' . $row7['efile_taxwise'] . '">  </td>';
                                }
                            }
                            else {
                                echo '<td> <input type="number" name="efile-taxwise" id="efile-taxwise" disabled class="form-control" value="0"> <input type="number" class="form-control" hidden name="efile-taxwise" id="efile-taxwise" value="0">  </td>';
                            }
                            
                            echo '
                            <td></td>
                        </tr>
                        <tr>
                            <td>Fee Asignado para los Productos Bancarios</td>';

                            $stmt7 = "SELECT banking_fee_unit FROM profit WHERE office_id = $office";
                            $result7 = $conn->query($stmt7);
                            if ($result7->num_rows > 0) {
                            while($row7 = $result7->fetch_assoc()) {
                                    echo '<td> <input type="number" class="form-control" name="banking-fee-unit" id="banking-fee-unit" value="' . $row7['banking_fee_unit'] . '"> </td>';
                                }
                            }
                            else {
                                echo '<td><input type="number" name="banking-fee-unit" id="banking-fee-unit" class="form-control" value="0"></td>';
                            }
                            
                            
                            $stmt7 = "SELECT banking_fee FROM profit WHERE office_id = $office";
                            $result7 = $conn->query($stmt7);
                            if ($result7->num_rows > 0) {
                            while($row7 = $result7->fetch_assoc()) {
                                    echo '<td> <input type="number" class="form-control" disabled name="banking-fee" id="banking-fee" value="' . $row7['banking_fee'] . '"> <input type="number" class="form-control" hidden name="banking-fee" id="banking-fee" value="' . $row7['banking_fee'] . '">  </td>';
                                }
                            }
                            else {
                                echo '<td> <input type="number" name="banking-fee" id="banking-fee" disabled class="form-control" value="0"> <input type="number" class="form-control" hidden name="banking-fee" id="banking-fee" value="0">  </td>';
                            }
                            
                            echo '
                            <td></td>
                        </tr>
                        <tr>
                            <td>Comision por Fee Collect por pagar a la Oficina</td>';

                            $stmt7 = "SELECT commission_office_unit FROM profit WHERE office_id = $office";
                            $result7 = $conn->query($stmt7);
                            if ($result7->num_rows > 0) {
                            while($row7 = $result7->fetch_assoc()) {
                                    echo '<td> <input type="number" class="form-control" name="commission-office-unit" id="commission-office-unit" value="' . $row7['commission_office_unit'] . '"> </td>';
                                }
                            }
                            else {
                                echo '<td><input type="number" name="commission-office-unit" id="commission-office-unit" class="form-control" value="0"></td>';
                            }
                            
                            
                            $stmt7 = "SELECT commission_office FROM profit WHERE office_id = $office";
                            $result7 = $conn->query($stmt7);
                            if ($result7->num_rows > 0) {
                            while($row7 = $result7->fetch_assoc()) {
                                    echo '<td> <input type="number" class="form-control" disabled name="commission-office" id="commission-office" value="' . $row7['commission_office'] . '"> <input type="number" class="form-control" hidden name="commission-office" id="commission-office" value="' . $row7['commission_office'] . '">  </td>';
                                    echo '<td> <input type="number" class="form-control" disabled name="commission-office1" value="0">  </td>';
                                }
                            }
                            else {
                                echo '<td> <input type="number" name="commission-office" id="commission-office" disabled class="form-control" value="0"> <input type="number" class="form-control" hidden name="commission-office" id="commission-office" value="0">  </td>';
                                echo '<td> <input type="number" class="form-control" disabled name="commission-office1" value="0">  </td>';
                            }
                            
                            echo '</tr>
                        <tr>
                            <td>other commisions or fees</td>
                            <td></td>';


                            $stmt7 = "SELECT other_commission FROM profit WHERE office_id = $office";
                            $result7 = $conn->query($stmt7);
                            if ($result7->num_rows > 0) {
                            while($row7 = $result7->fetch_assoc()) {
                                    echo '<td> <input type="number" class="form-control" name="other-commission" id="other-commission" value="' . $row7['other_commission'] . '"> </td>';
                                    echo '<td> <input type="number" class="form-control" disabled name="other-commission1" id="other-commission1" value="0">  </td>';
                                }
                            }
                            else {
                                echo '<td> <input type="number" name="other-commission" id="other-commission" class="form-control" value="0"> </td>';
                                echo '<td> <input type="number" class="form-control" disabled name="other-commission1" id="other-commission1" value="0">  </td>';
                            }
                            
                            echo '
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td></td>
                            <td> <input type="number" class="form-control" disabled name="total-profit" id="total-profit" value="0">  </td>
                            <td> <input type="number" class="form-control" disabled name="total-cxc" id="total-cxc" value="0">  </td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-primary" id="calTotal">Calculate Totals</button>
            </div>';

                
            }
            else {
                echo '<div class="row mt-3">
                <h6>All</h6>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead class="table-warning">
                            <tr>
                                <th>Production</th>
                                <th>2024</th>
                                <th>2023</th>
                                <th>2022</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Transmision Taxes Personales - 1040</td>
                                <td>150</td>
                                <td>10</td>
                                <td>2</td>
                                <td>162</td>
                            </tr>
                            <tr>
                                <td>Transmision Taxes Corporaciones C - 1120</td>
                                <td>5</td>
                                <td></td>
                                <td></td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Transmision Taxes Corporaciones S - 1120-S</td>
                                <td>2</td>
                                <td></td>
                                <td></td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Transmision Taxes Partneship - 1165</td>
                                <td>3</td>
                                <td></td>
                                <td></td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>Total Transmisiones</td>
                                <td>160</td>
                                <td>10</td>
                                <td>2</td>
                                <td>172</td>
                            </tr>
                            <tr>
                                <td>Total Taxes con Fee Collect aprobados.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="bg-danger-subtle">25</td>
                            </tr>
                            <tr>
                                <td>Total Taxes Efile Only transmitidos.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="bg-warning-subtle">147</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead class="table-warning">
                            <tr>
                                <th>Ganancia (Perdida) </th>
                                <th>Unit Cost</th>
                                <th>Profit</th>
                                <th>CXC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Carry on from previous year</td>
                                <td></td>
                                <td>800</td>
                                <td>800</td>
                            </tr>
                            <tr>
                                <td>Venta del Programa a Cobrar</td>
                                <td></td>
                                <td>100</td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>Costo del Programa a pagar a TaxWise</td>
                                <td></td>
                                <td>-561</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Cargo a la Oficina por el Efile Fee</td>
                                <td>$4 </td>
                                <td>588</td>
                                <td>588</td>
                            </tr>
                            <tr>
                                <td>Costo del Efile Fee a pagar a TaxWise</td>
                                <td>$3 </td>
                                <td>-441</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Fee Asignado para los Productos Bancarios </td>
                                <td>$25 </td>
                                <td>625</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Comision por Fee Collect por pagar a la Oficina</td>
                                <td>$15 </td>
                                <td>-375</td>
                                <td>-375</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>636</td>
                                <td>1,013</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>';
            }

        ?>


        
	</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        
        $("#prev-year").change(function() {
            var prevYear = $("#prev-year").val();
            $("#prev-year1").val(prevYear);
        });

        $("#sale-program").change(function() {
            var saleProgram = $("#sale-program").val();
            $("#sale-program1").val(saleProgram);
        });

        $("#efile-fee-unit").change(function() {
            var efileFeeUnit = $("#efile-fee-unit").val();
            var totalEfile = $("#total-efile").val();
            var totalEfileFee = efileFeeUnit * totalEfile;
            $("#efile-fee").val(totalEfileFee);
            $("#efile-fee1").val(totalEfileFee);
        });

        $("#efile-taxwise-unit").change(function() {
            var efileTaxwiseUnit = $("#efile-taxwise-unit").val();
            var totalEfile = $("#total-efile").val();
            var totalEfileTaxwise = -(efileTaxwiseUnit * totalEfile);
            $("#efile-taxwise").val(totalEfileTaxwise);
        });

        $("#banking-fee-unit").change(function() {
            var bankingFeeUnit = $("#banking-fee-unit").val();
            var totalToCollect = $("#total-to-collect").val();
            var totalBankingFee = bankingFeeUnit * totalToCollect;
            $("#banking-fee").val(totalBankingFee);
        });

        $("#commission-office-unit").change(function() {
            var commissionOfficeUnit = $("#commission-office-unit").val();
            var totalToCollect = $("#total-to-collect").val();
            var totalCommissionOffice = (commissionOfficeUnit * totalToCollect);
            $("#commission-office").val(totalCommissionOffice);
        });

        $("#other-commission").change(function() {
            var otherCommission = $("#other-commission").val();
            $("#other-commission1").val(otherCommission);
        });

        $("#calTotal").click(function() {
            var prevYear = parseInt($("#prev-year").val()) || 0;
            var saleProgram = parseInt($("#sale-program").val()) || 0;
            var payTaxwise = parseInt($("#pay-taxwise").val()) || 0;
            var efileFee = parseInt($("#efile-fee").val()) || 0;
            var efileTaxwiseUnit = parseInt($("#efile-taxwise-unit").val()) || 0;
            var totalEfile = parseInt($("#total-efile").val()) || 0;
            var totalEfileTaxwise = -(efileTaxwiseUnit * totalEfile);
            var bankingFee = parseInt($("#banking-fee").val()) || 0;
            var commissionOffice = parseInt($("#commission-office").val()) || 0;
            var otherCommission = parseInt($("#other-commission").val()) || 0;

            var totalProfit = prevYear + saleProgram + payTaxwise + efileFee + totalEfileTaxwise + bankingFee + commissionOffice + otherCommission;

            var totalcxc = prevYear + saleProgram + efileFee + otherCommission;

            console.log(totalProfit);

            $("#total-profit").val(totalProfit);
            $("#total-cxc").val(totalcxc);
        });

    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>