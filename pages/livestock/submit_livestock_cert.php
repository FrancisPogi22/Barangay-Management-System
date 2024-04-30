<?php
include "../connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $sellerName = $_POST['sellerName'];
    $sellerAddress = $_POST['sellerAddress'];
    $amount = $_POST['amount'];
    $buyerName = $_POST['buyerName'];
    $buyerAddress = $_POST['buyerAddress'];
    $itemSold = $_POST['itemSold'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $cowlicks = $_POST['cowlicks'];
    $brandMun = $_POST['brandMun'];
    $brandOwn = $_POST['brandOwn'];
    $transacDate = $_POST['transacDate'];


    // Save data to the database
    $query = "INSERT INTO livestock_cert (sellerName, sellerAddress, amount, buyerName, buyerAddress, itemSold, 
    age, sex, cowlicks, brandMun, brandOwn, transacDate, status) VALUES ('$sellerName', '$sellerAddress', '$amount', 
    '$buyerName', '$buyerAddress', '$itemSold','$age','$sex','$cowlicks','$brandMun','$brandOwn','$transacDate', 'New')";
    mysqli_query($con, $query);

    // Redirect back to the original page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
