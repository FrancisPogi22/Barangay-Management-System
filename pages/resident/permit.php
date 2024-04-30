<!DOCTYPE html>
<html>
<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: ../../login.php");
} else {
    ob_start();
    include('../head_css.php'); ?>

    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php
        include "../connection.php";
        ?>
        <?php include('../header.php'); ?>

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
                    <div class="row">
                        <!-- left column -->
                        <div class="box">
                            <div class="box-header">
                                <div style="padding:10px;">
                                    <button class="btn btn-primary btn-sm" id="requestPermitBtn"><i class="fa fa-user-plus" aria-hidden="true"></i> Request Permit</button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive" id="permitRequestForm" style="display: none;">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class="active"><a data-target="#new" data-toggle="tab">New</a></li>
                                </ul>
                                <form method="post" action="submit_permit.php">
                                    <div class="tab-content">
                                        <div id="new" class="tab-pane active in">
                                            <table id="table" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Business Name</th>
                                                        <th>Business Address</th>
                                                        <th>Type of Business</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" name="business_name" required></td>
                                                        <td><input type="text" name="business_address" required></td>
                                                        <td><input type="text" name="type_of_business" required></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <input type="submit" value="Submit Request">
                                </form>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                        <script>
                            document.getElementById("requestPermitBtn").addEventListener("click", function() {
                                document.getElementById("permitRequestForm").style.display = "block";
                            });
                        </script>

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Permit Requests</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive">
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
                                        $result = mysqli_query($con, "SELECT * FROM permit_re");
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
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->


                    </div> <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
    <?php }
include "../footer.php"; ?>
    </body>

</html>