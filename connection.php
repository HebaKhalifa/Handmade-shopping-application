<?php
session_start();
$server   = "localhost";
$userName = "root";
$password = "";
$dbName   = "myapp";
$con =  mysqli_connect($server, $userName, $password, $dbName);
if (!$con) {
    echo "cann't connect " . mysqli_connect_error();
}
