<?php
require_once('../includes/config.php');

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "1"){
    header("location: login.php");
    exit;
}



$currentYear = date("Y");
$defaultYear = $currentYear - 1;
$year1=$defaultYear;





           // Construct the SQL query to fetch all necessary data in one go
           $stmt = "SELECT 
           SUM(personal_tax) AS total_personal_tax,
           SUM(corporate_tax_c) AS total_corporate_tax_c,
           SUM(corporate_tax_s) AS total_corporate_tax_s,
           SUM(partnership_tax) AS total_partnership_tax,
           SUM(personal_tax_1) AS total_personal_tax_1,
           SUM(corporate_tax_c_1) AS total_corporate_tax_c_1,
           SUM(corporate_tax_s_1) AS total_corporate_tax_s_1,
           SUM(partnership_tax_1) AS total_partnership_tax_1,
           SUM(personal_tax_2) AS total_personal_tax_2,
           SUM(corporate_tax_c_2) AS total_corporate_tax_c_2,
           SUM(corporate_tax_s_2) AS total_corporate_tax_s_2,
           SUM(partnership_tax_2) AS total_partnership_tax_2,
           SUM(balance) AS balance
       FROM production
       WHERE year = $year1";

// Execute the query
$result = $conn->query($stmt);

// Check if there are rows returned
if ($result->num_rows > 0) {
   // Fetch the first row
   $row = $result->fetch_assoc();

   // Total sums for each column
   $total_transmissions_0 = $row['total_personal_tax'] + $row['total_corporate_tax_c'] + $row['total_corporate_tax_s'] + $row['total_partnership_tax'];
   $total_transmissions_1 = $row['total_personal_tax_1'] + $row['total_corporate_tax_c_1'] + $row['total_corporate_tax_s_1'] + $row['total_partnership_tax_1'];
   $total_transmissions_2 = $row['total_personal_tax_2'] + $row['total_corporate_tax_c_2'] + $row['total_corporate_tax_s_2'] + $row['total_partnership_tax_2'];
   $balance = $row['balance'];
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
                    <a class="nav-link active" href="#">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="office.php?year=<?php echo "$defaultYear"; ?> ">Offices</a>
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
	<div class="container-fluid w-75">
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Overview</h3>
            </div>
            <div class="col-md-2 offset-2 fw-semibold">
                <a href="#" class="d-block">Add New Office</a>
                <a href="#">Add Student</a>
            </div>
            <div class="col-md-2 fw-semibold">
                <a href="#">Register Payment</a>
            </div>
            <hr>
            <div class="col-md-4">
                <div class="d-flex flex-column align-items-center border p-3 rounded-4">
                    <canvas id="myChart" height="200px"></canvas>
                    <div class="d-flex mt-4">
    <h5 class="m-0">Balances owned 
    <input type="text" name="balance" id="balance" disabled  class="balance bold borderless " value="$<?php echo $balance; ?>"></h5>
</div>
                    <div class="w-100 text-center">
                        <label for="officeType">Office Type:</label>
                        <select name="officeType" id="officetype" class="d-inline form-select w-50">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Released">Released</option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-8 text-center bg-info-subtle rounded-4">
                <h4 class="py-3">Office Information</h4>
                <div class="office-info">
                    <form action="index.php" method="get">
                        <select name="officeSelect" id="officeSelect" class="me-2 form-select d-inline">
                            <option value="company_name">Company Name</option>
                        </select>
                        <input type="text" name="text" id="text" class="ms-2 form-control d-inline">
                        <button type="submit" class="btn btn-primary ms-2">Search</button>
                    </form>
                    <hr>
                    <div class="row text-start">
                        <div class="col-md-4 fw-bold">
                            <p>Company Name:</p>
                            <p>EFIN:</p>
                            <p>Address:</p>
                            <p>City:</p>
                            <p>Contact Name:</p>
                            <p>Contact Phone:</p>
                        </div>
                        <div class="col-md-8">
                            <?php
                                if (isset($_GET['text']) && isset($_GET['officeSelect'])) {
                                    $text = $_GET['text'];
                                    $officeSelect = $_GET['officeSelect'];

                                    require_once "../includes/config.php";
                                    $sql = "SELECT * FROM offices WHERE $officeSelect = '$text'";
                                    $result = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                            echo "<p>".$row['company_name']."</p>";
                                            echo "<p>".$row['preparer_efin']."</p>";
                                            echo "<p>".$row['company_address']."</p>";
                                            echo "<p>".$row['company_city']."</p>";
                                            echo "<p>".$row['company_contact_name']."</p>";
                                            echo "<p>".$row['company_contact_phone']."</p>";
                                        }
                                    }
                                    else{
                                        echo "<p>No records matching your query were found.</p>";

                                    }
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>




	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script type="text/javascript">
		function googleTranslateElementInit() {
		  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
		}

        var year1 = "<?php echo $year1 ;?>";
var balance = "<?php echo $balance ;?>";

var total_transmissions_0 = "<?php echo $total_transmissions_0; ?>";
var total_transmissions_1 = "<?php echo $total_transmissions_1; ?>";
var total_transmissions_2 = "<?php echo $total_transmissions_2; ?>";

calculateAll();
function calculateAll(){
//$("#balance").val(44);
}



        var xValues = [year1, year1-1, year1-2];
        var yValues = [total_transmissions_0, total_transmissions_1, total_transmissions_2 ];
        var barColors = ["red", "green","blue","orange","brown"];

        new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: "Office Information Graph"
                }
            }
            // title: "Office Information Graph",
        }
        });
		
		</script>
		
		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>