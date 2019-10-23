<!DOCTYPE html>
<html lang="en">
<?php include("include/head.php");?>
<body id="bg" onload="init()">
    <div class="page-wraper">
        <?php include("include/header.php");?>
        <div class="page-content bg-white">
            <div class="content-block">
                <div class="section-full bg-white browse-job p-t50 p-b20">
                    <div class="container">
                        <div class="row">
                            <?php include("include/sidebar.php");?>
                            <div class="col-xl-9 col-lg-8 m-b30">
                                <div class="job-bx job-profile">
                                    <div class="job-bx-title clearfix">
                                        <h5 class="font-weight-700 pull-left text-uppercase">Tambah Pengguna</h5>
                                        <a href="<?php echo $domain ?>panel/pengguna" class="site-button right-arrow button-sm float-right" cyine-ajax>Kembali</a>
                                    </div>
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="row m-b30">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Pengguna">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="foto">Foto Profil</label>
                                                    <div class="custom-file">
                                                        <p class="m-a0">
                                                            <i class="fa fa-upload"></i>
                                                            Unggah Gambar
                                                        </p>
                                                        <input type="file" id="foto" name="foto" class="site-button form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="surel">Surel</label>
                                                    <input type="email" id="surel" name="surel" class="form-control" placeholder="surel@domain.id">
                                                </div>
                                            </div>
											<div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="sandi">Sandi</label>
                                                    <input type="password" id="sandi" name="sandi" class="form-control" placeholder="Sandi">
                                                </div>
                                            </div>
											<div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="jekel">Jenis Kelamin</label>
													<select id="level" name="jekel">
														<option value="1">Laki-laki</option>
														<option value="2">Perempuan</option>
													</select>
												</div>
                                            </div>
											<div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="lahir">Tanggal Lahir</label>
                                                    <input type="date" id="lahir" name="lahir" class="form-control" placeholder="Tanggal Lahir">
                                                </div>
                                            </div>
											<div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="level">Level</label>
													<select id="level" name="level">
														<option value="3">Masyarakat</option>
														<option value="2">Staf</option>
														<option value="1">Administrator</option>
													</select>
                                                </div>
                                            </div>
											<div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
													<select id="status" name="status">
														<option value="1">Aktif</option>
														<option value="0">Belum Aktif</option>
													</select>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="site-button m-b30">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("include/footer.php");?>
        <button class="scroltop fa fa-chevron-up"></button>
    </div>
    <!-- JAVASCRIPT FILES ========================================= -->
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
</html>