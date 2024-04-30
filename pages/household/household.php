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
    <title>Head of Family</title>
    <?php include('../head_css.php'); ?>
</head>

<body class="skin-black">
    <?php
    include "../connection.php";
    include('../header.php');
    include('../sidebar-left.php');

    if (!isset($_SESSION['role'])) {
        header("Location: ../../login.php");
    } else {
        ob_start();
    }
    ?>

    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="right-side">
            <section class="content-header">
                <h1>Head of Family</h1>
            </section>

            <?php
            if (!isset($_GET['resident'])) {
            ?>
                <section class="content">
                    <div class="box">
                        <div class="box-header">
                            <div style="padding:10px;">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addCourseModal"><i class="fa fa-user-plus" aria-hidden="true"></i> Add</button>
                                <?php
                                if (!isset($_SESSION['staff'])) {
                                ?>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="box-body table-responsive">
                            <form method="post" enctype="multipart/form-data">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" /></th>
                                            <th>Image</th>
                                            <th>House No.</th>
                                            <th>Street</th>
                                            <th>Head of Family</th>
                                            <th style="width: 40px !important;">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!isset($_SESSION['staff'])) {
                                            $squery = mysqli_query($con, "SELECT id, houseno, purok, fname, mname, lname, image FROM tblhousehold");
                                            while ($row = mysqli_fetch_array($squery)) {
                                                echo '
                                            <tr>
                                                <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="' . $row['id'] . '" /></td>
                                                <td><img src="../image/' . $row['image'] . '" style="width:60px;height:60px;"/></td>
                                                <td>' . $row['houseno'] . '</td>
                                                <td>' . $row['purok'] . '</td>
                                                <td>' . $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . '</td>
                                                <td><button class="btn btn-primary btn-sm" data-target="#editModal' . $row['id'] . '" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></td>
                                            </tr>
                                            ';

                                                include "edit_modal.php";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>

                                <?php include "../deleteModal.php"; ?>

                            </form>
                        </div>
                    </div>

                    <?php include "../edit_notif.php"; ?>
                    <?php include "../added_notif.php"; ?>
                    <?php include "../delete_notif.php"; ?>
                    <?php include "../duplicate_error.php"; ?>
                    <?php include "add_modal.php"; ?>
                    <?php include "function.php"; ?>
                </section>
            <?php
            }
            ?>
        </aside>
    </div>

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