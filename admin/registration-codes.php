<?php
require_once('../includes/config.php');

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
    <title>Registration Codes</title>
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
                    <a class="nav-link text-primary" href="office.php?year=<?php echo "$defaultYear"; ?> ">Offices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="#">Clients by States</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="production.php">Production</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="registration-codes.php">Registration Codes</a>
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
	<div class="container-fluid w-75 mt-2">

    <?php 
        if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Registration Code added successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        if (isset($_GET['msg']) && $_GET['msg'] == 'error') {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Registration Code not added.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        if (isset($_GET['msg']) && $_GET['msg'] == 'deleted') {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Registration Code deleted successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    ?>

    <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Registration Code</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="add-registration-code.php" method="post">
            <div class="modal-body">
                <label for="year">Year</label>
                <select name="year" id="year" class="form-select">
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                </select>
                <label for="efin">EFIN</label>
                <input type="text" class="form-control" name="efin">
                <label for="regCode">Registration Code</label>
                <input type="text" class="form-control" name="regCode">
                <label for="username">User name</label>
                <select name="user" id="user" class="form-select">
                    <?php
                        include_once('../includes/config.php');

                        $stmt = "SELECT * FROM users";
                        $result = $conn->query($stmt);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $username = $row['name'];
                                echo "<option value='$id'>$username</option>";
                            }
                        }

                    ?>
                </select>
                <label for="password">Password</label>
                <input type="text" class="form-control" name="password">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
        </div>
    </div>
    </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Registration Codes</h3>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Registration Code</button>
                </div>
            </div>
            <div class="col-md-12 rounded-4 mt-2">
                <table class="table table-bordered">
                    <thead class="table-info">
                    <tr>
                            <th>Year</th>
                            <th>EFIN</th>
                            <th>Reg Code</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <!-- <th>Edit</th> -->
                            <th>Delete</th>
                        </tr>
                    </thead>
                        <?php

                            include_once('../includes/config.php');

                            $stmt = "SELECT * FROM registration_codes ORDER BY year DESC";
                            $result = $conn->query($stmt);
                            $i = 1;

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {

                                    $id = $row['id'];
                                    $year = $row['year'];
                                    $efin = $row['efin'];
                                    $reg_code = $row['reg_code'];
                                    $username = $row['username'];
                                    $password = $row['password'];
                                    $created_at = $row['created_at'];
                                    $updated_at = $row['updated_at'];
                                    
                                        echo "<tr>";
                                        echo "<td>$year</td>";
                                        echo "<td>$efin</td>";
                                        echo "<td>$reg_code</td>";
                                        echo "<td>$username</td>";
                                        echo "<td>$password</td>";
                                        echo "<td>$created_at</td>";
                                        echo "<td>$updated_at</td>";

                                    if ($_SESSION['role'] == '1') {
                                        // echo "<td><button class='btn btn-warning edit-btn' data-bs-toggle='modal' data-bs-target='#editModal' data-id='$id' data-data='$username'>Edit</button></td>";
                                        echo "<td><form action='' method='get'><input type='hidden' name='desigName' value='". $username ."'><input type='hidden' name='year' value='". $year ."'><input type='hidden' name='id' value='". $id ."'><input type='submit' value='Delete' class='btn btn-danger'></form></td>";
                                    }

                                    echo "</tr>";
                                }
                            }

                            if (isset($_GET['id'])) {
                                $delID = $_GET['id'];
                                $delName = $_GET['desigName'];
                                $year = $_GET['year'];
                                
                                echo '<script type="text/javascript"> ';  
                                echo '  if (confirm("Are you sure you want to DELETE registration code for '. $delName .' year '. $year .'?")) {';  
                                echo '    window.location.href = "del-registration-codes.php?year='. $year .'&delID='. $delID .'";';  
                                echo '  }';
                                echo '</script>';  
                            }


                        ?>
                        
                    </tbody>
                </table>
            </div>
	    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>