<?php
include "../connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $purpose = $_POST['purpose'];


    // Save data to the database
    $query = "INSERT INTO clearance_cert (fname, mname, lname, age, purpose, status) VALUES ('$fname', '$mname', '$lname', '$age', '$purpose', 'New')";
    mysqli_query($con, $query);

    // Redirect back to the original page
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}
?>