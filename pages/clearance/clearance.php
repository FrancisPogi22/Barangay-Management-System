<?php
session_start();

if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];

    if ($role != 'Administrator') {
        header('Location: ../../main/index.php');
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <?php
    if (!isset($_SESSION['role'])) {
        header("Location: ../../login.php");
    } else {
        ob_start();
        include '../head_css.php';
    }
    ?>
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
</head>

<body class="skin-black">
    <!-- header logo: style can be found in header.less -->
    <?php
    include "../connection.php";
    include '../header.php';
    ?>

    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <?php include '../sidebar-left.php'; ?>

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
                <!-- Add Certificate Button -->
                <div class="box">
                    <div class="box-header">
                        <div class="button-wrapper">
                            <button class='btn btn-primary btn-sm requestCertificateBtn' data-toggle="modal" data-target="#requestModal">Add Clearance</button>
                        </div>
                        <ul class="nav nav-tabs" id="myTab">
                            <li><a data-toggle="tab" href="#walk-in">Walk-in</a></li>
                            <li class="active"><a data-toggle="tab" href="#new">New</a></li>
                            <li><a data-toggle="tab" href="#approved">Approved</a></li>
                            <li><a data-toggle="tab" href="#disapproved">Disapproved</a></li>
                        </ul>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <div class="tab-content">
                            <div id="walk-in" class="tab-pane fade">
                                <!-- Walk-in Certificate Requests Table -->
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Status</th>
                                            <th>Certificate Amount</th>
                                            <th>BC No.</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($con, "SELECT id, CONCAT(fname, ' ', mname, ' ', lname) AS completename, age, status, cert_amount, bcNo FROM clearance_cert WHERE status='Walk-in'");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['completename'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['status'] . "</td>";
                                            echo "<td>" . $row['cert_amount'] . "</td>";
                                            echo "<td>" . $row['bcNo'] . "</td>";
                                            echo "<td>";
                                            echo "<button class='btn btn-primary btn-sm editCertificateBtn' data-certificate-id='" . $row['id'] . "' data-toggle='modal' data-target='#editCertificateModal'>Edit</button>";
                                            echo "<a type='button' href='generate_clearance.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm generateCertificateBtn' data-certificate-id='" . $row['id'] . "'>Generate</a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="new" class="tab-pane fade in active">
                                <!-- New Certificate Requests Table -->
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Status</th>
                                            <th>Certificate Amount</th>
                                            <th>BC No.</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($con, "SELECT id, CONCAT(fname, ' ', mname, ' ', lname) AS completename, age, bcNo, cert_amount, status FROM clearance_cert WHERE status='New'");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['completename'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['status'] . "</td>";
                                            echo "<td>" . $row['cert_amount'] . "</td>";
                                            echo "<td>" . $row['bcNo'] . "</td>";
                                            echo "<td>";
                                            echo "<button class='btn btn-success btn-sm approveCertificateBtn' data-certificate-id='" . $row['id'] . "'>Approve</button>";
                                            echo "<button class='btn btn-danger btn-sm disapproveCertificateBtn' data-certificate-id='" . $row['id'] . "'>Disapprove</button>";
                                            echo "</td>";
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
                                            <th>Status</th>
                                            <th>Certificate Amount</th>
                                            <th>BC No.</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($con, "SELECT id, CONCAT(fname, ' ', mname, ' ', lname) AS completename, age, status, bcNo, cert_amount FROM clearance_cert WHERE status='Approved'");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['completename'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['status'] . "</td>";
                                            echo "<td>" . $row['cert_amount'] . "</td>";
                                            echo "<td>" . $row['bcNo'] . "</td>";
                                            echo "<td>";
                                            echo "<button class='btn btn-primary btn-sm editCertificateBtn' data-certificate-id='" . $row['id'] . "' data-toggle='modal' data-target='#editCertificateModal'>Edit</button>";
                                            echo "<a type='button' href='generate_clearance.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm generateCertificateBtn' data-certificate-id='" . $row['id'] . "'>Generate</a>";
                                            echo "</td>";
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
                                            <th>Status</th>
                                            <th>Certificate Amount</th>
                                            <th>BC No.</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($con, "SELECT id, CONCAT(fname, ' ', mname, ' ', lname) AS completename, age, bcNo, cert_amount, status FROM clearance_cert WHERE status='Disapproved'");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['completename'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['status'] . "</td>";
                                            echo "<td>" . $row['cert_amount'] . "</td>";
                                            echo "<td>" . $row['bcNo'] . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->

                <!-- Add Form Modal -->
                <div id="requestModal" class="modal fade" role="dialog">
                    <div class="modal-dialog" style="width: 400px;">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><b>Request Clearance Form</b></h4>
                            </div>
                            <div class="modal-body">
                                <form id="certificateRequestForm" action="submit_clearance.php" method="POST">
                                    <div class="form-group">
                                        <label for="residentName">Resident Name:</label>
                                        <select class="form-control" id="residentName" name="residentName" required>
                                            <option value="">Select Resident</option>
                                            <?php
                                            // Connect to your MySQL database
                                            $mysqli = mysqli_connect("localhost", "root", "", "north");

                                            // Check connection
                                            if ($mysqli->connect_error) {
                                                die("Connection failed: " . $mysqli->connect_error);
                                            }

                                            // Fetch resident names and ages from the resident table
                                            $sql = "SELECT * FROM resident";
                                            $stmt = $mysqli->prepare($sql);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            // Populate the select dropdown with resident names and ages
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row["resident_id"] . "|" . $row["age"] . "'>" . $row["fname"] . " " . $row["mname"] . " " . $row["lname"] . " (" . $row["age"] . " years old)" . "</option>";
                                                }
                                            }

                                            // Close database connection
                                            $stmt->close();
                                            $mysqli->close();
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status:</label>
                                        <input type="text" class="form-control" name="status" id="status" style="width: 150px;" value="Walk-in" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Certificate Amount:</label>
                                        <input type="number" class="form-control" id="cert_amount" name="cert_amount" style="width: 150px;" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">BC No.:</label>
                                        <input type="number" class="form-control" name="bcNo" id="bcNo" style="width: 150px;" required>
                                    </div>
                                    <button type="submit" id="submitRequestBtn" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- /.box -->

    <div id="editCertificateModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width: 400px;">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Request Clearance Form</b></h4>
                </div>
                <div class="modal-body">
                    <form id="certificateRequestForm" method="post" action="edit_clearance.php">
                        <input type="number" id="requestId" name="requestId" hidden>
                        <div class="form-group">
                            <label for="fname">BC NO:</label>
                            <input type="text" class="form-control" id="bcno" name="bcno" style="width: 200px;" placeholder="BC NO." required>
                        </div>
                        <div class="form-group">
                            <label for="mname">Amount:</label>
                            <input type="text" class="form-control" id="amount" name="amount" style="width: 200px;" placeholder="Amount" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery 2.0.2 -->
    <?php
    include "../footer.php";
    ?>
    <script>
        $(document).ready(function() {
            $(".editCertificateBtn").click(function() {
                $('#requestId').val($(this).data('certificate-id'));
            });

            // Submit form data when the submit button is clicked


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

            // Approve button click event
            $(".approveCertificateBtn").click(function() {
                var certificateId = $(this).data("certificate-id");
                $.ajax({
                    type: "POST",
                    url: "approve_clearance.php",
                    data: {
                        id: certificateId
                    },
                    success: function(response) {
                        alert(response);
                        location.reload(); // Reload the page to update the table
                    },
                    error: function(xhr, status, error) {
                        alert("Error approving certificate: " + error);
                    }
                });
            });

            // Disapprove button click event
            $(".disapproveCertificateBtn").click(function() {
                var certificateId = $(this).data("certificate-id");
                $.ajax({
                    type: "POST",
                    url: "disapprove_clearance.php",
                    data: {
                        id: certificateId
                    },
                    success: function(response) {
                        alert(response);
                        location.reload(); // Reload the page to update the table
                    },
                    error: function(xhr, status, error) {
                        alert("Error disapproving certificate: " + error);
                    }
                });
            });
        });
    </script>
</body>

</html>