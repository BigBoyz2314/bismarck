<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$currentYear = date("Y");
$defaultYear = $currentYear - 1;
$year = $defaultYear ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offices</title>
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
                    <a class="nav-link active" href="office.php?year=<?php echo "$defaultYear"; ?> ">Offices</a>
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
	<div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Offices</h3>
                <br><br>
                <?php
                    if (isset($_GET['year'])) {
                        echo "<h4>Year: ".$_GET['year']."</h4>";
                    }
                    else{
                        echo "<h4>Year: ALL</h4>";
                    }
                ?>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <h6>Advanced Search</h6>
                        <div class="d-block">
                            <input type="radio" name="adv-search" id="" value="all" checked>
                            <label for="all">All</label>
                        </div>
                        <div class="d-block">
                            <input type="radio" name="adv-search" id="" value="online">
                            <label for="online">TaxWise Online</label>
                        </div>
                        <div class="d-block">
                            <input type="radio" name="adv-search" id="" value="desktop">
                        <label for="desktop">TaxWise Desktop</label>
                        </div>
                        <div class="d-block">
                            <input type="radio" name="adv-search" id="" value="student">
                            <label for="student">Student</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <form action="" method="get">
                        <h6>Office Status</h6>
                        <select class="form-select" name="officeStatus" id="">
                            <option value="All">All</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Released">Released</option>
                            <option value="EFINPending">EFIN Pending</option>
                            <option value="BalancePending">Balance Pending</option>
                        </select>
                    </div>
					
					
					
                    <div class="col-md-5 mb-2">
                        <h6>Year</h6>
                        <select name="year" id="year" class="form-select" required>
                            <option value="All">All</option>
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
                        <input type="text" id="search" class="form-control mt-4" placeholder="Search...">
                    </div>
                </form>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive d-block w-100 table-bordered office-table" id="table">
                    <?php
                        include_once '../includes/config.php';
                        if(isset($_GET['officeStatus']) && $_GET['officeStatus'] != "All") {
                            $officeStatus = $_GET['officeStatus'];
                            $sql = "SELECT * FROM offices WHERE status = '$officeStatus'";
                        }
                        else {
                            $sql = "SELECT * FROM offices";
                        }
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);
                        if ($resultCheck > 0) {
                            echo "<thead>
                                    <tr class='text-center'>
                                        <th>EFIN</th>
                                        <th>Client ID</th>
                                        <th>PID</th>
                                        <th>Office Name</th>
                                        <th>Contact Name</th>
                                        <th>Phone</th>
                                        <th>Email Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Registration Code</th>
                                        <th>Office Status</th>
                                        <th>Bank App Status</th>
                                        <th>Balance</th>
                                        <th>Received</th>
                                        <th>Soft</th>
                                        <th>Efile Fee</th>
                                        <th>Bank Fee  </th>
                                        <th>Coms</th>
                                    </tr>
                                </thead>
                                <tbody>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr class='text-center'>
                                        <td>".$row['preparer_efin']."</td>
                                        <td>".$row['office_ClientID']."</td>
                                        <td>".$row['preparer_ptin']."</td>
                                        <td><a href='office-info.php?name=".$row['user_id']."' class='text-decoration-none'>".$row['company_name']."</a></td>
                                        <td>".$row['company_contact_name']."</td>
                                        <td>".$row['company_contact_phone']."</td>
                                        <td>".$row['company_contact_email']."</td>
                                        <td>".$row['company_city']."</td>
                                        <td>".$row['company_state']."</td>";
                                        if (isset($_GET['year']) && $_GET['year'] != "All") {
                                            $year = $_GET['year'];
                                        $sql2 = "SELECT * FROM registration_codes WHERE user_id = ".$row['user_id']." AND year = ".$year." ORDER BY year DESC LIMIT 1";
                                        $result2 = mysqli_query($conn, $sql2);
                                        $resultCheck2 = mysqli_num_rows($result2);
                                        if ($resultCheck2 > 0) {
                                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                                echo "<td>".$row2['reg_code']."</td>";
                                            }
                                        } else {
                                            echo "<td></td>";
                                        }
                                     
									} 
									else{
										
										 $sql2 = "SELECT * FROM registration_codes WHERE user_id = ".$row['user_id']." ORDER BY year DESC LIMIT 1";
                                        $result2 = mysqli_query($conn, $sql2);
                                        $resultCheck2 = mysqli_num_rows($result2);
                                        if ($resultCheck2 > 0) {
                                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                                echo "<td>".$row2['reg_code']."</td>";
                                            }
                                        } else {
                                            echo "<td></td>";
                                        }
                                       
										
									}

                                    $status = $row['status'];

                                    echo "<td> 
                                    <select class='form-select officeStatus' name='officeStatus" . $row['id'] . "' id='officeStatus'>";
                                        echo "<option></option>";
                                        echo "<option value='Active' " . ($status == 'Active' ? 'selected' : '') . ">Active</option>";
                                        echo "<option value='Inactive' " . ($status == 'Inactive' ? 'selected' : '') . ">Inactive</option>";
                                        echo "<option value='Released' " . ($status == 'Released' ? 'selected' : '') . ">Released</option>";
                                        echo "<option value='EFINPending' " . ($status == 'EFINPending' ? 'selected' : '') . ">EFIN Pending</option>";
                                        echo "<option value='BalancePending' " . ($status == 'BalancePending' ? 'selected' : '') . ">Balance Pending</option>";
                                    echo "</select>
                                        </td>";

                                    $bank_status = $row['bank_status'];

                                    echo "<td> 
                                    <select class='form-select bankApStatus' name='bankApStatus" . $row['id'] . "' id='bankApStatus'>";
                                        echo "<option></option>";
                                        echo "<option value='Aproved' " . ($bank_status == 'Aproved' ? 'selected' : '') . ">Aproved</option>";
                                        echo "<option value='PendingAp' " . ($bank_status == 'PendingAp' ? 'selected' : '') . ">Pending Approval</option>";
                                        echo "<option value='NotApplied' " . ($bank_status == 'NotApplied' ? 'selected' : '') . ">Not Applied</option>";
                                    echo "</select>
                                        </td>";



                                        if (isset($_GET['year']) && $_GET['year'] != "All") {
                                            $year = $_GET['year'];
                                            $sql3 = "SELECT * FROM production WHERE office_id = ".$row['id']." AND year = ".$year."";
                                            $result3 = mysqli_query($conn, $sql3);
                                            $resultCheck3 = mysqli_num_rows($result3);
                                            if ($resultCheck3 > 0) {
                                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                                    //echo "<td>".$row3['balance']."</td>";
                                                echo "<td><a href='production.php?id=".$row['id']. '&year=' . $year ."' class='text-decoration-none'>".$row3['balance']."</a></td> ";

									                echo "<td>".$row3['total_paid']."</td>";
                                                    echo "<td>".$row3['sale_program']."</td>";
                                                    echo "<td>".$row3['efile_fee']."</td>";                                           
													echo "<td>".$row3['banking_fee']."</td>";
													echo "<td>".$row3['commission_office']."</td>";
													   }
                                            } else {
                                                echo "<td></td>";
                                                echo "<td></td>";
                                                echo "<td></td>";
												echo "<td></td>";
                                                echo "<td></td>";
                                                echo "<td></td>";
                                            }

                                           

                                            
                                               
                                            

                                        } elseif (!isset($_GET['year']) || $_GET['year'] == "All") {
											
											
											 $sql_production = "SELECT 
                                SUM(balance) as balance,
                                SUM(total_paid) as total_paid,
                                SUM(sale_program) as sale_program,
                                SUM(efile_fee) as efile_fee,
                                SUM(banking_fee) as banking_fee,
								SUM(commission_office) as commission_office
                            FROM 
                                production 
                            WHERE 
                                office_id = ".$row['id']."";
        $result_production = $conn->query($sql_production);
        if (!$result_production) {
            echo "<td></td><td></td><td></td><td></td><td></td><td></td>";
        } elseif ($result_production->num_rows > 0) {
            $row_production = $result_production->fetch_assoc();
            echo "<td>".$row_production['balance']."</td>";
            echo "<td>".$row_production['total_paid']."</td>";
            echo "<td>".$row_production['sale_program']."</td>";
            echo "<td>".$row_production['efile_fee']."</td>";
            echo "<td>".$row_production['banking_fee']."</td>";
            echo "<td>".$row_production['commission_office']."</td>";

        } else {
            echo "<td></td><td></td><td></td><td></td><td></td><td></td>";
        }

      

											
/*
                                         $sql4 = "SELECT SUM(balance) as balance FROM production WHERE office_id = ".$row['id']."";
                                            $result4 = $conn->query($sql4);
                                            if (!$result4) {
                                                // Check for errors in the query
                                                echo "Error: " . $conn->error;
                                            } elseif ($result4->num_rows > 0) {
                                                while ($row4 = $result4->fetch_assoc()) {
                                                    echo "<td>".$row4['balance']."</td>";
                                                }
                                            } else {
                                                echo "<td></td>";
                                            }

                                            $sql4 = "SELECT SUM(total_paid) as total_paid FROM production WHERE office_id = ".$row['id']."";
                                            $result4 = $conn->query($sql4);
                                            if (!$result4) {
                                                // Check for errors in the query
                                                echo "Error: " . $conn->error;
                                            } elseif ($result4->num_rows > 0) {
                                                while ($row4 = $result4->fetch_assoc()) {
                                                    echo "<td>".$row4['total_paid']."</td>";
                                                }
                                            } else {
                                                echo "<td></td>";
                                            }                                            
											
											$sql4 = "SELECT SUM(sale_program) as sale_program FROM production WHERE office_id = ".$row['id']."";
                                            $result4 = $conn->query($sql4);
                                            if (!$result4) {
                                                // Check for errors in the query
                                                echo "Error: " . $conn->error;
                                            } elseif ($result4->num_rows > 0) {
                                                while ($row4 = $result4->fetch_assoc()) {
                                                    echo "<td>".$row4['sale_program']."</td>";
                                                }
                                            } else {
                                                echo "<td></td>";
                                            }

                                            $sql4 = "SELECT SUM(efile_fee) as efile_fee FROM production WHERE office_id = ".$row['id']."";
                                            $result4 = $conn->query($sql4);
                                            if (!$result4) {
                                                // Check for errors in the query
                                                echo "Error: " . $conn->error;
                                            } elseif ($result4->num_rows > 0) {
                                                while ($row4 = $result4->fetch_assoc()) {
                                                    echo "<td>".$row4['efile_fee']."</td>";
                                                }
                                            } else {
                                                echo "<td></td>";
                                            }

                                            $sql4 = "SELECT SUM(banking_fee) as banking_fee FROM production WHERE office_id = ".$row['id']."";
                                            $result4 = $conn->query($sql4);
                                            if (!$result4) {
                                                // Check for errors in the query
                                                echo "Error: " . $conn->error;
                                            } elseif ($result4->num_rows > 0) {
                                                while ($row4 = $result4->fetch_assoc()) {
                                                    echo "<td>".$row4['banking_fee']."</td>";
                                                }
                                            } else {
                                                echo "<td></td>";
                                            }

                                            $sql4 = "SELECT SUM(commission_office) as commission_office FROM production WHERE office_id = ".$row['id']."";
                                            $result4 = $conn->query($sql4);
                                            if (!$result4) {
                                                // Check for errors in the query
                                                echo "Error: " . $conn->error;
                                            } elseif ($result4->num_rows > 0) {
                                                while ($row4 = $result4->fetch_assoc()) {
                                                    echo "<td>".$row4['commission_office']."</td>";
                                                }
                                            } else {
                                                echo "<td></td>";
                                            } */
											
											
                                        }
                                        
                                    echo "</tr>";
                            }
                            echo "</tbody>";
                        }

                    ?>
                  
                </table>
            </div>
        </div>
        <h4 class="my-4">Students</h4>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>EFIN</th>
                            <th>Contact First Name</th>
                            <th>Contact Last Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>State</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script>

        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#table tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $(document).ready(function() {
            $(".officeStatus").on("change", function () {
                var officeStatus = $(this).val();
                var officeName = $(this).attr('name');
                var officeId = officeName.replace('officeStatus', '');
                $.ajax({
                    url: 'update-office-status.php',
                    method: 'POST',
                    data: {
                        officeStatus: officeStatus,
                        officeId: officeId
                    },
                    success: function(data) {
                        alert(data);
                    }
                });
            });

            $(".bankApStatus").on("change", function () {
                var bankApStatus = $(this).val();
                var officeName = $(this).attr('name');
                var officeId = officeName.replace('bankApStatus', '');
                $.ajax({
                    url: 'update-bank-ap-status.php',
                    method: 'POST',
                    data: {
                        bankApStatus: bankApStatus,
                        officeId: officeId
                    },
                    success: function(data) {
                        alert(data);
                    }
                });
            });
        });
          
        
		</script>
    
		
		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>