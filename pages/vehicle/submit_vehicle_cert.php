<?php
include "../connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $sellerName = $_POST['sellerName'];
    $sellerAddress = $_POST['sellerAddress'];
    $amount = $_POST['amount'];
    $amount_words = $_POST['amount_words'];
    $buyerName = $_POST['buyerName'];
    $buyerAddress = $_POST['buyerAddress'];
    $make = $_POST['make'];
    $plateNum = $_POST['plateNum'];
    $engineNum = $_POST['engineNum'];
    $chasisNum = $_POST['chasisNum'];
    $denomination = $_POST['denomination'];
    $fuel = $_POST['fuel'];
    $bodyType = $_POST['bodyType'];
    $crNo = $_POST['crNo'];
    $date = $_POST['date'];
    $witness = $_POST['witness'];
    $locationTran = $_POST['locationTran'];

    // Save data to the database
    $query = "INSERT INTO vehicle_cert (sellerName, sellerAddress, amount, amount_words, buyerName, buyerAddress, make, 
    plateNum, engineNum, chasisNum, denomination, fuel, bodyType, crNo, date, witness, locationTran, status) VALUES ('$sellerName', '$sellerAddress', '$amount', '$amount_words',
    '$buyerName', '$buyerAddress', '$make','$plateNum','$engineNum','$chasisNum','$denomination','$fuel','$bodyType', '$crNo', '$date', '$witness', '$locationTran', 'New')";
    mysqli_query($con, $query);

    // Redirect back to the original page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
