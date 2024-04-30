<?php
// Establishing Connection with Server by passing inputs as a parameter
$con = mysqli_connect('localhost', 'root', '', 'north') or die(mysqli_connect_error());

date_default_timezone_set("Asia/Manila");
