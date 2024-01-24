<?php
include 'includes/config.php';
session_start();

$showAlert = false;
$Loggedin = false;
$error='';

if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['register'] == 'register') { 

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = 2;

    if(($password)) { 
        
        $hash = password_hash($password, PASSWORD_DEFAULT); 
            
        // Password Hashing is used here.  
        $sql = "INSERT INTO `users` ( `name`, `email`,
            `password`, `role_id`, `created_at`) VALUES ('$name', '$email',  
            '$hash', '$role', current_timestamp())"; 

        $result = mysqli_query($conn, $sql); 

        if ($result) { 
            $showAlert = true;

            if (!empty($name) || !empty($password)) {
                $stmt  = "SELECT * FROM users WHERE name = '$name' AND '$email' AND role_id = 2";
                $result = mysqli_query($conn, $stmt);
                if(mysqli_num_rows($result) == 1){
                    while ($row = mysqli_fetch_assoc($result)) {
                        if (password_verify($password, $row['password'])) {
                            $_SESSION['role'] = $row['role_id'];
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['loggedin'] = true;
                            $_SESSION['name'] = $row['name'];
                            $stmt2 = "INSERT INTO `offices` (`user_id`, `company_contact_name`) VALUES ('".$row['id'].", ".$row['name']."')";
                        header("Location:create-account.php");
                        }
                    }
                }
            }
        }
    }
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['register'] == 'login') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($name) || !empty($password)) {
        $stmt  = "SELECT * FROM users WHERE name = '$name' AND email = '$email' AND role_id = 2";
        $result = mysqli_query($conn, $stmt);
        if(mysqli_num_rows($result) == 1){
          while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['role'] = $row['role_id'];
                $_SESSION['id'] = $row['id'];
				$_SESSION['loggedin'] = true;
                $_SESSION['name'] = $row['name'];
                header("Location:client/index.php");
            }
			else {
        $error =  "Email or Password is invalid!";
            }    
          }
        }
		else {
      $error =  "No such user found!";
        } 
    }
	else {
    $error =  "Email and Password is required!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
    
<nav class="navbar navbar-expand-lg px-5">
    <div class="container-fluid">
		<div class="d-flex flex-column">
	        <a class="navbar-brand p-0" href="#">Bismarck Business Group LLC</a>
			<p class="m-0">A TaxWise Service Bureau</p>
		</div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0 align-items-center mx-auto">
            <li class="nav-item">
            	<a class="nav-link" href="index.php">Main</a>
            </li>
            <li class="nav-item">
            	<a class="nav-link" href="index.php#product">Our Product</a>
            </li>
            <li class="nav-item">
            	<a class="nav-link active" href="create-account.php">Create an account</a>
            </li>
            <li class="nav-item">
            	<!-- <a class="nav-link" href="office-registration.php">Office Registration</a> -->
            </li>
            <li class="nav-item">
            	<a class="nav-link" href="#">Student Registration</a>
            </li>
            <li class="nav-item">
            	<a class="nav-link" href="#">About Us</a>
            </li>
            
        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
        <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo '<li class="nav-item">
                            <a class="nav-link" href="client/index.php">'. $_SESSION['name'] .'</a>
                        </li>';
                }
				else {
					echo '<li class="nav-item">
							<a class="nav-link" href="client/login.php">Client Login</a>
						</li>';
				}
            ?>
        </ul>
		<div id="google_translate_element"></div>
        </div>
    </div>
</nav>
	<div class="row justify-content-center mt-5">
    <?php 
        if (isset($_GET['account']) && $_GET['account'] == 'false') {
            echo '<div class="alert alert-danger w-75 alert-dismissible fade show" role="alert">
            Please register or login to continue.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    ?>
        <div class="col-md-4 px-5 px-md-0">
            <?php 
            if ($showAlert) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Account created successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            ?>
            <h2 class="text-center mb-4">Register</h2>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="name" name="name" required min="3">
                    <input type="text" class="form-control" id="register" value="register" name="register" hidden>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required min="6">
                </div>
                <div class="mb-3">
                    <p>To make your first payment, you will have to create an account with us to become our customer and you will need to complete the information contained in: Office Registration.</p>
                </div>
                <div class="mb-3">
                    <p>Once we have received your payment, we will send to your email your Client ID and user name, which you will use To log in next time.</p>
                </div>
                <div class="text-center mb-5">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
        <div class="col-md-4 px-5 px-md-0 offset-md-2">
        <?php 
            if ($error != '') {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                '. $error .'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            ?>
            <h2 class="text-center mb-4">Existing Client Login</h2>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <input type="text" class="form-control" id="register" value="login" name="register" hidden>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">User Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <p>Warning: Five unsuccessfull login attemps will lock your account</p>
                </div>
                <div class="mb-3">
                    <a href="#">Need help logging in?</a>
                </div>
                <div class="mb-3">
                    <a href="#" class="fw-bolder">Forgot User name or Password?</a>
                </div>
                <div class="text-center mb-5">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
		<hr>
		<footer>
			<div class="row mx-5 px-5">
				<div class="col-md-4">
					<a class="fs-5 text-decoration-none text-dark" href="#">Bismarck Business Group LLC</a>
					<p class="m-0">A TaxWise Service Bureau</p>
				</div>
				<div class="col-md-6 offset-2">
					<ul class="list-unstyled">
						<li>
							<a class="text-dark-emphasis text-decoration-none" href="#">Main</a>
						</li>
						<li>
							<a class="text-dark-emphasis text-decoration-none" href="#">Our Product</a>
						</li>
						<li>
							<a class="text-dark-emphasis text-decoration-none" href="#">Create an account</a>
						</li>
						<li>
							<a class="text-dark-emphasis text-decoration-none" href="#">Office Registration</a>
						</li>
						<li>
							<a class="text-dark-emphasis text-decoration-none" href="#">Student Registration</a>
						</li>
						<li>
							<a class="text-dark-emphasis text-decoration-none" href="#">About Us</a>
						</li>
					</ul>
				</div>
			</div>
		</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

	<script type="text/javascript">
		function googleTranslateElementInit() {
		  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
		}
		
		</script>
		
		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>