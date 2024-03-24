<?php
  
  session_start();
  
  // Include database connectivity
      
  include_once('../includes/config.php');
  
if (isset($_POST)) {

  $turnstile_secret     = '0x4AAAAAAAVeOhSiIwYvalWGrBJg8CdiwF8';
  $turnstile_response   = $_POST['cf-turnstile-response'];
  $url                  = "https://challenges.cloudflare.com/turnstile/v0/siteverify";
  $post_fields          = "secret=$turnstile_secret&response=$turnstile_response";

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
  $response = curl_exec($ch);
  curl_close($ch);

  $response_data = json_decode($response);
  if ($response_data->success != 1) {
      $_SESSION['errorMsg'] =  "Catpcha verification failed!";
      header("Location: login.php");
      exit;
  }
  else {
      
    $name = $_POST['username'];
    $password = $_POST['password'];


    if (!empty($name) || !empty($password)) {
        $stmt  = "SELECT * FROM users WHERE name = '$name' AND role_id = 2";
        $result = mysqli_query($conn, $stmt);
        if(mysqli_num_rows($result) == 1){
          while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['role'] = $row['role_id'];
                $_SESSION['id'] = $row['id'];
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
      $_SESSION['errorMsg'] =  "No such user found!";
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
}
  
?>