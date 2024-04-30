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
                <i class="fa fa-paw"></i> Livestock Sale Certificate
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
                                            <th>Seller Name</th>
                                            <th>Seller Address</th>
                                            <th>Amount</th>
                                            <th>Buyer Name</th>
                                            <th>Buyer Address</th>
                                            <th>Kind of Animal</th>
                                            <th>Age of Animal</th>
                                            <th>Sex of Animal</th>
                                            <th>Cowlicks</th>
                                            <th>Brand of Municipality</th>
                                            <th>Brand of Owner</th>
                                            <th>Transaction Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result =mysqli_query($con, "SELECT id, sellerName, sellerAddress, amount, buyerName, buyerAddress, itemSold, age, sex, cowlicks, brandMun, brandOwn, transacDate, status FROM livestock_cert WHERE status = 'New'");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['sellerName'] . "</td>";
                                            echo "<td>" . $row['sellerAddress'] . "</td>";
                                            echo "<td>" . $row['amount'] . "</td>";
                                            echo "<td>" . $row['buyerName'] . "</td>";
                                            echo "<td>" . $row['buyerAddress'] . "</td>";
                                            echo "<td>" . $row['itemSold'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['sex'] . "</td>";
                                            echo "<td>" . $row['cowlicks'] . "</td>";
                                            echo "<td>" . $row['brandMun'] . "</td>";
                                            echo "<td>" . $row['brandOwn'] . "</td>";
                                            echo "<td>" . $row['transacDate'] . "</td>";
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
                                            <th>Seller Name</th>
                                            <th>Seller Address</th>
                                            <th>Amount</th>
                                            <th>Buyer Name</th>
                                            <th>Buyer Address</th>
                                            <th>Kind of Animal</th>
                                            <th>Age of Animal</th>
                                            <th>Sex of Animal</th>
                                            <th>Cowlicks</th>
                                            <th>Brand of Municipality</th>
                                            <th>Brand of Owner</th>
                                            <th>Transaction Date</th>
                                            <th>Status</th>
                                            <th>Certificate Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($con, "SELECT id, sellerName, sellerAddress, amount, buyerName, buyerAddress, itemSold, age, sex, cowlicks, brandMun, brandOwn, transacDate, status, cert_amount FROM livestock_cert WHERE status='Approved'");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['sellerName'] . "</td>";
                                            echo "<td>" . $row['sellerAddress'] . "</td>";
                                            echo "<td>" . $row['amount'] . "</td>";
                                            echo "<td>" . $row['buyerName'] . "</td>";
                                            echo "<td>" . $row['buyerAddress'] . "</td>";
                                            echo "<td>" . $row['itemSold'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['sex'] . "</td>";
                                            echo "<td>" . $row['cowlicks'] . "</td>";
                                            echo "<td>" . $row['brandMun'] . "</td>";
                                            echo "<td>" . $row['brandOwn'] . "</td>";
                                            echo "<td>" . $row['transacDate'] . "</td>";
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
                                            <th>Seller Name</th>
                                            <th>Seller Address</th>
                                            <th>Amount</th>
                                            <th>Buyer Name</th>
                                            <th>Buyer Address</th>
                                            <th>Kind of Animal</th>
                                            <th>Age of Animal</th>
                                            <th>Sex of Animal</th>
                                            <th>Cowlicks</th>
                                            <th>Brand of Municipality</th>
                                            <th>Brand of Owner</th>
                                            <th>Transaction Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($con, "SELECT id, sellerName, sellerAddress, amount, buyerName, buyerAddress, itemSold, age, sex, cowlicks, brandMun, brandOwn, transacDate, status FROM livestock_cert WHERE status='Disapproved'");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['sellerName'] . "</td>";
                                            echo "<td>" . $row['sellerAddress'] . "</td>";
                                            echo "<td>" . $row['amount'] . "</td>";
                                            echo "<td>" . $row['buyerName'] . "</td>";
                                            echo "<td>" . $row['buyerAddress'] . "</td>";
                                            echo "<td>" . $row['itemSold'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['sex'] . "</td>";
                                            echo "<td>" . $row['cowlicks'] . "</td>";
                                            echo "<td>" . $row['brandMun'] . "</td>";
                                            echo "<td>" . $row['brandOwn'] . "</td>";
                                            echo "<td>" . $row['transacDate'] . "</td>";
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
                                <h4 class="modal-title"><b>Request Form</b></h4>
                            </div>
                            <div class="modal-body">
                            <form id="certificateRequestForm" method="post" action="submit_livestock_cert.php">
                                <div class="form-group">
                                    <label for="sellerName">Seller Name:</label>
                                    <input type="text" class="form-control" id="sellerName" name="sellerName" style="width: 300px;" required>
                                </div>
                                <div class="form-group">
                                    <label for="sellerAddress">Seller Address:</label>
                                    <input type="text" class="form-control" id="sellerAddress" name="sellerAddress" style="width: 300px;" required>
                                </div>
                                <div class="form-group">
                                    <label for="amount">Amount:</label>
                                    <input type="text" class="form-control" id="amount" name="amount" style="width: 300px;" required>
                                </div>
                                <div class="form-group">
                                    <label for="buyerName">Buyer Name:</label>
                                    <input type="text" class="form-control" id="buyerName" name="buyerName" style="width: 300px;"  required>
                                </div>
                                <div class="form-group">
                                    <label for="buyerAddress">Buyer Address:</label>
                                    <input type="text" class="form-control" id="buyerAddress" name="buyerAddress" style="width: 300px;"  required>
                                </div>
                                <div class="form-group">
                                    <label for="itemSold">Kind of Animal:</label>
                                    <input type="text" class="form-control" id="itemSold" name="itemSold" style="width: 300px;"  required>
                                </div>
                                <div class="form-group">
                                    <label for="age">Age of Anmial:</label>
                                    <input type="text" class="form-control" id="age" name="age" style="width: 300px;"  required>
                                </div>
                                <div class="form-group">
                                    <label for="sex">Sex of Animal:</label>
                                    <input type="text" class="form-control" id="sex" name="sex" style="width: 300px;"  required>
                                </div>
                                <div class="form-group">
                                    <label for="cowlicks">Cowlicks:</label>
                                    <input type="text" class="form-control" id="cowlicks" name="cowlicks" style="width: 300px;">
                                </div>
                                <div class="form-group">
                                    <label for="brandMun">Brand of Municipality:</label>
                                    <input type="text" class="form-control" id="brandMun" name="brandMun" style="width: 300px;"  required>
                                </div>
                                <div class="form-group">
                                    <label for="brandOwn">Brand of Owner:</label>
                                    <input type="text" class="form-control" id="brandOwn" name="brandOwn" style="width: 300px;" required>
                                </div>
                                <div class="form-group">
                                    <label for="transacDate">Transaction Date:</label>
                                    <input type="date" class="form-control" id="transacDate" name="transacDate" style="width: 300px;" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </form>
                        </div>


                        </div>
                    </div>
                </div>

                <script>
                document.getElementById('purpose').addEventListener('change', function () {
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
                    url: "delete_livestock_cert.php",
                    data: { id: certificateId },
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
                    $(document).ready(function() {
                        $(".requestCertificateBtn").click(function() {
                            // Display the modal for requesting certificate
                            $("#requestModal").modal("show");
                        });

                        // Approve button click event
                        $(".approveCertificateBtn").click(function() {
                            var certificateId = $(this).data("certificate-id");
                            $.ajax({
                                type: "POST",
                                url: "approve_livestock_cert.php",
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
                                url: "disapprove_livestock_cert.php",
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
                    });
    </script>
</body>
</html>