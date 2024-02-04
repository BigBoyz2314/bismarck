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
                    <select name="id" class="form-select" id="id" required>
                        <option value="">Select</option>
                        <?php
                        
                            include '../includes/config.php'; 
                            $stmt = ("SELECT id, company_contact_name FROM offices");
                            $result = mysqli_query($conn, $stmt);
                            while($row = mysqli_fetch_array($result)) {
                                $company_contact_name = str_replace('_', ' ', $row['company_contact_name']);
                                echo "<option value='" . $row['id'] ."'>" . $company_contact_name ."</option>";
                            }

                        ?>
                    </select>
                    <!-- <label for="company">Company Name</label> -->
                    <!-- <select name="company" class="form-select" id="company" required>
                        <option value="">Select</option> -->
                        <?php
                        
                            // include '../includes/config.php'; 
                            // $stmt = ("SELECT id, company_name FROM offices");
                            // $result = mysqli_query($conn, $stmt);
                            // while($row = mysqli_fetch_array($result)) {
                            //     echo "<option value='" . $row['id'] ."'>" . $row['company_name'] ."</option>";
                            // }

                        ?>
                    <!-- </select> -->
                    <label for="year">Year</label>
                    <select name="year" id="year" class="form-select" required>
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
                    </select>
                    <button class="btn btn-primary mt-2" type="submit">Search</button>
                </form>
            </div>
        </div>


        <?php
        
            if (isset($_GET['id'])) {
                $office = $_GET['id'];

                $stmt = "SELECT * FROM offices WHERE id = $office";
                $result = $conn->query($stmt);
                $row = $result->fetch_assoc();
                $name = $row["company_contact_name"];
                $officeName = $row['company_name'];

                // $officeName = $row['company_name'];
                $stmt2 = "SELECT * FROM production WHERE office_id = $office ORDER BY year DESC";
                $result2 = $conn->query($stmt2);

                $year1 = $_GET['year'];

                    echo '<div class="row mt-3">
                    <div class="col-md-12">
                    <h6 class="d-inline me-4">Name: ' . $name . '</h6>
                    <h6 class="d-inline me-4">Company: ' . $officeName . '</h6>
                    <form action="edit-production.php" method="post">
                        <input type="hidden" name="office_id" value="' . $office . '">
                        <input type="hidden" name="year1" value="' . $year1 . '">
                        <table class="table table-bordered table-responsive text-nowrap">
                            <thead class="table-warning">
                                <tr>
                                    <th>Production</th>
                                    <th>'. $year1 .'</th>
                                    <th>'. $year1-1 .' for '. $year1 .'</th>
                                    <th>'. $year1-2 .' for '. $year1 .'</th>
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
                                    echo '<td> <input class="form-control" value="' . $row3['personal_tax'] . '" name="personal_tax"> </td>';
                                }
                                }
                                else {
                                    echo '<td> <input class="form-control" value="0" name="personal_tax"> </td>';
                                }
                                
                                $stmt4 = "SELECT * FROM production WHERE office_id = $office AND year = $year1";
                                $result4 = $conn->query($stmt4);
                                if ($result4->num_rows > 0) {
                                while($row4 = $result4->fetch_assoc()) {
                                    echo '<td> <input class="form-control" value="' . $row4['personal_tax_1'] . '" name="personal_tax_1"> </td>';
                                }
                                }
                                else {
                                    echo '<td> <input class="form-control" value="0" name="personal_tax_1"> </td>';
                                }
                                $stmt5 = "SELECT * FROM production WHERE office_id = $office AND year = $year1";
                                $result5 = $conn->query($stmt5);
                                if ($result5->num_rows > 0) {
                                while($row5 = $result5->fetch_assoc()) {
                                        echo '<td> <input class="form-control" value="' . $row5['personal_tax_2'] . '" name="personal_tax_2"> </td>';
                                    }
                                }
                                else {
                                    echo '<td> <input class="form-control" value="0" name="personal_tax_2"> </td>';
                                }
                                $stmt6 = "SELECT year, SUM(personal_tax + personal_tax_1 + personal_tax_2) AS personal_total FROM production WHERE office_id = $office AND year IN ($year1)";
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
                                echo '<td> <input class="form-control" value="' . $row3['corporate_tax_c'] . '" name="corporate_tax_c"> </td>';
                            }
                            }
                            else {
                                echo '<td> <input class="form-control" value="0" name="corporate_tax_c"> </td>';
                            }
                            $stmt4 = "SELECT * FROM production WHERE office_id = $office AND year = $year1";
                            $result4 = $conn->query($stmt4);
                            if ($result4->num_rows > 0) {
                            while($row4 = $result4->fetch_assoc()) {
                                echo '<td> <input class="form-control" value="' . $row4['corporate_tax_c_1'] . '" name="corporate_tax_c_1"> </td>';
                            }
                            }
                            else {
                                echo '<td> <input class="form-control" value="0" name="corporate_tax_c_1"> </td>';
                            }
                            $stmt5 = "SELECT * FROM production WHERE office_id = $office AND year = $year1";
                            $result5 = $conn->query($stmt5);
                            if ($result5->num_rows > 0) {
                            while($row5 = $result5->fetch_assoc()) {
                                echo '<td> <input class="form-control" value="' . $row5['corporate_tax_c_2'] . '" name="corporate_tax_c_2"> </td>';
                            }
                            }
                            else {
                                echo '<td> <input class="form-control" value="0" name="corporate_tax_c_2"> </td>';
                            }
                            $stmt6 = "SELECT year, SUM(corporate_tax_c + corporate_tax_c_1 + corporate_tax_c_2) AS corporate_tax_c_total FROM production WHERE office_id = $office AND year IN ($year1)";
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
                                echo '<td> <input class="form-control" value="' . $row3['corporate_tax_s'] . '" name="corporate_tax_s"> </td>';
                            }
                            }
                            else {
                                echo '<td> <input class="form-control" value="0" name="corporate_tax_s"> </td>';
                            }
                            $stmt4 = "SELECT * FROM production WHERE office_id = $office AND year = $year1";
                            $result4 = $conn->query($stmt4);
                            if ($result4->num_rows > 0) {
                            while($row4 = $result4->fetch_assoc()) {
                                echo '<td> <input class="form-control" value="' . $row4['corporate_tax_s_1'] . '" name="corporate_tax_s_1"> </td>';
                            }
                            }
                            else {
                                echo '<td> <input class="form-control" value="0" name="corporate_tax_s_1"> </td>';
                            }
                            $stmt5 = "SELECT * FROM production WHERE office_id = $office AND year = $year1";
                            $result5 = $conn->query($stmt5);
                            if ($result5->num_rows > 0) {
                            while($row5 = $result5->fetch_assoc()) {
                                echo '<td> <input class="form-control" value="' . $row5['corporate_tax_s_2'] . '" name="corporate_tax_s_2"> </td>';
                            }
                            }
                            else {
                                echo '<td> <input class="form-control" value="0" name="corporate_tax_s_2"> </td>';
                            }
                            $stmt6 = "SELECT year, SUM(corporate_tax_s + corporate_tax_s_1 + corporate_tax_s_2) AS corporate_tax_s_total FROM production WHERE office_id = $office AND year IN ($year1)";
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
                                echo '<td> <input class="form-control" value="' . $row3['partnership_tax'] . '" name="partnership_tax"> </td>';
                            }
                            }
                            else {
                                echo '<td> <input class="form-control" value="0" name="partnership_tax"> </td>';
                            }
                            $stmt4 = "SELECT * FROM production WHERE office_id = $office AND year = $year1";
                            $result4 = $conn->query($stmt4);
                            if ($result4->num_rows > 0) {
                            while($row4 = $result4->fetch_assoc()) {
                                echo '<td> <input class="form-control" value="' . $row4['partnership_tax_1'] . '" name="partnership_tax_1"> </td>';
                            }
                            }
                            else {
                                echo '<td> <input class="form-control" value="0" name="partnership_tax_1"> </td>';
                            }
                            $stmt5 = "SELECT * FROM production WHERE office_id = $office AND year = $year1";
                            $result5 = $conn->query($stmt5);
                            if ($result5->num_rows > 0) {
                            while($row5 = $result5->fetch_assoc()) {
                                echo '<td> <input class="form-control" value="' . $row5['partnership_tax_2'] . '" name="partnership_tax_2"> </td>';
                            }
                            }
                            else {
                                echo '<td> <input class="form-control" value="0" name="partnership_tax_2"> </td>';
                            }
                            $stmt6 = "SELECT year, SUM(partnership_tax + partnership_tax_1 + partnership_tax_2 ) AS partnership_tax_total FROM production WHERE office_id = $office AND year IN ($year1)";
                            $result6 = $conn->query($stmt6);
                            if ($result6->num_rows > 0) {
                            while($row6 = $result6->fetch_assoc()) {
                                    echo '<td> <input class="form-control" disabled value="' . $row6['partnership_tax_total'] . '"> </td>';
                                }
                            }
                            else {
                                echo '<td> <input class="form-control" disabled value="0"> </td>';
                            } 

                        echo '<tr>
                            <td>Total Transmisiones</td>
                            ';
                            $stmt3 = "SELECT * FROM production WHERE office_id = $office AND year = $year1";
                            $result3 = $conn->query($stmt3);
                            if ($result3->num_rows > 0) {
                                while($row3 = $result3->fetch_assoc()) {
                                        echo '<td> <input class="form-control" disabled value="' . $row3['total_transmissions'] . '"> </td>';
                                    }
                            }
                            else {
                                echo '<td> <input class="form-control" disabled value="0"> </td>';
                            }
                            $stmt4 = "SELECT * FROM production WHERE office_id = $office AND year = $year1";
                            $result4 = $conn->query($stmt4);
                            if ($result4->num_rows > 0) {
                                while($row4 = $result4->fetch_assoc()) {
                                    echo '<td> <input class="form-control" disabled value="' . $row4['total_transmissions_1'] . '"> </td>';
                                }
                            }
                            else {
                                echo '<td> <input class="form-control" disabled value="0"> </td>';
                            }
                            $stmt5 = "SELECT * FROM production WHERE office_id = $office AND year = $year1";
                            $result5 = $conn->query($stmt5);
                            if ($result5->num_rows > 0) {
                                while($row5 = $result5->fetch_assoc()) {
                                    echo '<td> <input class="form-control" disabled value="' . $row5['total_transmissions_2'] . '"> </td>';
                                }
                            }
                            else {
                                echo '<td> <input class="form-control" disabled value="0"> </td>';
                            }
                            $stmt6 = "SELECT total_transmissions_total FROM production WHERE office_id = $office AND year IN ($year1)";
                            $result6 = $conn->query($stmt6);
                            if ($result6->num_rows > 0) {
                                while($row6 = $result6->fetch_assoc()) {
                                        echo '<td> <input class="form-control" id="efile" disabled value="' . $row6['total_transmissions_total'] . '"> </td>';
                                    }
                                }
                                else {
                                    echo '<td> <input class="form-control" disabled value="0"> </td>';
                                }

                                echo '</tr>';
                                echo '<tr>
                                    <td>Total Taxes con Fee Collect aprobados.</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>';
                                    
                                    $stmt6 = "SELECT to_collect FROM production WHERE office_id = $office AND year IN ($year1)";
                                    $result6 = $conn->query($stmt6);
                                    if ($result6->num_rows > 0) {
                                    while($row6 = $result6->fetch_assoc()) {
                                            echo '<td class="bg-danger-subtle"> <input class="form-control" id="total-to-collect" name="to_collect" value="' . $row6['to_collect'] . '"> </td>';
                                        }
                                    }
                                    else {
                                        echo '<td class="bg-danger-subtle"> <input class="form-control" id="total-to-collect" name="to_collect" value="0"> </td>';
                                    }
        
                                echo '</tr>';  
                            
                        echo '</tr>
                        <tr>
                            <td>Total Taxes Efile Only transmitidos.</td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>
                                <input class="form-control" id="total-efile" value="0" disabled>
                            </td>
                            
                            </tr>';
                        

                    echo '</tbody>
                        </table>
                        <button class="btn btn-success mt-2" type="submit">Save</button>
                    </form>
                    </div>';

                echo '<div class="col-md-12 my-4">
                    <div class="alert d-none alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Office information added successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <input type="hidden" id="office_id" name="office_id" value="' . $office . '">
                <input type="hidden" id="year1" name="year1" value="' . $year1 . '">
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
                                    echo '<td> <input type="number" class="form-control" id="prev-year" name="prev-year" value="' . $row7['prev_year'] . '"> </td>';
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
                                    echo '<td> <input type="number" class="form-control" disabled name="efile_fee" id="efile_fee" value="' . $row7['efile_fee'] . '"> <input type="number" class="form-control" hidden name="efile-fee" id="efile-fee" value="' . $row7['efile_fee'] . '">  </td>';
                                    echo '<td> <input type="number" class="form-control" disabled name="efile-fee1" id="efile-fee1" value="' . $row7['efile_fee'] . '">  </td>';
                                }
                            }
                            else {
                                echo '<td> <input type="number" name="efile-fee" id="efile_fee" disabled class="form-control" value="0"> <input type="number" class="form-control" hidden name="efile-fee" id="efile-fee" value="0">  </td>';
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
                            <td>Cargo a la Oficina por el Efile Fee</td>';

                            $stmt7 = "SELECT efile_fee_unit_1 FROM profit WHERE office_id = $office";
                            $result7 = $conn->query($stmt7);
                            if ($result7->num_rows > 0) {
                            while($row7 = $result7->fetch_assoc()) {
                                    echo '<td> <input type="number" class="form-control" name="efile-fee-unit_1" id="efile-fee-unit_1" value="' . $row7['efile_fee_unit_1'] . '"> </td>';
                                }
                            }
                            else {
                                echo '<td><input type="number" name="efile-fee-unit_1" id="efile-fee-unit_1" class="form-control" value="0"></td>';
                            }
                            
                            
                            $stmt7 = "SELECT efile_fee_1 FROM profit WHERE office_id = $office";
                            $result7 = $conn->query($stmt7);
                            if ($result7->num_rows > 0) {
                            while($row7 = $result7->fetch_assoc()) {
                                    echo '<td> <input type="number" class="form-control" disabled name="efile-fee_1" id="efile-fee_1" value="' . $row7['efile_fee_1'] . '"> <input type="number" class="form-control" hidden name="efile-fee_1" id="efile-fee_1" value="' . $row7['efile_fee_1'] . '">  </td>';
                                    echo '<td> <input type="number" class="form-control" disabled name="efile-fee1_1" id="efile-fee1_1" value="' . $row7['efile_fee_1'] . '">  </td>';
                                }
                            }
                            else {
                                echo '<td> <input type="number" name="efile-fee_1" id="efile-fee_1" disabled class="form-control" value="0"> <input type="number" class="form-control" hidden name="efile-fee_1" id="efile-fee_1" value="0">  </td>';
                                echo '<td> <input type="number" class="form-control" disabled name="efile-fee1_1" id="efile-fee1_1" value="0">  </td>';
                            }
                            
                        echo '</tr>
                        <tr>
                            <td>Costo del Efile Fee a pagar a TaxWise</td>';

                            $stmt7 = "SELECT efile_taxwise_unit_1 FROM profit WHERE office_id = $office";
                            $result7 = $conn->query($stmt7);
                            if ($result7->num_rows > 0) {
                            while($row7 = $result7->fetch_assoc()) {
                                    echo '<td> <input type="number" class="form-control" name="efile-taxwise-unit_1" id="efile-taxwise-unit_1" value="' . $row7['efile_taxwise_unit_1'] . '"> </td>';
                                }
                            }
                            else {
                                echo '<td><input type="number" name="efile-taxwise-unit_1" id="efile-taxwise-unit_1" class="form-control" value="0"></td>';
                            }
                            
                            
                            $stmt7 = "SELECT efile_taxwise_1 FROM profit WHERE office_id = $office";
                            $result7 = $conn->query($stmt7);
                            if ($result7->num_rows > 0) {
                            while($row7 = $result7->fetch_assoc()) {
                                    echo '<td> <input type="number" class="form-control" disabled name="efile-taxwise" id="efile-taxwise_1" value="' . $row7['efile_taxwise_1'] . '"> <input type="number" class="form-control" hidden name="efile-taxwise_1" id="efile-taxwise_1" value="' . $row7['efile_taxwise_1'] . '">  </td>';
                                }
                            }
                            else {
                                echo '<td> <input type="number" name="efile-taxwise_1" id="efile-taxwise_1" disabled class="form-control" value="0"> <input type="number" class="form-control" hidden name="efile-taxwise_1" id="efile-taxwise_1" value="0">  </td>';
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
                                    echo '<td> <input type="number" class="form-control" disabled name="commission-office1" value="' . $row7['commission_office'] . '">  </td>';
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
                                    echo '<td> <input type="number" class="form-control" disabled name="other-commission1" id="other-commission1" value="' . $row7['other_commission'] . '">  </td>';
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
                <button class="btn btn-primary" type="button" id="calTotal">Calculate Totals</button>
                <button class="btn btn-success ms-2" id="submit" type="submit">Save</button>
            </div>';
        }

        ?>


        
	</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>

        $toCollect = $("#total-to-collect").val();
        $efile = $("#efile").val();
        $totalEfile = $efile - $toCollect;
        $("#total-efile").val($totalEfile);

        $("#total-to-collect").change(function() {
            var totalToCollect = $("#total-to-collect").val();
            var efile = $("#efile").val();
            var totalEfile = efile - totalToCollect;
            $("#total-efile").val(totalEfile);
        });
        
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
            $("#efile-fee").val(parseInt(totalEfileFee));
            $("#efile_fee").val(totalEfileFee);
            $("#efile-fee1").val(totalEfileFee);
        });
        
        $("#efile-fee-unit_1").change(function() {
            var efileFeeUnit = $("#efile-fee-unit_1").val();
            var totalEfile = $("#total-efile").val();
            var totalEfileFee = efileFeeUnit * totalEfile;
            $("#efile-fee_1").val(totalEfileFee);
            $("#efile-fee1_1").val(totalEfileFee);
        });

        $("#efile-taxwise-unit").change(function() {
            var efileTaxwiseUnit = $("#efile-taxwise-unit").val();
            var totalEfile = $("#total-efile").val();
            var totalEfileTaxwise = -(efileTaxwiseUnit * totalEfile);
            $("#efile-taxwise").val(totalEfileTaxwise);
        });

        $("#efile-taxwise-unit_1").change(function() {
            var efileTaxwiseUnit = $("#efile-taxwise-unit_1").val();
            var totalEfile = $("#total-efile").val();
            var totalEfileTaxwise = -(efileTaxwiseUnit * totalEfile);
            $("#efile-taxwise_1").val(totalEfileTaxwise);
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
            var efileFeeUnit = parseInt($("#efile-fee-unit").val()) || 0;
            var efileFeeUnit1 = parseInt($("#efile-fee-unit_1").val()) || 0;
            var efileFee = parseInt($("#efile-fee").val()) || 0;
            var efileFee1 = parseInt($("#efile-fee_1").val()) || 0;
            var efileTaxwiseUnit = parseInt($("#efile-taxwise-unit").val()) || 0;
            var efileTaxwiseUnit1 = parseInt($("#efile-taxwise-unit_1").val()) || 0;
            var efileTaxwise = parseInt($("#efile-taxwise").val()) || 0;
            var efileTaxwise1 = parseInt($("#efile-taxwise_1").val()) || 0;
            var totalEfile = parseInt($("#total-efile").val()) || 0;
            var totalEfileTaxwise = -(efileTaxwiseUnit * totalEfile);
            var bankingFeeUnit = parseInt($("#banking-fee-unit").val()) || 0;
            var bankingFee = parseInt($("#banking-fee").val()) || 0;
            var commissionOfficeUnit = parseInt($("#commission-office-unit").val()) || 0;
            var commissionOffice = parseInt($("#commission-office").val()) || 0;
            var otherCommission = parseInt($("#other-commission").val()) || 0;
            var year = $("#year1").val();
            var officeId = $("#office_id").val();

            var totalProfit = prevYear + saleProgram + payTaxwise + efileFee + totalEfileTaxwise + bankingFee + commissionOffice + otherCommission;

            var totalcxc = prevYear + saleProgram + efileFee + otherCommission;

            console.log(totalProfit);

            $("#total-profit").val(totalProfit);
            $("#total-cxc").val(totalcxc);

        });

        $("#submit").click(function() {
            var prevYear = parseInt($("#prev-year").val()) || 0;
            var saleProgram = parseInt($("#sale-program").val()) || 0;
            var payTaxwise = parseInt($("#pay-taxwise").val()) || 0;
            var efileFeeUnit = parseInt($("#efile-fee-unit").val()) || 0;
            var efileFeeUnit1 = parseInt($("#efile-fee-unit_1").val()) || 0;
            var efileFee = parseInt($("#efile-fee").val()) || 0;
            var efileFee1 = parseInt($("#efile-fee_1").val()) || 0;
            var efileTaxwiseUnit = parseInt($("#efile-taxwise-unit").val()) || 0;
            var efileTaxwiseUnit1 = parseInt($("#efile-taxwise-unit_1").val()) || 0;
            var efileTaxwise = parseInt($("#efile-taxwise").val()) || 0;
            var efileTaxwise1 = parseInt($("#efile-taxwise_1").val()) || 0;
            var totalEfile = parseInt($("#total-efile").val()) || 0;
            var totalEfileTaxwise = -(efileTaxwiseUnit * totalEfile);
            var bankingFeeUnit = parseInt($("#banking-fee-unit").val()) || 0;
            var bankingFee = parseInt($("#banking-fee").val()) || 0;
            var commissionOfficeUnit = parseInt($("#commission-office-unit").val()) || 0;
            var commissionOffice = parseInt($("#commission-office").val()) || 0;
            var otherCommission = parseInt($("#other-commission").val()) || 0;
            var year = $("#year1").val();
            var officeId = $("#office_id").val();

            $.ajax({
                type: "POST",
                url: "edit-profit.php",
                data: {
                    officeId: officeId,
                    year: year,
                    prevYear: prevYear,
                    saleProgram: saleProgram,
                    payTaxwise: payTaxwise,
                    efileFeeUnit: efileFeeUnit,
                    efileFeeUnit1: efileFeeUnit1,
                    efileFee: efileFee,
                    efileFee1: efileFee1,
                    efileTaxwiseUnit: efileTaxwiseUnit,
                    efileTaxwiseUnit1: efileTaxwiseUnit1,
                    efileTaxwise: efileTaxwise,
                    efileTaxwise1: efileTaxwise1,
                    bankingFeeUnit: bankingFeeUnit,
                    bankingFee: bankingFee,
                    commissionOfficeUnit: commissionOfficeUnit,
                    commissionOffice: commissionOffice,
                    otherCommission: otherCommission,
                },
                success: function(data) {
                    console.log(data);
                    $(".alert").removeClass("d-none");
                }
            });

        });

    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>