<?php
// Initialize the session
include '../includes/config.php';

session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$currentYear = date("Y");
$defaultYear = $currentYear - 1;
$year=$defaultYear;

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

    <?php include("header.php"); ?> 

    <div class="container-fluid w-75">
        <div class="row mt-3">
            <div class="col-md-6">
                <h3></h3>
            </div>
            <div class="col-md-6">
                <form action="" method="get" id="searchForm">

                    <input hidden name="id"  id="id" 
                               value = "<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : ''; ?>" >
                        
                        
               
                    <!-- </select> -->
                    <label for="year">Year</label>
                    <select name="year" id="year" class="form-select" required>
                        <option value="">Select</option>
                        <?php
                        $currentYear = date("Y");
                        $defaultYear = $currentYear - 1;

                        // Loop to generate options
                        for ($year = 2020; $year <= 2030; $year++) {
                            $selected = ($year == $defaultYear) ? "selected" : ""; // Add "selected" attribute if it's the default year
                            echo "<option value='$year' $selected>$year</option>";
                        }
                        ?>
                    </select>
                    <button class="btn btn-primary mt-2" type="submit">Search</button>
                </form>
            </div>
        </div>

        <?php
        if (isset($_GET['id'])) {
            //$office = $_GET['id'];
            $user_id = $_SESSION['id'];
            $stmt = "SELECT * FROM offices WHERE user_id = $user_id";
            $result = $conn->query($stmt);
            $row = $result->fetch_assoc();
            $name = $row["company_contact_name"];
            $officeName = $row['company_name'];
            $office_id = $row['id'];

            // $officeName = $row['company_name'];
            $stmt2 = "SELECT * FROM production WHERE office_id = $office_id ORDER BY year DESC";
            $result2 = $conn->query($stmt2);

            $year1 = $_GET['year'];

            echo '<div class="row mt-3">
                    <div class="col-md-12">
                    <h5 class="d-inline me-4">Name: ' . $name .  '</h5>
                    <h5 class="d-inline me-4">Company: ' . $officeName . '</h5>
                    <form  id="productionForm" method="post">
                        <input disabled  type="hidden" name="office_id" value="' . $office_id . '">
                        <input disabled  type="hidden" name="year1" value="' . $year1 . '">
                        <table class="table table-bordered table-responsive text-nowrap">
                            <thead class="table-warning">
                                <tr>
                                    <th>Production</th>
                                    <th>' . $year1 . '</th>
                                    <th>' . $year1 - 1 . ' for ' . $year1 . '</th>
                                    <th>' . $year1 - 2 . ' for ' . $year1 . '</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>';

            // Construct the SQL query to fetch all necessary data in one go
            $stmt = "SELECT *
                                FROM production
                                WHERE office_id = $office_id AND year = $year1";

            // Execute the query
            $result = $conn->query($stmt);

            // Check if there are rows returned
            if ($result->num_rows > 0) {
                // Fetch the first row
                $row = $result->fetch_assoc();

                // Output the first row
                echo '<tr>
                                    <td>Transmision Taxes Personales - 1040</td>
                                    <td> <input disabled  class="form-control" type="number" value="' . $row['personal_tax'] . '" name="personal_tax" id="personal_tax" > </td>
                                    <td> <input disabled  class="form-control" type="number" value="' . $row['personal_tax_1'] . '" name="personal_tax_1"  id="personal_tax_1" > </td>
                                    <td> <input disabled  class="form-control" type="number" value="' . $row['personal_tax_2'] . '" name="personal_tax_2"  id="personal_tax_2"> </td>
                                    <td> <input disabled  class="form-control" type="number" name="personal_tax_total" disabled value="' . ($row['personal_tax'] + $row['personal_tax_1'] + $row['personal_tax_2']) . '"> </td>
                                </tr>';

                // Output the second row
                echo '<tr>
                                    <td>Transmision Taxes Corporaciones C - 1120</td>
                                    <td> <input disabled  class="form-control" type="number" value="' . $row['corporate_tax_c'] . '" name="corporate_tax_c"> </td>
                                    <td> <input disabled  class="form-control" type="number" value="' . $row['corporate_tax_c_1'] . '" name="corporate_tax_c_1"> </td>
                                    <td> <input disabled  class="form-control" type="number" value="' . $row['corporate_tax_c_2'] . '" name="corporate_tax_c_2"> </td>
                                    <td> <input disabled  class="form-control" type="number" disabled name="corporate_tax_c_total" value="' . ($row['corporate_tax_c'] + $row['corporate_tax_c_1'] + $row['corporate_tax_c_2']) . '"> </td>
                                </tr>';

                // Output the third row
                echo '<tr>
                                    <td>Transmision Taxes Corporaciones S - 1120-S</td>
                                    <td> <input disabled  class="form-control" type="number" value="' . $row['corporate_tax_s'] . '" name="corporate_tax_s"> </td>
                                    <td> <input disabled  class="form-control" type="number" value="' . $row['corporate_tax_s_1'] . '" name="corporate_tax_s_1"> </td>
                                    <td> <input disabled  class="form-control" type="number" value="' . $row['corporate_tax_s_2'] . '" name="corporate_tax_s_2"> </td>
                                    <td> <input disabled  class="form-control" type="number" disabled name="corporate_tax_s_total" value="' . ($row['corporate_tax_s'] + $row['corporate_tax_s_1'] + $row['corporate_tax_s_2']) . '"> </td>
                                </tr>';

                // Output the fourth row
                echo '<tr>
                                    <td>Transmision Taxes Partneship - 1165</td>
                                    <td> <input disabled  class="form-control" type="number" value="' . $row['partnership_tax'] . '" name="partnership_tax"> </td>
                                    <td> <input disabled  class="form-control" type="number" value="' . $row['partnership_tax_1'] . '" name="partnership_tax_1"> </td>
                                    <td> <input disabled  class="form-control" type="number" value="' . $row['partnership_tax_2'] . '" name="partnership_tax_2"> </td>
                                    <td> <input disabled  class="form-control" type="number" disabled name="partnership_tax_total" value="' . ($row['partnership_tax'] + $row['partnership_tax_1'] + $row['partnership_tax_2']) . '"> </td>
                                </tr>';

                // Output the fifth row
                $total_transmissions_0 = $row['personal_tax'] + $row['corporate_tax_c'] + $row['corporate_tax_s'] + $row['partnership_tax'];
                $total_transmissions_1 = $row['personal_tax_1'] + $row['corporate_tax_c_1'] + $row['corporate_tax_s_1'] + $row['partnership_tax_1'];
                $total_transmissions_2 = $row['personal_tax_1'] + $row['corporate_tax_c_1'] + $row['corporate_tax_s_1'] + $row['partnership_tax_1'];
                $total_transmissions = $total_transmissions_0 = +$total_transmissions_1 + $total_transmissions_2;

                echo '<tr>
                                    <td>Total Transmisiones</td>
                                    <td> <input disabled  class="form-control" type="number" id="transmissions"  disabled name="transmissions"       value="' . $total_transmissions_0 . '"> </td>
                                    <td> <input disabled  class="form-control" type="number" id="transmissions1" disabled name="transmissions1"      value="' . $total_transmissions_1 . '"> </td>
                                    <td> <input disabled  class="form-control" type="number" id="transmissions2" disabled name="transmissions2"      value="' . $total_transmissions_2 . '"> </td>
                                    <td> <input disabled  class="form-control" type="number" id="transmissions_total"          disabled name="transmissions_total" value="' . $total_transmissions . '"> </td>
                                </tr>
                                <tr>
                                    <td>Total Taxes con Fee Collect aprobados.</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="bg-danger-subtle"> <input disabled  class="form-control" type="number" id="to_collect" name="to_collect" value="' . $row['to_collect'] . '"> </td>
                                </tr>
                                    </tr>
                                    <tr>
                                        <td>Total Taxes Efile Only transmitidos.</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><input disabled  class="form-control" type="number" readonly id="total_efile"  name="total_efile" value="' . ($total_transmissions - $row['to_collect']) . '" ></td>
                                        </tr>
                                </tbody>
                            </table>
                                                
                        <div class="col-md-12 my-4">
                            <div class="alert d-none alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> Office information added successfully.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <input disabled  type="hidden" id="office_id" name="office_id" value="' . $office_id . '">
                            <input disabled  type="hidden" id="year1" name="year1" value="' . $year1 . '">
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
                                        <td></td>
                                        <td> <input disabled  type="number" class="form-control" id="prev-year" name="prev-year" value="' . $row['prev_year'] . '"> </td>
                                        <td> <input disabled  type="number" class="form-control" disabled name="prev-year1" id="prev-year1" value="' . $row['prev_year'] . '">  </td>
                                    </tr>
                                    <tr>
                                        <td>Venta del Programa a Cobrar</td>
                                        <td></td>
                                        <td> <input disabled  type="number" class="form-control" name="sale-program" id="sale-program" value="' . $row['sale_program'] . '"> </td> 
                                        <td> <input disabled  type="number" class="form-control" disabled name="sale-program" id="sale-program1" value="' . $row['sale_program'] . '">  </td>
                                    </tr>
                                 
                                    <tr>
                                        <td>Cargo a la Oficina por el Efile Fee</td>
                                        <td> <input disabled  type="number" class="form-control" name="efile_fee_unit" id="efile_fee_unit" value="' . $row['efile_fee_unit'] . '"> </td>
                                        <td> <input disabled  type="number" class="form-control" readonly name="efile_fee" id="efile_fee" value="' . ($row['efile_fee_unit'] * ($total_transmissions - $row['to_collect'])) . '">  </td>
                                        <td> <input disabled  type="number" class="form-control" disabled name="efile_fee_cxc" id="efile_fee_cxc" value="' . ($row['efile_fee_unit'] * ($total_transmissions - $row['to_collect'])) . '">  </td>
                                    </tr>
              
                   
                                 ';
                                if ( $row['commission_office_unit'] != 0 ) {  
                                  echo '<tr>
                                        <td>Comision por Fee Collect por pagar a la Oficina</td>
                                        <td> <input disabled  type="number" class="form-control" name="commission-office-unit" id="commission-office-unit" value="' . $row['commission_office_unit'] . '"> </td>
                                        <td> <input disabled  type="number" class="form-control" readonly name="commission-office" id="commission-office" value="' . (-1 * $row['commission_office_unit'] * $row['to_collect']) . '"> </td>
                                        <td> <input disabled  type="number" class="form-control" disabled name="commission-office-cxc" id="commission-office-cxc" value="' . (-1 * $row['commission_office_unit'] * $row['to_collect']) . '">  </td>	
                                    </tr> ';
                                        }
                                if ( $row['other_commission'] != 0 ) {      
                                  echo ' <tr>
                                        <td>other commisions or fees</td>
                                        <td></td>
                                        <td> <input disabled  type="number" class="form-control" name="other-commission" id="other-commission" value="' . $row['other_commission'] . '"> </td>
                                        <td> <input disabled  type="number" class="form-control" disabled name="other-commission1" id="other-commission1" value="' . $row['other_commission'] . '">  </td>
                                    </tr> ';
                                }
                                 echo '   <tr>
                                        <td>Total</td>
                                        <td></td>
                                        <td> <input disabled  type="number" class="form-control" disabled name="total-profit" id="total-profit" value="0">  </td>
                                        <td> <input disabled  type="number" class="form-control" disabled name="total-cxc" id="total-cxc" value="0">  </td>
                                    </tr>
									
                                </tbody>
                            </table>
                          
							
                        </div>';
                echo '<div class="col-md-12 mb-4">
                        <div class="alert d-none alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Office information added successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <p class="float-start balance">Total Paid: $<input disabled  type="number" class="balance borderless" readonly  id="total_paid" name="total_paid" ></p>
                        <p class="float-start fw-semibold balance">Balance: $<input disabled  type="number" readonly class="fw-semibold balance borderless"  class="fw-semibold balance borderless"  id="balance" name="balance" ></p>
                        <input disabled  type="hidden" id="office_id" name="office_id" value="' . $office_id . '">
                        <input disabled  type="hidden" id="year1" name="year1" value="' . $year1 . '">
                        <table class="table table-bordered text-nowrap">
                            <thead class="table-warning">
                                <tr>
                                    <th colspan="5" class="text-center">CxP</th>
                                </tr>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Amount</th>
                                    <th>Receipt #</th>
                                    <th>Date</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody id="cxpTable">
                            </tbody>
                        </table>



                        <p> <p> Other fees and Discounts , Total : $<input disabled type="number" class="balance borderless" readonly  id="total_other" name="total_other" >
                        <input type="hidden" id="office_id" name="office_id" value="' . $office . '">
                        <input type="hidden" id="year1" name="year1" value="' . $year1 . '">
                        <table class="table table-bordered text-nowrap">
                            <thead class="table-warning">
                                <tr>
                                    <th colspan="5" class="text-center"> Other fees and commisions </th>
                                </tr>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Amount</th>
                                    <th>Receipt #</th>
                                    <th>Date</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody id="otherTable">
                            </tbody>
                        </table>



                        
                        </div>';


            } else {
                echo '<tr>
                            <td>Transmision Taxes Personales - 1040</td>
                            <td> <input disabled  class="form-control" type="number" value="0" name="personal_tax"> </td>
                            <td> <input disabled  class="form-control" type="number" value="0" name="personal_tax_1"> </td>
                            <td> <input disabled  class="form-control" type="number" value="0" name="personal_tax_2"> </td>
                            <td> <input disabled  class="form-control" type="number" name="personal_tax_total" disabled value="0"> </td>
                            </tr>
                            <tr>
                            <td>Transmision Taxes Corporaciones C - 1120</td>
                            <td> <input disabled  class="form-control" type="number" value="0" name="corporate_tax_c"> </td>
                            <td> <input disabled  class="form-control" type="number" value="0" name="corporate_tax_c_1"> </td>
                            <td> <input disabled  class="form-control" type="number" value="0" name="corporate_tax_c_2"> </td>
                            <td> <input disabled  class="form-control" type="number" name="corporate_tax_c_total" disabled value="0"> </td>
                            </tr>
                            <tr>
                            <td>Transmision Taxes Corporaciones S - 1120-S</td>
                            <td> <input disabled  class="form-control" type="number" value="0" name="corporate_tax_s"> </td>
                            <td> <input disabled  class="form-control" type="number" value="0" name="corporate_tax_s_1"> </td>
                            <td> <input disabled  class="form-control" type="number" value="0" name="corporate_tax_s_2"> </td>
                            <td> <input disabled  class="form-control" type="number" name="corporate_tax_s_total" disabled value="0"> </td>
                            </tr>
                            <tr>
                            <td>Transmision Taxes Partneship - 1165</td>
                            <td> <input disabled  class="form-control" type="number" value="0" name="partnership_tax"> </td>
                            <td> <input disabled  class="form-control" type="number" value="0" name="partnership_tax_1"> </td>
                            <td> <input disabled  class="form-control" type="number" value="0" name="partnership_tax_2"> </td>
                            <td> <input disabled  class="form-control" type="number" name="partnership_tax_total" disabled value="0"> </td>
                            </tr>
                            <tr>
                            <td>Total Transmisiones</td><td> <input disabled  class="form-control" type="number" value="0" disabled name="transmissions"> </td>
                            <td> <input disabled  class="form-control" type="number" value="0" disabled name="transmissions1"> </td>
                            <td> <input disabled  class="form-control" type="number" value="0" disabled name="transmissions2"> </td>
                            <td> <input disabled  class="form-control" type="number" id="transmissions_total" name="transmissions_total" disabled value="0"> </td>
                            </tr>
                            <tr>
                            <td>Total Taxes con Fee Collect aprobados.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="bg-danger-subtle"> <input disabled  class="form-control" type="number" id="to_collect" name="to_collect" value="0"> </td>
                            </tr>
                            <tr>
                            <td>Total Taxes Efile Only transmitidos.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input disabled  class="form-control" type="number" id="total_efile"  name="total_efile" value="0" disabled></td>
                            </tr>
                            </tbody>
                            </table>';


                echo '<div class="col-md-12 my-4">
                                <div class="alert d-none alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> Office information added successfully.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <input disabled  type="hidden" id="office_id" name="office_id" value="' . $office_id . '">
                            <input disabled  type="hidden" id="year1" name="year1" value="' . $year1 . '">
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
                                        <td></td>
                                        <td><input disabled  type="number" name="prev-year" id="prev-year" class="form-control" value="0"></td>
                                        <td> <input disabled  type="number" class="form-control" disabled name="prev-year1" id="prev-year1" value="0">  </td>
                                    </tr>
                                    <tr>
                                        <td>Venta del Programa a Cobrar</td>
                                        <td></td>
                                        <td> <input disabled  type="number" name="sale-program" id="sale-program" class="form-control" value="0"> </td>
                                        <td> <input disabled  type="number" class="form-control" disabled name="sale-program" id="sale-program1" value="0">  </td>
                                    </tr>
                                
                                    <tr>
                                        <td>Cargo a la Oficina por el Efile Fee</td>
                                        <td><input disabled  type="number" name="efile_fee_unit" id="efile_fee_unit" class="form-control" value="0"></td>
                                        <td> <input disabled  type="number" name="efile_fee" id="efile_fee" disabled class="form-control" value="0"> 
										<input disabled  type="number" class="form-control" hidden name="efile_fee" id="efile_fee" value="0">  </td>
                                        <td> <input disabled  type="number" class="form-control" disabled name="efile_fee_cxc" id="efile_fee_cxc" value="0">  </td>
                                    </tr>
                                    
                            
                                    <tr>
                                        <td>Total</td>
                                        <td></td>
                                        <td> <input disabled  type="number" class="form-control" disabled name="total-profit" id="total-profit" value="0">  </td>
                                        <td> <input disabled  type="number" class="form-control" disabled name="total-cxc" id="total-cxc" value="0">  </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-primary" type="button" id="calTotal">Calculate Totals</button>
                            <button class="btn btn-success" type="submit" id="saveProfit">Save</button>
                        </div>';


                echo '<div class="col-md-12 mb-4">
                        <div class="alert d-none alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Office information added successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <p class="float-start balance">Total Paid: $<input disabled  type="number" class="balance borderless" readonly  id="total_paid" name="total_paid" ></p>
						
                        <p class="float-start fw-semibold balance">Balance: $<input disabled  type="number" class="fw-semibold balance borderless" readonly  id="balance" name="balance" ></p>
                        <button class="btn btn-primary float-end mb-2" type="button" id="addEntry">Add Entry</button>
                        <input disabled  type="hidden" id="office_id" name="office_id" value="' . $office_id . '">
                        <input disabled  type="hidden" id="year1" name="year1" value="' . $year1 . '">
                            <table class="table table-bordered text-nowrap">
                                <thead class="table-warning">
                                    <tr>
                                        <th colspan="5" class="text-center">CxP</th>
                                    </tr>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Amount</th>
                                        <th>Receipt #</th>
                                        <th>Date</th>
                                        <th>Notes</th>
                                    </tr>
                                </thead>
                                <tbody id="cxpTable">
                                </tbody>
                            </table>
                        <button class="btn btn-success" type="button" id="saveCxp">Update</button>



                        <p> <p> Other Fees and Discounts , Total : $<input disabled type="number" class="balance borderless" readonly  id="total_other" name="total_other" >

                        <button class="btn btn-primary float-end mb-2" type="button" id="addOtherEntry">Add Other Entry</button>
                       
                            <table class="table table-bordered text-nowrap">
                                <thead class="table-warning">
                                    <tr>
                                        <th colspan="5" class="text-center">Other Commissions or fees </th>
                                    </tr>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Amount</th>
                                        <th>Receipt #</th>
                                        <th>Date</th>
                                        <th>Notes</th>
                                    </tr>
                                </thead>
                                <tbody id="otherTable">
                                </tbody>
                            </table>
                        <button class="btn btn-success" type="button" id="saveOther">Update</button>

                    </div>';

            }
            echo '</form>
                    </div>';
        }

        ?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>

        function loadExistingData() {
            // Retrieve existing data from the server using AJAX
            $.ajax({
                type: 'POST',
                url: 'load-cxp.php',
                data: {
                    office_id: $('#office_id').val(),
                    year1: $('#year1').val(),
                },
                dataType: 'json',
                success: function (response) {
                    // Populate the table with existing data
                    $.each(response, function (index, entry) {
                        var newRow = '<tr id="row' + (index + 1) + '">' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td><input disabled  type="text" class="form-control" name="amount[]" value="' + entry.amount + '" /></td>' +
                            '<td><input disabled  type="text" class="form-control" name="receipt[]" value="' + entry.receipt + '" /></td>' +
                            '<td><input disabled  type="date" class="form-control" name="date[]" value="' + entry.date + '" /></td>' +
                            '<td><input disabled  type="text" class="form-control" name="notes[]" value="' + entry.notes + '" /></td>' +
                            '</tr>';

                        $('#cxpTable').append(newRow);
                    });
                    var sum = calculateSum(response);
                    // console.log('Sum of existing data: ' + sum);
                    var cxc = $("#total-cxc").val();
                    $("#balance").val(`${cxc - sum}`);
                    $("#total_paid").val(`${sum}`);

                },
                error: function (error) {
                    console.error(error);
                }
            });
        }

        
        function loadExistingOtherData() {
            // Retrieve existing data from the server using AJAX
            $.ajax({
                type: 'POST',
                url: 'load-other.php',
                data: {
                    office_id: $('#office_id').val(),
                    year1: $('#year1').val(),
                },
                dataType: 'json',
                success: function(response) {
                    // Populate the table with existing data
                    $.each(response, function(index, entry) {
                        var newRow = '<tr id="row' + (index + 1) + '">' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td><input disabled type="text" class="form-control" name="amount_o[]" value="' + entry.amount + '" /></td>' +
                            '<td><input disabled type="text" class="form-control" name="receipt_o[]" value="' + entry.receipt + '" /></td>' +
                            '<td><input disabled type="date" class="form-control" name="date_o[]" value="' + entry.date + '" /></td>' +
                            '<td><input disabled type="text" class="form-control" name="notes_o[]" value="' + entry.notes + '" /></td>' +
                            '</tr>';

                        $('#otherTable').append(newRow);
                    });
                    var sum = calculateSum(response);
                    // console.log('Sum of existing data: ' + sum);
                    var other = $("#other-commission").val();
                    $("#other-commission").val(`${sum}`);
                    $("#total_other").val(`${sum}`);
					
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }

        function calculateSum(entries) {
            var sum = 0;
            $.each(entries, function (index, entry) {
                sum += parseFloat(entry.amount) || 0;
            });
            return sum;
        }

        

        // Load existing data when the page is initially loaded
        loadExistingData();
        loadExistingOtherData();

        var rowCount = 0;

        $("#calTotal").click(calculateAll);
        calculateAll();
        $("input").change(calculateAll);
        negative();


        function calculateAll() {

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

            // console.log(totalEfile);

            var totalToCollect = $("#to_collect").val();
            //var transmissionsTotal = $("#transmissions_total").val();

            var totalEfile = transmissionsTotal.val() - totalToCollect;
            $("#total_efile").val(totalEfile);

            var efileFeeUnit = $("#efile_fee_unit").val();
            var totalEfileFee = efileFeeUnit * totalEfile;
            $("#efile_fee").val(totalEfileFee);
            $("#efile_fee_cxc").val(totalEfileFee);

            var efileFeeUnit1 = $("#efile_fee_unit_1").val();
            var totalEfileFee1 = (efileFeeUnit1 * totalToCollect);
            $("#efile_fee_1").val(totalEfileFee1);

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
            var efileFeeUnit = parseInt($("#efile_fee_unit").val()) || 0;
            var efileFeeUnit1 = parseInt($("#efile_fee_unit_1").val()) || 0;
            var efileFee = parseInt($("#efile_fee").val()) || 0;
            var efileFee1 = parseInt($("#efile_fee_1").val()) || 0;
            var efileTaxwiseUnit = parseInt($("#efile-taxwise-unit").val()) || 0;
            var efileTaxwiseUnit1 = parseInt($("#efile-taxwise-unit_1").val()) || 0;
            var efileTaxwise = parseInt($("#efile-taxwise").val()) || 0;
            var efileTaxwise1 = parseInt($("#efile-taxwise_1").val()) || 0;
            var totalEfile = parseInt($("#total_efile").val()) || 0;
            var bankingFeeUnit = parseInt($("#banking-fee-unit").val()) || 0;
            var bankingFee = parseInt($("#banking-fee").val()) || 0;
            var commissionOfficeUnit = parseInt($("#commission-office-unit").val()) || 0;
            var commissionOffice = parseInt($("#commission-office").val()) || 0;
            var otherCommission = parseInt($("#other-commission").val()) || 0;
            var year = $("#year1").val();
            var officeId = $("#office_id").val();



            var totalProfit = prevYear + saleProgram + payTaxwise + efileFee + efileTaxwise + bankingFee + efileFee1 + efileTaxwise1 + commissionOffice + otherCommission;

            var totalcxc = prevYear + saleProgram + efileFee + commissionOffice + otherCommission;

            // console.log(totalProfit);

            $("#total-profit").val(totalProfit);
            $("#total-cxc").val(totalcxc);

            var sum = 0;
            var sumOther = 0;
            $('input[name="amount[]"]').each(function () {
                var amount = parseInt($(this).val()) || 0;
                sum += amount;
            });
            $('input[name="amount_o[]"]').each(function () {
                var amount_o = parseInt($(this).val()) || 0;
                sumOther += amount_o;
            });


            // console.log("sum",sum);
            var balance = totalcxc - sum;
            $("#balance").val(balance);
            $("#total_paid").val(`${sum}`);
            $("#other-commission").val(`${sumOther}`);
            $("#total_other").val(`${sumOther}`);

            negative();

        };



        // Add Entry button click event
        $('#addEntry').on('click', function () {
            // Increment the row count
            rowCount++;

            // Add a new row to the table
            var newRow = '<tr id="row' + rowCount + '">' +
                '<td>' + rowCount + '</td>' +
                '<td><input disabled  type="text" class="form-control" name="amount[]" /></td>' +
                '<td><input disabled  type="text" class="form-control" name="receipt[]" /></td>' +
                '<td><input disabled  type="date" class="form-control" name="date[]" /></td>' + // Use type "date"
                '<td><input disabled  type="text" class="form-control" name="notes[]" /></td>' +
                '</tr>';

            $('#cxpTable').append(newRow);
        });




        function negative() {
            // Get all input elements with the class 'negativeInput'
            var inputs = $("input");

            // Loop through each input element
            for (var i = 0; i < inputs.length; i++) {
                // Call the updateColor function initially to set the initial color
                updateColor(inputs[i]);

                // Add an event listener for the 'input' event on each input
                inputs[i].addEventListener("input", function () {
                    updateColor(this);
                });
            }
        };

        function updateColor(inputElement) {
            // Get the input value and convert it to a number
            var inputValue = parseFloat(inputElement.value);

            // Check if the value is negative
            if (inputValue < 0) {
                // Apply the 'negative' class to change color to red
                inputElement.classList.add("negative");
            } else {
                // Remove the 'negative' class if the value is not negative
                inputElement.classList.remove("negative");
            }
        }









    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php include('translate.php'); ?>

</body>

</html>