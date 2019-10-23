<!DOCTYPE html>
<html lang="id">
<?php include("include/head.php");?>
<body id="bg">
<div class="page-wraper">
    <?php include("include/header.php");?>
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- contact area -->
        <div class="content-block">
			<!-- Browse Jobs -->
			<div class="section-full bg-white p-t50 p-b20">
				<div class="container">
					<div class="row">
                        <?php include("include/sidebar.php");?>
						<div class="col-xl-9 col-lg-8 m-b30">
							<div class="job-bx-title clearfix">
								<h5 class="font-weight-700 pull-left text-uppercase">Daftar Laporan</h5>
								<div class="float-right">
								</div>
							</div>
							<ul class="post-job-bx browse-job">
							<?php while($row=mysqli_fetch_array($result)){ ?>
								<li>
									<?php if($row["status"]==5){?>
									<div class="post-bx post-bg-tidak">
									<?php }elseif($row["status"]==3){ ?>
									<div class="post-bx post-bg-survei">
									<?php }elseif($row["status"]==2){ ?>
									<div class="post-bx post-bg-proses">
									<?php }elseif($row["status"]==1){ ?>
									<div class="post-bx post-bg-selesai">
									<?php }else{ ?>
									<div class="post-bx post-bg-selesai">
									<?php } ?>
										<div class="job-post-info m-a0">
											<h4><?php echo $row["judul"];?></h4>
											<ul>
												<li><?php 
												$a=mysqli_query($connect,'SELECT nama FROM cyi_pengguna where id='.$row["id_pengguna"].'');
												$kategori=mysqli_fetch_assoc($a);
												echo $kategori["nama"];?></li>
												<li><i class="fa fa-date"></i> <?php echo $row["waktu"];?></li>
											</ul>
											<div class="job-time m-t15 m-b10">
												<a><span>
													<?php 
												$a=mysqli_query($connect,'SELECT nama FROM cyi_kategori where id='.$row["id_kategori"].'');
												$kategori=mysqli_fetch_assoc($a);
												echo $kategori["nama"];?>
												</span></a>
												<a href="<?php echo $domain;?>panel/laporan/detail/<?php echo $row["id"]; ?>" class="site-button button-sm float-right">INFORMASI</a>
											</div>
											<div class="posted-info clearfix">
												<p class="m-tb0 text-primary float-left"><span class="text-black m-r10">Dibuat:</span><?php echo waktu($row["waktu"]);?></p>
												<a href="<?php echo $domain;?>panel/laporan/status/<?php echo $row["id"]; ?>?status=4" class="btn-danger button-sm float-right">Tidak Ada Masalah</a>
												<a href="<?php echo $domain;?>panel/laporan/status/<?php echo $row["id"]; ?>?status=3" class="btn-info button-sm float-right">Survei</a>
												<a href="<?php echo $domain;?>panel/laporan/status/<?php echo $row["id"]; ?>?status=2" class="btn-warning button-sm float-right">Proses</a>
												<a href="<?php echo $domain;?>panel/laporan/status/<?php echo $row["id"]; ?>?status=1" class="btn-success button-sm float-right">Selesai</a>
											</div>
										</div>
									</div>
								</li>
							<?php } ?>
							</ul>
							<div class="pagination-bx m-t30">
							<?php include("include/pagenation.php");?>
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- Browse Jobs END -->
		</div>
    </div>
    <!-- Content END-->
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
