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
    <title>Installation & Updates</title>
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
                    <a class="nav-link text-primary" href="index.php">Overview</a>
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
                    <a class="nav-link active" href="installation.php">Installation & Updates</a>
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
                <h3>Installation & Updates</h3>
            </div>
        </div>
        <div class="row">
        <?php
            include_once('../includes/config.php');

            // Fetch unique years from the database
            $query = "SELECT DISTINCT `year` FROM installation ORDER BY `year` ASC";
            $result = $conn->query($query);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $year = $row['year'];

                    // Display the year before fetching data for that year
                    echo "<div class='col-md-6 rounded-4 my-4'>";
                        echo "<table class='table table-bordered w-100'>";
                        echo "<thead class='table-info'>";
                        echo "<tr>
                                <th colspan='5'>". $year ."</th>
                                </tr>";
                        echo "</thead>";

                    // Fetch data for each year
                    $stmt1 = $conn->prepare("SELECT `id`, `data`, `file_en`, `file_es` FROM `installation` WHERE `year` = ?");
                    $stmt1->bind_param("i", $year);
                    $stmt1->execute();
                    $resultYear = $stmt1->get_result();

                    if ($resultYear->num_rows > 0) {
                        // Display data rows for the year
                        while ($rowYear = $resultYear->fetch_assoc()) {

                            $id = $rowYear['id'];
                            $data = $rowYear['data'];
                            $file_en = $rowYear['file_en'];
                            $file_es = $rowYear['file_es'];
                            
                            if ($file_en != '' or $file_es != '') {
                            echo "<tr>";
                            echo "<td>$data</td>";
                            echo "<td><a href='../uploads/$file_en' target='_blank'>EN</a></td>";
                            echo "<td><a href='../uploads/$file_es' target='_blank'>ES</a></td>";
                            }
                            else {
                                echo "<tr>";
                                echo "<td>$data</td>";
                                echo "<td></td>";
                                echo "<td></td>";
                            }
                            echo "</tr>";
                        }
                    } else {
                        // If there's no data for the year
                        echo "<tr><td colspan='3'>No data available</td></tr>";
                    }

                    echo "</table>";
                    echo "</div>";
                }
            }
        ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>