<?php

echo '<header class="header">
        <div class = "logo-container">
         <a href="#" class="logo">
         <img src="../../img/north.png" width="120" height="115">
         </a>
         </div>
         <!-- Header Navbar: style can be found in header.less -->
         <nav class="navbar navbar-static-top" role="navigation">
             <!-- Sidebar toggle button-->
             <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                 <span class="sr-only">Toggle navigation</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
             </a>
             <div class="navbar-right">
                 <ul class="nav navbar-nav">

                     <!-- User Account: style can be found in dropdown.less -->
                     <li class="dropdown user user-menu">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                             <i class="glyphicon glyphicon-user"></i><span>' . $_SESSION['username'] . '<i class="caret"></i></span>
                         </a>
                         <ul class="dropdown-menu">
                             <!-- User image -->
                             <li class="user-header bg-light-blue">
                                <a href="#" id="profile-link">
                                    <p style="color: white">
                                        Profile
                                    </p>
                                </a>
                            </li>
                             <!-- Menu Body -->

                             <!-- Menu Footer-->
                             <li class="user-footer">

                                 <div class="pull-center">
                                     <center><a href="../../logout.php" class="btn btn-default btn-flat">Sign out</a></center>
                                 </div>
                             </li>
                         </ul>
                     </li>
                 </ul>
             </div>
         </nav>
     </header>'; ?>


<div id="editProfileModal" class="modal fade">
    <form method="post">
        <div class="modal-dialog modal-sm" style="width:300px !important;">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if ($_SESSION['role'] == "Administrator") {
                                $user = mysqli_query($con, "SELECT * from tblsignup where id = '" . $_SESSION['id'] . "' ");
                                while ($row = mysqli_fetch_array($user)) {
                                    echo '
                                 <div class="form-group">
                                     <label>Username:</label>
                                     <input name="txt_username" id="txt_username" class="form-control input-sm" type="text" value="' . $row['username'] . '" />
                                 </div>
                                 <div class="form-group">
                                     <label>Password:</label>
                                     <input name="txt_password" id="txt_password" class="form-control input-sm" type="password"  value="' . $row['password'] . '"/>
                                 </div>';
                                }
                            } elseif ($_SESSION['role'] == "Captain") {
                                $user = mysqli_query($con, "SELECT * from tblsignup where id = '" . $_SESSION['id'] . "' ");
                                while ($row = mysqli_fetch_array($user)) {
                                    echo '
                                 <div class="form-group">
                                     <label>Username:</label>
                                     <input name="txt_username" id="txt_username" class="form-control input-sm" type="text" value="' . $row['username'] . '" />
                                 </div>
                                 <div class="form-group">
                                     <label>Password:</label>
                                     <input name="txt_password" id="txt_password" class="form-control input-sm" type="password"  value="' . $row['password'] . '"/>
                                 </div>';
                                }
                            } elseif ($_SESSION['role'] == "Resident") {
                                $user = mysqli_query($con, "SELECT * from tblsignup where id = '" . $_SESSION['id'] . "' ");
                                while ($row = mysqli_fetch_array($user)) {
                                    echo '
                                 <div class="form-group">
                                     <label>Username:</label>
                                     <input name="txt_username" id="txt_username" class="form-control input-sm" type="text" value="' . $row['username'] . '" />
                                 </div>
                                 <div class="form-group">
                                     <label>Password:</label>
                                     <input name="txt_password" id="txt_password" class="form-control input-sm" type="password"  value="' . $row['password'] . '"/>
                                 </div>';
                                }
                            } else {
                                $user = mysqli_query($con, "SELECT * from tblresident where id = '" . $_SESSION['userid'] . "' ");
                                while ($row = mysqli_fetch_array($user)) {
                                    echo '
                                 <div class="form-group">
                                     <label>Username:</label>
                                     <input name="txt_username" id="txt_username" class="form-control input-sm" type="text" value="' . $row['username'] . '" />
                                 </div>
                                 <div class="form-group">
                                     <label>Password:</label>
                                     <input name="txt_password" id="txt_password" class="form-control input-sm" type="password"  value="' . $row['password'] . '"/>
                                 </div>';
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel" />
                    <input type="submit" class="btn btn-primary btn-sm" id="btn_saveeditProfile" name="btn_saveeditProfile" value="Save" />
                </div>
            </div>
        </div>
    </form>
</div>


<?php
if (isset($_POST['btn_saveeditProfile'])) {
    $username = $_POST['txt_username'];
    $password = $_POST['txt_password'];

    if ($_SESSION['role'] == "Administrator") {
        $updadmin = mysqli_query($con, "UPDATE tblsignup set username = '$username', password = '$password' where id = '" . $_SESSION['id'] . "' ");
        if ($updadmin == true) {
            header("location: " . $_SERVER['REQUEST_URI']);
        }
    } elseif ($_SESSION['role'] == "Captain") {
        $updzone = mysqli_query($con, "UPDATE tblsignup set username = '$username', password = '$password' where id = '" . $_SESSION['id'] . "' ");
        if ($updzone == true) {
            header("location: " . $_SERVER['REQUEST_URI']);
        } elseif ($_SESSION['role'] == "Resident") {
            $updstaff = mysqli_query($con, "UPDATE tblsignup set username = '$username', password = '$password' where id = '" . $_SESSION['id'] . "' ");
            if ($updstaff == true) {
                header("location: " . $_SERVER['REQUEST_URI']);
            }
        }
    }
}

?>