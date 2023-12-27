<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: create-account.php?account=false");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
    
<nav class="navbar navbar-expand-lg px-5">
    <div class="container-fluid">
		<div class="d-flex flex-column">
	        <a class="navbar-brand p-0" href="#">Bismarck Business Group LLC</a>
			<p class="m-0">A TaxWise Service Bureau</p>
		</div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-lg-0 align-items-center mx-auto">
            <li class="nav-item">
            	<a class="nav-link" href="index.php">Main</a>
            </li>
            <li class="nav-item">
            	<a class="nav-link" href="index.php#product">Our Product</a>
            </li>
            <li class="nav-item">
            	<a class="nav-link" href="create-account.php">Create an account</a>
            </li>
            <li class="nav-item">
            	<a class="nav-link active" href="office-registration.php">Office Registration</a>
            </li>
            <li class="nav-item">
            	<a class="nav-link" href="#">Student Registration</a>
            </li>
            <li class="nav-item">
            	<a class="nav-link" href="#">About Us</a>
            </li>
			<?php
                if ($_SESSION['loggedin'] == true) {
                    echo '<li class="nav-item">
                            <a class="nav-link" href="client/index.php">'. $_SESSION['name'] .'</a>
                        </li>';
                }
				else {
					echo '<li class="nav-item">
							<a class="nav-link" href="client/login.php">Client Login</a>
						</li>';
				}
            ?>
        </ul>
		<div id="google_translate_element"></div>
        </div>
    </div>
    </nav>
	<div class="container-fluid">
		<div class="row my-5 px-5">
		<div class="col-md-6">
		<form action="includes/create-office.php" method="post">
		<h5 class="pt-3 pb-1">Office Information</h5>
			<div class="client-info d-flex flex-column">
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">Contact Name:</label>
					<input type="text" name="company-contact-name" id="contact-name" class="ms-2 form-control d-inline">
					<input type="text" name="user-id" id="user-id" hidden value="<?php echo $_SESSION['id'] ?>">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">Company Name:</label>
					<input type="text" name="company-name" id="company-name" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">Company Address:</label>
					<input type="text" name="company-address" id="company-address" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">City:</label>
					<input type="text" name="company-city" id="company-city" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">State:</label>
					<input type="text" name="company-state" id="company-state" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">Zip Code:</label>
					<input type="text" name="company-zip" id="company-zip" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">Contact Phone Number:</label>
					<input type="text" name="company-contact-phone" id="company-contact-phone" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">Fax Number:</label>
					<input type="text" name="company-fax" id="company-fax" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">Company Federal Tax ID:</label>
					<input type="text" name="company-tax-id" id="company-tax-id" class="ms-2 form-control d-inline">
				</div>
			</div>
			<h5 class="pt-3 pb-1">Preparer Information</h5>
			<div class="client-info d-flex flex-column">
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">Preparer ID:</label>
					<input type="text" name="preparer-id" id="preparer-id" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">Preparer Name:</label>
					<input type="text" name="preparer-name" id="preparer-name" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">Company Name:</label>
					<input type="text" name="preparer-company-name" id="preparer-company-name" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">Address:</label>
					<input type="text" name="preparer-address" id="preparer-address" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">City:</label>
					<input type="text" name="preparer-city" id="preparer-city" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">State:</label>
					<input type="text" name="preparer-state" id="preparer-state" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">Zip Code:</label>
					<input type="text" name="preparer-zip" id="preparer-zip" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">Phone:</label>
					<input type="text" name="preparer-phone" id="preparer-phone" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">EFIN:</label>
					<input type="text" name="preparer-efin" id="preparer-efin" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">PTIN:</label>
					<input type="text" name="preparer-ptin" id="preparer-ptin" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">NYTPRIN:</label>
					<input type="text" name="preparer-nytprin" id="preparer-nytprin" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">EIN:</label>
					<input type="text" name="preparer-ein" id="preparer-ein" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">ERO PIN:</label>
					<input type="text" name="preparer-ero-pin" id="preparer-ero-pin" class="ms-2 form-control d-inline">
				</div>
				<div class="d-flex flex-row mb-1">
					<label class="w-50 d-inline">Preparer PIN:</label>
					<input type="text" name="preparer-pin" id="preparer-pin" class="ms-2 form-control d-inline">
				</div>
			</div>
			<input type="submit" value="Submit" class="btn btn-primary mt-4">
			</form>
		</div>
		</div>
		<hr>
		<footer>
			<div class="row mx-5 px-5">
				<div class="col-md-4">
					<a class="fs-5 text-decoration-none text-dark" href="#">Bismarck Business Group LLC</a>
					<p class="m-0">A TaxWise Service Bureau</p>
				</div>
				<div class="col-md-6 offset-2">
					<ul class="list-unstyled">
						<li>
							<a class="text-dark-emphasis text-decoration-none" href="#">Main</a>
						</li>
						<li>
							<a class="text-dark-emphasis text-decoration-none" href="#">Our Product</a>
						</li>
						<li>
							<a class="text-dark-emphasis text-decoration-none" href="#">Create an account</a>
						</li>
						<li>
							<a class="text-dark-emphasis text-decoration-none" href="#">Office Registration</a>
						</li>
						<li>
							<a class="text-dark-emphasis text-decoration-none" href="#">Student Registration</a>
						</li>
						<li>
							<a class="text-dark-emphasis text-decoration-none" href="#">About Us</a>
						</li>
					</ul>
				</div>
			</div>
		</footer>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

	<script type="text/javascript">
		function googleTranslateElementInit() {
		  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
		}
		
		</script>
		
		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>