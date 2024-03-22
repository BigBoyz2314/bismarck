<?php

session_start();

// Include database connectivity

include_once('../includes/config.php');

if (isset($_POST['oldPassword']) && isset($_POST['newPassword'])) {

    $userId = $_SESSION['id'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];

    // Check if oldPassword and newPassword are not empty
    if (!empty($oldPassword) && !empty($newPassword)) {

        // Fetch user's current password from the database
        $stmt = "SELECT * FROM users WHERE id = '$userId'";
        $result = mysqli_query($conn, $stmt);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($oldPassword, $row['password'])) {

                // Hash the new password
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // Update the user's password in the database
                $updateStmt = "UPDATE users SET password = '$hashedPassword' WHERE id = '$userId'";
                $updateResult = mysqli_query($conn, $updateStmt);

                if ($updateResult) {
                    $_SESSION['successMsg'] = "Password changed successfully!";
                    header("Location: index.php");
                    exit();
                } else {
                    $_SESSION['errorMsg'] = "Failed to update password. Please try again!";
                    header("Location: change-password.php");
                    exit();
                }
            } else {
                $_SESSION['errorMsg'] = "Old password is incorrect!";
                header("Location: change-password.php");
                exit();
            }
        } else {
            $_SESSION['errorMsg'] = "Error fetching user data!";
            header("Location: change-password.php");
            exit();
        }
    } else {
        $_SESSION['errorMsg'] = "Old password and new password are required!";
        header("Location: change-password.php");
        exit();
    }
} else {
    $_SESSION['errorMsg'] = "Invalid request!";
    header("Location: change-password.php");
    exit();
}

?>
