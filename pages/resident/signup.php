<?php
include "../connection.php";
session_start();

// Check if the privacy policy checkbox is not checked
if (isset($_POST['btn_signup']) && !isset($_POST['privacy-policy'])) {
    // Display an error message
    $error_message = '<div class="alert alert-danger">Please agree to the privacy policy to continue.</div>';
} else {
    // Process signup if the privacy policy checkbox is checked
    if (isset($_POST['btn_signup'])) {
        $fname = $_POST['txt_fname'];
        $mname = $_POST['txt_mname'];
        $lname = $_POST['txt_lname'];
        $age = $_POST['txt_age'];
        $contact = $_POST['txt_contact'];
        $address = $_POST['txt_address'];
        $username = $_POST['txt_username'];
        $email = $_POST['txt_email'];
        $password = $_POST['txt_password'];

        // Insert data into tblsignup table
        $query = "INSERT INTO tblsignup (name, mname, lname, age, contact, address, username, email, password, type) VALUES ('$fname', '$mname', '$lname', '$age','$contact', '$address', '$username', '$email', '$password', 'resident')";
        if (mysqli_query($con, $query)) {
            // Set notification message
            $_SESSION['signup_success'] = "Account created successfully. You can now log in.";
            echo '<script>alert("Account created successfully. You can now log in.");window.location.href="login.php";</script>';
        } else {
            // Error handling
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
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

<body style="background-color: green;">
    <div class="container" style="margin-top:30px">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center;">
                    <img src="../../img/bims.png" style="height:100px;" />
                    <h3 class="panel-title">
                        <strong>
                            Barangay Ligaya Information and Management System
                        </strong>
                        <br>
                        <br>
                    </h3>
                </div>
                <div class="panel-body">
                    <?php
                    // Display error message if privacy policy checkbox is not checked
                    if (isset($error_message)) {
                        echo $error_message;
                    }
                    ?>
                    <form role="form" method="post">
                        <div class="form-group">
                            <label for="txt_fname">First Name: </label>
                            <input type="text" class="form-control" style="border-radius:0px" name="txt_fname" placeholder="Enter First Name" required>
                            <label for="txt_mname">Middle Initials: (Ex. A) </label>
                            <input type="text" class="form-control" style="border-radius:0px" name="txt_mname" placeholder="Enter Middle Initials" pattern="[A-Za-z]{1}" title="Please enter a single alphabetical character only." required>
                            <label for="txt_lname">Last Name: </label>
                            <input type="text" class="form-control" style="border-radius:0px" name="txt_lname" placeholder="Enter Last Name" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_age">Age: </label>
                            <input type="text" class="form-control" style="border-radius:0px" name="txt_age" placeholder="Enter Age" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_name">Contact: </label>
                            <input type="text" class="form-control" style="border-radius:0px" name="txt_contact" placeholder="Enter Contact Number" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_name">Address: </label>
                            <input type="text" class="form-control" style="border-radius:0px" name="txt_address" placeholder="Enter Address" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_username">Username: </label>
                            <input type="text" class="form-control" style="border-radius:0px" name="txt_username" placeholder="Enter Username" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_email">Email: </label>
                            <input type="email" class="form-control" style="border-radius:0px" name="txt_email" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_password">Password: </label>
                            <input type="password" class="form-control" style="border-radius:0px" name="txt_password" placeholder="Enter Password" required>
                        </div>
                        <input type="checkbox" id="privacy-policy" name="privacy-policy" required>
                        <label for="privacy-policy">The Barangay Information Management System (BIMS) is committed to
                            protecting your privacy. We collect and use your personal information, such as your name, address,
                            and contact details, solely for the purpose of providing and improving our services. We do not share
                            your information with third parties without your consent, except as required by law. We take measures
                            to safeguard your information from unauthorized access or disclosure. By using BIMS, you agree to
                            our privacy policy.</label>
                        <div class="center">
                            <button type="submit" class="btn btn-sm btn-primary" name="btn_signup">Sign up</button>
                        </div>
                        <br>
                        <?php
                        if (isset($_SESSION['signup_success'])) {
                            echo '<div class="alert alert-success">' . $_SESSION['signup_success'] . '</div>';
                            unset($_SESSION['signup_success']);
                            echo '<meta http-equiv="refresh" content="2;url=login.php">';
                        }
                        ?>
                        <center><a href="../resident/login.php">Already have an account. Login</a></center>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>