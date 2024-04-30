<?php
session_start();

if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];

    switch ($role) {
        case 'Administrator':
            header('Location: ../pages/dashboard/dashboard.php');
            break;
        case 'Resident':
            header('Location: ../pages/resident/clearance.php');
            break;
        case 'Captain':
            header('Location: ../pages/captain/pages/officials/officials.php');
            break;
        case 'Absentee':
            header('Location: ../pages/absentee/business_cert.php');
            break;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Barangay Information System</title>
    <!-- bootstrap 3.0.2 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            height: 100vh;
            background: #f1f5f9;
        }

        .topbar {
            position: fixed;
            background: #15803d;
            top: 0;
            left: 0;
            padding: 10px 0;
            width: 100%;
            filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1));
        }

        .topbar .nav>li>a {
            color: #d5d5d5;
            padding: 10px 15px;
            display: inline-block;
            font-size: medium;
            transition: 0.2s;
        }

        .topbar .nav {
            margin-right: 20px;
            float: right;
        }

        .topbar .nav>li.active>a {
            background-color: transparent;
        }

        .topbar .nav {
            margin-top: 0;
        }

        .main-content .wrapper {
            max-width: 1440px;
            margin: 0 auto;
        }

        .main-content-con img {
            width: 300px;
            height: auto;
        }

        .main-content-con {
            align-items: center;
            padding: 100px 0 0;
            gap: 50px;
            justify-content: center;
            flex-direction: column;
            display: flex;
        }

        .main-content-details {
            text-align: center;
        }

        .navbar-nav>li.active>a,
        .nav>li>a:hover,
        .navbar-nav>li.active>a:focus {
            background-color: transparent;
            color: #FFFFFF;
        }
    </style>
</head>

<body>
    <div class="topbar">
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">About<span class="sr-only">(current)</span></a></li>
            <li><a href="../login.php">Admin</a></li>
            <li><a href="../pages/captain/login.php">Captain</a></li>
            <li><a href="../pages/resident/login.php">Resident</a></li>
        </ul>
    </div>
    <section class="main-content">
        <div class="wrapper">
            <div class="main-content-con">
                <img src="../img/north.png" alt="Ligaya Logo">
                <div class="main-content-details">
                    <h3>Welcome to the Barangay North Poblacion, Management System</h3>
                    <br>
                    <h4>Located at blah blah blah</h4>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>