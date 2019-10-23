<!DOCTYPE html>
<html lang="en">
<?php include("include/head.php");?>
<body id="bg">
<div class="page-wraper">
	<?php include("include/header.php");?>
    <div class="page-content bg-white">
	<div id="myAlert"></div>
        <div class="content-block">
			<div class="section-full bg-white browse-job p-t50 p-b20">
				<div class="container">
					<div class="row">
						<?php include("include/sidebar.php");?>
						<div class="col-xl-9 col-lg-8">
									<div class="job-bx m-b30">
										<div class="row">
											<div class="col-lg-6 col-md-6">
												<div style="background:#6665e8;" class="text-white p-a25">
													<h5>Total Laporan</h5>
													<div class="p-l-20">
													<h2 class="no-margin p-b-5 text-white"><?php echo Total("cyi_pengaduan","WHERE id_pengguna=".$_SESSION["id"]."");?></h2>
													</div>
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div style="background:#6665e8;" class="text-white p-a25">
													<h5>Laporan Lulus</h5>
													<div class="p-l-20">
													<h2 class="no-margin p-b-5 text-white"><?php echo Total("cyi_pengaduan","WHERE id_pengguna=".$_SESSION["id"]." AND status=1");?></h2>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="job-bx table-job-bx bg-white m-b30">
										<div class="d-flex">
											<h5 class="m-b15">Histori Aduan Anda</h5>
										</div>
										<table>
											<thead>
												<tr>
													<th>Judul</th>
													<th>Kategori</th>
													<th>Waktu</th>
												</tr>
											</thead>
											<tbody>
											<?php  while($row=mysqli_fetch_array($result)){ ?>
												<tr>
													<td><?php echo $row["judul"];?></td>
													<td><?php 
												$a=mysqli_query($connect,'SELECT nama FROM cyi_kategori where id='.$row["id_kategori"].'');
												$kategori=mysqli_fetch_assoc($a);
												echo $kategori["nama"];?></td>
													<td><?php echo $row["waktu"];?></td>
												</tr>
											<?php } ?>
											</tbody>
										</table>
									</div>
									<div id="personal_details_bx" class="job-bx bg-white m-b30">
								<div class="d-flex">
									<h5 class="m-b30">Informasi Akun</h5>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="clearfix m-b20">
											<label class="m-b0">Nama</label>
											<span class="clearfix font-13"><?php echo $_SESSION["nama"];?></span>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="clearfix m-b20">
											<label class="m-b0">Jenis Kelamin</label>
											<span class="clearfix font-13"><?php if($_SESSION["jekel"]==1){ echo "Laki-Laki"; }else{ "Perempuan"; };?></span>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="clearfix m-b20">
											<label class="m-b0">Lahir</label>
											<span class="clearfix font-13"><?php echo $_SESSION["lahir"];?></span>
										</div>
										</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="clearfix m-b20">
											<label class="m-b0">Surel</label>
											<span class="clearfix font-13"><?php echo $_SESSION["surel"];?></span>
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
    </div>
	<?php include("include/footer.php");?>
    <!-- Footer END -->
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
</html>
