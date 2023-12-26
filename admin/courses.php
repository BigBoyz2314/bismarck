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
                    <a class="nav-link active" href="courses.php">Courses</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
	<div class="container-fluid w-75">
        <!-- Edit Modal -->
        <div class="modal" id="editModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Course Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <!-- Form to edit course details -->
                    <form action="edit-course.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="editId" name="id" value="">
                        <!-- Add fields here to edit course details -->
                        <label for="editData">Text:</label>
                        <input type="text" class="form-control" id="editData" value="" name="data">
                        
                        <label for="editFileEn">File English:</label>
                        <input type="file" class="form-control" id="file-en" name="file-en">
                        
                        <label for="editFileEs">File Spanish:</label>
                        <input type="file" class="form-control" id="file-es" name="file-es">

                        <!-- Other fields for editing -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        

        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Courses</h3>
            </div>
        </div>
        <div class="row">
        <h4>Add New Entry</h4>
        <div class="col-md-6">
                <form action="add-course.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="text" class="form-label">Text</label>
                        <input type="text" class="form-control" id="text" name="text" required>
                        <label for="file-en" class="form-label">File English</label>
                        <input type="file" class="form-control" name="file-en" required>
                        <label for="file-es" class="form-label">File Spanish</label>
                        <input type="file" class="form-control" name="file-es" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Add" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 rounded-4">
                <table class="table table-bordered w-50">
                    <thead class="table-success">
                        <tr>
                            <th colspan="5">Curso de Preparacion de Impuestos</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include_once('../includes/config.php');

                    $stmt = "SELECT * FROM courses";
                    $result = $conn->query($stmt);
                    $i = 1;

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {

                            $id = $row['id'];
                            $data = $row['data'];
                            $file_en = $row['file_en'];
                            $file_es = $row['file_es'];
                            
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

                            if ($_SESSION['role'] == '1') {
                                echo "<td><button class='btn btn-warning edit-btn' data-bs-toggle='modal' data-bs-target='#editModal' data-id='$id' data-data='$data'>Edit</button></td>";
                                echo "<td><form action='' method='get'><input type='hidden' name='desigName' value='". $data ."'><input type='hidden' name='id' value='". $id ."'><input type='submit' value='Delete' class='btn btn-danger'></form></td>";
                            }

                            echo "</tr>";
                        }
                    }

                        if (isset($_GET['id'])) {
                            $delID = $_GET['id'];
                            $delName = $_GET['desigName'];
                              
                            echo '<script type="text/javascript"> ';  
                            echo '  if (confirm("Are you sure you want to DELETE '. "'$delName'" .'?")) {';  
                            echo '    window.location.href = "del-course.php?delName='. $delName .'&delID='. $delID .'";';  
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
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                
                const id = this.getAttribute('data-id');
                const data = this.getAttribute('data-data');

                // Populate modal fields with the respective data
                document.getElementById('editId').value = id;
                document.getElementById('editData').value = data;
            });
        });
    });
    </script>


	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>