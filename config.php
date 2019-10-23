<?php
error_reporting(0);
session_start();
include("function.php");
$domain="http://localhost/qlap/";
$host       = "localhost";
$user       = "root";
$pass       = "";
$database   = "qlap";
$connect = new mysqli($host, $user, $pass, $database);
if (!$connect) {
    die ("connection failed: " . mysqli_connect_error());
} else {
    $connect->set_charset('utf8');
}
?>