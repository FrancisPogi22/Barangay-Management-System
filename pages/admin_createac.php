<!DOCTYPE html>
<html>
<?php
session_start();
?>

<head>
  <meta charset="UTF-8">
  <title>Barangay Information System</title>
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
          <img src="img/ligaya.png" style="height:100px;" />
          <h3 class="panel-title">
            <strong>
              Barangay Ligaya Information and Management System
            </strong>
            <br>
            <br>
            <strong>
              <u>Admin</u>
            </strong>
          </h3>
        </div>
        <div class="panel-body">
          <form role="form" method="post" action="admin_createac.php">
            <div class="form-group">
              <label for="txt_username">First Name: </label>
              <input type="text" class="form-control" style="border-radius:0px" name="txt_fname" placeholder="Enter Firstname">
            </div>
            <div class="form-group">
              <label for="txt_password">Last Name: </label>
              <input type="text" class="form-control" style="border-radius:0px" name="txt_lname" placeholder="Enter Lastname">
            </div>
            <div class="form-group">
              <label for="txt_username">Email: </label>
              <input type="text" class="form-control" style="border-radius:0px" name="txt_email" placeholder="Enter Email">
            </div>
            <div class="form-group">
              <label for="txt_username">Username: </label>
              <input type="text" class="form-control" style="border-radius:0px" name="txt_username" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label for="txt_username">Password: </label>
              <input type="password" class="form-control" style="border-radius:0px" name="txt_password" placeholder="Enter Password">
            </div>
            <div class="center">
              <button type="submit" class="btn btn-sm btn-primary" name="btn_create_account">Create Account</button>
            </div>
            <label id="error" class="label label-danger pull-right"></label>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  include "pages/connection.php";
  if (isset($_POST['btn_create_account'])) {
    $firstName = $_POST['txt_fname'];
    $lastName = $_POST['txt_lname'];
    $username = $_POST['txt_username'];
    $email = $_POST['txt_email'];
    $password = $_POST['txt_password'];

    // Insert data into the 'admin' table
    $insert_query = "INSERT INTO admin (firstName, lastName, email, username, password) VALUES ('$firstName', '$lastName', '$username', '$email', '$password')";
    $result = mysqli_query($con, $insert_query);

    if ($result) {
      echo '<script type="text/javascript">alert("Account created successfully.");</script>';
      header('location: pages/admin/login.php');
      exit();
    } else {
      echo '<script type="text/javascript">alert("Failed to create account.");</script>';
    }
  }
  ?>

</body>

</html>