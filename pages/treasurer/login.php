<?php
session_start();
include "../connection.php";

if (isset($_POST['btn_login'])) {
    $username = $_POST['txt_username'];
    $password = $_POST['txt_password'];

    $query = "SELECT * FROM tblsignup WHERE username='$username' AND password='$password' AND type='treasurer'";
    $result = mysqli_query($con, $query);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['role'] = "Treasurer";
        $_SESSION['userid'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        header('location: ../permit/permit.php'); // Fixed the redirection path
        exit();
    } else {
        $error = "Invalid Account";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Barangay Information System</title>
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

    <div class="pull-left">
        <left><a href="../../main/index.php" class="btn btn-sm btn-default">Back</a></left>
    </div>

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
                        <div class="form-group">
                            <label for="txt_password">Password: </label>
                            <input type="password" class="form-control" style="border-radius:0px" name="txt_password" placeholder="Enter Password">
                            <center><a href="../treasurer/forgot_password.php" style="color: blue;">Forgot Password</a></center>
                        </div>
                        <div class="center">
                            <button type="submit" class="btn btn-sm btn-primary" name="btn_login">Log in</button>
                        </div>
                        <label id="error" class="label label-danger pull-right"><?php if (isset($error)) echo $error; ?></label>
                        <br>
                        <center><a href="../treasurer/signup.php" style="color:red">Don't have an account? Sign up</a></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>