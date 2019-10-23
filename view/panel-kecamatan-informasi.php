<!DOCTYPE html>
<html lang="en">
<?php include("include/head.php");?>
<style> 
#map {
  position: relative;
  width: 100%;
  height: 400px;
  float: left;
}
</style>  
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
									<h5 class="font-weight-700 pull-left text-uppercase">Informasi Kecamatan</h5>
									<a href="<?php echo $domain ?>panel/kecamatan" class="site-button right-arrow button-sm float-right" cyine-ajax>Kembali</a>
								</div>
									<div class="row">
										<div class="col-lg-12 col-md-12">
											<div class="form-group" id="map">
											</div>
										</div>
									</div>
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
<script src="<?php echo $domain;?>assets/plugins/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
<script src="<?php echo $domain;?>assets/plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
<script src="<?php echo $domain;?>assets/plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
<script src="<?php echo $domain;?>assets/plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
<script src="<?php echo $domain;?>assets/plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
<script src="<?php echo $domain;?>assets/plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
<script src="<?php echo $domain;?>assets/plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
<script src="<?php echo $domain;?>assets/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script src="<?php echo $domain;?>assets/js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS  -->
<script src="<?php echo $domain;?>assets/js/dz.ajax.js"></script><!-- CONTACT JS  -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCowOsHWcNwlICLg2hLmwm7nxPIkG2m-8Y&libraries=drawing&callback=initMap"></script>	       
    <script>
      function init() {
			  var mapOptions = {
				'zoom': 11,
				'center': new google.maps.LatLng(<?php echo $a["lat"];?>,<?php echo $a["lng"];?>),
				'mapTypeId': google.maps.MapTypeId.ROADMAP,
				'scaleControl': true
			  }
			  map = new google.maps.Map(document.getElementById("map"), mapOptions);

				var polyOptions = {
                    strokeWeight: 0,
                    fillOpacity: 0.45,
                    editable: true,
                    draggable: true
				};
				 // Define the LatLng coordinates for the polygon.
				var triangleCoords = [
							<?php foreach ($sk as $isi) { ?>
							{lat: <?php echo $isi["lat"]?>, lng: <?php echo $isi["lng"]?>},
							<?php } ?>

				];
						// Construct the polygon.
						var bermudaTriangle = new google.maps.Polygon({
						paths: triangleCoords,
						strokeColor: '#FF0000',
						strokeOpacity: 0.8,
						strokeWeight: 3,
						fillColor: '#FF0000',
						fillOpacity: 0.35
						});
						bermudaTriangle.setMap(map);

						var markers = [
							<?php
							$quotes_qry="SELECT judul,maps_lat,maps_lng FROM cyi_pengaduan WHERE maps_alamat LIKE '%".$result["nama"]."%'";
							$result=mysqli_query($connect,$quotes_qry); 
							while($row=mysqli_fetch_array($result)){
							?>
						['<?php echo $row["judul"];?>', <?php echo $row["maps_lat"];?> , <?php echo $row["maps_lng"];?>],
							<?php } ?>
						];
	 var infowindow = new google.maps.InfoWindow(), marker, i;
	 var bounds = new google.maps.LatLngBounds(); // diluar looping
	 for (i = 0; i < markers.length; i++) {  
	 pos = new google.maps.LatLng(markers[i][1], markers[i][2]);
	 bounds.extend(pos); // di dalam looping
	 marker = new google.maps.Marker({
		 position: pos,
		 map: map
	 });
	 google.maps.event.addListener(marker, 'click', (function(marker, i) {
		 return function() {
			 infowindow.setContent(markers[i][0]);
			 infowindow.open(map, marker);
		 }
	 })(marker, i));
	 map.fitBounds(bounds); // setelah looping
	 }	
 
	}   

    </script>	
    
</html>
