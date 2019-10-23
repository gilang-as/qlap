<?php
    require_once("config.php");
    if(isset($_GET["slug"])){
        include("view/detail-kecamatan.php");
    }else{
        include("view/daftar-kecamatan.php");
    }
?>