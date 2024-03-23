<?php
include '../includes/config.php';
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "2"){
    header("location: login.php");
    exit;
}




$currentYear = date("Y");
$defaultYear = $currentYear - 1;
$year1=$defaultYear;



        if (isset($_SESSION['id'])) {
            //$office = $_GET['id'];
            $user_id = $_SESSION['id'];
            $stmt = "SELECT * FROM offices WHERE user_id = $user_id";
            $result = $conn->query($stmt);
            if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row["company_contact_name"];
            $officeName = $row['company_name'];
            $office_id = $row['id'];
            // $officeName = $row['company_name'];
            $stmt2 = "SELECT * FROM production WHERE office_id = $office_id ORDER BY year DESC";
            $result2 = $conn->query($stmt2);


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

$total_transmissions_0 = $row['personal_tax'] + $row['corporate_tax_c'] + $row['corporate_tax_s'] + $row['partnership_tax'];
$total_transmissions_1 = $row['personal_tax_1'] + $row['corporate_tax_c_1'] + $row['corporate_tax_s_1'] + $row['partnership_tax_1'];
$total_transmissions_2 = $row['personal_tax_2'] + $row['corporate_tax_c_2'] + $row['corporate_tax_s_2'] + $row['partnership_tax_2'];


$balance = $row['balance'];

    }
    
}
        }
else {
  echo 'no id' ;  }
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
    #error-message {
      color: red;
      display: none;
    }

        .negative {
            color: #ff0000;
        }
   
        .balance {
            font-size: 1.2em;
        }
        
		.borderless {
        border: none; /* Removes border */
		outline : none ;
               }

        .bold-font {
        font-weight: bold; /* Makes the font bold */
          }

		 
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
                    <a class="nav-link active" href="index.php">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="bank-reg.php">Bank Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="software-reg.php">Software Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="production.php?year=<?php echo $defaultYear . "&id=" . $_SESSION['id'] ; ?>">Production</a>
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
            </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid w-75">
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Overview</h3>
            </div>
            <hr>

            <div class="col-md-4">
                
            
            
                <div class="border p-3 rounded-4">


                    <canvas id="myChart" height="200px"></canvas>
                
                </div>



                <div class="d-flex mt-4">
                    <p class="m-0">To Renew your 2023 Software Click Here</p>
                    <button class="btn btn-primary">Renew</button>
                </div>
                <div class="d-flex mt-4">
    <h5 class="m-0">Your  Balance Due 
    <input type="text" name="balance" id="balance" disabled  class="balance bold borderless negative" value="$<?php if(isset($balance)){echo $balance;} else {echo '0';} ?>"></h5>
</div>
                <div class="d-flex mt-4 bg-success-subtle rounded-2">
                    <p class="m-0 ms-2">Make a payment thru Zelle using the <br> phone number 239-391-6775 <br> to Bismarck Business Group LLC.</p>
                </div>
                <div class="d-flex mt-4 bg-info-subtle rounded-2 mb-5">
                    <p class="m-0 ms-2">Make a payment with Debit or Credit Card</p>
                </div>

            </div>



            <div class="col-md-8 mb-4 bg-info-subtle rounded-4 pt-3">
            <?php 
                if (isset($_GET['office']) && $_GET['office'] == 'added') {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Office information added successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                if (isset($_GET['office']) && $_GET['office'] == 'updated') {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Office information updated successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            ?>
                <h5 class="pt-3 pb-1 d-inline">Office/Contact Info</h5>
                <button class="btn btn-warning float-end" id="editBtn">Edit</button>
                <form action="update.php" method="post">
                <div class="client-info d-flex flex-column mt-4">
                <?php
// Assuming you have a database connection established

include_once('../includes/config.php');

// Check if the user is logged in and the session contains the user's ID
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];

    // Select data from the offices table based on user_id
    $query = "SELECT * FROM offices WHERE user_id = ?";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($query);

    // Bind parameter
    $stmt->bind_param("i", $userId);

    // Execute the prepared statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Associative array to store retrieved data
    $data = [];

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Fetch the data from the query result
        $data = $result->fetch_assoc();
    }

    // Close the statement
    $stmt->close();

    // Array of field names and labels
    $fields = [
        'Company Contact Name' => 'company_contact_name',
        'Company Name' => 'company_name',
        'Company Address' => 'company_address',
        'Company City' => 'company_city',
        'Company State' => 'company_state',
        'Company Zip' => 'company_zip',
        'Company Contact Phone' => 'company_contact_phone',
        'Company Contact Email' => 'company_contact_email',
        'Company Fax' => 'company_fax',
		'Company Federal Tax ID' => 'company_tax_id',
        'Preparer ID' => 'preparer_id',
        'Preparer Name' => 'preparer_name',
        'Preparer Company Name' => 'preparer_company_name',
        'Preparer Address' => 'preparer_address',
        'Preparer City' => 'preparer_city',
        'Preparer State' => 'preparer_state',
        'Preparer Zip' => 'preparer_zip',
        'Preparer Phone' => 'preparer_phone',
        'Preparer EFIN' => 'preparer_efin',
        'Preparer PTIN' => 'preparer_ptin',
        'Preparer NYTPRIN' => 'preparer_nytprin',
        'Preparer EIN' => 'preparer_ein',
        'ERO PIN' => 'preparer_ero_pin',
        'Preparer PIN' => 'preparer_pin'
    ];


    // Function to create disabled input with value or empty if data is not available
    function createInput($label, $fieldName, $value) {
        return '
            <div class="d-flex flex-row mb-1">
                <label class="w-25 d-inline">' . $label . ':</label>
                <input type="text" name="' . $fieldName . '" id="' . $fieldName . '" disabled value="' . ($value ?? '') . '" class="ms-2 form-control w-75 d-inline">
            </div>';
    }

    function createInputEfin($label, $fieldName, $value) {
        return '
            <div class="d-flex flex-row mb-1">
                <label class="w-25 d-inline">' . $label . ':</label>
                <input type="text" name="' . $fieldName . '" id="' . $fieldName . '" disabled value="' . ($value ?? '') . '" maxlength="6" oninput="validateInput(this)" class="ms-2 form-control w-75 d-inline">
            </div>';
    }

    // Output inputs for each field
    foreach ($fields as $label => $fieldName) {
        if ($fieldName == 'preparer_efin') {
            echo createInputEfin($label, $fieldName, $data[$fieldName] ?? null);
        } 
        else {
        echo createInput($label, $fieldName, $data[$fieldName] ?? null);
        }
    }
        echo "<input type='hidden' name='id' value='" . $_SESSION['id'] . "'>";

    } else {
        echo "User ID not found in session.";
    }
    ?>

                <p id="error-message">EFIN must start with 0</p>
                <button class="btn btn-success my-3 d-none" id="saveBtn">Save</button>
                
            </div>
        </form>
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
                }
            }
            // title: "Office Information Graph",
        }
        });

        document.getElementById("editBtn").addEventListener("click", function() {
            document.querySelectorAll("input").forEach(function(input) {
                input.disabled = false;
                document.getElementById("saveBtn").classList.remove("d-none");
            });
        });

        function validateInput(input) {
            // Remove any non-digit characters
            let sanitizedValue = input.value.replace(/\D/g, '');

            // Ensure the value starts with 0
          

            // Truncate to a maximum of 6 digits
            sanitizedValue = sanitizedValue.slice(0, 6);

            // Update the input value
            input.value = sanitizedValue;
        }
		
		</script>
		
		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>