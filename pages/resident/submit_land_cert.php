<?php
session_start();
include "../connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $sellerId = $_SESSION['userid'];
    $sellerName = $_POST['sellerName'];
    $sellerAddress = $_POST['sellerAddress'];
    $buyerName = $_POST['buyerName'];
    $buyerAddress = $_POST['buyerAddress'];
    $landArea = $_POST['landArea'];
    $propertySold = $_POST['propertySold'];
    $legalAgree = $_POST['legalAgree'];
    $paymentConfirm = $_POST['paymentConfirm'];
    $confirmationPay = $_POST['confirmationPay'];
    $date = $_POST['date'];
    $witness = $_POST['witness'];
    $notarizeDate = $_POST['notarizeDate'];
    $locationNota = $_POST['locationNota'];

    // Save data to the database
    $query = "INSERT INTO land_cert (sellerId, sellerName, sellerAddress, buyerName, buyerAddress, landArea, propertySold,
    legalAgree, paymentConfirm, confirmationPay, date, witness, notarizeDate, locationNota, status) VALUES ('$sellerId', '$sellerName', '$sellerAddress', 
    '$buyerName', '$buyerAddress', '$landArea','$propertySold','$legalAgree','$paymentConfirm','$confirmationPay','$date','$witness', '$notarizeDate', '$locationNota', 'New')";
    mysqli_query($con, $query);

    // Redirect back to the original page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
