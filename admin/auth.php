<?php
  
  session_start();
  
  // Include database connectivity
      
  include_once('../includes/config.php');
  
if (isset($_POST)) {
      
    $name = $_POST['username'];
    $password = $_POST['password'];


    if (!empty($name) || !empty($password)) {
        $stmt  = "SELECT * FROM users WHERE name = '$name'";
        $result = mysqli_query($conn, $stmt);
        if(mysqli_num_rows($result) == 1){
          while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['role'] = $row['role'];
				$_SESSION['loggedin'] = true;
                $_SESSION['name'] = $row['name'];
                header("Location:index.php");
            }
			else {
                $errorMsg = "Email or Password is invalid";
            }    
          }
        }
		else {
          $errorMsg = "No user found on this email";
        } 
    }
	else {
      $errorMsg = "Email and Password is required";
    }
}
  
?>