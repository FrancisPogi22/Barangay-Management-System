<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Barangay Information System</title>
    <!-- bootstrap 3.0.2 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
   
    <!-- Custom styles for image slider --> 
  <style>
/* Set margin and padding of body to 0 */
body {
    margin: 0;
    padding: 0;
    overflow-x: hidden; /* Hide horizontal overflow */
}

.carousel-inner{
  height: 100%;
}
/* Custom styles for slider */
.carousel-inner img {
    width: 100vw; /* Set the width to 100% of the viewport width */
    height: 100vh; /* Set the height to 100% of the viewport height */
    object-fit: cover; /* Maintain aspect ratio and cover entire slide */
}

/* Positioning the slider */
#myCarousel {
    position: fixed; /* Change to fixed positioning */
    top: 0; /* Align to the top of the viewport */
    left: 0; /* Align to the left of the viewport */
    width: 100vw; /* Set the width to 100% of the viewport width */
    height: 100vh; /* Set the height to 100% of the viewport height */
    margin: 0; /* Set margin to 0 */
    padding: 0; /* Set padding to 0 */
    z-index: -1; /* Move the slider behind other content */
}

/* Center the carousel vertically and horizontally */
.carousel-inner {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Set the height to 100% of the viewport height */
}
  /* Custom CSS for changing the active link color */
 /* Custom CSS for changing the active link color */
.navbar-nav > li.active > a,
.navbar-nav > li.active > a:hover,
.navbar-nav > li.active > a:focus {
    background-color: #ff0000 !important; /* Change this to the desired color */
    color: blue !important; /* Change this to the desired text color */
}

</style>

</head>
<body>
<nav class="navbar navbar-inverse" style="border-radius:0px;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img alt="Brand" src="../img/ligaya.png" style="width:50px; margin-top:-15px; "></a>
    </div>

<!-- Your existing navbar code -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">About<span class="sr-only">(current)</span></a></li>
        <li><a href="../login.php">Admin</a></li>
        <li><a href="../pages/captain/login.php">Captain</a></li>
        <li><a href="../pages/resident/login.php">Resident</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<!-- Slider -->
<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2500">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="../img/fiesta.png" alt="Fiesta">
    </div>

    <div class="item">
      <img src="../img/cleanup.png" alt="Cleanup">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- End Slider -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="../js/bootstrap.min.js"></script>

</body>
</html>