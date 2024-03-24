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

    <?php include("header.php"); ?>
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

    <?php include('translate.php'); ?>

</body>
</html>