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
      margin: 30px auto;
      border: 1px solid #ccc;
      padding: 20px;
      width: 794px;
      height: 1123px;
    }

    .container-fluid {
      display: flex;
      align-items: center;
    }

    .image-container {
      margin-right: 20px;
    }

    .text-container {
      text-align: center;
    }

    @media print {

      @page {
        size: A4;
        margin: 1in;
      }


      .prepared-container,
      .certified-container {
        padding-top: 40px;
      }

      .certified-container span {
        margin-left: 2em;
      }

      .hakdog {
        display: flex;
        justify-content: flex-start;
        flex-wrap: wrap;
      }

      .mn {
        flex: 0 0 auto;
        width: 50%;
        max-width: 50%;
        box-sizing: border-box;
      }

    }
  </style>

</head>

<?php
include "../connection.php";

$id = $_GET['id'];

$query = "SELECT c.id, c.fname, c.mname, c.lname, c.age, c.bday, c.year_stayed, c.purok, c.amount, c.date_issued, c.status, c.cert_amount, c.pickup_date FROM residency_cert as c where c.id = " . $id;
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
                      <div class="container-fluid">
                        <div class="image-container">
                          <img src="../../img/north.png" class="img-fluid" width="120" height="120" style="margin-top: -100px">
                        </div>
                        <div class="text-container">
                          <div class="fw-bold mb-0">
                            Republic of the Philippines
                          </div>
                          <div class="fw-bold mb-0">
                            Barangay <b>NORTH POBLACION</b>
                          </div>
                          <div class="fw-bold mb-0">
                            Gabaldon, Nueva Ecija
                          </div>
                          <p>==========================</p>
                          <div class="text-center">
                            <div class="fw-bold mb-0">
                              <b>OFFICE OF THE PUNONG BARANGAY</b>
                            </div>
                            <br>
                            <br>
                            <div class="fw-bold mb-0">
                              <b>BARANGAY RESIDENCY</b>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-12">
                        <div class="text-right">
                          <br>
                          <?php
                          $timestamp = strtotime($rows[0]['date_issued']);

                          $formatted_date = date(" F j, Y", $timestamp);

                          echo $formatted_date;
                          ?>

                        </div>
                        <p style="margin-top: 40px;">To Whom
                          It May Concern:</p>
                        <p class="mt-3" style="text-indent: 40px; text-align: justify;">
                          This is to certify that according to the records available in this office <b><span class="fw-bold" style="font-size: 18px; text-decoration: underline; text-transform: uppercase;">
                              <?= strtoupper(ucwords($rows[0]['fname'] . ' ' . $rows[0]['mname'] . ' ' . $rows[0]['lname'] . ', ' . $rows[0]['age'] . ' years old')) ?>
                            </span></b>
                          born on <?php
                                  $timestamp = strtotime($rows[0]['bday']);

                                  $formatted_date = date(" F j, Y", $timestamp);

                                  echo $formatted_date;
                                  ?>

                          <span class="fw-bold" style="font-size:25px">
                          </span> is a bonafide resident of <span class="fw-bold" style="font-size:18px"><?= ucwords($rows[0]['purok']) ?></span>St. North Poblacion, Gabaldon, Nueva Ecija since year <?= ucwords($rows[0]['year_stayed']) ?></span>
                        </p>
                        <br>
                        <p class="mt-3" style="text-indent: 40px;">
                          This certification is issued upon request of <b><span class="fw-bold" style="font-size: 18px; text-decoration: underline; text-transform: uppercase;">
                              <?= strtoupper(ucwords($rows[0]['fname'] . ' ' . $rows[0]['mname'] . ' ' . $rows[0]['lname'])) ?>
                            </span></b> for whatever legal purpose it may serve. </p>
                        <br>
                        <p class="mt-3" style="text-indent: 40px;">
                          This certification is issued this <b><?php
                                                                $date = ucwords($rows[0]['date_issued']);

                                                                $timestamp = strtotime($date);

                                                                $formatted_date = date("jS", $timestamp) . " Day of " . date("F Y", $timestamp);

                                                                echo $formatted_date;
                                                                ?></b>. Here at barangay North Poblacion Gabaldon Nueva Ecija. </p>

                        <div style="margin-left: 20px">
                          <div class="row mt-2 hakdog" style="margin-top: 80px;">
                            <span class="col-md-6 mn">
                              <p class="prep-cert-label" style="margin-top: 20px;">Prepared by:</p>
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
                              <p class="prep-cert-label" style="margin-top: 20px;">Certified by: </p>
                              <p class="certified-container" style="margin-top: 10px;">
                                <b><span class="fw-bold mb-0 text-uppercase">
                                    <?php
                                    $captain = array_filter($officials_rows, function ($official) {
                                      return $official['position'] === 'Barangay Captain';
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
          var printContents = document.getElementById(
            divName).innerHTML;
          var originalContents = document.body
            .innerHTML;

          document.body.innerHTML = printContents;

          window.print();

          document.body.innerHTML = originalContents;
        }
      </script>

</body>

</html>