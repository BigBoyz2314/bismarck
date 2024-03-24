<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "2"){
    header("location: login.php");
    exit;
}
$currentYear = date("Y");
$defaultYear = $currentYear - 1;
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
  </style>
</head>
<body>

    <?php include("header.php"); ?>
    
	<div class="container-fluid w-75">
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Overview</h3>
            </div>
            <hr>
  
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
                <form action="update-soft-reg.php" method="post">
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
    $fields_company = [
        'Company ClientID' => 'office_ClientID',
        'Company Contact Name' => 'company_contact_name',
        'Company Name' => 'company_name',
        'Company Address' => 'company_address',
        'Company City' => 'company_city',
        'Company State' => 'company_state',
        'Company Zip' => 'company_zip',
        'Company Contact Phone' => 'company_contact_phone',
        'Company Fax' => 'company_fax',
        'Company Contact Email' => 'company_contact_email',
		'Company Federal Tax ID' => 'company_tax_id'];
	$fields_preparer = [	
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
    $fields_software = [
        'Soft Installation Type' => 'instalation_type',
        'Server Name' => 'server_name',
        'Installation Type' => 'server_type',
        'IP Addres' => 'ip_address',
        'Wndows Type' => 'os_version',
        'Number of Sttaions' => 'num_stations',
        'Number of Virtual PC' => 'num_vpc',
        'Printer IP Address' => 'printer_ip_address'
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
    foreach ($fields_company as $label => $fieldName) {
      
        echo createInput($label, $fieldName, $data[$fieldName] ?? null);
        
    }
	
	echo  '<p><h5 class="pt-3 pb-1 d-inline">Preparer Information </h5>' ;
	
	foreach ($fields_preparer as $label => $fieldName) {
        if ($fieldName == 'preparer_efin') {
            echo createInputEfin($label, $fieldName, $data[$fieldName] ?? null);
        } 
        else {
        echo createInput($label, $fieldName, $data[$fieldName] ?? null);
        }
    }
	      
    
	echo  '<p><h5 class="pt-3 pb-1 d-inline">Software and Network Information </h5>' ;
	
	  foreach ($fields_software as $label => $fieldName) {
               echo createInput($label, $fieldName, $data[$fieldName] ?? null);
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

   

        document.getElementById("editBtn").addEventListener("click", function() {
            document.querySelectorAll("input").forEach(function(input) {
                if (input.id !== 'office_ClientID' && input.id !== 'instalation_type' && //prevent specific fields to be edited by the client
                    input.id !== 'server_name'     && input.id !== 'server_type' &&
                    input.id !== 'num_stations'    && input.id !== 'num_vpc'   ) {
                        input.disabled = false;
                        input.style.color = 'black'; // Change the color back to black for other fields
                        input.autocomplete = 'off'; // Disable autocomplete for other fields
                } else {
                        input.disabled = true; // Disable the office_ClientID field
                        input.style.color = 'grey'; // Set color to grey for office_ClientID field
                 }

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
		
        <?php include('translate.php'); ?>

</body>
</html>