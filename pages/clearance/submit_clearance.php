<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $residentName = $_POST['residentName'];
    $status = $_POST['status'];
    $cert_amount = $_POST['cert_amount'];
    $bcNo = $_POST['bcNo'];
    // This should be 'Walk-in' based on your form

    // Extract resident id and age from the selected option
    list($residentId, $age) = explode("|", $residentName);

    // Get the resident's full name
    $residentNameQuery = mysqli_query($con, "SELECT fname, mname, lname FROM resident WHERE resident_id = '$residentId'");
    $row = mysqli_fetch_array($residentNameQuery);
    $residentFullName = $row['fname'] . " " . $row['mname'] . " " . $row['lname'];

    // Your database query to insert the new entry
    $sql = "INSERT INTO clearance_cert (resident_id, fname, mname, lname, age, status, cert_amount, bcNo) VALUES ('$residentId', '{$row['fname']}', '{$row['mname']}', '{$row['lname']}', '$age', '$status' ,'$cert_amount' ,'$bcNo')";

    if (mysqli_query($con, $sql)) {
        mysqli_close($con);

        // Redirect back to the original page
        header("Location: clearance.php");
        exit();
    }
}
