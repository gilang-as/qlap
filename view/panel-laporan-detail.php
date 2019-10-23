<!DOCTYPE html>
<html lang="en">
<?php include("include/head.php");?>
<style>
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
<body id="bg">
<div class="page-wraper">
	<?php include("include/header.php");?>
    <div class="page-content bg-white">
        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(<?php echo $domain;?>assets/images/page-2.jpg);">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Detail Laporan</h1>
                </div>
            </div>
        </div>
        <div class="content-block">
			<div class="section-full content-inner-1">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="sticky-top">
								<div class="row">
									<div class="col-lg-12 col-md-6">
										<div class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
											<ul>
												<li><i class="ti-location-pin"></i><strong class="font-weight-700 text-black">Alamat</strong><span class="text-black-light"> <?php echo $result["maps_alamat"];?>/span></li>
												<li><i class="ti-shield"></i><strong class="font-weight-700 text-black">Kategori</strong> $800 Monthy</li>
												<li><i class="ti-shield"></i><strong class="font-weight-700 text-black">Pelapor</strong> $800 Monthy</li>
												<li><i class="ti-shield"></i><strong class="font-weight-700 text-black">Waktu</strong> $800 Monthy</li>
											</ul>
										</div>
									</div>
								</div>
                            </div>
						</div>
						<div class="col-lg-8">
							<div class="job-info-box">
								<h3 class="m-t0 m-b10 font-weight-700 title-head">
									<a href="javascript:void(0);" class="text-secondry m-r30"><?php echo $result["judul"];?></a>
								</h3>
								<div id="map"></div>
								<p class="p-t20">
								<?php echo $result["keterangan"];?>
								</p>
								<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
								<div class="row">
									<?php
									$a=mysqli_query($connect,'SELECT * FROM cyi_pengaduan_gambar WHERE id_pengaduan='.$result["id"].'');
									while($row=mysqli_fetch_array($a)){
									?>
									<div class="col-lg-4 col-md-6">
										<div class="m-b30">
											<img src="<?php echo $domain;?>upload/laporan/<?php echo $row["gambar"];?>" alt="">
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
    </div>
	<?php include("include/footer.php");?>
</div>
<!-- JAVASCRIPT FILES ========================================= -->
<script>
// Initialize and add the map
initMap();
function initMap() {
  // The location of Uluru
  var uluru = {lat: <?php echo $result["maps_lat"];?>, lng: <?php echo $result["maps_lng"];?>};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: <?php echo $result["maps_zoom"];?>, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
	</script>
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
