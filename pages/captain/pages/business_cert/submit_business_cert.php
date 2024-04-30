<?php
include "../connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $businessName = $_POST['businessName'];
    $businessAddress = $_POST['businessAddress'];
    $typeOfBusiness = $_POST['typeOfBusiness'];

    // Save data to the database
    $query = "INSERT INTO business_cert (businessName, businessAddress, typeOfBusiness, status) VALUES ('$businessName', '$businessAddress', '$typeOfBusiness', 'New')";
    mysqli_query($con, $query);

    // Redirect back to the original page
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}
?>