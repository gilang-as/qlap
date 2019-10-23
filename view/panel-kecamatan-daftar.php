<!DOCTYPE html>
<html lang="en">
<?php include("include/head.php");?>
<body id="bg">
<div class="page-wraper">
    <?php include("include/header.php");?>
    <div class="page-content bg-white">
        <div class="content-block">
			<div class="section-full browse-job p-b50">
				<div class="container">
                    <br>
					<div class="row">
                    <?php include("include/sidebar.php");?>
						<div class="col-xl-9 col-lg-8 col-md-7">
							<div class="job-bx-title clearfix">
								<h5 class="font-weight-700 pull-left text-uppercase">Daftar Kecamatan</h5>
								<div class="float-right">
                                    <a class="btn btn-info" href="<?php echo $domain; ?>panel/kecamatan/tambah" cyine-ajax>Tambah</a>
								</div>
							</div>
							<ul class="post-job-bx browse-job-grid row">
                            <?php while($row=mysqli_fetch_array($result)){ ?>
								<li class="col-lg-6 col-md-6">
                                    <a href="<?php echo $domain; ?>panel/kecamatan/informasi/<?php echo $row["id"];?>">
                                        <div class="post-bx">
                                            <div class="d-flex m-b30">
                                                <div class="job-post-info">
                                                    <h5 style="text-decoration:none;"><?php echo $row["nama"];?></h5>
                                                    <ul>
                                                        <li><i class="fa fa-map-marker"></i> <?php echo Total("cyi_pengaduan","WHERE maps_alamat LIKE '%".$row["nama"]."%' AND status=5");?> Menunggu</li><br>
                                                        <li><i class="fa fa-bookmark-o"></i> <?php echo Total("cyi_pengaduan","WHERE maps_alamat LIKE '%".$row["nama"]."%' AND status=4");?> Survey</li><br>
                                                        <li><i class="fa fa-clock-o"></i> <?php echo Total("cyi_pengaduan","WHERE maps_alamat LIKE '%".$row["nama"]."%' AND status=3");?> Proses</li><br>
                                                        <li><i class="fa fa-clock-o"></i> <?php echo Total("cyi_pengaduan","WHERE maps_alamat LIKE '%".$row["nama"]."%' AND status=2");?> Selesai</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="job-time mr-auto">
                                                    <a href="<?php echo $domain; ?>panel/kecamatan/informasi/<?php echo $row["id"];?>" cyine-ajax><span>Informasi</span></a>
                                                    <a href="<?php echo $domain; ?>panel/kecamatan/ubah/<?php echo $row["id"];?>" cyine-ajax><span>Ubah</span></a>
                                                    <a href="<?php echo $domain; ?>panel/kecamatan/hapus/<?php echo $row["id"];?>" cyine-ajax><span>Hapus</span></a>
                                                </div>
                                                <div class="salary-bx">
                                                    <span><?php echo Total("cyi_pengaduan","WHERE maps_alamat LIKE '%".$row["nama"]."%'");?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
								</li>
                            <?php } ?>
							</ul>
							<div class="pagination-bx float-right m-t30">
                            <?php include("include/pagenation.php");?>
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
</body>
</html>
