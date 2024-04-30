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
                    Barangay Residency Certificate
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Request Certificate Button -->
                <div class="box">
                    <div class="box-header">
                        <div class="button-wrapper">
                            <button class='btn btn-primary btn-sm requestCertificateBtn' data-toggle='modal' data-target='#requestModal'>Add Certificate</button>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($con, "SELECT id, CONCAT(fname, ' ', mname, ' ', lname) AS completename, age, status FROM residency_cert WHERE status='Walk-in'");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['completename'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['status'] . "</td>";
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
                                            <th>Birthday</th>
                                            <th>Street</th>
                                            <th>Year of Residence</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($con, "SELECT id, CONCAT(fname, ' ', mname, ' ', lname) AS completename, age, bday, purok, year_stayed, status FROM residency_cert WHERE status='New'");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['completename'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['bday'] . "</td>";
                                            echo "<td>" . $row['purok'] . "</td>";
                                            echo "<td>" . $row['year_stayed'] . "</td>";
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
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Birthday</th>
                                            <th>Street</th>
                                            <th>Year of Residence</th>
                                            <th>Status</th>
                                            <th>Certificate Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($con, "SELECT id, CONCAT(fname, ' ', mname, ' ', lname) AS completename, age, bday, purok, year_stayed, status, cert_amount FROM residency_cert WHERE status='Approved'");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['completename'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['bday'] . "</td>";
                                            echo "<td>" . $row['purok'] . "</td>";
                                            echo "<td>" . $row['year_stayed'] . "</td>";
                                            echo "<td>" . $row['status'] . "</td>";
                                            echo "<td>" . $row['cert_amount'] . "</td>";
                                            echo "<td>";
                                            echo "<button class='btn btn-primary btn-sm editCertificateBtn' data-certificate-id='" . $row['id'] . "' data-toggle='modal' data-target='#editCertificateModal'>Edit</button>";
                                            echo "<a type='button' href='generate_residency.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm generateCertificateBtn' data-certificate-id='" . $row['id'] . "'>Generate</a>";
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
                                            <th>Birthday</th>
                                            <th>Street</th>
                                            <th>Year of Residence</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($con, "SELECT id, CONCAT(fname, ' ', mname, ' ', lname) AS completename, age, bday, purok, year_stayed, status FROM residency_cert WHERE status='Disapproved'");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['completename'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['bday'] . "</td>";
                                            echo "<td>" . $row['purok'] . "</td>";
                                            echo "<td>" . $row['year_stayed'] . "</td>";
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
                                <h4 class="modal-title"><b>Request Residency Form</b></h4>
                            </div>
                            <div class="modal-body">
                                <form id="certificateRequestForm" method="post" action="submit_residency.php">
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
                                                    echo "<option value='" . $row["resident_id"] . "' 
                                                        data-id='" . htmlspecialchars($row["resident_id"], ENT_QUOTES) . "' 
                                                        data-fname='" . htmlspecialchars($row["fname"], ENT_QUOTES) . "' 
                                                        data-mname='" . htmlspecialchars($row["mname"], ENT_QUOTES) . "' 
                                                        data-lname='" . htmlspecialchars($row["lname"], ENT_QUOTES) . "'
                                                        data-bday='" . htmlspecialchars($row["bday"], ENT_QUOTES) . "' 
                                                        data-purok='" . htmlspecialchars($row["purok"], ENT_QUOTES) . "' 
                                                        data-year_stayed='" . htmlspecialchars($row["year_stayed"], ENT_QUOTES) . "' 
                                                        data-age='" . $row["age"] . "'>"
                                                        . $row["fname"] . " " . $row["mname"] . " " . $row["lname"] . " (" . $row["age"] . " years old)</option>";
                                                }
                                            }

                                            // Close database connection
                                            $stmt->close();
                                            $mysqli->close();
                                            ?>
                                        </select>
                                    </div>
                                    <input type="number" name="ownerId" id="ownerId" hidden>
                                    <div class="form-group">
                                        <label for="status">Status:</label>
                                        <input type="text" class="form-control" name="status" id="status" style="width: 150px;" value="Walk-in" readonly>
                                    </div>
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
                                        <label for="year_stayed">Year of Residence:</label>
                                        <input type="text" class="form-control" id="year_stayed" name="year_stayed" style="width: 200px;" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="editCertificateModal" class="modal fade" role="dialog">
                    <div class="modal-dialog" style="width: 400px;">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><b>Request Residency Form</b></h4>
                            </div>
                            <div class="modal-body">
                                <form id="certificateRequestForm" method="post" action="edit_residency.php">
                                    <input type="number" id="requestId" name="requestId" hidden>
                                    <div class="form-group">
                                        <label for="amount">Amount:</label>
                                        <input type="text" class="form-control" id="amount" name="amount" style="width: 200px;" placeholder="Amount" required>
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
            $('.editCertificateBtn').click(function() {
                $('#requestId').val($(this).data('certificate-id'));
            });

            // Delete button click event
            $(".deleteCertificateBtn").click(function() {
                var certificateId = $(this).data("certificate-id");
                $.ajax({
                    type: "POST",
                    url: "delete_residency.php",
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
                    url: "approve_residency.php",
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
                    url: "disapprove_residency.php",
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

            // Generate residency form button
            $(".generateBtn").click(function() {
                window.location.href = "residency_form.php";
            });

            let residentDropdown = document.getElementById('residentName');
            let fnameInput = document.getElementById('fname');
            let mnameInput = document.getElementById('mname');
            let lnameInput = document.getElementById('lname');
            let bdayInput = document.getElementById('bday');
            let purokInput = document.getElementById('purok');
            let year_stayedInput = document.getElementById('year_stayed');
            let ageInput = document.getElementById('age');
            let idInput = document.getElementById('ownerId');

            residentDropdown.addEventListener('change', function() {
                let selectedOption = this.options[this.selectedIndex];
                let fname = selectedOption.getAttribute('data-fname');
                let mname = selectedOption.getAttribute('data-mname');
                let lname = selectedOption.getAttribute('data-lname');
                let bday = selectedOption.getAttribute('data-bday');
                let purok = selectedOption.getAttribute('data-purok');
                let year_stayed = selectedOption.getAttribute('data-year_stayed');
                let age = selectedOption.getAttribute('data-age');
                let id = selectedOption.getAttribute('data-id');

                fnameInput.value = fname ? fname : '';
                mnameInput.value = mname ? mname : '';
                lnameInput.value = lname ? lname : '';
                bdayInput.value = bday ? bday : '';
                purokInput.value = purok ? purok : '';
                year_stayedInput.value = year_stayed ? year_stayed : '';
                ageInput.value = age ? age : '';
                idInput.value = id ? id : '';
            });
        });
    </script>
</body>

</html>