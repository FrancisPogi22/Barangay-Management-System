<?php
// Include your connection file
include "../connection.php";

// Check if ID is sent via POST
if (isset($_POST['id'])) {
    $certificateId = $_POST['id'];

    // Update the status of the certificate to 'Approved' in the database
    $query = "UPDATE clearance_cert SET status = 'Approved' WHERE id = $certificateId";
    if (mysqli_query($con, $query)) {
        echo "Certificate approved successfully.";
    } else {
        echo "Error approving certificate: " . mysqli_error($con);
    }
} else {
    echo "Certificate ID not provided.";
}
