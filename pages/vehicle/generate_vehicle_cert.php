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
    body {
      box-sizing: border-box;
      margin: 0;
      padding: 0;

    }

    .main-panel {
      margin: 30px auto;
      border: 1px solid #ccc;
      padding: 20px;
      width: 794px;
      height: 1223px;
    }

    .content {
      border: 4px double green;
      box-shadow: 0 0 0 4px green inset;
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
        size: legal;
        margin: 1in;
      }

      .content {
        border: 4px double green !important;
        /* Adjust the thickness and color as needed */
        box-shadow: 0 0 0 4px green inset !important;
        /* Adjust the thickness and color as needed */
      }

      .prepared-container,
      .certified-container {
        padding-top: 20px;
      }

      .certified-container span {
        margin-left: 2em;
      }

      .hakdog {
        display: flex;
        justify-content: flex-start;
        flex-wrap: wrap;
        margin: 0;
        padding: 0;
      }

      .mn {
        flex: 0 0 auto;
        width: 50%;
        max-width: 50%;
        box-sizing: border-box;
      }

      .vehicle-details {
        display: flex;
        justify-content: space-between;
        margin: 0;
        padding: 0;
      }

      .vehicle-details .col-md-6 {
        flex: 0 0 auto;
        width: 50%;
        max-width: 50%;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }
    }
  </style>

</head>

<?php
include "../connection.php";

$id = $_GET['id'];

