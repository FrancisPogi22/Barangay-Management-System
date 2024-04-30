<!DOCTYPE html>
<html id="clearance">
<style>
    @media print {
        .noprint {
            visibility: hidden;
        }
    }

    @page {
        size: auto;
        margin: 4mm;
    }
</style>
<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: ../../login.php");
} else {
    ob_start();
    $_SESSION['clr'] = $_GET['clearance'];
    include('../head_css.php'); ?>

    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php

        include "../connection.php";
        ?>

        <div class="col-xs-12 col-sm-6 col-md-8" style="">
            <div style=" background: black;">
                <div class="col-xs-4 col-sm-6 col-md-3" style="background: white; margin-right:10px; border: 2px solid black;">
                    <center>
                        <image src="../../img/north.png" style="width:90%;height:164px;" />
                    </center>
                    <div style="margin-top:20px; text-align: center; word-wrap: break-word;">
                        <?php
                        $qry = mysqli_query($con, "SELECT * from tblofficial");
                        while ($row = mysqli_fetch_array($qry)) {
                            if ($row['position'] == "Barangay Captain") {
                                echo '
                                    <p>
                                    <b>' . strtoupper($row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']) . '</b><br>
                                    <span style="font-size:12px;">PUNONG BARANGAY</span>
                                    </p>
                                    ';
                            } elseif ($row['position'] == "Committee on Education") {
                                echo '
                                    <p>
                                    <b>' . strtoupper($row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']) . '</b><br>
                                    <span style="font-size:12px;">Committee on Education</span>
                                    </p>
                                    ';
                            } elseif ($row['position'] == "Committee on Peace and Order") {
                                echo '
                                    <p>
                                    <b>' . strtoupper($row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']) . '</b><br>
                                    <span style="font-size:12px;">Committee on Peace and Order</span>
                                    </p>
                                    ';
                            } elseif ($row['position'] == "Committee on Agriculture") {
                                echo '
                                    <p>
                                    <b>' . strtoupper($row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']) . '</b><br>
                                    <span style="font-size:12px;">Committee on Agriculture</span>
                                    </p>
                                    ';
                            } elseif ($row['position'] == "Committee on Health") {
                                echo '
                                    <p>
                                    <b>' . strtoupper($row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']) . '</b><br>
                                    <span style="font-size:12px;">Committee on Health</span>
                                    </p>
                                    ';
                            } elseif ($row['position'] == "Committee on Intra.") {
                                echo '
                                    <p>
                                    <b>' . strtoupper($row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']) . '</b><br>
                                    <span style="font-size:12px;">Committee on Intra.</span>
                                    </p>
                                    ';
                            } elseif ($row['position'] == "Committee on Finance") {
                                echo '
                                    <p>
                                    <b>' . strtoupper($row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']) . '</b><br>
                                    <span style="font-size:12px;">Committee on Finance</span>
                                    </p>
                                    ';
                            } elseif ($row['position'] == "Committee on Transpo") {
                                echo '
                                    <p>
                                    <b>' . strtoupper($row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']) . '</b><br>
                                    <span style="font-size:12px;">Committee on Transpo</span>
                                    </p>
                                    ';
                            }
                        }
                        $qry = mysqli_query($con, "SELECT * FROM tblkabataan");
                        while ($row = mysqli_fetch_array($qry)) {
                            if ($row['position'] == "SK Chairperson") {
                                echo '
                                    <p>
                                    <b>' . strtoupper($row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']) . '</b><br>                                    
                                    <span style="font-size:12px;">SK Chairperson</span>
                                    </p>
                                    ';
                            }
                        }
                        $qry = mysqli_query($con, "SELECT * FROM tblofficial");
                        while ($row = mysqli_fetch_array($qry)) {
                            if ($row['position'] == "Barangay Treasurer") {
                                echo '
                                    <p>
                                    <b>' . strtoupper($row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']) . '</b><br>                                    
                                    <span style="font-size:12px;">Barangay Treasurer</span>
                                    </p>
                                    <br>
                                    ';
                            } elseif ($row['position'] == "Barangay Secretary") {
                                echo '
                                    <p>
                                    <u><b>' . strtoupper($row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']) . '</b></u><br>
                                    <span style="font-size:12px;">Barangay Secretary</span>
                                    </p>
                                    ';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="col-xs-8 col-md-9">
                    <div class="col-xs-12 col-md-12">
                        <p class="text-center" style="font-size: 20px; font-weight: bold;">OFFICE OF THE BARANGAY CAPTAIN<br><span style="font-size: 28px;">BARANGAY CLEARANCE</span></p>
                        <p style="font-size: 18px;">TO WHOM IT MAY CONCERN:</p>
                        <p style="text-indent: 40px; text-align: justify;">This is to certify that
                            <?php
                            if (isset($_GET['resident'])) {
                                $qry = mysqli_query($con, "SELECT * from resident r left join tblclearance on resident_id = resident_id where resident_id = '" . $_GET['resident'] . "' and clearanceNo = '" . $_GET['clearance'] . "' ");
                                while ($row = mysqli_fetch_array($qry)) {
                                    $fullname = strtoupper($row['fname']) . ' ' . strtoupper($row['mname']) . ' ' . strtoupper($row['lname']);
                                    echo $fullname . ', a bonafide resident of Barangay North Poblacion Gabaldon, Nueva Ecija.';
                                }
                            } else {
                                echo "No resident ID provided.";
                            }
                            ?>
                        </p>
                    </div>
                    </p>
                </div>

                <div class="col-md-5 col-xs-4" style="float:right;margin-top: -160px;">
                    <div style="height:100px; width:140px; border: 1px solid black;">
                        <center><span style="text-align: center; line-height: 160px;">Right Thumb Mark</span></center>
                    </div><br><br>
                    <p>Tax Payer's Signature</p>
                </div>
            </div>
            <div class="col-xs-offset-6 col-xs-5 col-md-offset-6 col-md-4"><br><br><br>
                <?php
                $qry = mysqli_query($con, "SELECT * from tblofficial");
                while ($row = mysqli_fetch_array($qry)) {
                    if ($row['position'] == "Barangay Captain") {
                        echo '
                            <p>
                            <b>' . strtoupper($row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']) . '</b><br>
                            <span style=" text-align: center;">Punong Barangay</span></b>
                            </p>
                            ';
                    }
                }
                ?>
            </div>
            <div class="col-xs-8 col-md-4">
                <?php
                $qry = mysqli_query($con, "SELECT * from tblofficial");
                while ($row = mysqli_fetch_array($qry)) {
                    if ($row['position'] == "Barangay Captain") {
                        echo '
                            <p>
                             <b>' . strtoupper($row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']) . '</b><br>
                            <span style=" text-align: center;">OFFICER OF THE DAY</span></b>
                            </p>
                            ';
                    }
                }
                ?>
            </div>
            <div class="col-xs-3 pull-right" style="margin-bottom:40px;">
                <img class=" pull-right" src="barcode.php?clr=<?php echo base64_decode($_GET['val']); ?>" style="width:170px; height: 60px; " />

                <span class="pull-right"><?php echo substr_replace($_GET['clearance'], '****', 0, 3); ?> </span>

            </div>
        </div>
        </div>
        <button class="btn btn-primary noprint" id="printpagebutton" onclick="PrintElem('#clearance')">Print</button>
    </body>
<?php
}
?>


<script>
    function PrintElem(elem) {
        window.print();
    }

    function Popup(data) {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        //mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        //mywindow.document.write('</head><body class="skin-black" >');
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        mywindow.document.write(data);
        //mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();

        printButton.style.visibility = 'visible';
        mywindow.close();

        return true;
    }
</script>

</html>