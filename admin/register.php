<?php

session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== 1){
    header("location: index.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST") { 
      
    // Include file which makes the 
    // Database Connection. 
  include '../includes/config.php';    
    
    $name = $_POST["name"];  
    $password = $_POST["password"];
    $role = $_POST["role"];


if(($password)) { 
    
    $hash = password_hash($password, PASSWORD_DEFAULT); 
        
    // Password Hashing is used here.  
    $sql = "INSERT INTO `users` ( `name`,  
        `password`, `role_id`, `created_at`) VALUES ('$name',  
        '$hash', '$role', current_timestamp())"; 

    $result = mysqli_query($conn, $sql); 

    if ($result) { 
        $showAlert = true;  
    } 
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Bismarck Business Group LLC</h1>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Login</h2>
                <form action="register.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Select Role</label>
                        <select name="role" id="role">
                            <option value="1">admin</option>
                            <option value="2">user</option>
                        </select>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
