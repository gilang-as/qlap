<?php
require_once("config.php");
require_once("plugin/phpmailer/class.phpmailer.php");
if($_GET["halaman"]=="masuk"){
    if(isset($_POST["surel"]) && isset($_POST["sandi"])){
        $surel = $_POST['surel'];
        $sandi = sandi($surel,$_POST["sandi"]);
        $profil_qry="SELECT * FROM cyi_pengguna WHERE surel='".$surel."' AND sandi='".$sandi."'";
        $profil=mysqli_fetch_assoc(mysqli_query($connect,$profil_qry));
        $cek=mysqli_num_rows(mysqli_query($connect,$profil_qry));
        if($cek > 0 && $profil["status"]==1){
            $_SESSION['status'] = "masuk";
            $_SESSION['surel'] = $profil["surel"];
            $_SESSION['lahir'] = $profil["lahir"];
            $_SESSION['jekel'] = $profil["jekel"];
            $_SESSION['foto'] = $profil["foto"];
            $_SESSION['nama'] = $profil["nama"];
            $_SESSION['id'] = $profil["id"];
            $_SESSION['level'] = $profil["lv"];
            header("location:".$domain."panel");
        }else{
        header("location:".$domain."akun/masuk");
        }
    }elseif(isset($_POST["ubahsandi_surel"])){
        $token=token(6);
        $surel=$_POST["ubahsandi_surel"];

        $mail = new PHPMailer; 
        $message = file_get_contents("view/mail/lupasandi.php");
        $message = str_replace('%nama%', "$nama", $message); 
        $message = str_replace('%token%', $token, $message);
        $message = str_replace('%telepon%', "09235784", $message);
        $message = str_replace('%url%', $domain."akun/lupa-sandi", $message);
        $message = str_replace('%alamat%', "Alamat Anda", $message);
        $mail->IsSMTP();
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = "smtp.gmail.com"; //host masing2 provider email
        $mail->SMTPDebug = 0;
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = "qlapor@gmail.com"; //user email
        $mail->Password = "qlapor123"; //password email 
        $mail->IsHTML(true);
        $mail->SetFrom("qlapor@gmail.com","Qlap - Ku lapor"); //set email pengirim
        $mail->Subject = "Lupa Kata Sandi"; //subyek email
        $mail->AddAddress($surel, "Ubah Sandi");  //tujuan email
        $mail->MsgHTML($message);
        if($mail->Send()){
            $insert=array(
            "token" => $token
            );
            Ubah("cyi_pengguna", $insert,"WHERE surel = '".$_POST['ubahsandi_surel']."'");
        }
        header("Location:".$domain."akun/lupa-sandi"); 
    }
    include("view/akun-masuk.php");
}elseif($_GET["halaman"]=="daftar"){
    if(isset($_POST["surel"]) && isset($_POST["sandi"]) && isset($_POST["nama"])){
        $token=token(6);
        $surel=$_POST["surel"];
        $sandi=$_POST["sandi"];
        $nama=$_POST["nama"];

        $mail = new PHPMailer; 
        $message = file_get_contents("view/mail/verification.php");
        $message = str_replace('%nama%', "$nama", $message); 
        $message = str_replace('%token%', $token, $message);
        $message = str_replace('%telepon%', "09235784", $message);
        $message = str_replace('%url%', $domain."akun/verifikasi", $message);
        $message = str_replace('%alamat%', "Alamat Anda", $message);
        $mail->IsSMTP();
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = "smtp.gmail.com"; //host masing2 provider email
        $mail->SMTPDebug = 0;
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = "qlapor@gmail.com"; //user email
        $mail->Password = "qlapor123"; //password email 
        $mail->IsHTML(true);
        $mail->SetFrom("qlapor@gmail.com","Qlap - Ku lapor"); //set email pengirim
        $mail->Subject = "Verifikasi Pendaftaran Akun"; //subyek email
        $mail->AddAddress($surel, $nama);  //tujuan email
        $mail->MsgHTML($message);
        if($mail->Send()){
            $insert=array(
            "surel" => $surel,
            "sandi" =>  sandi($surel,$_POST["sandi"]),
            "nama" =>  $nama,
            "status" => 0,
            "lv" => 3,
            "token" => $token
            );
            Masukkan("cyi_pengguna", $insert);
        }
        header("Location:".$domain."akun/verifikasi"); 
    }
    include("view/akun-daftar.php");
}elseif($_GET["halaman"]=="verifikasi"){
    if(isset($_POST["token"])){
        $profil_qry="SELECT * FROM cyi_pengguna WHERE token='".$_POST['token']."'";
        $profil=mysqli_fetch_assoc(mysqli_query($connect,$profil_qry));
        $cek=mysqli_num_rows(mysqli_query($connect,$profil_qry));
        if($cek > 0){
            $data=array(
                "status" => 1
                );
                Ubah("cyi_pengguna", $data,"WHERE id = '".$profil['id']."'");
            $_SESSION['status'] = "masuk";
            $_SESSION['surel'] = $profil["surel"];
            $_SESSION['lahir'] = $profil["lahir"];
            $_SESSION['jekel'] = $profil["jekel"];
            $_SESSION['foto'] = $profil["foto"];
            $_SESSION['nama'] = $profil["nama"];
            $_SESSION['id'] = $profil["id"];
            $_SESSION['level'] = $profil["lv"];
            header("location:".$domain."panel");
        }else{
        header("location:".$domain."akun/masuk");
        }
    }
    include("view/akun-verifikasi.php");
}elseif($_GET["halaman"]=="lupa-sandi"){
    if(isset($_POST["token"]) && isset($_POST["sandi"])){
        $profil_qry="SELECT * FROM cyi_pengguna WHERE token='".$_POST['token']."'";
        $profil=mysqli_fetch_assoc(mysqli_query($connect,$profil_qry));
        $cek=mysqli_num_rows(mysqli_query($connect,$profil_qry));
        if($cek > 0){
            $data=array(
                "sandi" => sandi($profil["surel"],$_POST["sandi"])
                );
                Ubah("cyi_pengguna", $data,"WHERE id = '".$profil['id']."'");
            $_SESSION['status'] = "masuk";
            $_SESSION['surel'] = $profil["surel"];
            $_SESSION['lahir'] = $profil["lahir"];
            $_SESSION['jekel'] = $profil["jekel"];
            $_SESSION['foto'] = $profil["foto"];
            $_SESSION['nama'] = $profil["nama"];
            $_SESSION['id'] = $profil["id"];
            $_SESSION['level'] = $profil["lv"];
            header("location:".$domain."panel");
        }else{
        header("location:".$domain."akun/masuk");
        }
    }
    include("view/akun-lupasandi.php");
}elseif($_GET["halaman"]=="keluar"){
    session_destroy();
    session_abort();
    header("Location:".$domain); 
}else{
    if(empty($_SESSION["status"])){
        header("location:".$domain."akun/masuk");
    }else{
        if(isset($_POST["nama"]) || isset($_POST["lahir"]) || isset($_POST["jekel"]) || isset($_POST["sandi"])){
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
                            "foto" =>  $nama
                        );
                        Ubah("cyi_pengguna", $insert,"WHERE id = '".$_SESSION['id']."'");
                        $_SESSION['surel'] = $_POST["surel"];
                        $_SESSION['lahir'] = $_POST["lahir"];
                        $_SESSION['jekel'] = $_POST["jekel"];
                        $_SESSION['foto'] = $nama;
                        $_SESSION['nama'] = $_POST["nama"];
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
                    "lahir" =>  $_POST["lahir"]
                );
                Ubah("cyi_pengguna", $insert,"WHERE id = '".$_SESSION['id']."'");
                $_SESSION['surel'] = $_POST["surel"];
                $_SESSION['lahir'] = $_POST["lahir"];
                $_SESSION['jekel'] = $_POST["jekel"];
                $_SESSION['nama'] = $_POST["nama"];
            }
        }
        $query=mysqli_query($connect,'SELECT * FROM cyi_pengguna WHERE id="'.$_SESSION['id'].'"');
        $result=mysqli_fetch_assoc($query);
        include("view/akun.php");
    }
}
?>