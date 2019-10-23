<?php
require_once("config.php");
    if($_GET["halaman"]=="tambah"){
        if(isset($_POST["kategori"]) && isset($_POST["judul"]) && isset($_POST["keterangan"]) && isset($_POST["maps_lat"]) && isset($_POST["maps_lng"]) && isset($_POST["maps_zoom"]) && isset($_POST["maps_alamat"])){
           $waktu=date("Y-m-d H:i:s");
            $laporan=array(
                "id_kategori" => $_POST["kategori"],
                "id_pengguna" => $_SESSION["id"],
                "judul" => $_POST["judul"],
                "keterangan" => $_POST["keterangan"],
                "maps_lat" => $_POST["maps_lat"],
                "maps_lng" => $_POST["maps_lng"],
                "maps_zoom" => $_POST["maps_zoom"],
                "maps_alamat" => $_POST["maps_alamat"],
                "status" => 5,
                "waktu" => $waktu
           );
           Masukkan("cyi_pengaduan", $laporan);
           $id_pengaduan=mysqli_insert_id($connect);
           $countfiles = count($_FILES['foto']['name']);
           for($i=0;$i<$countfiles;$i++){
                $ekstensi_diperbolehkan	= array('png','jpg');
                $nama = $_FILES['foto']['name'][$i];
                $x = explode('.', $nama);
                $ekstensi = strtolower(end($x));
                $ukuran	= $_FILES['foto']['size'][$i];
                $file_tmp = $_FILES['foto']['tmp_name'][$i];
                if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                    if($ukuran < 1044070){			
                        move_uploaded_file($file_tmp, 'upload/laporan/'.$nama);
                        $insert=array(
                            "id_pengaduan" => $id_pengaduan,
                            "gambar" =>  $nama
                        );
                        Masukkan("cyi_pengaduan_gambar", $insert);
                        //echo"Berhasil Disimpan";
                    }else{
                            //echo 'UKURAN FILE TERLALU BESAR';
                    }
                }else{
                    //echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                }
            }
        include("view/lapor-berhasil.php");
        }else{
            header("Location:".$domain); 
        }
    }else{
    $quotes_qry="SELECT * FROM cyi_kategori ORDER BY id DESC";
    $result=mysqli_query($connect,$quotes_qry);
    if(isset($_SESSION["status"])){
        include("view/lapor.php");
    }else{
        include("view/lapor-masuk.php");
    }

    }
?>