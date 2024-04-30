<?php
include "../connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id = $_POST['ownerId'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $bday = $_POST['bday'];
    $purok = $_POST['purok'];
    $year = $_POST['year_stayed'];


    // Save data to the database
    $query = "INSERT INTO indigency_cert (ownerId, fname, mname, lname, age, bday, purok, year_stayed, status) VALUES ('$id', '$fname', '$mname', '$lname', '$age', '$bday', '$purok', '$year', 'Walk-in')";
    mysqli_query($con, $query);

    // Redirect back to the original page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
