<!DOCTYPE html>
<html lang="en">
<?php include("include/head.php");?>
<body id="bg">
<div class="page-wraper">
    <?php include("include/header.php");?>
    <div class="page-content bg-white">
	<div class="dez-bnr-inr overlay-black-middle" style="background-image:url(<?php echo $domain;?>assets/images/page-2.jpg);">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Daftar Kecamatan</h1>
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="<?php echo $domain; ?>" cyine-ajax>Beranda</a></li>
							<li>Kecamatan</li>
						</ul>
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
<script src="<?php echo $domain;?>assets/js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS  -->
<script src="<?php echo $domain;?>assets/js/dz.ajax.js"></script><!-- CONTACT JS  -->
</body>
</html>
