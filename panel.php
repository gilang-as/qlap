<?php
    require_once("config.php");
    if(empty($_SESSION["status"])){
        header("Location:".$domain."akun/masuk"); 
    }else{
        if($_GET["halaman"]=="laporan"){
            if($_GET["tipe"]=="detail" && isset($_GET["id"])){
                $query=mysqli_query($connect,'SELECT * FROM cyi_pengaduan WHERE id='.addslashes($_GET['id']).'');
                $result=mysqli_fetch_assoc($query);
                include("view/panel-laporan-detail.php");
            }elseif($_GET["tipe"]=="status" && isset($_GET["id"])){
                $insert=array(
                    "status" => $_GET["status"]
                );
                Ubah("cyi_pengaduan", $insert,"WHERE id = '".$_GET['id']."'");
                header("Location:".$domain."panel/laporan");
            }else{
                $tableName="cyi_pengaduan";  
                    $targetpage = ""; 
                    $limit = 10; 
                    
                    $query = "SELECT COUNT(*) as num FROM $tableName";
                    $total_pages = mysqli_fetch_array(mysqli_query($connect,$query));
                    $total_pages = $total_pages['num'];
                    
                    $stages = 3;
                    $page=0;
                if(isset($_GET['h'])){
                    $page = mysqli_real_escape_string($connect,$_GET['h']);
                }
                if($page){
                    $start = ($page - 1) * $limit; 
                }else{
                    $start = 0; 
                } 
                $quotes_qry="SELECT * FROM $tableName ORDER BY id DESC LIMIT $start, $limit";
                $result=mysqli_query($connect,$quotes_qry); 
                include("view/panel-laporan-daftar.php");
            }
        }elseif($_GET["halaman"]=="kecamatan"){
            if($_GET["tipe"]=="tambah"){
                if(isset($_POST["nama"])){
                    $coords=rtrim($_POST["coords"], ",");
                    $data["area"]=$_POST["area"];
                    $data["corner"]=$_POST["corner"];
                    $data["lat"]=$_POST["lat"];
                    $data["lng"]=$_POST["lng"];
                    $data_coords=explode(",",$coords);
                    foreach ($data_coords as $value) {
                        list($k, $v)=explode(" ",$value);
                        $data["coords"][]=[
                            "lat" => $k,
                            "lng" => $v
                        ];
                    }
                    $wilayah=json_encode($data);
                    if($_FILES['baner']['tmp_name']!=''){
                        $ekstensi_diperbolehkan	= array('png','jpg');
                        $nama = $_FILES['baner']['name'];
                        $x = explode('.', $nama);
                        $ekstensi = strtolower(end($x));
                        $ukuran	= $_FILES['baner']['size'];
                        $file_tmp = $_FILES['baner']['tmp_name'];
                        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                            if($ukuran < 1044070){			
                                move_uploaded_file($file_tmp, 'upload/kecamatan/'.$nama);
                                $insert=array(
                                    "nama" => $_POST["nama"],
                                    "informasi" =>  $_POST["informasi"],
                                    "baner" =>  $nama,
                                    "wilayah" => $wilayah
                                );
                                Masukkan("cyi_kecamatan", $insert);
                                echo"Berhasil Disimpan";
                            }else{
                                    echo 'UKURAN FILE TERLALU BESAR';
                            }
                        }else{
                            echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                        }
                    }else{
                        $insert=array(
                            "nama" => $_POST["nama"],
                            "informasi" =>  $_POST["informasi"],
                            "wilayah" => $wilayah
                        );
                        Masukkan("cyi_kecamatan", $insert);
                    }
                    header("Location:".$domain."panel/kecamatan");
                }
                include("view/panel-kecamatan-tambah.php");
            }elseif($_GET["tipe"]=="informasi" && isset($_GET["id"])){
                $query=mysqli_query($connect,'SELECT * FROM cyi_kecamatan WHERE id='.addslashes($_GET['id']).'');
                $result=mysqli_fetch_assoc($query);
                $a=json_decode($result["wilayah"],true);
                foreach ($a["coords"] as $k) {
                    $b[]=implode(" ", $k);
                }
                $sk=$a["coords"];
                $a["coords"]=implode(",",$b);
                include("view/panel-kecamatan-informasi.php");
                //echo"HALO";
            }elseif($_GET["tipe"]=="ubah" && isset($_GET["id"])){
                $query=mysqli_query($connect,'SELECT * FROM cyi_kecamatan WHERE id='.addslashes($_GET['id']).'');
                $result=mysqli_fetch_assoc($query);
                $a=json_decode($result["wilayah"],true);
                foreach ($a["coords"] as $k) {
                    $b[]=implode(" ", $k);
                }
                $sk=$a["coords"];
                $a["coords"]=implode(",",$b);
                if(isset($_POST["nama"])){
                    $coords=rtrim($_POST["coords"], ",");
                    $data["area"]=$_POST["area"];
                    $data["corner"]=$_POST["corner"];
                    $data["lat"]=$_POST["lat"];
                    $data["lng"]=$_POST["lng"];
                    $data_coords=explode(",",$coords);
                    foreach ($data_coords as $value) {
                        list($k, $v)=explode(" ",$value);
                        $data["coords"][]=[
                            "lat" => $k,
                            "lng" => $v
                        ];
                    }
                    $wilayah=json_encode($data);
                    if($_FILES['baner']['tmp_name']!=''){
                        $ekstensi_diperbolehkan	= array('png','jpg');
                        $nama = $_FILES['baner']['name'];
                        $x = explode('.', $nama);
                        $ekstensi = strtolower(end($x));
                        $ukuran	= $_FILES['baner']['size'];
                        $file_tmp = $_FILES['baner']['tmp_name'];
                        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                            if($ukuran < 1044070){			
                                move_uploaded_file($file_tmp, 'upload/kecamatan/'.$nama);
                                unlink("upload/kecamatan/".$result["baner"]);
                                $insert=array(
                                    "nama" => $_POST["nama"],
                                    "informasi" =>  $_POST["informasi"],
                                    "baner" =>  $nama,
                                    "wilayah" => $wilayah
                                );
                                Ubah("cyi_kecamatan", $insert,"WHERE id = '".$_GET['id']."'");
                                echo"Berhasil Disimpan";
                            }else{
                                    echo 'UKURAN FILE TERLALU BESAR';
                            }
                        }else{
                            echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                        }
                    }else{
                        $insert=array(
                            "nama" => $_POST["nama"],
                            "informasi" =>  $_POST["informasi"],
                            "wilayah" => $wilayah
                        );
                        Ubah("cyi_kecamatan", $insert,"WHERE id = '".$_GET['id']."'"); 
                    }
                    header("Location:".$domain."panel/kecamatan");
                }
                include("view/panel-kecamatan-ubah.php");
            }elseif($_GET["tipe"]=="hapus" && isset($_GET["id"])){
                $query=mysqli_query($connect,'SELECT baner FROM cyi_kecamatan WHERE id='.addslashes($_GET['id']).'');
                $result=mysqli_fetch_assoc($query);
                Hapus("cyi_kecamatan","WHERE id = '".addslashes($_GET['id'])."'");
                unlink("upload/kecamatan/".$result["baner"]);
                header("Location:".$domain."panel/kecamatan");
            }else{
                if(isset($_POST['data_search'])){
                    $data_qry="SELECT * FROM cyi_kecamatan
                                WHERE cyi_kecamatan.nama like '%".addslashes($_POST['search_value'])."%' 
                                ORDER BY cyi_kecamatan.id";
                $result=mysqli_query($connect,$data_qry); 
                }else{
                    $tableName="cyi_kecamatan";  
                    $targetpage = ""; 
                    $limit = 10; 
                    
                    $query = "SELECT COUNT(*) as num FROM $tableName";
                    $total_pages = mysqli_fetch_array(mysqli_query($connect,$query));
                    $total_pages = $total_pages['num'];
                    
                    $stages = 3;
                    $page=0;
                    if(isset($_GET['h'])){
                    $page = mysqli_real_escape_string($connect,$_GET['h']);
                    }
                    if($page){
                    $start = ($page - 1) * $limit; 
                    }else{
                    $start = 0; 
                    } 
                $quotes_qry="SELECT * FROM cyi_kecamatan ORDER BY id DESC LIMIT $start, $limit";
            
                $result=mysqli_query($connect,$quotes_qry); 
                }
                include("view/panel-kecamatan-daftar.php");
            }
        }elseif($_GET["halaman"]=="kategori"){
            if($_GET["tipe"]=="tambah"){
                if(isset($_POST["nama"]) && isset($_POST["slug"]) && isset($_POST["informasi"])){
                    $ekstensi_diperbolehkan	= array('png','jpg');
                    $nama = $_FILES['logo']['name'];
                    $x = explode('.', $nama);
                    $ekstensi = strtolower(end($x));
                    $ukuran	= $_FILES['logo']['size'];
                    $file_tmp = $_FILES['logo']['tmp_name'];
                    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                        if($ukuran < 1044070){			
                            move_uploaded_file($file_tmp, 'upload/kategori/'.$nama);
                            $insert=array(
                                "nama" => $_POST["nama"],
                                "slug" => $_POST["slug"],
                                "keterangan" =>  $_POST["informasi"],
                                "logo" =>  $nama
                            );
                            Masukkan("cyi_kategori", $insert);
                            echo"Berhasil Disimpan";
                        }else{
                                echo 'UKURAN FILE TERLALU BESAR';
                        }
                    }else{
                        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                    }
                }
                header("Location:".$domain."panel/kategori");
            }elseif($_GET["tipe"]=="ubah" && isset($_GET["id"])){
                $query=mysqli_query($connect,'SELECT * FROM cyi_kategori WHERE id='.addslashes($_GET['id']).'');
                $result=mysqli_fetch_assoc($query);

                if(isset($_POST["nama"]) && isset($_POST["slug"]) && isset($_POST["informasi"])){
                    if($_FILES['logo']['tmp_name']!=''){
                        $ekstensi_diperbolehkan	= array('png','jpg');
                        $nama = $_FILES['logo']['name'];
                        $x = explode('.', $nama);
                        $ekstensi = strtolower(end($x));
                        $ukuran	= $_FILES['logo']['size'];
                        $file_tmp = $_FILES['logo']['tmp_name'];
                        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                            if($ukuran < 1044070){			
                                move_uploaded_file($file_tmp, 'upload/kategori/'.$nama);
                                unlink("upload/kategori/".$result["logo"]);
                                $insert=array(
                                    "nama" => $_POST["nama"],
                                    "slug" => $_POST["slug"],
                                    "keterangan" =>  $_POST["informasi"],
                                    "logo" =>  $nama
                                );
                                Ubah("cyi_kategori", $insert,"WHERE id = '".$_GET['id']."'");
                                echo"Berhasil Disimpan";
                            }else{
                                    echo 'UKURAN FILE TERLALU BESAR';
                            }
                        }else{
                            echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                        }
                    }else{
                        $insert=array(
                            "nama" => $_POST["nama"],
                            "slug" => $_POST["slug"],
                            "keterangan" =>  $_POST["informasi"]
                        );
                        Ubah("cyi_kategori", $insert,"WHERE id = '".$_GET['id']."'");
                    }

                }
                header("Location:".$domain."panel/kategori");
            }elseif($_GET["tipe"]=="hapus" && isset($_GET["id"])){
                $query=mysqli_query($connect,'SELECT logo FROM cyi_kategori WHERE id='.addslashes($_GET['id']).'');
                $result=mysqli_fetch_assoc($query);
                Hapus("cyi_kategori","WHERE id = '".$_GET['id']."'");
                unlink("upload/kategori/".$result["logo"]);
                header("Location:".$domain."panel/kategori");
            }else{
                $tableName="cyi_kategori";  
                $targetpage = ""; 
                $limit = 5; 
                    
                $query = "SELECT COUNT(*) as num FROM $tableName";
                $total_pages = mysqli_fetch_array(mysqli_query($connect,$query));
                $total_pages = $total_pages['num'];
                    
                $stages = 3;
                $page=0;
                if(isset($_GET['h'])){
                    $page = mysqli_real_escape_string($connect,$_GET['h']);
                }
                if($page){
                    $start = ($page - 1) * $limit; 
                }else{
                    $start = 0; 
                } 
                $quotes_qry="SELECT * FROM $tableName ORDER BY id DESC LIMIT $start, $limit";
                $result=mysqli_query($connect,$quotes_qry);
                include("view/panel-kategori-daftar.php");
            }
        }elseif($_GET["halaman"]=="pengguna"){
            if($_GET["tipe"]=="tambah" && empty($_GET["id"])){
                if(isset($_POST["nama"])  && isset($_POST["surel"]) && isset($_POST["sandi"]) && isset($_POST["status"])  && isset($_POST["level"])){
                    if($_FILES['foto']['tmp_name']!=''){
                        $ekstensi_diperbolehkan	= array('png','jpg');
                        $nama = $_FILES['foto']['name'];
                        $x = explode('.', $nama);
                        $ekstensi = strtolower(end($x));
                        $ukuran	= $_FILES['foto']['size'];
                        $file_tmp = $_FILES['foto']['tmp_name'];
                        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                            if($ukuran < 1044070){			
                                move_uploaded_file($file_tmp, 'upload/pengguna/'.$nama);
                                $insert=array(
                                    "nama" => $_POST["nama"],
                                    "surel" => $_POST["surel"],
                                    "sandi" =>  sandi($_POST["surel"], $_POST["sandi"]),
                                    "jekel" =>  $_POST["jekel"],
                                    "lahir" =>  $_POST["lahir"],
                                    "status" => $_POST["status"],
                                    "lv" =>  $_POST["level"],
                                    "foto" =>  $nama
                                );
                                Masukkan("cyi_pengguna", $insert);
                                echo"Berhasil Disimpan";
                            }else{
                                    echo 'UKURAN FILE TERLALU BESAR';
                            }
                        }else{
                            echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                        }
                    }else{
                        $insert=array(
                            "nama" => $_POST["nama"],
                            "surel" => $_POST["surel"],
                            "sandi" =>  sandi($_POST["surel"], $_POST["sandi"]),
                            "jekel" =>  $_POST["jekel"],
                            "lahir" =>  $_POST["lahir"],
                            "status" => $_POST["status"],
                            "lv" =>  $_POST["level"]
                        );
                        Masukkan("cyi_pengguna", $insert);
                    }
                    header("Location:".$domain."panel/pengguna");
                }
                include("view/panel-pengguna-tambah.php");
            }elseif($_GET["tipe"]=="ubah" && isset($_GET["id"])){
                $query=mysqli_query($connect,'SELECT * FROM cyi_pengguna WHERE id='.addslashes($_GET['id']).'');
                $result=mysqli_fetch_assoc($query);
                if(isset($_POST["nama"])  && isset($_POST["surel"]) && isset($_POST["sandi"]) && isset($_POST["status"])  && isset($_POST["level"])){
                    if($_FILES['foto']['tmp_name']!=''){
                        $ekstensi_diperbolehkan	= array('png','jpg');
                        $nama = $_FILES['foto']['name'];
                        $x = explode('.', $nama);
                        $ekstensi = strtolower(end($x));
                        $ukuran	= $_FILES['foto']['size'];
                        $file_tmp = $_FILES['foto']['tmp_name'];
                        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                            if($ukuran < 1044070){		
                                move_uploaded_file($file_tmp, 'upload/pengguna/'.$nama);
                                unlink("upload/pengguna/".$result["foto"]);	
                                $insert=array(
                                    "nama" => $_POST["nama"],
                                    "surel" => $_POST["surel"],
                                    "sandi" =>  sandi($_POST["surel"], $_POST["sandi"]),
                                    "jekel" =>  $_POST["jekel"],
                                    "lahir" =>  $_POST["lahir"],
                                    "status" => $_POST["status"],
                                    "lv" =>  $_POST["level"],
                                    "foto" =>  $nama
                                );
                                Ubah("cyi_pengguna", $insert,"WHERE id = '".$_GET['id']."'");
                                echo"Berhasil Disimpan";
                            }else{
                                    echo 'UKURAN FILE TERLALU BESAR';
                            }
                        }else{
                            echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                        }
                    }else{
                        $insert=array(
                            "nama" => $_POST["nama"],
                            "surel" => $_POST["surel"],
                            "sandi" =>  sandi($_POST["surel"], $_POST["sandi"]),
                            "jekel" =>  $_POST["jekel"],
                            "lahir" =>  $_POST["lahir"],
                            "status" => $_POST["status"],
                            "lv" =>  $_POST["level"]
                        );
                        Ubah("cyi_pengguna", $insert,"WHERE id = '".$_GET['id']."'");
                    }
                    header("Location:".$domain."panel/pengguna");
                }
                include("view/panel-pengguna-ubah.php");
            }elseif($_GET["tipe"]=="hapus" && isset($_GET["id"])){
                $query=mysqli_query($connect,'SELECT * FROM cyi_pengguna WHERE id='.addslashes($_GET['id']).'');
                $result=mysqli_fetch_assoc($query);
                Hapus("cyi_pengguna","WHERE id = '".$_GET['id']."'");
                unlink("upload/pengguna/".$result["foto"]);
                header("Location:".$domain."panel/pengguna");
            }else{
                $tableName="cyi_pengguna";  
                $targetpage = ""; 
                $limit = 5; 
                    
                $query = "SELECT COUNT(*) as num FROM $tableName";
                $total_pages = mysqli_fetch_array(mysqli_query($connect,$query));
                $total_pages = $total_pages['num'];
                    
                $stages = 3;
                $page=0;
                if(isset($_GET['h'])){
                    $page = mysqli_real_escape_string($connect,$_GET['h']);
                }
                if($page){
                    $start = ($page - 1) * $limit; 
                }else{
                    $start = 0; 
                } 
                $quotes_qry="SELECT * FROM $tableName ORDER BY id DESC LIMIT $start, $limit";
                $result=mysqli_query($connect,$quotes_qry);
                include("view/panel-pengguna-daftar.php");
            }
        }else{
            $quotes_qry="SELECT * FROM cyi_pengaduan WHERE id_pengguna='".$_SESSION["id"]."' ORDER BY waktu DESC LIMIT 5";
            $result=mysqli_query($connect,$quotes_qry); 
            include("view/panel-dashboard.php");
        }
    }
?>