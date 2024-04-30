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
    header("Location: clearance.php");
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
                    Barangay Clearance
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Request Certificate Button -->
                <div class="box">
                    <div class="box-header">
                        <div class="button-wrapper">
                            <button class='btn btn-primary btn-sm requestCertificateBtn'>Request Clearance</button>
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
                                            <th>Purpose</th>
                                            <th>Date of Pickup</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($con, "SELECT id, CONCAT(fname, ' ', mname, ' ', lname) AS completename, age, purpose, status, pickup_date FROM clearance_cert WHERE status='New' AND ownerId = {$_SESSION['userid']}");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['completename'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['purpose'] . "</td>";
                                            echo "<td>" . $row['pickup_date'] . "</td>";
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
                                            <th>Purpose</th>
                                            <th>Date of Pickup</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($con, "SELECT id, CONCAT(fname, ' ', mname, ' ', lname) AS completename, age, purpose, status, pickup_date FROM clearance_cert WHERE status='Approved' AND ownerId = {$_SESSION['userid']}");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['completename'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['purpose'] . "</td>";
                                            echo "<td>" . $row['pickup_date'] . "</td>";
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
                                            <th>Purpose</th>
                                            <th>Date of Pickup</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($con, "SELECT id, CONCAT(fname, ' ', mname, ' ', lname) AS completename, age, purpose, status, pickup_date FROM clearance_cert WHERE status='Disapproved' AND ownerId = {$_SESSION['userid']}");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['completename'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['purpose'] . "</td>";
                                            echo "<td>" . $row['pickup_date'] . "</td>";
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
                                <h4 class="modal-title"><b>Request Clearance Form</b></h4>
                            </div>
                            <div class="modal-body">
                                <form id="certificateRequestForm" method="post" action="submit_clearance.php">
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
                                        <label for="purpose">Purpose:</label>
                                        <select class="form-control" id="purpose" name="purpose" required>
                                            <option value="Local Employment">Local Employment</option>
                                            <option value="Travel Abroad, Overseas Employment">Travel Abroad, Overseas Employment</option>
                                            <option value="School Requirement">School Requirement</option>
                                            <option value="Legal Purposes">Legal Purposes</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="otherPurpose" style="display: none;">
                                        <label for="otherPurpose">Specify Purpose:</label>
                                        <input type="text" class="form-control" id="otherPurposeInput" name="otherPurpose" style="width: 200px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="pickup_date">Scheduled Pickup Date:</label>
                                        <input type="date" class="form-control" id="pickup_date" name="pickup_date" style="width: 200px;" placeholder="Last Name" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('purpose').addEventListener('change', function() {
                        var selectedPurpose = this.value;
                        var otherPurpose = document.getElementById('otherPurpose');
                        if (selectedPurpose === 'others') {
                            otherPurpose.style.display = 'block';
                            otherPurpose.querySelector('input').setAttribute('required', 'true');
                        } else {
                            otherPurpose.style.display = 'none';
                            otherPurpose.querySelector('input').removeAttribute('required');
                        }
                    });
                </script>

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
                    url: "delete.clearance.php",
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