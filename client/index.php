<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "2"){
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
                <a class="navbar-brand p-0 fw-bold text-light fs-3" href="#">Bismarck Business Group, LLC</a>
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
                    <p class="m-0">Your curent Balance Due</p>
                    <input type="text" disabled class="form-control disabled-input ms-5" value="$650.00">
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

    // Output inputs for each field
    foreach ($fields as $label => $fieldName) {
        echo createInput($label, $fieldName, $data[$fieldName] ?? null);

    }
        echo "<input type='hidden' name='id' value='" . $_SESSION['id'] . "'>";

    } else {
        echo "User ID not found in session.";
    }
    ?>


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

        var xValues = ["2023", "2022", "2021"];
        var yValues = [60, 49, 44,];
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
		
		</script>
		
		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>