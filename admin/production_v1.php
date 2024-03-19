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
                    <form action="edit-production-v1.php" id="productionForm" method="post">
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
                        
// Construct the SQL query to fetch all necessary data in one go
$stmt = "SELECT *
         FROM production
         WHERE office_id = $office AND year = $year1";

// Execute the query
$result = $conn->query($stmt);

// Check if there are rows returned
if ($result->num_rows > 0) {
    // Fetch the first row
    $row = $result->fetch_assoc();

    // Output the first row
    echo '<tr>
            <td>Transmision Taxes Personales - 1040</td>
            <td> <input class="form-control" type="number" value="' . $row['personal_tax'] . '" name="personal_tax" id="personal_tax" > </td>
            <td> <input class="form-control" type="number" value="' . $row['personal_tax_1'] . '" name="personal_tax_1"  id="personal_tax_1" > </td>
            <td> <input class="form-control" type="number" value="' . $row['personal_tax_2'] . '" name="personal_tax_2"  id="personal_tax_2"> </td>
            <td> <input class="form-control" type="number" name="personal_tax_total" disabled value="' . ($row['personal_tax'] + $row['personal_tax_1'] + $row['personal_tax_2']) . '"> </td>
          </tr>';

    // Output the second row
    echo '<tr>
            <td>Transmision Taxes Corporaciones C - 1120</td>
            <td> <input class="form-control" type="number" value="' . $row['corporate_tax_c'] . '" name="corporate_tax_c"> </td>
            <td> <input class="form-control" type="number" value="' . $row['corporate_tax_c_1'] . '" name="corporate_tax_c_1"> </td>
            <td> <input class="form-control" type="number" value="' . $row['corporate_tax_c_2'] . '" name="corporate_tax_c_2"> </td>
            <td> <input class="form-control" type="number" disabled name="corporate_tax_c_total" value="' . ($row['corporate_tax_c'] + $row['corporate_tax_c_1'] + $row['corporate_tax_c_2']) . '"> </td>
          </tr>';

    // Output the third row
    echo '<tr>
            <td>Transmision Taxes Corporaciones S - 1120-S</td>
            <td> <input class="form-control" type="number" value="' . $row['corporate_tax_s'] . '" name="corporate_tax_s"> </td>
            <td> <input class="form-control" type="number" value="' . $row['corporate_tax_s_1'] . '" name="corporate_tax_s_1"> </td>
            <td> <input class="form-control" type="number" value="' . $row['corporate_tax_s_2'] . '" name="corporate_tax_s_2"> </td>
            <td> <input class="form-control" type="number" disabled name="corporate_tax_s_total" value="' . ($row['corporate_tax_s'] + $row['corporate_tax_s_1'] + $row['corporate_tax_s_2']) . '"> </td>
          </tr>';

    // Output the fourth row
    echo '<tr>
            <td>Transmision Taxes Partneship - 1165</td>
            <td> <input class="form-control" type="number" value="' . $row['partnership_tax'] . '" name="partnership_tax"> </td>
            <td> <input class="form-control" type="number" value="' . $row['partnership_tax_1'] . '" name="partnership_tax_1"> </td>
            <td> <input class="form-control" type="number" value="' . $row['partnership_tax_2'] . '" name="partnership_tax_2"> </td>
            <td> <input class="form-control" type="number" disabled name="partnership_tax_total" value="' . ($row['partnership_tax'] + $row['partnership_tax_1'] + $row['partnership_tax_2']) . '"> </td>
          </tr>';

    // Output the fifth row
	$total_transmissions_0 = $row['personal_tax'] + $row['corporate_tax_c'] +$row['corporate_tax_s'] + $row['partnership_tax'] ; 
	$total_transmissions_1 = $row['personal_tax_1'] + $row['corporate_tax_c_1'] +$row['corporate_tax_s_1'] + $row['partnership_tax_1'] ;
	$total_transmissions_2 = $row['personal_tax_1'] + $row['corporate_tax_c_1'] +$row['corporate_tax_s_1'] + $row['partnership_tax_1'] ;
    $total_transmissions =$total_transmissions_0 =+$total_transmissions_1+$total_transmissions_2 ;
						   
    echo '<tr>
            <td>Total Transmisiones</td>
            <td> <input class="form-control" type="number" id="transmissions"  disabled name="transmissions"       value="' . $total_transmissions_0 . '"> </td>
            <td> <input class="form-control" type="number" id="transmissions1" disabled name="transmissions1"      value="' . $total_transmissions_1 . '"> </td>
            <td> <input class="form-control" type="number" id="transmissions2" disabled name="transmissions2"      value="' . $total_transmissions_2 . '"> </td>
            <td> <input class="form-control" type="number" id="transmissions_total"          disabled name="transmissions_total" value="' . $total_transmissions . '"> </td>
			     </tr>';
	 echo '<tr>
                                    <td>Total Taxes con Fee Collect aprobados.</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>';			 
          echo '<td class="bg-danger-subtle"> <input class="form-control" type="number" id="to_collect" name="to_collect" value="' . $row['to_collect'] . '"> </td>';
	              echo '</tr>';  
                            
                        echo '</tr>
                        <tr>
                            <td>Total Taxes Efile Only transmitidos.</td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>
                                <input class="form-control" type="number" id="total-efile" value="' . ($total_transmissions - $row['to_collect']) . '"   disabled>
                            </td>
                            
                            </tr>';
                        

                    echo '</tbody>
                        </table>
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
                    </thead>' ;
                   echo  '<tbody> 				
                        <tr>
                            <td>Carry on from previous year</td>
                            <td></td>';
         echo '<td> <input type="number" class="form-control" id="prev-year" name="prev-year" value="' . $row['prev_year'] . '"> </td>';
         echo '<td> <input type="number" class="form-control" disabled name="prev-year1" id="prev-year1" value="' . $row['prev_year'] . '">  </td>';
                        echo '</tr>
                        <tr>
                            <td>Venta del Programa a Cobrar</td>
                            <td></td>';
	                               echo '<td> <input type="number" class="form-control" name="sale-program" id="sale-program" value="' . $row['sale_program'] . '"> </td>';
                                    echo '<td> <input type="number" class="form-control" disabled name="sale-program" id="sale-program1" value="' . $row['sale_program'] . '">  </td>';	
                       echo '</tr>
                        <tr>
                            <td>Costo del Programa a pagar a TaxWise</td>
                            <td></td>';
                                    echo '<td> <input type="number" class="form-control" name="pay-taxwise" id="pay-taxwise" value="' . $row['pay_taxwise'] . '"> </td>';
           echo '<td></td>
                        </tr>
                        <tr>
                            <td>Cargo a la Oficina por el Efile Fee</td>';
    echo '<td> <input type="number" class="form-control" name="efile-fee-unit" id="efile-fee-unit" value="' . $row['efile_fee_unit'] . '"> </td>';
    echo '<td> <input type="number" class="form-control" disabled name="efile-fee" id="efile-fee" value="' . ($row['efile_fee_unit'] * ($total_transmissions - $row['to_collect'] )) . '"> 
	       <input type="number" class="form-control" hidden name="efile-fee" id="efile-fee" value="' . ($row['efile_fee_unit'] * ($total_transmissions - $row['to_collect'] )) . '">  </td>';
    echo '<td> <input type="number" class="form-control" disabled name="efile-fee-cxc" id="efile-fee-cxc" value="' . ($row['efile_fee_unit'] * ($total_transmissions - $row['to_collect'] )) . '">  </td>';
                    
                        echo '</tr>
                        <tr>
                            <td>Costo del Efile Fee a pagar a TaxWise</td>';
   echo '<td> <input type="number" class="form-control" name="efile-taxwise-unit" id="efile-taxwise-unit" value="' . $row['efile_taxwise_unit'] . '"> </td>';
   echo '<td> <input type="number" class="form-control" disabled name="efile-taxwise" id="efile-taxwise" value="' . (-1 * $row['efile_taxwise_unit']* ($total_transmissions - $row['to_collect'] )) . '"> 
   <input type="number" class="form-control" hidden name="efile-taxwise" id="efile-taxwise" value="' . ( -1 * $row['efile_taxwise_unit']* ($total_transmissions - $row['to_collect'] )) . '">  </td>';
	                            echo '
                            <td></td>
                        </tr>
                        <tr>
                            <td>Fee Asignado para los Productos Bancarios</td>';					
    echo '<td> <input type="number" class="form-control" name="banking-fee-unit" id="banking-fee-unit" value="' . $row['banking_fee_unit'] . '"> </td>';
    echo '<td> <input type="number" class="form-control" disabled name="banking-fee" id="banking-fee" value="' . ($row['banking_fee_unit'] * $row['to_collect'] ) . '"> 
	     <input type="number" class="form-control" hidden name="banking-fee" id="banking-fee" value="' . ($row['banking_fee_unit'] * $row['to_collect'] ) . '">  </td>';
	                     echo '
                            <td></td>
                        </tr>

                        <tr>
                            <td>Cargo a la Oficina por el Efile Fee</td>';			
	 echo '<td> <input type="number" class="form-control" name="efile-fee-unit_1" id="efile-fee-unit_1" value="' . $row['efile_fee_unit_1'] . '"> </td>';
	 echo '<td> <input type="number" class="form-control" disabled name="efile-fee_1" id="efile-fee_1" value="' . ($row['efile_fee_unit_1']* $row['to_collect'] ) . '"> 
	 <input type="number" class="form-control" hidden name="efile-fee_1" id="efile-fee_1" value="' . ($row['efile_fee_unit_1']* $row['to_collect'] ) . '">  </td>';
      echo '<td></td>';					
                        echo '</tr>
                        <tr>
                            <td>Costo del Efile Fee a pagar a TaxWise</td>';							
	  echo '<td> <input type="number" class="form-control" name="efile-taxwise-unit_1" id="efile-taxwise-unit_1" value="' . $row['efile_taxwise_unit_1'] . '"> </td>';
	 echo '<td> <input type="number" class="form-control" disabled name="efile-taxwise" id="efile-taxwise_1" value="' . (-1 * $row['efile_taxwise_unit_1']* $row['to_collect'] )  . '"> 
	 <input type="number" class="form-control" hidden name="efile-taxwise_1" id="efile-taxwise_1" value="' . (-1 * $row['efile_taxwise_unit_1']* $row['to_collect'] ) . '">  </td>';
	                           echo '
                            <td></td>
                        </tr>

                        <tr>
                            <td>Comision por Fee Collect por pagar a la Oficina</td>';
    echo '<td> <input type="number" class="form-control" name="commission-office-unit" id="commission-office-unit" value="' . $row['commission_office_unit'] . '"> </td>';
	echo '<td> <input type="number" class="form-control" disabled name="commission-offic" id="commission-office" value="' . (-1 * $row['commission_office_unit']* $row['to_collect'] ) . '"> 
	<input type="number" class="form-control" hidden name="commission-office" id="commission-office" value="' . (-1 * $row['commission_office_unit']* $row['to_collect'] ) . '">  </td>';
    echo '<td> <input type="number" class="form-control" disabled name="commission-office-cxc" id="commission-office-cxc" value="' . (-1 * $row['commission_office_unit']* $row['to_collect'] ) . '">  </td>';		
	   echo '</tr>
                        <tr>
                            <td>other commisions or fees</td>
                            <td></td>';						
	 echo '<td> <input type="number" class="form-control" name="other-commission" id="other-commission" value="' . $row['other_commission'] . '"> </td>';
     echo '<td> <input type="number" class="form-control" disabled name="other-commission1" id="other-commission1" value="' . $row['other_commission'] . '">  </td>';						
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
                <button class="btn btn-success" type="button" id="saveProfit">Save</button>
            </div>';					


		
} else {
    echo '<tr>';
    echo '<td>Transmision Taxes Personales - 1040</td>';
    echo '<td> <input class="form-control" type="number" value="0" name="personal_tax"> </td>';
    echo '<td> <input class="form-control" type="number" value="0" name="personal_tax_1"> </td>';
    echo '<td> <input class="form-control" type="number" value="0" name="personal_tax_2"> </td>';
    echo '<td> <input class="form-control" type="number" name="personal_tax_total" disabled value="0"> </td>';
    echo '</tr>';
	echo '<tr>';
    echo '<td>Transmision Taxes Corporaciones C - 1120</td>';
    echo '<td> <input class="form-control" type="number" value="0" name="corporate_tax_c"> </td>';
    echo '<td> <input class="form-control" type="number" value="0" name="corporate_tax_c_1"> </td>';
    echo '<td> <input class="form-control" type="number" value="0" name="corporate_tax_c_2"> </td>';
    echo '<td> <input class="form-control" type="number" name="corporate_tax_c_total" disabled value="0"> </td>';
    echo '</tr>';
	echo '<tr>';
    echo '<td>Transmision Taxes Corporaciones S - 1120-S</td>';
    echo '<td> <input class="form-control" type="number" value="0" name="corporate_tax_s"> </td>';
    echo '<td> <input class="form-control" type="number" value="0" name="corporate_tax_s_1"> </td>';
    echo '<td> <input class="form-control" type="number" value="0" name="corporate_tax_s_2"> </td>';
    echo '<td> <input class="form-control" type="number" name="corporate_tax_s_total" disabled value="0"> </td>';
    echo '</tr>';
	 echo '<tr>';
    echo '<td>Transmision Taxes Partneship - 1165</td>';
    echo '<td> <input class="form-control" type="number" value="0" name="partnership_tax"> </td>';
    echo '<td> <input class="form-control" type="number" value="0" name="partnership_tax_1"> </td>';
    echo '<td> <input class="form-control" type="number" value="0" name="partnership_tax_2"> </td>';
    echo '<td> <input class="form-control" type="number" name="partnership_tax_total" disabled value="0"> </td>';
    echo '</tr>';
	
	echo '<tr>';
    echo '<td>Total Transmisiones</td>';
    echo '<td> <input class="form-control" type="number" value="0" disabled name="transmissions"> </td>';
    echo '<td> <input class="form-control" type="number" value="0" disabled name="transmissions1"> </td>';
    echo '<td> <input class="form-control" type="number" value="0" disabled name="transmissions2"> </td>';
    echo '<td> <input class="form-control" type="number" id="transmissions_total" name="transmissions_total" disabled value="0"> </td>';
    echo '</tr>';
	 echo '<tr>
                                    <td>Total Taxes con Fee Collect aprobados.</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>';
     echo '<td class="bg-danger-subtle"> <input class="form-control" type="number" id="to_collect" name="to_collect" value="0"> </td>';
              echo '</tr>';  
                            
                        echo '</tr>
                        <tr>
                            <td>Total Taxes Efile Only transmitidos.</td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>
                                <input class="form-control" type="number" id="total-efile"  name="total-efile" value="0" disabled>
                            </td>
                            
                            </tr>';
                        

                    echo '</tbody>
                        </table>
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
		 echo '<td><input type="number" name="prev-year" id="prev-year" class="form-control" value="0"></td>';
       echo '<td> <input type="number" class="form-control" disabled name="prev-year1" id="prev-year1" value="0">  </td>';					
							
	                        echo '</tr>
                        <tr>
                            <td>Venta del Programa a Cobrar</td>
                            <td></td>';
		                          echo '<td> <input type="number" name="sale-program" id="sale-program" class="form-control" value="0"> </td>';
                                echo '<td> <input type="number" class="form-control" disabled name="sale-program" id="sale-program1" value="0">  </td>';				
	                       echo '</tr>
                        <tr>
                            <td>Costo del Programa a pagar a TaxWise</td>
                            <td></td>';
	                                echo '<td><input type="number" name="pay-taxwise" id="pay-taxwise" class="form-control" value="0"></td>';
           echo '<td></td>
                        </tr>
                        <tr>
                            <td>Cargo a la Oficina por el Efile Fee</td>';
	                                echo '<td><input type="number" name="efile-fee-unit" id="efile-fee-unit" class="form-control" value="0"></td>';
       echo '<td> <input type="number" name="efile-fee" id="efile-fee" disabled class="form-control" value="0"> <input type="number" class="form-control" hidden name="efile-fee" id="efile-fee" value="0">  </td>';
                                echo '<td> <input type="number" class="form-control" disabled name="efile-fee-cxc" id="efile-fee-cxc" value="0">  </td>';

                    
                        echo '</tr>
                        <tr>
                            <td>Costo del Efile Fee a pagar a TaxWise</td>';
   echo '<td><input type="number" name="efile-taxwise-unit" id="efile-taxwise-unit" class="form-control" value="0"></td>';
   echo '<td> <input type="number" name="efile-taxwise" id="efile-taxwise" disabled class="form-control" value="0"> <input type="number" class="form-control" hidden name="efile-taxwise" id="efile-taxwise" value="0">  </td>';
                            echo '
                            <td></td>
                        </tr>
                        <tr>
                            <td>Fee Asignado para los Productos Bancarios</td>';
                                echo '<td><input type="number" name="banking-fee-unit" id="banking-fee-unit" class="form-control" value="0"></td>';
                                echo '<td> <input type="number" name="banking-fee" id="banking-fee" disabled class="form-control" value="0"> <input type="number" class="form-control" hidden name="banking-fee" id="banking-fee" value="0">  </td>';
                     echo '
                            <td></td>
                        </tr>

                        <tr>
                            <td>Cargo a la Oficina por el Efile Fee</td>';
                                echo '<td><input type="number" name="efile-fee-unit_1" id="efile-fee-unit_1" class="form-control" value="0"></td>';
                   echo '<td> <input type="number" name="efile-fee_1" id="efile-fee_1" disabled class="form-control" value="0"> <input type="number" class="form-control" hidden name="efile-fee_1" id="efile-fee_1" value="0">  </td>';
                                echo '<td></td>';
                        echo '</tr>
                        <tr>
                            <td>Costo del Efile Fee a pagar a TaxWise</td>';
                                echo '<td><input type="number" name="efile-taxwise-unit_1" id="efile-taxwise-unit_1" class="form-control" value="0"></td>';
                                echo '<td> <input type="number" name="efile-taxwise_1" id="efile-taxwise_1" disabled class="form-control" value="0"> <input type="number" class="form-control" hidden name="efile-taxwise_1" id="efile-taxwise_1" value="0">  </td>';
                           echo '
                            <td></td>
                        </tr>

                        <tr>
                            <td>Comision por Fee Collect por pagar a la Oficina</td>';
                                echo '<td><input type="number" name="commission-office-unit" id="commission-office-unit" class="form-control" value="0"></td>';
                          echo '<td> <input type="number" name="commission-office" id="commission-office" disabled class="form-control" value="0"> <input type="number" class="form-control" hidden name="commission-office" id="commission-office" value="0">  </td>';
                                echo '<td> <input type="number" class="form-control" disabled name="commission-office-cxc" id="commission-office-cxc" value="0">  </td>';
							   echo '</tr>
                        <tr>
                            <td>other commisions or fees</td>
                            <td></td>';	
                           echo '<td> <input type="number" name="other-commission" id="other-commission" class="form-control" value="0"> </td>';
                                echo '<td> <input type="number" class="form-control" disabled name="other-commission1" id="other-commission1" value="0">  </td>';
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
                <button class="btn btn-success" type="button" id="saveProfit">Save</button>
            </div>';





}
// else edding

                            
                    
                                          
        }

        ?>


        
	</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>

     	$("#calTotal").click( calculateAll );
        calculateAll(); 
        $("input").change(calculateAll  ) ;

		
		function calculateAll (){

            var prevYear = $("#prev-year").val();
            $("#prev-year1").val(prevYear);    
            var saleProgram = $("#sale-program").val();
            $("#sale-program1").val(saleProgram);
		    var otherCommission = $("#other-commission").val();
            $("#other-commission1").val(otherCommission);

            //Transmissions
            var personalTax = parseInt($("input[name='personal_tax']").val());
            var corporateTaxC = parseInt($("input[name='corporate_tax_c']").val());
            var corporateTaxS = parseInt($("input[name='corporate_tax_s']").val());
            var PartnershipTax = parseInt($("input[name='partnership_tax']").val());
            var transmissions = $("input[name='transmissions']");
            
            transmissions.val(personalTax + corporateTaxC + corporateTaxS + PartnershipTax);
            
            //Transmissions 1
            var personalTax1 = parseInt($("input[name='personal_tax_1']").val());
            var corporateTaxC1 = parseInt($("input[name='corporate_tax_c_1']").val());
            var corporateTaxS1 = parseInt($("input[name='corporate_tax_s_1']").val());
            var PartnershipTax1 = parseInt($("input[name='partnership_tax_1']").val());
            var transmissions1 = $("input[name='transmissions1']");

            transmissions1.val(personalTax1 + corporateTaxC1 + corporateTaxS1 + PartnershipTax1);
            
            //Transmissions 2
            var personalTax2 = parseInt($("input[name='personal_tax_2']").val());
            var corporateTaxC2 = parseInt($("input[name='corporate_tax_c_2']").val());
            var corporateTaxS2 = parseInt($("input[name='corporate_tax_s_2']").val());
            var PartnershipTax2 = parseInt($("input[name='partnership_tax_2']").val());
            var transmissions2 = $("input[name='transmissions2']");

            transmissions2.val(personalTax2 + corporateTaxC2 + corporateTaxS2 + PartnershipTax2);

            //Totals
            var personalTaxTotal = $("input[name='personal_tax_total']");
            var corporateTaxCTotal = $("input[name='corporate_tax_c_total']");
            var corporateTaxSTotal = $("input[name='corporate_tax_s_total']");
            var PartnershipTaxTotal = $("input[name='partnership_tax_total']");
            var transmissionsTotal = $("input[name='transmissions_total']");

            personalTaxTotal.val(personalTax + personalTax1 + personalTax2);
            corporateTaxCTotal.val(corporateTaxC + corporateTaxC1 + corporateTaxC2);
            corporateTaxSTotal.val(corporateTaxS + corporateTaxS1 + corporateTaxS2);
            PartnershipTaxTotal.val(PartnershipTax + PartnershipTax1 + PartnershipTax2);
            transmissionsTotal.val(parseInt(personalTaxTotal.val()) + parseInt(corporateTaxCTotal.val()) + parseInt(corporateTaxSTotal.val()) + parseInt(PartnershipTaxTotal.val()));
            
            var totalTrans = parseInt(personalTaxTotal.val()) + parseInt(corporateTaxCTotal.val()) + parseInt(corporateTaxSTotal.val()) + parseInt(PartnershipTaxTotal.val())

            console.log(totalEfile);



            var totalToCollect = $("#to_collect").val();
            //var transmissionsTotal = $("#transmissions_total").val();
            var totalEfile = transmissionsTotal.val() - totalToCollect;
            $("#total-efile").val(totalEfile);

            var efileFeeUnit = $("#efile-fee-unit").val();
            var totalEfileFee = efileFeeUnit * totalEfile;
            $("#efile-fee").val(totalEfileFee);
            $("#efile-fee-cxc").val(totalEfileFee);

            var efileFeeUnit1 = $("#efile-fee-unit_1").val();
            var totalEfileFee1 = (efileFeeUnit1 * totalToCollect);
            $("#efile-fee_1").val(totalEfileFee1);

            var efileTaxwiseUnit = $("#efile-taxwise-unit").val();
            var totalEfileTaxwise = -(efileTaxwiseUnit * totalEfile);
            $("#efile-taxwise").val(totalEfileTaxwise);

            var efileTaxwiseUnit1 = $("#efile-taxwise-unit_1").val();
            var totalEfileTaxwise1 = -(efileTaxwiseUnit1 * totalToCollect);
            $("#efile-taxwise_1").val(totalEfileTaxwise1);

            var bankingFeeUnit = $("#banking-fee-unit").val();
            var totalBankingFee = bankingFeeUnit * totalToCollect;
            $("#banking-fee").val(totalBankingFee);

            var commissionOfficeUnit = $("#commission-office-unit").val();
            var totalCommissionOffice = -(commissionOfficeUnit * totalToCollect);
            $("#commission-office").val(totalCommissionOffice);
            $("#commission-office-cxc").val(totalCommissionOffice);

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
            var bankingFeeUnit = parseInt($("#banking-fee-unit").val()) || 0;
            var bankingFee = parseInt($("#banking-fee").val()) || 0;
            var commissionOfficeUnit = parseInt($("#commission-office-unit").val()) || 0;
            var commissionOffice = parseInt($("#commission-office").val()) || 0;
            var otherCommission = parseInt($("#other-commission").val()) || 0;
            var year = $("#year1").val();
            var officeId = $("#office_id").val();

            var totalProfit = prevYear + saleProgram + payTaxwise + efileFee + efileTaxwise + bankingFee + efileFee1 + efileTaxwise1 + commissionOffice + otherCommission;

            var totalcxc = prevYear + saleProgram + efileFee + commissionOffice + otherCommission;

            console.log(totalProfit);

            $("#total-profit").val(totalProfit);
            $("#total-cxc").val(totalcxc);



        };
		
		


        $("#saveProfit").click(function() {
            var prevYear = parseInt($("#prev-year").val()) || 0;
            var saleProgram = parseInt($("#sale-program").val()) || 0;
            var payTaxwise = parseInt($("#pay-taxwise").val()) || 0;
            var efileFeeUnit = parseInt($("#efile-fee-unit").val()) || 0;
            var efileFeeUnit1 = parseInt($("#efile-fee-unit_1").val()) || 0;
            var efileTaxwiseUnit = parseInt($("#efile-taxwise-unit").val()) || 0;
            var efileTaxwiseUnit1 = parseInt($("#efile-taxwise-unit_1").val()) || 0;
            var bankingFeeUnit = parseInt($("#banking-fee-unit").val()) || 0;
            var commissionOfficeUnit = parseInt($("#commission-office-unit").val()) || 0;
            var otherCommission = parseInt($("#other-commission").val()) || 0;
            var year = $("#year1").val();
            var officeId = $("#office_id").val();

            $.ajax({
                type: "POST",
                url: "edit-profit-v1.php",
                data: {
                    officeId: officeId,
                    year: year,
                    prevYear: prevYear,
                    saleProgram: saleProgram,
                    payTaxwise: payTaxwise,
                    efileFeeUnit: efileFeeUnit,
                    efileFeeUnit1: efileFeeUnit1,
                    efileTaxwiseUnit: efileTaxwiseUnit,
                    efileTaxwiseUnit1: efileTaxwiseUnit1,
                    bankingFeeUnit: bankingFeeUnit,
                    commissionOfficeUnit: commissionOfficeUnit,
                    otherCommission: otherCommission,
                },
                success: function(data) {
                    console.log(data);
                    $(".alert").removeClass("d-none");
                    $("#productionForm").submit();
                }
            });

        });

    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>