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
                    <a class="nav-link active" href="office.php">Offices</a>
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
                        <h6>Office Status</h6>
                        <select class="form-select" name="officeStatus" id="">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Released">Released</option>
                            <option value="EFIN Pending">EFIN Pending</option>
                            <option value="Balance Pending">Balance Pending</option>
                        </select>
                    </div>
                    <div class="col-md-5 mt-1 mb-2">
                    <input type="text" name="search" id="search" class="form-control mt-4" placeholder="Search...">
                    <br>
                    <form action="" method="get">
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
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive table-bordered office-table" id="table">
                    <?php
                        include_once '../includes/config.php';
                        $sql = "SELECT * FROM offices";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);
                        if ($resultCheck > 0) {
                            echo "<thead>
                                    <tr class='text-center'>
                                        <th>EFIN</th>
                                        <th>PID</th>
                                        <th>Office Name</th>
                                        <th>Contact Name</th>
                                        <th>Phone</th>
                                        <th>Email Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Zipcode</th>
                                        <th>Registration Code</th>
                                        <th>Office Status</th>
                                        <th>Bank App Status</th>
                                        <th>Balance Acc Rec</th>
                                        <th>Sofware Cost</th>
                                        <th>Transm Fee</th>
                                        <th>SB Fee  </th>
                                        <th>Fee Collect</th>
                                    </tr>
                                </thead>
                                <tbody>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr class='text-center'>
                                        <td>".$row['preparer_efin']."</td>
                                        <td>".$row['preparer_ptin']."</td>
                                        <td>".$row['company_name']."</td>
                                        <td>".$row['company_contact_name']."</td>
                                        <td>".$row['company_contact_phone']."</td>
                                        <td></td>
                                        <td>".$row['company_city']."</td>
                                        <td>".$row['company_state']."</td>
                                        <td>".$row['company_zip']."</td>";

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
                                        echo "<td> 
                                        <select class='form-select' name='officeStatus" . $row['id'] . "' id=''>
                                            <option value='Active'>Active</option>
                                            <option value='Inactive'>Inactive</option>
                                        </select>
                                        </td>
                                        <td></td>";

                                        if (isset($_GET['year'])) {
                                            $year = $_GET['year'];
                                            $sql3 = "SELECT * FROM cxp WHERE office_id = ".$row['id']." AND year1 = ".$year."";
                                            $result3 = mysqli_query($conn, $sql3);
                                            $resultCheck3 = mysqli_num_rows($result3);
                                            if ($resultCheck3 > 0) {
                                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                                    echo "<td>".$row3['amount']."</td>";
                                                }
                                            } else {
                                                echo "<td></td>";
                                            }
                                        } else {
                                            $sql3 = "SELECT * FROM production WHERE office_id = ".$row['user_id']."";
                                            $sql4 = "SELECT SUM(amount) as amount FROM cxp WHERE office_id = ".$row['id']."";
                                            $result3 = mysqli_query($conn, $sql3);
                                            $resultCheck3 = mysqli_num_rows($result3);
                                            $result4 = mysqli_query($conn, $sql4);
                                            $resultCheck4 = mysqli_num_rows($result4);
                                            if ($resultCheck4 > 0) {
                                                while ($row4 = mysqli_fetch_assoc($result4)) {
                                                    echo "<td>".$row4['amount']."</td>";
                                                }
                                            } else {
                                                echo "<td></td>";
                                            }
                                        }
                                        echo "<td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>";
                            }
                            echo "</tbody>";
                        }

                    ?>
                    <!-- <thead>
                        <tr class="text-center">
                            <th>EFIN</th>
                            <th>Client ID</th>
                            <th>PID</th>
                            <th>Office Name</th>
                            <th>Contact First Name</th>
                            <th>Contact Last Name</th>
                            <th>Phone</th>
                            <th>Email Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Zipcode</th>
                            <th>Registration Code</th>
                            <th>Office Status</th>
                            <th>Bank App Status</th>
                            <th>Balance Acc Rec</th>
                            <th>Sofware Cost</th>
                            <th>Transm Fee</th>
                            <th>SB Fee  </th>
                            <th>Fee Collect</th>
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
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Active</td>
                            <td>Approved</td>
                            <td></td>
                            <td>1135</td>
                            <td>6</td>
                        </tr>
                    </tbody> -->
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
                            <th>Zipcode</th>
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

	<script>

        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#table tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
          
		</script>
		
		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>