<?php
include "../connection.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM residency_cert WHERE id = $id";
    if (mysqli_query($con, $query)) {
        echo "Certificate deleted successfully.";
    } else {
        echo "Error deleting certificate: " . mysqli_error($con);
    }
} else {
    echo "Certificate ID not provided.";
}
