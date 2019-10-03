<?php
session_start();
$_SESSION['lat'] = isset($_POST["latitude"]) ?  $_POST["latitude"] : "12.961884200000002";
$_SESSION['long'] = isset($_POST["longitude"]) ?  $_POST["longitude"] : "77.7108574";
header("Location:index.php");