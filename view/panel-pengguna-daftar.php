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
			<div class="section-full bg-white p-t50 p-b20">
				<div class="container">
					<div class="row">
                        <?php include("include/sidebar.php");?>
						<div class="col-xl-9 col-lg-8 m-b30">
							<div class="job-bx clearfix">
								<div class="job-bx-title clearfix">
									<h5 class="font-weight-700 pull-left text-uppercase">Manage jobs</h5>
									<div class="float-right">
										<a class="site-button btn" href="<?php echo $domain; ?>panel/pengguna/tambah" cyine-ajax>Tambah</a>
                                    </div>
								</div>
								<table class="table-job-bx cv-manager company-manage-job">
									<thead>
										<tr>
											<th class="feature">No</th>
											<th>Informasi</th>
											<th>Level</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
                                            $no=1;
                                            while($row=mysqli_fetch_array($result)){ ?>
										<tr>
											<td class="feature">
											<?php echo $no;?>
											</td>
											<td class="job-name">
												<a href="javascript:void(0);"><?php echo $row["nama"];?></a>
												<ul class="job-post-info">
													<li><i class="fa fa-map-marker"></i> <?php echo $row["surel"];?></li>
													<li><i class="fa fa-bookmark-o"></i> <?php if($row["jekel"]==null){ echo"Belum Diisi"; }else{echo$row["jekel"];};?></li>
													<li><i class="fa fa-filter"></i> <?php if($row["lahir"]==null){ echo"Belum Diisi"; }else{echo$row["lahir"];};?></li>
												</ul>
											</td>
											<td class="application text-primary"><?php if($row["lv"]==1){ echo"Admin"; }elseif($row["lv"]==2){echo"Staf";}else{echo"Masyarakat";};?></td>
											<td class="expired <?php if($row["status"]==0){ echo"text-danger"; }else{echo"success";};?>"><?php if($row["status"]==0){ echo"Belum Aktif"; }else{echo"Aktif";};?> </td>
											<td class="job-links">
												<a href="<?php echo $domain; ?>panel/pengguna/ubah/<?php echo $row["id"]; ?>" cyine-ajax><i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo $domain; ?>panel/pengguna/hapus/<?php echo $row["id"]; ?>" cyine-ajax><i class="ti-trash"></i></a>
                                            </td>
										</tr>
											<?php $no++; } ?>
									</tbody>
								</table>
								<div class="pagination-bx m-t30 float-right">
                                    <?php include("include/pagenation.php");?>
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
</body>
</html>
