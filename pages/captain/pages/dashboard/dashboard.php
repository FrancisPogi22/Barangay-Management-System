<!DOCTYPE html>
<html>
<?php
session_start();
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];

    if ($role != 'Captain') {
        header('Location: ../../../../main/index.php');
    }
}

if (!isset($_SESSION['role'])) {
    header("Location: ../../login.php");
} else {
    ob_start();
    include('../head_css.php'); ?>
    <style>
        .box {
            padding: 20px;
            margin-bottom: 20px;
            width: 80%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>

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
                        Dashboard
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <div class="info-box">
                                    <a href="../household/household.php"><span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span></a>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Household</span>
                                        <span class="info-box-number">
                                            <?php
                                            $q = mysqli_query($con, "SELECT * from tblhousehold");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                            ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="box">
                                <div class="info-box">
                                    <a href="../resident/resident.php"><span class="info-box-icon bg-red"><i class="fa fa-users"></i></span></a>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Resident</span>
                                        <span class="info-box-number">
                                            <?php
                                            $q = mysqli_query($con, "SELECT * from tblresident");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                            ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <div class="info-box">
                                    <a href="../clearance/clearance.php"><span class="info-box-icon bg-yellow"><i class="fa fa-file"></i></span></a>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Clearance</span>
                                        <span class="info-box-number">
                                            <?php
                                            $q = mysqli_query($con, "SELECT * from tblclearance where status = 'Approved' ");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                            ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="col-md-6">
                            <div class="box">
                                <div class="info-box">
                                    <a href="../permit/permit.php"><span class="info-box-icon bg-green"><i class="fa fa-file"></i></span></a>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Permit</span>
                                        <span class="info-box-number">
                                            <?php
                                            $q = mysqli_query($con, "SELECT * from tblpermit where status = 'Approved' ");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                            ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <div class="info-box">
                                    <a href="../blotter/blotter.php"><span class="info-box-icon bg-blue"><i class="fa fa-exclamation-circle"></i></span></a>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Blotter</span>
                                        <span class="info-box-number">
                                            <?php
                                            $q = mysqli_query($con, "SELECT * from tblblotter");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                            ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
    <?php }
include "../footer.php"; ?>
    <script type="text/javascript">
        $(function() {
            $("#table").dataTable({
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [0, 5]
                }],
                "aaSorting": []
            });
        });
    </script>
    </body>

</html>