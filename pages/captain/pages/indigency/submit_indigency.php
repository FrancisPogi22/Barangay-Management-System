<?php
include "../connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $bday = $_POST['bday'];
    $purok = $_POST['purok'];
    $year = $_POST['year_stayed'];


    // Save data to the database
    $query = "INSERT INTO indigency_cert (fname, mname, lname, age, bday, purok, year_stayed, status) VALUES ('$fname', '$mname', '$lname', '$age', '$bday', '$purok', '$year', 'New')";
    mysqli_query($con, $query);

    // Redirect back to the original page
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}
?>