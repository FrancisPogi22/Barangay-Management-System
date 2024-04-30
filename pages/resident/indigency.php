<!DOCTYPE html>
<html>
<?php
session_start();

if (!isset($_SESSION['userid'])) {
    header('Location: ../../index.php');
}

include "../connection.php";

$result = mysqli_query($con, "SELECT * FROM tblsignup WHERE id = {$_SESSION['userid']}");

if (!isset($_SESSION['role'])) {
    header("Location: ../../login.php");
    exit;
}

if ($result->num_rows == 0) {
    header("Location: indigency.php");
    exit;
}

if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];

    if ($role != 'Resident') {
        header('Location: ../../main/index.php');
    }
}

$result->close();
$con->close();

include('../head_css.php');
?>

<body class="skin-black">
    <!-- header logo: style can be found in header.less -->
    <?php
    include "../connection.php";
    include('../header.php');
    ?>

    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <?php include('../sidebar-left.php'); ?>

        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Barangay Indigency Certificate
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Request Certificate Button -->
                <div class="box">
                    <div class="box-header">
                        <div class="button-wrapper">
                            <button class='btn btn-primary btn-sm requestCertificateBtn' data-toggle='modal' data-target='#requestModal'>Request Certificate</button>
                        </div>
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active"><a data-toggle="tab" href="#new">New</a></li>
                            <li><a data-toggle="tab" href="#approved">Approved</a></li>
                            <li><a data-toggle="tab" href="#disapproved">Disapproved</a></li>
                        </ul>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <div class="tab-content">
                            <div id="new" class="tab-pane fade in active">
                                <!-- New Certificate Requests Table -->
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Birthday</th>
                                            <th>Street</th>
                                            <th>Recidency Year</th>
                                            <th>Date for Pickup</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($con, "SELECT id, CONCAT(fname, ' ', mname, ' ', lname) AS completename, age, bday, purok, year_stayed, status, pickup FROM indigency_cert WHERE status='New' AND ownerId = {$_SESSION['userid']}");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['completename'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['bday'] . "</td>";
                                            echo "<td>" . $row['purok'] . "</td>";
                                            echo "<td>" . $row['year_stayed'] . "</td>";
                                            echo "<td>" . $row['pickup'] . "</td>";
                                            echo "<td>" . $row['status'] . "</td>";
                                            echo "<td><button class='btn btn-danger btn-sm deleteCertificateBtn' data-certificate-id='" . $row['id'] . "'>Delete</button></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="approved" class="tab-pane fade">
                                <!-- Approved Certificate Requests Table -->
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Birthday</th>
                                            <th>Street</th>
                                            <th>Recidency Year</th>
                                            <th>Date for Pickup</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($con, "SELECT id, CONCAT(fname, ' ', mname, ' ', lname) AS completename, age, bday, purok, year_stayed, status, pickup FROM indigency_cert WHERE status='Approved' AND ownerId = {$_SESSION['userid']}");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['completename'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['bday'] . "</td>";
                                            echo "<td>" . $row['purok'] . "</td>";
                                            echo "<td>" . $row['year_stayed'] . "</td>";
                                            echo "<td>" . $row['pickup'] . "</td>";
                                            echo "<td>" . $row['status'] . "</td>";
                                            echo "<td><button class='btn btn-danger btn-sm deleteCertificateBtn' data-certificate-id='" . $row['id'] . "'>Delete</button></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="disapproved" class="tab-pane fade">
                                <!-- Disapproved Certificate Requests Table -->
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Birthday</th>
                                            <th>Street</th>
                                            <th>Recidency Year</th>
                                            <th>Date for Pickup</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($con, "SELECT id, CONCAT(fname, ' ', mname, ' ', lname) AS completename, age, bday, purok, year_stayed, status, pickup FROM indigency_cert WHERE status='Disapproved' AND ownerId = {$_SESSION['userid']}");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['completename'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['bday'] . "</td>";
                                            echo "<td>" . $row['purok'] . "</td>";
                                            echo "<td>" . $row['year_stayed'] . "</td>";
                                            echo "<td>" . $row['pickup'] . "</td>";
                                            echo "<td>" . $row['status'] . "</td>";
                                            echo "<td><button class='btn btn-danger btn-sm deleteCertificateBtn' data-certificate-id='" . $row['id'] . "'>Delete</button></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <!-- Request Form Modal -->
                <div id="requestModal" class="modal fade" role="dialog">
                    <div class="modal-dialog" style="width: 400px;">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><b>Request Indigency Form</b></h4>
                            </div>
                            <div class="modal-body">
                                <form id="certificateRequestForm" method="post" action="submit_indigency.php">
                                    <div class="form-group">
                                        <label for="fname">First Name:</label>
                                        <input type="text" class="form-control" id="fname" name="fname" style="width: 200px;" placeholder="First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="mname">Middle Initial:</label>
                                        <input type="text" class="form-control" id="mname" name="mname" style="width: 200px;" placeholder="Middle Initial" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lname">Last Name:</label>
                                        <input type="text" class="form-control" id="lname" name="lname" style="width: 200px;" placeholder="Last Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="age">Age:</label>
                                        <input type="number" class="form-control" id="age" name="age" style="width: 80px;" placeholder="Age" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="bday">Birthday:</label>
                                        <input type="date" class="form-control" id="bday" name="bday" style="width: 200px;" placeholder="Birthday" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="purok">Street:</label>
                                        <input type="text" class="form-control" id="purok" name="purok" style="width: 200px;" placeholder="Street" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="year_stayed">Residency Year:</label>
                                        <input type="text" class="form-control" id="year_stayed" name="year_stayed" style="width: 200px;" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pickup">Scheduled Pickup Date:</label>
                                        <input type="date" class="form-control" id="pickup" name="pickup" style="width: 200px;" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .button-wrapper {
                        margin-left: 10px;
                        /* Adjust the margin value as needed */
                        margin-top: 10px;
                        /* Adjust the margin value as needed */
                        margin-bottom: 10px;
                        /* Adjust the margin value as needed */
                    }

                    /* Adjust the size of the placeholders */
                    .form-control::placeholder {
                        font-size: 14px;
                        /* Change the font size as needed */
                    }
                </style>

            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->
    <!-- jQuery 2.0.2 -->
    <?php
    include "../footer.php";
    ?>
    <script>
        $(document).ready(function() {
            $(".requestCertificateBtn").click(function() {
                // Display the modal for requesting certificate
                $("#requestModal").modal("show");
            });

            // Delete button click event
            $(".deleteCertificateBtn").click(function() {
                var certificateId = $(this).data("certificate-id");
                $.ajax({
                    type: "POST",
                    url: "delete_indigency.php",
                    data: {
                        id: certificateId
                    },
                    success: function(response) {
                        alert(response);
                        location.reload(); // Reload the page to update the table
                    },
                    error: function(xhr, status, error) {
                        alert("Error deleting certificate: " + error);
                    }
                });
            });
        });
    </script>
</body>

</html>