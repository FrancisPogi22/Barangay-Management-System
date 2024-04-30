<?php
if (isset($_POST['btn_add'])) {
    $houseno = $_POST['houseno'];
    $purok = $_POST['purok'];
    $txt_fname = $_POST['txt_fname'];
    $txt_mname = $_POST['txt_mname'];
    $txt_lname = $_POST['txt_lname'];

    $name = basename($_FILES['txt_image']['name']);
    $temp = $_FILES['txt_image']['tmp_name'];
    $imagetype = $_FILES['txt_image']['type'];
    $size = $_FILES['txt_image']['size'];

    $milliseconds = round(microtime(true) * 1000);
    $image = $milliseconds . '_' . $name;

    if (isset($_SESSION['role'])) {
        $action = 'Added Staff named ' . $txt_fname . ', ' . $txt_mname . ' ' . $txt_lname;
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user,logdate,action) values ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");
    }

    $su = mysqli_query($con, "SELECT * from tblhousehold where fname = '" . $txt_fname . "' ");
    $ct = mysqli_num_rows($su);

    if ($ct == 0) {

        if ($name != "") {
            if (($imagetype == "image/jpeg" || $imagetype == "image/png" || $imagetype == "image/bmp") && $size <= 2048000) {
                if (move_uploaded_file($temp, 'image/' . $image)) {
                    $txt_image = $image;
                    $query = mysqli_query(
                        $con,
                        "INSERT INTO tblhousehold (
                                        houseno,
                                        purok,
                                        fname,
                                        mname,
                                        lname,
                                        image
                                    ) 
                                    values (  
                                        '$houseno',
                                        '$purok',
                                        '$txt_fname', 
                                        '$txt_mname', 
                                        '$txt_lname',
                                        '$txt_image'
                                    )"
                    )
                        or die('Error: ' . mysqli_error($con));
                }
            } else {
                $_SESSION['filesize'] = 1;
                header("location: " . $_SERVER['REQUEST_URI']);
            }
        } else {
            $txt_image = 'default.png';

            $query = mysqli_query(
                $con,
                "INSERT INTO tblhousehold (
                                        houseno,
                                        purok,
                                        fname,
                                        mname,
                                        lname,
                                        image
                                    ) 
                                    values (
                                        '$houseno',
                                        '$purok',
                                        '$txt_fname', 
                                        '$txt_mname', 
                                        '$txt_lname',
                                        '$txt_image'
                                    )"
            )
                or die('Error: ' . mysqli_error($con));
        }


        if ($query == true) {
            $_SESSION['added'] = 1;
            header("location: " . $_SERVER['REQUEST_URI']);
        }
    } else {
        $_SESSION['duplicateuser'] = 1;
        header("location: " . $_SERVER['REQUEST_URI']);
    }
}



if (isset($_POST['btn_save'])) {
    $txt_id = $_POST['hidden_id'];
    $txt_edit_fname = $_POST['txt_edit_fname'];
    $txt_edit_mname = $_POST['txt_edit_mname'];
    $txt_edit_lname = $_POST['txt_edit_lname'];
    $txt_edit_position = $_POST['txt_edit_position'];
    $txt_edit_contact = $_POST['txt_edit_contact'];
    $txt_edit_address = $_POST['txt_edit_address'];
    $txt_edit_bday = $_POST['txt_edit_bday'];

    $name = basename($_FILES['txt_edit_image']['name']);
    $temp = $_FILES['txt_edit_image']['tmp_name'];
    $imagetype = $_FILES['txt_edit_image']['type'];
    $size = $_FILES['txt_edit_image']['size'];

    $milliseconds = round(microtime(true) * 1000);
    $image = $milliseconds . '_' . $name;

    if (isset($_SESSION['role'])) {
        $action = 'Update Staff named ' . $txt_edit_fname . ', ' . $txt_mname . ' ' . $txt_edit_fname;
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user,logdate,action) values ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");
    }

    $su = mysqli_query($con, "SELECT * from tblhousehold where id = '" . $txt_edit_fname . "' and id not in (" . $txt_id . ") ");
    $ct = mysqli_num_rows($su);

    if ($ct == 0) {

        if ($name != "") {
            if (($imagetype == "image/jpeg" || $imagetype == "image/png" || $imagetype == "image/bmp") && $size <= 2048000) {
                if (move_uploaded_file($temp, 'image/' . $image)) {

                    $txt_edit_image = $image;
                    $update_query = mysqli_query($con, "UPDATE tblhousehold set 
                                        fname = '" . $txt_edit_fname . "',
                                        mname = '" . $txt_edit_mname . "',
                                        lname = '" . $txt_edit_lname . "',
                                        position = '" . $txt_edit_position . "',
                                        contact = '" . $txt_edit_contact . "',
                                        address = '" . $txt_edit_address . "',
                                        bday = '" . $txt_edit_bday . "',      
                                        image = '" . $txt_edit_image . "'
                                        WHERE id = '" . $txt_id . "'
                                ") or die('Error: ' . mysqli_error($con));
                }
            } else {
                $_SESSION['filesize'] = 1;
                header("location: " . $_SERVER['REQUEST_URI']);
            }
        } else {

            $chk_image = mysqli_query($con, "SELECT * from tblhousehold where id = '" . $_POST['hidden_id'] . "' ");
            $rowimg = mysqli_fetch_array($chk_image);

            $txt_edit_image = $rowimg['image'];
            $update_query = mysqli_query($con, "UPDATE tblhousehold set 
                                        fname = '" . $txt_edit_fname . "',
                                        mname = '" . $txt_edit_mname . "',
                                        lname = '" . $txt_edit_lname . "',
                                        position = '" . $txt_edit_position . "',
                                        contact = '" . $txt_edit_contact . "',
                                        address = '" . $txt_edit_address . "',
                                        bday = '" . $txt_edit_bday . "',      
                                        image = '" . $txt_edit_image . "'
                                        WHERE id = '" . $txt_id . "'
                                ") or die('Error: ' . mysqli_error($con));
        }

        if ($update_query == true) {
            $_SESSION['edited'] = 1;
            header("location: " . $_SERVER['REQUEST_URI']);
        }
    } else {
        $_SESSION['duplicateuser'] = 1;
        header("location: " . $_SERVER['REQUEST_URI']);
    }
}
if (isset($_POST['btn_delete'])) {
    if (isset($_POST['chk_delete'])) {
        foreach ($_POST['chk_delete'] as $value) {
            $delete_query = mysqli_query($con, "DELETE from tblhousehold where id = '$value' ") or die('Error: ' . mysqli_error($con));

            if ($delete_query == true) {
                $_SESSION['delete'] = 1;
                header("location: " . $_SERVER['REQUEST_URI']);
            }
        }
    }
}
