<div class="col-xl-3 col-lg-4 m-b30">
    <div class="sticky-top">
        <div class="candidate-info">
            <div class="candidate-detail text-center">
                <div class="canditate-des">
                    <a href="<?php echo $domain;?>akun" cyine-ajax>
                    <?php if($_SESSION["foto"]!=null){?>
                        <img alt="<?php echo $_SESSION["nama"];?>" src="<?php echo $domain;?>upload/pengguna/<?php echo $_SESSION["foto"];?>">
                    <?php }else{ ?>
                        <img alt="<?php echo $_SESSION["nama"];?>" src="<?php echo $domain;?>assets/images/pengguna.png">
                    <?php } ?>
                    </a>
                </div>
                <div class="candidate-title">
                    <div class="">
                        <h4 class="m-b5"><a href="<?php echo $domain;?>akun" cyine-ajax><?php echo $_SESSION["nama"];?></a></h4>
                        <p class="m-b0"><a href="<?php echo $domain;?>akun" cyine-ajax><?php if($_SESSION["level"]==1){echo"Admin";}elseif ($_SESSION["level"]==2){echo"Staf";}else{echo"Masyarakat";}?></a></p>
                    </div>
                </div>
            </div>
            <nav id="nav">
                <ul>
                    <li>
                        <a href="<?php echo $domain;?>panel" cyine-ajax>
                            <i class="fa fa-dashboard" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <?php if($_SESSION["level"]==1 || $_SESSION["level"]==2){?>
                    <li>
                        <a href="<?php echo $domain;?>panel/laporan" cyine-ajax>
                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                            <span>Aduan</span>
                        </a>
                    </li>
                    <?php 
                    }
                    if($_SESSION["level"]==1){?>
                    <li>
                        <a href="<?php echo $domain;?>panel/kategori" cyine-ajax>
                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                            <span>Kategori</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $domain;?>panel/kecamatan" cyine-ajax>
                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                            <span>Kecamatan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $domain;?>panel/pengguna" cyine-ajax>
                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                            <span>Pengguna</span>
                        </a>
                    </li>
                    <?php }?>
                    <li>
                        <a href="<?php echo $domain;?>akun" cyine-ajax>
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                            <span>Ubah Data Diri</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $domain;?>akun/keluar" cyine-ajax>
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>