<!DOCTYPE html>
<html lang="en">
<?php include("include/head.php");?>

<body id="bg">
    <div class="page-wraper">
        <?php include("include/header.php");?>
        <div class="page-content bg-white">
            <div class="content-block">
                <div class="section-full bg-white p-t50 p-b20">
                    <div class="container">
                        <div class="row">
                            <?php include("include/sidebar.php");?>
                            <div class="col-xl-9 col-lg-8 m-b30">
                                <div class="job-bx clearfix">
                                    <div class="job-bx-title clearfix">
                                        <h5 class="font-weight-700 pull-left text-uppercase">Kategori</h5>
                                        <div class="float-right">
                                            <a class="site-button btn" href="javascript:void(0);" data-toggle="modal" data-target="#tambah">Tambah</a>
                                        </div>
                                    </div>
                                    <table class="table-job-bx cv-manager company-manage-job">
                                        <thead>
                                            <tr>
                                                <th class="feature">No</th>
                                                <th>Logo</th>
                                                <th>Nama</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=1;
                                            while($row=mysqli_fetch_array($result)){ ?>
                                            <tr>
                                                <td class="feature"><?php echo $no; ?></td>
                                                <td class="logo">
                                                    <img style="border-radius: 100%; width: 50px; height: 50px;" alt="<?php echo $row["nama"]; ?><" src="<?php echo $domain; ?>upload/kategori/<?php echo $row["logo"]; ?>">
                                                </td>
                                                <td class="job-name">
                                                    <a href="javascript:void(0);"><?php echo $row["nama"]; ?></a>
                                                    <ul class="job-post-info">
                                                        <li><i class="fa fa-map-marker"></i> <?php echo $row["keterangan"]; ?></li>
                                                    </ul>
                                                </td>
                                                <td class="job-links">
                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#info-<?php echo $row["id"]; ?>"><i class="fa fa-eye"></i></a>
                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#ubah-<?php echo $row["id"]; ?>"><i class="fa fa-pencil"></i></a>
                                                    <a href="<?php echo $domain; ?>panel/kategori/hapus/<?php echo $row["id"]; ?>" cyine-ajax><i class="ti-trash"></i></a>
                                                </td>
                                            </tr>
                                            <div class="modal fade modal-bx-info" id="info-<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="logo-img">
                                                                <img alt="" src="images/logo/icon2.png">
                                                            </div>
                                                            <h5 class="modal-title"><?php echo $row["nama"]; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><?php echo $row["keterangan"]; ?></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade modal-bx-info editor" id="ubah-<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="EducationModalLongTitle" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="EducationModalLongTitle">Ubah Kategori</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST" action="<?php echo $domain; ?>panel/kategori/ubah/<?php echo $row["id"]; ?>" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-12 col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Nama</label>
                                                                                <input value="<?php echo $row["nama"]; ?>" name="nama" id="nama<?php echo $row["id"]; ?>" type="text" class="form-control" placeholder="Nama Kategori">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Slug</label>
                                                                                <input value="<?php echo $row["slug"]; ?>" name="slug" id="slug<?php echo $row["id"]; ?>" type="text" class="form-control" placeholder="Slug Tanpa Spasi">
                                                                                <span class="text-danger">* Tanpa Spasi</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="baner">Logo</label>
                                                                                <div class="custom-file">
                                                                                    <p class="m-a0">
                                                                                        <i class="fa fa-upload"></i>
                                                                                        Unggah Logo
                                                                                    </p>
                                                                                    <input type="file" id="logo" name="logo" class="site-button form-control" id="logo">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Informasi</label>
                                                                                <textarea name="informasi" id="informasi" cols="5" rows="10" class="form-control"><?php echo $row["keterangan"]; ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="site-button" data-dismiss="modal">Batal</button>
                                                                <button class="site-button">Simpan</button>
                                                            </div>
                                                        </form>
                                                        <script>
                                                            $("#nama<?php echo $row["id"]; ?>").keyup(function(){
                                                                var Text = $(this).val();
                                                                $("#slug<?php echo $row["id"]; ?>").val(ganti(Text));    
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                    <div class="pagination-bx m-t30 float-right">
                                        <?php include("include/pagenation.php");?>
                                    </div>
                                </div>
                                <div class="modal fade modal-bx-info editor" id="tambah" tabindex="-1" role="dialog" aria-labelledby="EducationModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="EducationModalLongTitle">Tambah Kategori</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="<?php echo $domain; ?>panel/kategori/tambah" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label>Nama</label>
                                                                    <input name="nama" id="tambahnama" type="text" class="form-control" placeholder="Nama Kategori" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label>Slug</label>
                                                                    <input name="slug" id="tambahslug" type="text" class="form-control" placeholder="Slug Tanpa Spasi" required>
                                                                    <span class="text-danger">* Tanpa Spasi</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="baner">Logo</label>
                                                                    <div class="custom-file">
                                                                        <p class="m-a0">
                                                                            <i class="fa fa-upload"></i>
                                                                            Unggah Logo
                                                                        </p>
                                                                        <input type="file" id="logo" name="logo" class="site-button form-control" id="logo" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label>Informasi</label>
                                                                    <textarea name="informasi" id="informasi" cols="5" rows="10" class="form-control" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="site-button" data-dismiss="modal">Batal</button>
                                                    <button class="site-button">Simpan</button>
                                                </div>
                                            </form>
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
    <script>
    function ganti(Text){
        return Text
            .toLowerCase()
            .replace(/ /g,'-')
            .replace(/[^\w-]+/g,'')
            ;
    }
    $("#tambahnama").keyup(function(){
        var Text = $(this).val();
        $("#tambahslug").val(ganti(Text));    
    });
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