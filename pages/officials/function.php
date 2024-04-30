<?php

if (isset($_POST['btn_add'])) {
    $txt_fname = $_POST['txt_fname'];
    $txt_mname = $_POST['txt_mname'];
    $txt_lname = $_POST['txt_lname'];
    $position = $_POST['position'];
    $contact = $_POST['contact'];
    $birthday = $_POST['bday'];

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

    $su = mysqli_query($con, "SELECT * from tblofficial where fname = '" . $txt_fname . "' ");
    $ct = mysqli_num_rows($su);

    if ($ct == 0) {

        if ($name != "") {
            if (($imagetype == "image/jpeg" || $imagetype == "image/png" || $imagetype == "image/bmp") && $size <= 2048000) {
                if (move_uploaded_file($temp, 'image/' . $image)) {
                    $txt_image = $image;
                    $query = mysqli_query(
                        $con,
                        "INSERT INTO tblofficial (
                                        fname,
                                        mname,
                                        lname,
                                        position,
                                        contact,
                                        bday,
                                        image
                                    ) 
                                    values (
                                        '$txt_fname', 
                                        '$txt_mname', 
                                        '$txt_lname',  
                                        '$position',
                                        '$contact',
                                        '$birthday',
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
                "INSERT INTO tblofficial (
                                        fname,
                                        mname,
                                        lname,
                                        position,
                                        contact,
                                        bday,
                                        image
                                    ) 
                                    values (
                                        '$txt_fname', 
                                        '$txt_mname', 
                                        '$txt_lname',  
                                        '$position',
                                        '$contact',
                                        '$birthday',
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
    $txt_edit_bday = $_POST['txt_edit_bday'];

    $name = basename($_FILES['txt_edit_image']['name']);
    $temp = $_FILES['txt_edit_image']['tmp_name'];
    $imagetype = $_FILES['txt_edit_image']['type'];
    $size = $_FILES['txt_edit_image']['size'];

    $milliseconds = round(microtime(true) * 1000);
    $image = $milliseconds . '_' . $name;

    if (isset($_SESSION['role'])) {
        $action = 'Update Staff named ' . $txt_edit_fname . ', ' . $txt_id . ' ' . $txt_edit_fname;
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user,logdate,action) values ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");
    }

    $su = mysqli_query($con, "SELECT * from tblofficial where id = '" . $txt_id . "' and id not in (" . $txt_id . ") ");
    $ct = mysqli_num_rows($su);

    if ($ct == 0) {

        if ($name != "") {
            if (($imagetype == "image/jpeg" || $imagetype == "image/png" || $imagetype == "image/bmp") && $size <= 2048000) {
                if (move_uploaded_file($temp, 'image/' . $image)) {

                    $txt_edit_image = $image;
                    $update_query = mysqli_query($con, "UPDATE tblofficial set 
                                        fname = '" . $txt_edit_fname . "',
                                        mname = '" . $txt_edit_mname . "',
                                        lname = '" . $txt_edit_lname . "',
                                        position = '" . $txt_edit_position . "',
                                        contact = '" . $txt_edit_contact . "',
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

            $chk_image = mysqli_query($con, "SELECT * from tblofficial where id = '" . $_POST['hidden_id'] . "' ");
            $rowimg = mysqli_fetch_array($chk_image);

            $txt_edit_image = $rowimg['image'];
            $update_query = mysqli_query($con, "UPDATE tblofficial set 
                                        fname = '" . $txt_edit_fname . "',
                                        mname = '" . $txt_edit_mname . "',
                                        lname = '" . $txt_edit_lname . "',
                                        position = '" . $txt_edit_position . "',
                                        contact = '" . $txt_edit_contact . "',
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
            $delete_query = mysqli_query($con, "DELETE from tblofficial where id = '$value' ") or die('Error: ' . mysqli_error($con));

            if ($delete_query == true) {
                $_SESSION['delete'] = 1;
                header("location: " . $_SERVER['REQUEST_URI']);
            }
        }
    }
}
