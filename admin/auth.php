<?php
  
  session_start();
  
  // Include database connectivity
      
  include_once('../includes/config.php');
  
if (isset($_POST)) {
      
    $name = $_POST['username'];
    $password = $_POST['password'];


    if (!empty($name) || !empty($password)) {
        $stmt  = "SELECT * FROM users WHERE name = '$name' AND role_id = 1";
        $result = mysqli_query($conn, $stmt);
        if(mysqli_num_rows($result) == 1){
          while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['role'] = $row['role_id'];
				        $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $row['name'];
                header("Location:index.php");
            }
			else {
        $_SESSION['errorMsg'] =  "Email or Password is invalid!";
        header("Location: login.php");
        exit();
            }    
          }
        }
		else {
      $_SESSION['errorMsg'] =  "No such Admin user found!";
      header("Location: login.php");
      exit();
        } 
    }
	else {
    $_SESSION['errorMsg'] =  "Email and Password is required!";
    header("Location: login.php");
    exit();
    }
}
  
?>