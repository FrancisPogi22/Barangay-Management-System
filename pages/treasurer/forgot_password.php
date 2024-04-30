<?php
session_start();
include "../connection.php";

if (isset($_POST['btn_send_otp'])) {
    $username = $_POST['txt_username'];

    // Query to get user's contact number
    $query = "SELECT contact FROM tblsignup WHERE username='$username'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $contact_number = $row['contact'];

    // Generate OTP (for demo purposes, generate a 6-digit random number)
    $otp = rand(100000, 999999);

    // Send OTP to user's contact number (you will need to implement this part)
    // For demo purposes, we'll just display the OTP
    $otp_message = "Your OTP is: $otp";

    // Store the OTP in session
    $_SESSION['reset_password_otp'] = $otp;
    $_SESSION['reset_password_username'] = $username;

    // Display the OTP message
    echo "<script>alert('$otp_message'); window.location.href = '../treasurer/reset_password.php';</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />
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
                    <img src="../../img/bims.png" style="height:200px;" />
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
                            <label for="txt_username">Username: </label>
                            <input type="text" class="form-control" style="border-radius:0px" name="txt_username" placeholder="Enter Username">
                        </div>
                        <div class="center">
                            <button type="submit" class="btn btn-sm btn-primary" name="btn_send_otp">Send OTP</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>