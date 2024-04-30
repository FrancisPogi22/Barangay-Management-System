<!DOCTYPE html>
<html>

<head>
    <?php
    session_start();
    if (!isset($_SESSION['role'])) {
        header("Location: ../../login.php");
    } else {
        ob_start();
        include '../head_css.php';
    }
    ?>

    <style>
        .main-panel {
            margin: 10px auto;
            border: 1px solid #ccc;
            padding: 10px;
            width: 824px;
            height: 1323px;
        }

        .container-fluid {
            justify-content: center;
            display: flex;
            align-items: center;
        }

        .image-container {
            margin-right: 20px;
        }

        .text-container {
            text-align: center;
        }

        .print-background {
            background-color: yellowgreen !important;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }

            .print-background {
                outline: solid;
                background-color: yellowgreen !important;
            }

            @page {
                size: legal;
                margin: 0.5in;
            }

            .container-fluid.text-center {
                text-align: center !important;
            }

            .prepared-container,
            .certified-container {
                padding-top: 10px;
            }

            .prepared-container,
            .certified-container span {
                margin-left: 2em;
            }

            .col-md-4.text-center {
                margin-top: -100px !important;
            }
        }
    </style>

</head>

<?php
include "../connection.php";

$id = $_GET['id'];

$query = "SELECT c.*, t.barangay FROM clearance_cert as c inner join tblresident as t on t.id = c.resident_id where c.id = " . $id;
$result = mysqli_query($con, $query);


$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

mysqli_free_result($result);

$sql = "SELECT * FROM tblofficial";
$result_officials = mysqli_query($con, $sql);

if (!$result_officials) {
    die("Error retrieving officials data: " . mysqli_error($con));
}

$officials_rows = [];
while ($official_row = mysqli_fetch_assoc($result_officials)) {
    $officials_rows[] = $official_row;
}

// Free result set
mysqli_free_result($result_officials);

// Close connection
mysqli_close($con);

