<header class="site-header mo-left header fullwidth">
		<!-- main header -->
        <div class="sticky-header main-bar-wraper navbar-expand-lg">
            <div class="main-bar clearfix">
                <div class="container clearfix">
                    <div class="logo-header mostion">
						<a href="<?php echo $domain; ?>" cyine-ajax><img src="<?php echo $domain; ?>assets/images/Qlap.png" class="logo" alt=""></a>
					</div>
                    <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
                    <div class="extra-nav">
                        <div class="extra-cell">
							<?php if(empty($_SESSION["status"])){ ?>
                            <a href="<?php echo $domain; ?>akun/daftar" class="site-button" cyine-ajax><i class="fa fa-user"></i> Daftar</a>
							<a href="#" title="READ MORE" rel="bookmark" data-toggle="modal" data-target="#car-details" class="site-button"><i class="fa fa-lock"></i> Masuk</a>
							<?php }else{?>
							<a href="<?php echo $domain; ?>lapor" class="site-button" cyine-ajax><i class="fa fa-user"></i> LAPOR</a>
							<a href="<?php echo $domain; ?>panel" class="site-button" cyine-ajax><i class="fa fa-user"></i> DASHBOARD</a>
							<?php }?>
						</div>
                    </div>
                    <div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
                        <ul class="nav navbar-nav">
							<li>
								<a href="<?php echo $domain; ?>" cyine-ajax>Beranda</a>
							</li>
							<li>
								<a href="<?php echo $domain; ?>kategori" cyine-ajax>Kategori</a>
							</li>
							<li>
								<a href="<?php echo $domain; ?>kecamatan" cyine-ajax>Kecamatan</a>
							</li>
							<li>
								<a href="<?php echo $domain; ?>" cyine-ajax>Tentang</a>
							</li>
						</ul>			
                    </div>
                </div>
            </div>
        </div>
    </header>