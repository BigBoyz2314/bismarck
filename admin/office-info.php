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
            <div class="col-md-12 mb-5 d-flex flex-column align-items-center">
                <h3>Office Info</h3>
                <br><br>
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
                <h5 class="pt-3 pb-1 d-inline px-4">Office/Contact Info</h5>
                <button class="btn btn-warning float-end" id="editBtn">Edit</button>
                <form action="office-info-update.php" method="post">
                <div class="client-info px-4 d-flex flex-column mt-4">
                <?php
                    // Assuming you have a database connection established

                    include_once('../includes/config.php');

                    // Check if the user is logged in and the session contains the user's ID
                    if (isset($_GET['name'])) {
                        $userId = $_GET['name'];
                        // Select data from the offices table based on user_id
                        $query = "SELECT * FROM offices WHERE `user_id` = ? ";
                        
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
                        //echo createInput( "userid" , "userid" , $userId  ?? null );
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






                            echo "<input type='hidden' name='id' value='" . $userId . "'>";

                        } else {
                            echo "User ID not found in session.";
                        }
                    ?>

                    
                    <button class="btn btn-success my-3 d-none" id="saveBtn">Save</button>
                    
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
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
            if (!sanitizedValue.startsWith('0')) {
                sanitizedValue = '0' + sanitizedValue;
            }

            // Truncate to a maximum of 6 digits
            sanitizedValue = sanitizedValue.slice(0, 6);

            // Update the input value
            input.value = sanitizedValue;
        }
    </script>

	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>