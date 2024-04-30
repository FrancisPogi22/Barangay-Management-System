<?php
session_start();

if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];

    if ($role != 'Captain') {
        header('Location: ../../../../main/index.php');
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
        include('../head_css.php');
    }
    ?>
</head>
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
                    Business Certificate
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Request Certificate Button -->
                <div class="box">
                    <div class="box-header">
                        <div class="button-wrapper">
                            <button class='btn btn-primary btn-sm requestCertificateBtn'>Add Certificate</button>
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
                                            <th>Business Name</th>
                                            <th>Business Address</th>
                                            <th>Type of Business</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($con, "SELECT id, businessName, businessAddress, typeOfBusiness, status FROM business_cert WHERE status='New'");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['businessName'] . "</td>";
                                            echo "<td>" . $row['businessAddress'] . "</td>";
                                            echo "<td>" . $row['typeOfBusiness'] . "</td>";
                                            echo "<td>" . $row['status'] . "</td>";
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
                                            <th>Business Name</th>
                                            <th>Business Address</th>
                                            <th>Type of Business</th>
                                            <th>Status</th>
                                            <th>Certificate Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result =  mysqli_query($con, "SELECT id, businessName, businessAddress, typeOfBusiness, status, cert_amount FROM business_cert WHERE status='Approved'");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['businessName'] . "</td>";
                                            echo "<td>" . $row['businessAddress'] . "</td>";
                                            echo "<td>" . $row['typeOfBusiness'] . "</td>";
                                            echo "<td>" . $row['status'] . "</td>";
                                            echo "<td>" . $row['cert_amount'] . "</td>";
                                            echo "<td>";
                                            echo "<button class='btn btn-primary btn-sm editCertificateBtn' data-certificate-id='" . $row['id'] . "'>Edit</button>";
                                            echo "<button class='btn btn-primary btn-sm generateCertificateBtn' data-certificate-id='" . $row['id'] . "'>Generate</button>";
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
                                            <th>Business Name</th>
                                            <th>Business Address</th>
                                            <th>Type of Business</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($con, "SELECT id, businessName, businessAddress, typeOfBusiness, status FROM business_cert WHERE status='Disapproved'");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['businessName'] . "</td>";
                                            echo "<td>" . $row['businessAddress'] . "</td>";
                                            echo "<td>" . $row['typeOfBusiness'] . "</td>";
                                            echo "<td>" . $row['status'] . "</td>";
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
                                <h4 class="modal-title"><b>Request Business Certificate Form</b></h4>
                            </div>
                            <div class="modal-body">
                                <form id="certificateRequestForm" method="post" action="submit_business_cert.php">
                                    <div class="form-group">
                                        <label for="fname">Business Name:</label>
                                        <input type="text" class="form-control" id="businessName" name="businessName" style="width: 300px;" placeholder="Business Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="mname">Business Address:</label>
                                        <input type="text" class="form-control" id="businessAddress" name="businessAddress" style="width: 300px;" placeholder="Business Address" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="age">Type of Business:</label>
                                        <input type="text" class="form-control" id="typeOfBusiness" name="typeOfBusiness" style="width: 300px;" placeholder="Type of Business" required>
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
                        margin-left: 10px; /* Adjust the margin value as needed */
                        margin-top: 10px; /* Adjust the margin value as needed */
                        margin-bottom: 10px; /* Adjust the margin value as needed */
                    }
                    /* Adjust the size of the placeholders */
                    .form-control::placeholder {
                        font-size: 14px; /* Change the font size as needed */
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
                    url: "delete_business_cert.php",
                    data: { id: certificateId },
                    success: function(response) {
                        alert(response);
                        location.reload(); // Reload the page to update the table
                    },
                    error: function(xhr, status, error) {
                        alert("Error deleting request: " + error);
                    }
                });
            });
        });
           // Approve button click event
           $(".approveCertificateBtn").click(function() {
                            var certificateId = $(this).data("certificate-id");
                            $.ajax({
                                type: "POST",
                                url: "approve_business_cert.php",
                                data: { id: certificateId },
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
                                url: "disapprove_business_cert.php",
                                data: { id: certificateId },
                                success: function(response) {
                                    alert(response);
                                    location.reload(); // Reload the page to update the table
                                },
                                error: function(xhr, status, error) {
                                    alert("Error disapproving certificate: " + error);
                                }
                            });
                        });
    </script>
</body>
</html>