$query = "SELECT v.* FROM vehicle_cert as v where v.id = " . $id;
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
                            Republika ng Pilipinas
                          </div>
                          <div class="fw-bold mb-0">
                            Lalawigan ng <b>NORTH POBLACION</b>
                          </div>
                          <div class="fw-bold mb-0">
                            Bayan ng Gabaldon
                          </div>
                          <div class="fw-bold mb-0">
                            Barangay <b>North POBLACION</b>
                          </div>
                          <p>==========================</p>
                          <div class="text-center">
                            <div class="fw-bold mb-0">
                              <b>TANGGAPAN NG PUNONG BARANGAY</b>
                            </div>
                            <div class="fw-bold mb-0">
                              <b>BILIHAN NG MOTOR</b>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-12">
                        <p style="margin-top: 20px;">DAPAT ALAMIN NG LAHAT:</p>
                        <p class="mt-3" style="text-indent: 40px; text-align: justify;">
                          AKO, <b><span class="fw-bold" style="font-size:18px;text-transform: uppercase;text-decoration: underline;"><?= ucwords($rows[0]['sellerName']) ?></span></b> , sapat ang gulang, Pilipino at naninirahan sa Barangay North Poblacion, Gabaldon Nueva Ecija, bilang <b>NAGBENTA</b>, alang-alang sa halangang <b><span class="fw-bold" style="font-size:18px; text-transform: uppercase;text-decoration: underline;"><?= ucwords($rows[0]['amount_words']) . ' ' . '(' . ucwords($rows[0]['amount']) . ')' ?></span></b> salaping Pilipino na sa akin ay ibinayad ni <b><span class="fw-bold" style="font-size:18px;text-decoration: underline; text-transform: uppercase;"><?= ucwords($rows[0]['buyerName']) ?></span></b> sapat ang gulang, Pilipino, Bagong Sikat , Gabaldon, Nueva Ecija bilang <b>BUMILI</b> ay <b>NAGBIBILI, NAGLILIPAT AT NAGSASALIN,</b> sa isang sasakyan, na lalong makikilala sa pamamagitan ng sumusunod na paglalarawan:
                        </p>
                        <div style="text-indent: 40px;">
                          <div class="row vehicle-details">
                            <div class="col-md-6">
                              <p style="margin: 0; padding: 0; ">MAKE:</p>
                              <p style="margin: 0; padding: 0; ">PLATE NUMBER:</p>
                              <p style="margin: 0; padding: 0; ">ENGINE NUMBER:</p>
                              <p style="margin: 0; padding: 0; ">CHASIS NUMBER:</p>
                              <p style="margin: 0; padding: 0; ">DENOMINATION:</p>
                              <p style="margin: 0; padding: 0; ">FUEL:</p>
                              <p style="margin: 0; padding: 0; ">BODY TYPE:</p>
                              <p style="margin: 0; padding: 0;">CR No.:</p>
                            </div>
                            <div class="col-md-6">
                              <p style="margin: 0; padding: 0; "><span class="fw-bold" style="font-size:18px"><?= ucwords($rows[0]['make']) ?></span></p>
                              <p style="margin: 0; padding: 0; "><span class="fw-bold" style="font-size:18px"><?= ucwords($rows[0]['plateNum']) ?></span></p>
                              <p style="margin: 0; padding: 0; "><span class="fw-bold" style="font-size:18px"><?= ucwords($rows[0]['engineNum']) ?></span></p>
                              <p style="margin: 0; padding: 0; "><span class="fw-bold" style="font-size:18px"><?= ucwords($rows[0]['chasisNum']) ?></span></p>
                              <p style="margin: 0; padding: 0; "><span class="fw-bold" style="font-size:18px"><?= ucwords($rows[0]['denomination']) ?></span></p>
                              <p style="margin: 0; padding: 0; "><span class="fw-bold" style="font-size:18px"><?= ucwords($rows[0]['fuel']) ?></span></p>
                              <p style="margin: 0; padding: 0; "><span class="fw-bold" style="font-size:18px"><?= ucwords($rows[0]['bodyType']) ?></span></p>
                              <p style="margin: 0; padding: 0;"><span class="fw-bold" style="font-size:18px"><?= ucwords($rows[0]['crNo']) ?></span></p>
                            </div>
                          </div>

                        </div>
                        <div>
                          <p style="text-indent: 40px; text-align: justify;">Na aking pinatutunayan sa nabanggit na AKO si <b><span class="fw-bold" style="font-size: 18px; text-decoration: underline; text-transform: uppercase;"><?= ucwords($rows[0]['buyerName']) ?></span></b> ang bago at lubos na nag mamay-ari ng sasakyang sinasaysay sa itaas, na ligtas sa anumang sagutin o pananagutan sa sinumang tao o samahan. <?php
                                                                                                                                                                                                                                                                                                                                                                                                                              $dateString = $rows[0]['date'];

                                                                                                                                                                                                                                                                                                                                                                                                                              $date = new DateTime($dateString);

                                                                                                                                                                                                                                                                                                                                                                                                                              $months = [
                                                                                                                                                                                                                                                                                                                                                                                                                                1 => 'Enero',
                                                                                                                                                                                                                                                                                                                                                                                                                                2 => 'Pebrero',
                                                                                                                                                                                                                                                                                                                                                                                                                                3 => 'Marso',
                                                                                                                                                                                                                                                                                                                                                                                                                                4 => 'Abril',
                                                                                                                                                                                                                                                                                                                                                                                                                                5 => 'Mayo',
                                                                                                                                                                                                                                                                                                                                                                                                                                6 => 'Hunyo',
                                                                                                                                                                                                                                                                                                                                                                                                                                7 => 'Hulyo',
                                                                                                                                                                                                                                                                                                                                                                                                                                8 => 'Agosto',
                                                                                                                                                                                                                                                                                                                                                                                                                                9 => 'Setyembre',
                                                                                                                                                                                                                                                                                                                                                                                                                                10 => 'Oktubre',
                                                                                                                                                                                                                                                                                                                                                                                                                                11 => 'Nobyembre',
                                                                                                                                                                                                                                                                                                                                                                                                                                12 => 'Disyembre'
                                                                                                                                                                                                                                                                                                                                                                                                                              ];

                                                                                                                                                                                                                                                                                                                                                                                                                              $days = [
                                                                                                                                                                                                                                                                                                                                                                                                                                'Monday' => 'Lunes',
                                                                                                                                                                                                                                                                                                                                                                                                                                'Tuesday' => 'Martes',
                                                                                                                                                                                                                                                                                                                                                                                                                                'Wednesday' => 'Miyerkules',
                                                                                                                                                                                                                                                                                                                                                                                                                                'Thursday' => 'Huwebes',
                                                                                                                                                                                                                                                                                                                                                                                                                                'Friday' => 'Biyernes',
                                                                                                                                                                                                                                                                                                                                                                                                                                'Saturday' => 'Sabado',
                                                                                                                                                                                                                                                                                                                                                                                                                                'Sunday' => 'Linggo'
                                                                                                                                                                                                                                                                                                                                                                                                                              ];

                                                                                                                                                                                                                                                                                                                                                                                                                              $filipinoDate = 'Ngayong Ika-' . $date->format('d') . ' ng ' . $months[$date->format('n')] . ', ' . $date->format('Y');

                                                                                                                                                                                                                                                                                                                                                                                                                              echo $filipinoDate;
                                                                                                                                                                                                                                                                                                                                                                                                                              ?>
                          </p>
                        </div>
                        <div style="margin-left: 20px">
                          <div class="row mt-2 hakdog">
                            <span class="col-md-6 mn">
                              <p class="prepared-container">
                                <b><span class="fw-bold" style="font-size:18px;text-transform: uppercase;text-decoration: underline;"><?= ucwords($rows[0]['sellerName']) ?></span></b>
                                <br>
                                <span style="margin-left: 50px">Nagbenta</span>
                              </p>
                            </span>
                            <span class="col-md-6 mn">
                              <p class="certified-container">
                                <b><span class="fw-bold" style="font-size:18px;text-transform: uppercase;text-decoration: underline;"><?= ucwords($rows[0]['buyerName']) ?></span></b>
                                <br>
                                <span class="ml-2" style="margin-left: 50px">Bumili</span>
                              </p>
                            </span>
                          </div>

                        </div>
                        <p>Saksi:</p>
                        <p class="prepared-container" style="text-indent: 40px; text-align: justify;">
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
                        </p>
                        <p class="mt-3" style="text-indent: 40px; text-align: justify;">Nilagdaan at sinumapaan sa harap ko <?php
                                                                                                                            $dateString = $rows[0]['date'];

                                                                                                                            $date = new DateTime($dateString);

                                                                                                                            $months = [
                                                                                                                              1 => 'Enero',
                                                                                                                              2 => 'Pebrero',
                                                                                                                              3 => 'Marso',
                                                                                                                              4 => 'Abril',
                                                                                                                              5 => 'Mayo',
                                                                                                                              6 => 'Hunyo',
                                                                                                                              7 => 'Hulyo',
                                                                                                                              8 => 'Agosto',
                                                                                                                              9 => 'Setyembre',
                                                                                                                              10 => 'Oktubre',
                                                                                                                              11 => 'Nobyembre',
                                                                                                                              12 => 'Disyembre'
                                                                                                                            ];

                                                                                                                            $days = [
                                                                                                                              'Monday' => 'Lunes',
                                                                                                                              'Tuesday' => 'Martes',
                                                                                                                              'Wednesday' => 'Miyerkules',
                                                                                                                              'Thursday' => 'Huwebes',
                                                                                                                              'Friday' => 'Biyernes',
                                                                                                                              'Saturday' => 'Sabado',
                                                                                                                              'Sunday' => 'Linggo'
                                                                                                                            ];

                                                                                                                            $filipinoDate = 'Ngayong Ika-' . $date->format('d') . ' ng ' . $months[$date->format('n')] . ', ' . $date->format('Y');

                                                                                                                            echo $filipinoDate;
                                                                                                                            ?>, dito sa Tanggapan ng Punong Barangay ng Barangay North Poblacion, Gabaldon, Nueva Ecija.
                        </p>
                        <br>
                        <p>PATUNAY: </p>
                        <p class="certified-container">
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
                          <span class="ml-2">Punong Barangay</span>
                        </p>
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