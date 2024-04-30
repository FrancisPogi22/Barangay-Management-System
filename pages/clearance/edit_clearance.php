<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['requestId'];
    $bcno = $_POST['bcno'];
    $amount = $_POST['amount'];

    $query = "UPDATE `clearance_cert` SET `bcNo`='$bcno', `amount`='$amount' WHERE id = '$id'";
    mysqli_query($con, $query);

    // Redirect back to the original page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
