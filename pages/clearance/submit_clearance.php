<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $residentName = $_POST['residentName'];
    $id = $_POST['ownerId'];
    $age = $_POST['age'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $status = $_POST['status'];
    $cert_amount = $_POST['cert_amount'];
    $bcNo = $_POST['bcNo'];
    // This should be 'Walk-in' based on your form

    // Your database query to insert the new entry
    $sql = "INSERT INTO clearance_cert (resident_id, ownerId, fname, mname, lname, age, status, cert_amount, bcNo) VALUES ('$residentId', '$id', '$fname', '$mname', '$lname', '$age', '$status' ,'$cert_amount' ,'$bcNo')";

    if (mysqli_query($con, $sql)) {
        mysqli_close($con);

        // Redirect back to the original page
        header("Location: clearance.php");
        exit();
    }
}
