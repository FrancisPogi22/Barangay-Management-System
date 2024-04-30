<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['requestId'];
    $amount = $_POST['amount'];

    $query = "UPDATE `indigency_cert` SET `amount`='$amount' WHERE id = '$id'";
    mysqli_query($con, $query);

    // Redirect back to the original page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
