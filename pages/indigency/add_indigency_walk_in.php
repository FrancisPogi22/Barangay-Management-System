<?php
// Include your connection file
include "../connection.php";

// Check if ID is sent via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $bday = $_POST['bday'];
    $purok = $_POST['purok'];
    $year = $_POST['year_stayed'];

    // Update the status of the certificate to 'Approved' in the database
    $query = "UPDATE indigency_cert SET status = 'Approved' WHERE id = $certificateId";
    if (mysqli_query($con, $query)) {
        echo "Certificate approved successfully.";
    } else {
        echo "Error approving certificate: " . mysqli_error($con);
    }
} else {
    echo "Certificate ID not provided.";
}
