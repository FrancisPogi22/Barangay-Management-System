<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $businessName = $_POST['business_name'];
    $businessAddress = $_POST['business_address'];
    $typeOfBusiness = $_POST['type_of_business'];
    $status = "New"; // Set the initial status of the request

    // $residentId = $_SESSION['userid']; // Assuming you have a session variable for resident ID

    // Insert the permit request into the database
    $sql = "INSERT INTO permit_re (businessName, businessAddress, typeOfBusiness, status) 
            VALUES ( '$businessName', '$businessAddress', '$typeOfBusiness', '$status')";

    if (mysqli_query($con, $sql)) {
        // Redirect back to permit.php
        header("Location: ../resident/permit.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo "Invalid request";
}
