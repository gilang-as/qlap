<!DOCTYPE html>
<html lang="en">
<?php include("include/head.php");?>
<body id="bg">
    <div class="page-wraper">
        <div id="loading-area"></div>
        <?php include("include/header.php");?>
        <div class="page-content bg-white">
            <div class="content-block">
                <div class="section-full bg-white p-t50 p-b20">
                    <div class="container">
                        <div class="job-bx submit-resume" id="create-user">
                            <div class="job-bx-title">
                                <div style="text-align:center;">
                                    <img src="<?php echo $domain;?>assets/images/masuk-dahulu.png" alt="">
                                    <h5>Silahkan Masuk Terlebih Dahulu</h5>
                                    <p>Untuk Melakukan laporan, anda diharapkan masuk terlebih dahulu, jika belum mempunya akun silahkan mendaftarkan diri di form yang sudah di sediakan. <br><br><br> <b>Terima Kasih</b></p>
                                    <a href="<?php echo $domain;?>akun/masuk" class="btn site-button" cyine-ajax>Masuk</a>
                                    <a href="<?php echo $domain;?>akun/daftar" class="btn site-button" cyine-ajax>Daftar</a>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("include/footer.php");?>
    </div>
    <script src="<?php echo $domain;?>assets/plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
    <script src="<?php echo $domain;?>assets/plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
    <script src="<?php echo $domain;?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
    <script src="<?php echo $domain;?>assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
    <script src="<?php echo $domain;?>assets/plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
    <script src="<?php echo $domain;?>assets/plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
    <script src="<?php echo $domain;?>assets/plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
    <script src="<?php echo $domain;?>assets/plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
    <script src="<?php echo $domain;?>assets/plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
    <script src="<?php echo $domain;?>assets/plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
    <script src="<?php echo $domain;?>assets/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
    <script src="<?php echo $domain;?>assets/js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS  -->
    <script src="<?php echo $domain;?>assets/js/dz.ajax.js"></script><!-- CONTACT JS  -->

</html>