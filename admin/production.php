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
                    <a class="nav-link active" href="production.php">Production</a>
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
                <h3>Bismarck Business Group, LLC</h3>
            </div>
            <div class="col-md-6">
                <form action="" method="get">
                    <label for="username">Username</label>
                    <select name="username" class="form-select" id="username">
                        <option value="">Select</option>
                        <?php
                        
                            include '../includes/config.php'; 
                            $stmt = ("SELECT company_contact_name FROM offices");
                            $result = mysqli_query($conn, $stmt);
                            while($row = mysqli_fetch_array($result)) {
                                echo "<option value='" . $row['company_contact_name'] ."'>" . $row['company_contact_name'] ."</option>";
                            }

                        ?>
                    </select>
                    <label for="company">Company Name</label>
                    <select name="company" class="form-select" id="company">
                        <option value="">Select</option>
                        <?php
                        
                            include '../includes/config.php'; 
                            $stmt = ("SELECT id, company_name FROM offices");
                            $result = mysqli_query($conn, $stmt);
                            while($row = mysqli_fetch_array($result)) {
                                echo "<option value='" . $row['id'] ."'>" . $row['company_name'] ."</option>";
                            }

                        ?>
                    </select>
                    <label for="year">Year</label>
                    <select name="year" id="year" class="form-select">
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
        <?php
        
            if (isset($_GET['username']) && isset($_GET['company']) && isset($_GET['year'])) {
                echo '<div class="row justify-content-center mt-3">
                <div class="col-md-8">
                    <h6 class="d-inline me-4">Name: ' . $_GET['username'] . '</h6>
                    <h6 class="d-inline me-4">Company: ' . $_GET['company'] . '</h6>
                    <h6 class="d-inline">Year: ' . $_GET['year'] . '</h6>
                    <form action="">
                        <input type="hidden" name="username" id="username" value="' . $_GET['username'] . '">
                        <input type="hidden" name="company" id="company" value="' . $_GET['company'] . '">
                        <input type="hidden" name="year" id="year" value="' . $_GET['year'] . '">
                        <table class="table table-bordered">
                            <thead class="table-warning">
                                <tr>
                                    <th>Production - ' . $_GET['year'] . '</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Transmision Taxes Personales - 1040</td>
                                    <td><input type="number" class="form-control" name="personal_tax" id="personal_tax"></td>
                                </tr>
                                <tr>
                                    <td>Transmision Taxes Corporaciones C - 1120</td>
                                    <td><input type="number" class="form-control" name="corporate_tax_c" id="corporate_tax_c"></td>
                                </tr>
                                <tr>
                                    <td>Transmision Taxes Corporaciones S - 1120-S</td>
                                    <td><input type="number" class="form-control" name="corporate_tax_s" id="corporate_tax_s"></td>
                                </tr>
                                <tr>
                                    <td>Transmision Taxes Partneship - 1165</td>
                                    <td><input type="number" class="form-control" name="partnership_tax" id="partnership_tax"></td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
    ';
            }

        ?>
        

        <div class="row mt-3">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead class="table-warning">
                        <tr>
                            <th>Production</th>
                            <th>2022</th>
                            <th>2021</th>
                            <th>2020</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Transmision Taxes Personales - 1040</td>
                            <td>150</td>
                            <td>10</td>
                            <td>2</td>
                            <td>162</td>
                        </tr>
                        <tr>
                            <td>Transmision Taxes Corporaciones C - 1120</td>
                            <td>5</td>
                            <td></td>
                            <td></td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>Transmision Taxes Corporaciones S - 1120-S</td>
                            <td>2</td>
                            <td></td>
                            <td></td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>Transmision Taxes Partneship - 1165</td>
                            <td>3</td>
                            <td></td>
                            <td></td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>Total Transmisiones</td>
                            <td>160</td>
                            <td>10</td>
                            <td>2</td>
                            <td>172</td>
                        </tr>
                        <tr>
                            <td>Total Taxes con Fee Collect aprobados.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="bg-danger-subtle">25</td>
                        </tr>
                        <tr>
                            <td>Total Taxes Efile Only transmitidos.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="bg-warning-subtle">147</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead class="table-warning">
                        <tr>
                            <th>Ganancia (Perdida) </th>
                            <th></th>
                            <th></th>
                            <th>CXC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Venta del Programa a Cobrar</td>
                            <td></td>
                            <td>800</td>
                            <td>800</td>
                        </tr>
                        <tr>
                            <td>Costo del Programa a pagar a TaxWise</td>
                            <td></td>
                            <td>-561</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Cargo a la Oficina por el Efile Fee</td>
                            <td>$4 </td>
                            <td>588</td>
                            <td>588</td>
                        </tr>
                        <tr>
                            <td>Costo del Efile Fee a pagar a TaxWise</td>
                            <td>$3 </td>
                            <td>-441</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Fee Asignado para los Productos Bancarios </td>
                            <td>$25 </td>
                            <td>625</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Comision por Fee Collect por pagar a la Oficina</td>
                            <td>$15 </td>
                            <td>-375</td>
                            <td>-375</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>636</td>
                            <td>1,013</td>
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