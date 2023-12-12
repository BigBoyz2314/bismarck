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
    <title>Courses</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
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
                    <a class="nav-link text-primary" href="office.php">Offices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="#">Clients by States</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="#">Production</a>
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
                    <a class="nav-link active" href="software.php">Software Management</a>
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
                <h3>Courses</h3>
            </div>
            <div class="col-md-12 rounded-4">
                <table class="table table-bordered w-50">
                    <thead class="table-success">
                        <tr>
                            <th>Curso de Preparacion de Impuestos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>TEMA 1</td>
                        </tr>
                        <tr>
                            <td>TEMA 2</td>
                        </tr>
                        <tr>
                            <td>TEMA 3</td>
                        </tr>
                        <tr>
                            <td>TEMA 4</td>
                        </tr>
                        <tr>
                            <td>TEMA 5</td>
                        </tr>
                        <tr>
                            <td>TEMA 6</td>
                        </tr>
                        <tr>
                            <td>TEMA 7</td>
                        </tr>
                        <tr>
                            <td>TEMA 8</td>
                        </tr>
                        <tr>
                            <td>TEMA 9</td>
                        </tr>
                        <tr>
                            <td>TEMA 10</td>
                        </tr>
                    </tbody>
                </table>
            </div>
	    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>