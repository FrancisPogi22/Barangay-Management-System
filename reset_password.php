<?php
session_start();
include "pages/connection.php";

if (isset($_POST['btn_reset_password'])) {
    $otp_entered = $_POST['txt_otp'];
    $otp_stored = $_SESSION['reset_password_otp'];
    $username = $_SESSION['reset_password_username'];

    if ($otp_entered == $otp_stored) {
        // OTP verification successful, proceed to reset password
        $new_password = $_POST['txt_new_password'];

        // Update the password in the database
        $query = "UPDATE tblsignup SET password='$new_password' WHERE username='$username'";
        if (mysqli_query($con, $query)) {
            // Password reset successful
            $_SESSION['reset_password_success'] = "Password reset successful. You can now login with your new password.";
            header('location: login.php'); // Redirect to login page
            exit();
        } else {
            // Error updating password
            $error = "Error resetting password. Please try again.";
        }
    } else {
        // OTP verification failed
        $error = "Invalid OTP. Please enter the correct OTP.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <style>
        .center {
            text-align: center;
        }
    </style>
</head>

<body class="skin-black">
    <div class="container" style="margin-top:30px">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center;">
                    <img src="img/bims.png" style="height:200px;" />
                    <h3 class="panel-title">
                        <strong>
                            Barangay Ligaya Information and Management System
                        </strong>
                        <br>
                        <br>
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label for="txt_otp">Enter OTP: </label>
                            <input type="text" class="form-control" style="border-radius:0px" name="txt_otp" placeholder="Enter OTP">
                        </div>
                        <div class="form-group">
                            <label for="txt_new_password">New Password: </label>
                            <input type="password" class="form-control" style="border-radius:0px" name="txt_new_password" placeholder="Enter New Password">
                        </div>
                        <div class="center">
                            <button type="submit" class="btn btn-sm btn-primary" name="btn_reset_password">Reset Password</button>
                        </div>
                        <label id="error" class="label label-danger pull-right"><?php if (isset($error)) echo $error; ?></label>
                        <br>
                        <?php
                        if (isset($_SESSION['reset_password_success'])) {
                            echo '<div class="alert alert-success">' . $_SESSION['reset_password_success'] . '</div>';
                            unset($_SESSION['reset_password_success']);
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>