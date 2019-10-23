<!DOCTYPE html>
<html lang="en">
<?php include("include/head.php");?>
<body id="bg">
<div class="page-wraper">
	<?php include("include/header.php");?>
    <!-- Content -->
    <div class="page-content bg-white">
		<!-- contact area -->
        <div class="content-block">
			<!-- Browse Jobs -->
			<div class="section-full bg-white browse-job p-t50 p-b20">
				<div class="container">
					<div class="row">
						<?php include("include/sidebar.php");?>
						<div class="col-xl-9 col-lg-8 m-b30">
							<div class="job-bx job-profile">
								<div class="job-bx-title clearfix">
									<h5 class="font-weight-700 pull-left text-uppercase">Ubah Data Diri</h5>
									<a href="index.html" class="site-button right-arrow button-sm float-right">Back</a>
								</div>
								<form method="POST" enctype="multipart/form-data">
									<div class="row m-b30">
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Nama:</label>
												<input type="text" name="nama" id="nama" value="<?php echo $result["nama"];?>" class="form-control" placeholder="Nama Anda" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Tanggal Lahir:</label>
												<input type="date" name="lahir" id="lahir" value="<?php echo $result["lahir"];?>" class="form-control" placeholder="00/00/0000" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Jenis Kelamin:</label>
												<select id="level" name="jekel" required>
														<option value="1" <?php if($result["lahir"]==1){ echo "selected"; };?>>Laki-laki</option>
														<option value="2" <?php if($result["lahir"]==2){ echo "selected"; };?>>Perempuan</option>
													</select>
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
                                                        <input type="file" id="foto" name="foto" class="site-button form-control" id="customFile">
                                                    </div>
                                                </div>
										</div>
										
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Surel:</label>
												<input type="email" name="surel" id="surel" value="<?php echo $result["surel"];?>" class="form-control" placeholder="Surel Anda" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Sandi:</label>
												<input type="password" name="sandi" id="sandi" class="form-control" required>
												<p class="text-danger">Nb. Masukkan sandi lama jika tidak ingin merubah, atau masukkan sandi baru jika ingin merubah.</p>
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
            <!-- Browse Jobs END -->
		</div>
    </div>
    <!-- Content END-->
	<!-- Modal Box -->
	<div class="modal fade lead-form-modal" id="car-details" tabindex="-1" role="dialog" >
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="modal-body row m-a0 clearfix">
					<div class="col-lg-6 col-md-6 overlay-primary-dark d-flex p-a0" style="background-image:url(images/background/bg3.jpg);  background-position:center; background-size:cover;">
						<div class="form-info text-white align-self-center">
							<h3 class="m-b15">Login To You Now</h3>
							<p class="m-b15">Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry.</p>
							<ul class="list-inline m-a0">
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 p-a0">
						<div class="lead-form browse-job text-left">
							<form>
								<h3 class="m-t0">Personal Details</h3>
								<div class="form-group">
									<input value="" class="form-control" placeholder="Name"/>
								</div>	
								<div class="form-group">
									<input value="" class="form-control" placeholder="Mobile Number"/>
								</div>
								<div class="clearfix">
									<button type="button" class="btn-primary site-button btn-block">Submit </button>
								</div>
							</form>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
	<!-- Modal Box End -->
	<?php include("include/footer.php");?>
    <!-- Footer END -->
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
<script src="<?php echo $domain;?>assets/plugins/switcher/js/switcher.js"></script><!-- SWITCHER FUCTIONS  -->
<script src="<?php echo $domain;?>assets/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script src="<?php echo $domain;?>assets/js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS  -->
<script src="<?php echo $domain;?>assets/js/dz.ajax.js"></script><!-- CONTACT JS  -->
</html>
