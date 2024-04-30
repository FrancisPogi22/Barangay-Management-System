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

<body>

    <head>
        <!-- Other head content -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>

    <?php
    if (!isset($_SESSION['role'])) {
        header("Location: ../../login.php");
    } else {
        ob_start();
        include('../head_css.php');
    }
    ?>

    <body class="skin-black">
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
                        Sangguniang Kabataan
                    </h1>
                </section>

                <?php
                if (!isset($_GET['resident'])) {
                ?>
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">
                                        <?php
                                        if (!isset($_SESSION['staff'])) {
                                        ?>

                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <form method="post" enctype="multipart/form-data">
                                        <table id="table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20px !important;"><i class="fas fa-star"></i></th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Contact</th>
                                                    <th>Birthday</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!isset($_SESSION['staff'])) {
                                                    $squery = mysqli_query($con, "SELECT id, fname, mname, lname, position, contact, bday, image FROM  tblkabataan");
                                                    while ($row = mysqli_fetch_array($squery)) {
                                                        echo '
                                                <tr>
                                                    <td><img src="image/' . $row['image'] . '" style="width:60px;height:60px;"/></td>
                                                    <td>' . $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . '</td>
                                                    <td>' . $row['position'] . '</td>
                                                    <td>' . $row['contact'] . '</td>
                                                    <td>' . $row['bday'] . '</td>
                                                    <td></td>
                                                </tr>
                                                ';
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                        <?php include "../deleteModal.php"; ?>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <?php include "../edit_notif.php"; ?>

                            <?php include "../added_notif.php"; ?>

                            <?php include "../delete_notif.php"; ?>

                            <?php include "../duplicate_error.php"; ?>

                            <?php include "add_modal.php"; ?>

                            <?php include "function.php"; ?>

                        </div> <!-- /.row -->
                    </section><!-- /.content -->
                <?php
                }
                ?>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php
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