// Your existing code...
?>


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
            <div class="main-panel">
                <div class="content">
                    <div class="page-inner">
                        <div class="row mt--2">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-head-row">

                                            <div class="card-tools">
                                                <button class="btn btn-info btn-border btn-round btn-sm" onclick="printDiv('printThis')" style="float: right;">
                                                    <i class="fa fa-print"></i>
                                                    Print Certificate
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body m-5" id="printThis" style="margin-top: 40px">
                                        <div class="d-flex flex-wrap justify-content-center">
                                            <div class="container-fluid text-center" style="width: 100%">
                                                <div class="image-container">
                                                    <img src="../../img/north.png" class="img-fluid" width="120" height="120" style="margin-top: -120px">
                                                </div>
                                                <div class="text-container">
                                                    <div class="fw-bold mb-0">
                                                        Republic of the Philippines
                                                    </div>
                                                    <div class="fw-bold mb-0">
                                                        Province of Nueva Ecija
                                                    </div>
                                                    <div class="fw-bold mb-0">
                                                        Municipality of Gabaldon
                                                    </div>
                                                    <div class="fw-bold mb-0">
                                                        Barangay <b>North Poblacion </b>
                                                    </div>
                                                    <br>
                                                    <div class="text-center">
                                                        <div class="fw-bold mb-0">
                                                            <b>Office of the Punong Barangay</b>
                                                        </div>
                                                        <br>
                                                        <div class="fw-bold mb-0">
                                                            <b>BARANGAY CLEARANCE</b>
                                                        </div>
                                                        <div class="fw-bold mb-0">
                                                            <b>BC No. <span class="fw-bold" style="font-size:18px"><?= ucwords($rows[0]['bcNo']) ?></span>
                                                            </b>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2 container-fluid" style="width:100%">
                                            <div class="col-md-4 text-center print-background" style="width: 40%;display: inline-block;">
                                                <p><b>BARANGAY OFFICIALS 2024</b></p>
                                                <br>
                                                <?php foreach ($officials_rows as $official) : ?>
                                                    <p><b><span class="fw-bold" style="font-size:18px"><?= ucwords($official['fname']) . ' '  . ucwords($official['mname']) .  ' '  . ucwords($official['lname']) ?></span></b> </p>
                                                    <i><?= $official['position'] ?></i>
                                                    <div style="margin-bottom: 10px"></div>
                                                <?php endforeach; ?>
                                            </div>

                                            <div class="col-md-8" style="width: 60%;display: inline-block;">
                                                <p style="margin-top: 40px;">TO WHOM
                                                    IT MAY CONCERN:</p>
                                                <p class="mt-3" style="text-indent: 40px; text-align: justify;">
                                                    This is to certify that <b><span class="fw-bold" style="font-size: 18px; text-transform: uppercase;"><?= strtoupper(ucwords($rows[0]['fname']) . ' ' . ucwords($rows[0]['mname']) . ' ' . ucwords($rows[0]['lname']) . ', ' . ucwords($rows[0]['age'])) . ' years old' ?></span>, <span class="fw-bold" style="font-size:18px">
                                                            <?php
                                                            $rs = $rows[0]['rs'];
                                                            $words = array("Single", "Married", "Widow", "Widower");

                                                            foreach ($words as $word) {
                                                                if ($word == $rs) {
                                                                    echo "<u>" . ucwords($word) . "</u>";
                                                                } else {
                                                                    echo ucwords($word);
                                                                }

                                                                if ($word !== end($words)) {
                                                                    echo "/";
                                                                }
                                                            }
                                                            ?>


                                                        </span>
                                                    </b> widower a bonafide resident of Barangay North Poblacion, Gabaldon, Nueva Ecija,
                                                </p>
                                                <p class="mt-3" style="text-indent: 40px;">
                                                    This is to certify that <b><span class="fw-bold" style="font-size: 18px; text-transform: uppercase;"><?= strtoupper(ucwords($rows[0]['fname']) . ' ' . ucwords($rows[0]['mname']) . ' ' . ucwords($rows[0]['lname'])) ?></span></b> has no derogatory record on file of Barangay North Poblacion, Gabaldon, Nueva Ecija.</p>
                                                <p>This certification is issued upon request of the above-mentioned person for:</p>
                                                <?php
                                                $purpose = ucwords($rows[0]['purpose']);
                                                ?>

                                                <input type="checkbox" id="local_employment" value="Local Employment" style="display: none;">
                                                <label for="local_employment" onclick="toggleCheckbox('local_employment')">[&nbsp;<span id="local_employment_check"> </span>&nbsp;/&nbsp;] Local Employment</label> <br>

                                                <input type="checkbox" id="travel_abroad" value="Travel Abroad, Overseas Employment" style="display: none;">
                                                <label for="travel_abroad" onclick="toggleCheckbox('travel_abroad')">[&nbsp;<span id="travel_abroad_check"> </span>&nbsp;/&nbsp;] Travel Abroad, Overseas Employment</label><br>

                                                <input type="checkbox" id="school_requirements" value="School Requirement" style="display: none;">
                                                <label for="school_requirements" onclick="toggleCheckbox('school_requirements')">[&nbsp;<span id="school_requirements_check"> </span>&nbsp;/&nbsp;] School Requirements</label><br>

                                                <input type="checkbox" id="legal_purposes" value="Legal Purposes" style="display: none;">
                                                <label for="legal_purposes" onclick="toggleCheckbox('legal_purposes')">[&nbsp;<span id="legal_purposes_check"> </span>&nbsp;/&nbsp;] Legal Purposes</label><br>

                                                <input type="checkbox" id="others" value="Others (pls. specify)_______." style="display: none;">
                                                <label for="others" onclick="toggleCheckbox('others')">[&nbsp;<span id="others_check"> </span>&nbsp;/&nbsp;] Others (pls. specify)_______.</label>


                                                <br>
                                                <p>Effectively of this certification is valid only for Ninety (90) Days</p>
                                                <p>From date of issuance and after its expiration is null and void.</p>
                                                <?php
                                                $date = ucwords($rows[0]['date_issued']);

                                                $timestamp = strtotime($date);

                                                $formatted_date = date("jS", $timestamp) . " Day of " . date("F Y", $timestamp);

                                                ?>
                                                <p class="mt-3">Done in Barangay North Poblacion Hall this <span class="fw-bold" style="font-size:18px"><?= $formatted_date ?></span> </p>
                                                <div class="col-md-12 d-flex flex-wrap justify-content-end">
                                                    <table style="float: right">
                                                        <thead>
                                                            <tr>
                                                                <th style="border: 1px solid black; padding: 5px;">Left Thumb Mark</th>
                                                                <th style="border: 1px solid black; padding: 5px;">Right Thumb Mark</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td style="border: 1px solid black; padding: 5px;">
                                                                    <!-- Left Thumb Mark content goes here -->
                                                                    <div class="border mx-auto mb-3" style="height: 40px; width: 40px;">
                                                                        <p class="mt-5 mb-0 pt-5"></p>
                                                                    </div>
                                                                </td>
                                                                <td style="border: 1px solid black; padding: 5px;">
                                                                    <!-- Right Thumb Mark content goes here -->
                                                                    <div class="border mx-auto mb-3" style="height: 40px; width: 40px;">
                                                                        <p class="mt-5 mb-0 pt-5"></p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>


                                                <div style="margin-left: 20px">
                                                    <div class="row mt-2 hakdog" style="margin-top: 20px;">
                                                        <span class="col-md-6 mn">
                                                            <p class="prep-cert-label" style="margin-top: 20px;">Attested by:</p>
                                                            <p class="prepared-container" style="margin-top: 10px;">
                                                                <b><span class="fw-bold mb-0 text-uppercase">
                                                                        <?php
                                                                        $secretary = array_filter($officials_rows, function ($official) {
                                                                            return $official['position'] === 'Barangay Secretary';
                                                                        });

                                                                        $secretary_name = empty($secretary) ? "No Secretary Found" : ucwords($secretary[9]['fname'] . ' ' . $secretary[9]['mname'] . ' ' . $secretary[9]['lname']);
                                                                        echo $secretary_name;
                                                                        ?>
                                                                    </span></b>
                                                                <br>
                                                                <span>Barangay Secretary/Clerk</span>
                                                            </p>
                                                        </span>
                                                        <span class="col-md-6 mn">
                                                            <p class="prep-cert-label" style="margin-top: 10px;">Approved by: </p>
                                                            <p class="certified-container" style="margin-top: 10px;">
                                                                <b><span class="fw-bold mb-0 text-uppercase">
                                                                        <?php
                                                                        $captain = array_filter($officials_rows, function ($official) {
                                                                            return $official['position'] === 'Punong Barangay';
                                                                        });
                                                                        $captain_name = empty($captain) ? "No Captain Found" : 'Hon.' . ucwords($captain[0]['fname'] . ' ' . $captain[0]['mname'] . ' ' . $captain[0]['lname']);
                                                                        echo $captain_name;
                                                                        ?>
                                                                    </span></b>
                                                                <br>
                                                                <span class="ml-2">Barangay Captain</span>
                                                            </p>
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </div><!-- ./wrapper -->
    <!-- jQuery 2.0.2 -->
    <?php
    include "../footer.php";
    ?>

    <script>
        const urlSearchParams = new URLSearchParams(window.location.search);
        const params = Object.fromEntries(urlSearchParams.entries());

        if (!params['closeModal']) {
            setTimeout(() => {
                $('#pment').modal('show');
            }, 1000);
        }

        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            var colMd4 = document.querySelector('.col-md-4');
            colMd4.style.backgroundColor = 'yellowgreen';

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

        function toggleCheckbox(id) {
            var checkbox = document.getElementById(id);
            var span = document.getElementById(id + "_check");

            checkbox.checked = !checkbox.checked;

            var purpose = "<?php echo $purpose; ?>";
            var purposeValue = checkbox.value;

            if (purpose.indexOf(purposeValue) !== -1) {
                if (checkbox.checked) {
                    span.innerHTML = "/";
                } else {
                    span.innerHTML = " ";
                }
            } else {
                span.innerHTML = " ";
            }

        }
    </script>

</body>

</html>