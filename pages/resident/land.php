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
    header("Location: land.php");
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
                    <i class="fa fa-map-o"></i> Deed of Sale for Land Certificate
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Request Certificate Button -->
                <div class="box">
                    <div class="box-header">
                        <div class="button-wrapper">
                            <button class='btn btn-primary btn-sm requestCertificateBtn'>Request Certificate</button>
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
                                            <th>Buyer Name</th>
                                            <th>Buyer Address</th>
                                            <th>Land Area</th>
                                            <th>Property Address</th>
                                            <th>Sale Agreement</th>
                                            <th>Buyer's Payment</th>
                                            <th>Receipt of Payment</th>
                                            <th>Date</th>
                                            <th>Witness</th>
                                            <th>Date of Notarization</th>
                                            <th>Location of Notarization</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($con, "SELECT id, sellerName, sellerAddress, buyerName, buyerAddress, landArea, propertySold, legalAgree, paymentConfirm, confirmationPay, date, witness, notarizeDate, locationNota, status FROM land_cert WHERE status = 'New' AND sellerId = '{$_SESSION['userid']}'");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['sellerName'] . "</td>";
                                            echo "<td>" . $row['sellerAddress'] . "</td>";
                                            echo "<td>" . $row['buyerName'] . "</td>";
                                            echo "<td>" . $row['buyerAddress'] . "</td>";
                                            echo "<td>" . $row['landArea'] . "</td>";
                                            echo "<td>" . $row['propertySold'] . "</td>";
                                            echo "<td>" . $row['legalAgree'] . "</td>";
                                            echo "<td>" . $row['paymentConfirm'] . "</td>";
                                            echo "<td>" . $row['confirmationPay'] . "</td>";
                                            echo "<td>" . $row['date'] . "</td>";
                                            echo "<td>" . $row['witness'] . "</td>";
                                            echo "<td>" . $row['notarizeDate'] . "</td>";
                                            echo "<td>" . $row['locationNota'] . "</td>";
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
                                            <th>Seller Name</th>
                                            <th>Seller Address</th>
                                            <th>Buyer Name</th>
                                            <th>Buyer Address</th>
                                            <th>Land Area</th>
                                            <th>Property Address</th>
                                            <th>Sale Agreement</th>
                                            <th>Buyer's Payment</th>
                                            <th>Receipt of Payment</th>
                                            <th>Date</th>
                                            <th>Witness</th>
                                            <th>Date of Notarization</th>
                                            <th>Location of Notarization</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result =  mysqli_query($con, "SELECT id, sellerName, sellerAddress, buyerName, buyerAddress, landArea, propertySold, legalAgree, paymentConfirm, confirmationPay, date, witness, notarizeDate, locationNota, status FROM land_cert WHERE status='Approved' AND sellerId = '{$_SESSION['userid']}'");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['sellerName'] . "</td>";
                                            echo "<td>" . $row['sellerAddress'] . "</td>";
                                            echo "<td>" . $row['buyerName'] . "</td>";
                                            echo "<td>" . $row['buyerAddress'] . "</td>";
                                            echo "<td>" . $row['landArea'] . "</td>";
                                            echo "<td>" . $row['propertySold'] . "</td>";
                                            echo "<td>" . $row['legalAgree'] . "</td>";
                                            echo "<td>" . $row['paymentConfirm'] . "</td>";
                                            echo "<td>" . $row['confirmationPay'] . "</td>";
                                            echo "<td>" . $row['date'] . "</td>";
                                            echo "<td>" . $row['witness'] . "</td>";
                                            echo "<td>" . $row['notarizeDate'] . "</td>";
                                            echo "<td>" . $row['locationNota'] . "</td>";
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
                                            <th>Seller Name</th>
                                            <th>Seller Address</th>
                                            <th>Buyer Name</th>
                                            <th>Buyer Address</th>
                                            <th>Land Area</th>
                                            <th>Property Address</th>
                                            <th>Sale Agreement</th>
                                            <th>Buyer's Payment</th>
                                            <th>Receipt of Payment</th>
                                            <th>Date</th>
                                            <th>Witness</th>
                                            <th>Date of Notarization</th>
                                            <th>Location of Notarization</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result =  mysqli_query($con, "SELECT id, sellerName, sellerAddress, buyerName, buyerAddress, landArea, propertySold, legalAgree, paymentConfirm, confirmationPay, date, witness, notarizeDate, locationNota, status FROM land_cert WHERE status='Disapproved' AND sellerId = '{$_SESSION['userid']}'");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['sellerName'] . "</td>";
                                            echo "<td>" . $row['sellerAddress'] . "</td>";
                                            echo "<td>" . $row['buyerName'] . "</td>";
                                            echo "<td>" . $row['buyerAddress'] . "</td>";
                                            echo "<td>" . $row['landArea'] . "</td>";
                                            echo "<td>" . $row['propertySold'] . "</td>";
                                            echo "<td>" . $row['legalAgree'] . "</td>";
                                            echo "<td>" . $row['paymentConfirm'] . "</td>";
                                            echo "<td>" . $row['confirmationPay'] . "</td>";
                                            echo "<td>" . $row['date'] . "</td>";
                                            echo "<td>" . $row['witness'] . "</td>";
                                            echo "<td>" . $row['notarizeDate'] . "</td>";
                                            echo "<td>" . $row['locationNota'] . "</td>";
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
                                <h4 class="modal-title"><b>Request Form</b></h4>
                            </div>
                            <div class="modal-body">
                                <form id="certificateRequestForm" method="post" action="submit_land_cert.php">
                                    <div class="form-group">
                                        <label for="sellerName">Seller Name:</label>
                                        <input type="text" class="form-control" id="sellerName" name="sellerName" style="width: 300px;" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="sellerAddress">Seller Address:</label>
                                        <input type="text" class="form-control" id="sellerAddress" name="sellerAddress" style="width: 300px;" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="buyerName">Buyer Name:</label>
                                        <input type="text" class="form-control" id="buyerName" name="buyerName" style="width: 300px;" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="buyerAddress">Buyer Address:</label>
                                        <input type="text" class="form-control" id="buyerAddress" name="buyerAddress" style="width: 300px;" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="landArea">Land Area:</label>
                                        <input type="text" class="form-control" id="landArea" name="landArea" style="width: 300px;" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="propertySold">Property Address:</label>
                                        <input type="text" class="form-control" id="propertySold" name="propertySold" style="width: 300px;" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="legalAgree">Sale Agreement:</label>
                                        <input type="text" class="form-control" id="legalAgree" name="legalAgree" style="width: 300px;" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="paymentConfirm">Buyer's Payment:</label>
                                        <input type="text" class="form-control" id="paymentConfirm" name="paymentConfirm" style="width: 300px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmationPay">Receipt of Payment:</label>
                                        <input type="text" class="form-control" id="confirmationPay" name="confirmationPay" style="width: 300px;" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Date:</label>
                                        <input type="date" class="form-control" id="date" name="date" style="width: 300px;" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="witness">Witness:</label>
                                        <input type="text" class="form-control" id="witness" name="witness" style="width: 300px;" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="notarizeDate">Date of Notarization:</label>
                                        <input type="date" class="form-control" id="notarizeDate" name="notarizeDate" style="width: 300px;" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="locationNota">Location of Notarization:</label>
                                        <input type="text" class="form-control" id="locationNota" name="locationNota" style="width: 300px;" required>
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
                    url: "delete_land_cert.php",
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