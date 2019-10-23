<!DOCTYPE html>
<html lang="en">
<?php include("include/head.php");?>
<body id="bg">
<div class="page-wraper">
<div id="loading-area"></div>
    <!-- Content -->
    <div class="page-content bg-white login-style2" style="background-image:url(<?php echo $domain;?>assets/images/background.png); background-size: contain;">
        <div class="section-full">
            <!-- Login Page -->
            <div class="container">
                <div class="row">
					<div class="col-lg-6 col-md-6 d-flex">
						<div class="text-info max-w400 align-self-center">
							<div class="logo">
								<a href="index.html"><img src="images/logo-white2.png" alt=""></a>
							</div>
							<h2 class="m-b10">SELAMAT DATANG</h2>
							<p class="m-b30">Silahkan masuk dahulu dengan memasukkan alamat surel anda dan password anda, jika belum mempunyai akun pengguna, bisa melakukan pendaftaran.</p>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="login-2 submit-resume p-a30 seth">
							<div class="tab-content nav">
								<form id="login" method="POST" class="tab-pane active col-12 p-a0 ">
									<div class="form-group">
										<label>Surel*</label>
										<div class="input-group">
											<input name="surel" required class="form-control" placeholder="surel@domain.id" type="email">
										</div>
									</div>
									<div class="form-group">
										<label>Sandi*</label>
										<div class="input-group">
											<input name="sandi" required="" class="form-control " placeholder="Sandi Anda" type="password">
										</div>
									</div>
									<div class="text-center">
										<button class="site-button float-left">Masuk</button>
                                        <a href="<?php echo $domain;?>akun/daftar" class="site-button" cyine-ajax>Daftar</a>
										<a data-toggle="tab" href="#forgot-password" class="site-button-link forget-pass m-t15 float-right"><i class="fa fa-unlock-alt"></i> Lupa Sandi</a> 
									</div>
								</form>
								<form method="POST" id="forgot-password" class="tab-pane fade  col-12 p-a0">
									<p>Silahkan Masukkan surel anda jika lupa sandi. </p>
									<div class="form-group">
										<label>Surel *</label>
										<div class="input-group">
											<input name="ubahsandi_surel" required="" class="form-control" type="email">
										</div>
									</div>
									<div class="text-left"> 
										<a class="site-button outline gray" data-toggle="tab" href="#login">Back</a>
										<button class="site-button pull-right">Kirim</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Login Page END -->
		</div>
		<footer class="login-footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<span class="float-left"><?php echo date("Y");?> © Copyright by <i class="fa fa-heart m-lr5 text-red heart"></i>
						<a href="javascript:void(0);"><b>Qlap</b> </a> </span>
						<span class="float-right">
							All rights reserved.
						</span>
					</div>
				</div>
			</div>
		</footer>
	</div>
    <!-- Content END -->
    <button class="scroltop fa fa-chevron-up" ></button>
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
