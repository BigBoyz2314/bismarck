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
                    <a class="nav-link text-primary" href="index.php">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="bank-reg.php">Bank Registration</a>
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
                <h3>Bank Products Registration</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <h5 class="pt-3 pb-1">Office/Contact Info</h5>
                <div class="client-info d-flex flex-column">
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">Office Name:</label>
                        <input type="text" name="" id="" disabled value="Bismarck Business Group, LLC" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">Contact First Name:</label>
                        <input type="text" name="" id="" disabled value="Bismarck" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">Contact Last Name:</label>
                        <input type="text" name="" id="" disabled value="Valdez" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">Email:</label>
                        <input type="text" name="" id="" disabled value="Bismarckbusinessgroup@gmail.com" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">Phone:</label>
                        <input type="text" name="" id="" disabled value="347-681-1111" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">EFIN:</label>
                        <input type="text" name="" id="" disabled value="070743" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">Transmitting EFIN:</label>
                        <input type="text" name="" id="" disabled value="070743" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">Transmission Type:</label>
                        <input type="text" name="" id="" disabled value="PAPSPOWER" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">Shipping Method:</label>
                        <input type="text" name="" id="" disabled value="Download" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">Ok to Ship:</label>
                        <input type="text" name="" id="" disabled value="No" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">Client ID:</label>
                        <input type="text" name="" id="" disabled value="123" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">User Name:</label>
                        <input type="text" name="" id="" disabled value="user" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">Password:</label>
                        <input type="text" name="" id="" disabled value="password" class="ms-2 form-control w-75 d-inline">
                    </div>
                </div>
                <h5 class="pt-3 pb-1">Mailing Address:</h5>
                <div class="client-info d-flex flex-column">
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">Address Line 1:</label>
                        <input type="text" name="" id="" disabled value="540 SE 47th Ter" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">Address Line 2:</label>
                        <input type="text" name="" id="" disabled value="" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">City:</label>
                        <input type="text" name="" id="" disabled value="Cape Coral" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">State:</label>
                        <input type="text" name="" id="" disabled value="FL" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">Zip Code:</label>
                        <input type="text" name="" id="" disabled value="33904" class="ms-2 form-control w-75 d-inline">
                    </div>
                </div>
                <h5 class="pt-3 pb-1">Shipping Address:</h5>
                <div class="client-info d-flex flex-column">
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">Address Line 1:</label>
                        <input type="text" name="" id="" disabled value="540 SE 47th Ter" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">Address Line 2:</label>
                        <input type="text" name="" id="" disabled value="" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">City:</label>
                        <input type="text" name="" id="" disabled value="Cape Coral" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">State:</label>
                        <input type="text" name="" id="" disabled value="FL" class="ms-2 form-control w-75 d-inline">
                    </div>
                    <div class="d-flex flex-row mb-1">
                        <label class="w-25 d-inline">Zip Code:</label>
                        <input type="text" name="" id="" disabled value="33904" class="ms-2 form-control w-75 d-inline">
                    </div>
                </div>
                
            </div>
        </div>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>