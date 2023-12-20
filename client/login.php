<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
                <form action="auth.php" method="POST">
                    <!-- <div class="mb-3">
                        <label for="clientid" class="form-label">Client ID</label>
                        <input type="number" class="form-control" id="clientid" name="clientid" required>
                    </div> -->
                    <div class="mb-3">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <?php
                        session_start();
                        if (isset($_SESSION['errorMsg'])) {
                            echo '<div class="alert alert-danger">' . $_SESSION['errorMsg'] . '</div>';
                            unset($_SESSION['errorMsg']); // Clear the error message from session after displaying
                        }
                    ?>
                    <div class="mb-3">
                        <p>Warning: Five unsuccessfull login attemps will lock your account</p>
                    </div>
                    <div class="mb-3">
                        <a href="#">Need help logging in?</a>
                    </div>
                    <div class="mb-3">
                        <a href="#" class="fw-bolder">Forgot User name or Password?</a>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
