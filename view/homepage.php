<!DOCTYPE html>
<html lang="en">
<?php include("include/head.php");?>
<body id="bg">
<div class="page-wraper">
	<?php include('include/header.php');?>
    <div class="page-content">
		<div class="dez-bnr-inr dez-bnr-inr-md" style="background-image:url(<?php echo $domain;?>assets/images/slider.jpg);">
            <div class="container">
                <div class="dez-bnr-inr-entry align-m">
					<div class="find-job-bx">
						<a href="<?php echo $domain;?>" class="site-button button-sm" cyine-ajax>Sistem Informasi Layanan Pelaporan Masyarakat dibidang Infrastuktur</a>
						<h2><span class="text-primary">Qlap</span> - Ku Lapor <br>Kabupaten Purwakarta</h2>
					</div>
				</div>
            </div>
        </div>
		<div class="section-full job-categories content-inner-2 bg-white">
			<div class="container">
				<div class="section-head d-flex head-counter clearfix">
					<div class="mr-auto">
						<h2 class="m-b5">Kategori</h2>
						<h6 class="fw3"><?php echo Total("cyi_kategori");?> Daftar Kategori Infrastuktur</h6>
					</div>
					<div class="head-counter-bx">
						<h2 class="m-b5"><?php echo Total("cyi_pengaduan");?></h2>
						<h6 class="fw3">Terlapor</h6>
					</div>
					<div class="head-counter-bx">
						<h2 class="m-b5"><?php echo Total("cyi_pengaduan","WHERE status=1");?></h2>
						<h6 class="fw3">Diselesaikan</h6>
					</div>
					<div class="head-counter-bx">
						<h2 class="m-b5"><?php echo Total("cyi_pengaduan","WHERE status=4 OR status=3 OR status=2");?></h2>
						<h6 class="fw3">Proses</h6>
					</div>
				</div>
				<div class="row sp20">
					<?php
                          $quotes_qry="SELECT * FROM cyi_kategori";
                          $data=mysqli_query($connect,$quotes_qry);
                          while($row=mysqli_fetch_array($data)){ 
                    ?>
					<div class="col-lg-2 col-md-3 col-sm-6">
						<div class="icon-bx-wraper">
							<div class="icon-content">
							<img src="<?php echo $domain;?>upload/kategori/<?php echo $row["logo"];?>" alt="" srcset="">
								<a href="<?php echo $domain; ?>laporan?kategori=<?php echo $row["slug"];?>" class="dez-tilte" cyine-ajax><?php echo $row["nama"];?></a>
								<p class="m-a0">20 Laporan</p>
							</div>
						</div>				
					</div>
					<?php } ?>
					<div class="col-lg-12 text-center m-t30">
						<a href="<?php echo $domain; ?>kategori" class="site-button radius-xl" cyine-ajax>Semua Kategori</a>
					</div>
				</div>
			</div>
		</div>
		<div class="section-full content-inner bg-gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 section-head text-center">
						<h2 class="m-b5">Kecamatan</h2>
						<h6 class="fw4 m-b0"><?php echo Total("cyi_kecamatan");?> Kecamatan Kabupaten Purwakarta</h6>
					</div>
				</div>
				<div class="row">
				<?php
                          $quotes_qry="SELECT * FROM cyi_kecamatan";
                          $data=mysqli_query($connect,$quotes_qry);
                          while($row=mysqli_fetch_array($data)){ 
                    ?>
					<div class="col-lg-3 col-sm-6 col-md-6 m-b30">
						<a href="<?php echo $domain;?>" cyine-ajax>
							<?php if(isset($row["baner"])){?>
							<div class="city-bx align-items-end  d-flex" style="background-image:url(<?php echo $domain;?>upload/kecamatan/<?php echo $row["baner"];?>)">
							<?php }else{?>
							<div class="city-bx align-items-end  d-flex" style="background-image:url(<?php echo $domain;?>assets/images/not-found.png)">
							<?php } ?>
								<div class="city-info">
									<h5><?php echo $row["nama"];?></h5>
									<span>40 Laporan</span>
								</div>
							</div>
						</a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
    <?php include('include/footer.php');?>
</div>
<script src="<?php echo $domain; ?>assets/plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="<?php echo $domain; ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="<?php echo $domain; ?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
<script src="<?php echo $domain; ?>assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
<script src="<?php echo $domain; ?>assets/plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
<script src="<?php echo $domain; ?>assets/plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
<script src="<?php echo $domain; ?>assets/plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
<script src="<?php echo $domain; ?>assets/plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
<script src="<?php echo $domain; ?>assets/plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
<script src="<?php echo $domain; ?>assets/plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
<script src="<?php echo $domain; ?>assets/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script src="<?php echo $domain; ?>assets/js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS  -->
<script src="<?php echo $domain; ?>assets/js/dz.ajax.js"></script><!-- CONTACT JS  -->
</body>
</html>