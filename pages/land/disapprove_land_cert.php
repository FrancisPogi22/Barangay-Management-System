<?php
// Include your connection file
include "../connection.php";

// Check if ID is sent via POST
if (isset($_POST['id'])) {
    $certificateId = $_POST['id'];

    // Update the status of the certificate to 'Disapproved' in the database
    $query = "UPDATE land_cert SET status = 'Disapproved' WHERE id = $certificateId";
    if (mysqli_query($con, $query)) {
        echo "Certificate disapproved successfully.";
    } else {
        echo "Error disapproving certificate: " . mysqli_error($con);
    }
} else {
    echo "Certificate ID not provided.";
}
