<!DOCTYPE html>
<html lang="en">
<?php include("include/head.php");?>
<body id="bg">
    <div class="page-wraper">
        <div id="loading-area"></div>
        <?php include("include/header.php");?>
        <div class="page-content bg-white">
            <div class="content-block">
                <div class="section-full bg-white p-t50 p-b20">
                    <div class="container">
                        <div class="job-bx submit-resume" id="create-user">
                            <div class="job-bx-title clearfix">

                            </div>
                            <form id="regForm" action="<?php echo $domain;?>lapor/tambah" method="POST" enctype='multipart/form-data'>
                                <div class="job-bx-title clearfix">
                                    <div class="tab">
                                        <h5>Pilih Kategori</h5>
                                        <div class="paymentWrap">
                                            <div class="paymentBtnGroup" data-toggle="buttons">
                                                <div class="row">
                                                <?php while($row=mysqli_fetch_array($result)){ ?>
                                                <label class="col-md-2 btn paymentMethod validasi">
                                                    <div class="method" style="background-image: url('<?php echo $domain;?>upload/kategori/<?php echo $row["logo"];?>');"></div>
                                                    <input type="radio" value="<?php echo $row["id"];?>" id="kategori" name="kategori" required>
                                                </label>
                                                <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab">
                                        <h5>Isi Keterangan</h5>
                                            <div class="form-group">
												<h6 for="judul" style="text-align:left;">Judul:</h6>
												<input type="text" id="judul" name="judul" class="form-control" placeholder="Judul Laporan">
                                            </div>
                                            <div class="form-group">
												<h6 for="keterangan" style="text-align:left;">Keterangan:</h6>
												<textarea id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan Laporan"></textarea>
											</div>
                                    </div>
                                    <div class="tab">
                                        <h5>Gambar</h5>
                                            <div class="form-group">
												<h6 for="foto" style="text-align:left;">Foto:</h6>
                                                <div class="custom-file">
													<p class="m-a0">
														<i class="fa fa-upload"></i>
														Upload File
													</p>
													<input type="file" id="foto" name="foto[]" multiple class="form-control" id="customFile">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="tab">
                                        <h5>Pilih Lokasi</h5>
                                        <br>
                                        <div class="gllpLatlonPicker">
                                            <div class="form-group">
                                                <div class="row" style="margin-left: 0px; margin-right: 0px;">
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control gllpSearchField" placeholder="Alamat Yang Anda Cari">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="button" class="site-button gllpSearchButton" value="Cari">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="button" class="btn-info myLocation" value="Lokasi Sekarang">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="gllpMap">Google Maps</div><br>
                                            <div class="form-group">
												<h6 for="judul" style="text-align:left;">Alamat:</h6>
												<input type="text" id="maps_alamat" name="maps_alamat" class="form-control gllpLocationName" placeholder="Alamat">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 form-group">
                                                    <h6 for="judul" style="text-align:left;">Latitude:</h6>
                                                    <input type="text" id="maps_lat" name="maps_lat" class="form-control gllpLatitude" placeholder="Latitude">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <h6 for="judul" style="text-align:left;">Longitude:</h6>
                                                    <input type="text" id="maps_lng" name="maps_lng" class="form-control gllpLongitude" placeholder="Longitude">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <h6 for="judul" style="text-align:left;">Zoom:</h6>
                                                    <input type="text" id="maps_zoom" name="maps_zoom" class="form-control gllpZoom" placeholder="Zoom">
                                                </div>
                                            </div>
                                            <input type="hidden" class="gllpElevation" size=12/>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-bottom:0px">
                                    <div style="overflow:auto;">
                                        <div>
                                            <button type="button" class="btn site-button float-left" id="prevBtn" onclick="nextPrev(-1)">Sebelumnya</button>
                                            <button type="button" class="btn site-button float-right" id="nextBtn" onclick="nextPrev(1)">Selanjutnya</button>
                                            <button type="submit" class="btn site-button float-right" id="laporBtn">Laporkan</button>
                                        </div>
                                    </div>
                                    <div style="text-align:center;margin-top:40px;">
                                        <span class="step"></span>
                                        <span class="step"></span>
                                        <span class="step"></span>
                                        <span class="step"></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("include/footer.php");?>
        <button class="scroltop fa fa-chevron-up"></button>
    </div>
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
                document.getElementById("nextBtn").style.display = "inline";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
                document.getElementById("nextBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").style.display = "none";
                document.getElementById("laporBtn").style.display = "inline";
            } else {
                document.getElementById("nextBtn").innerHTML = "Selanjutnya";
                document.getElementById("laporBtn").style.display = "none";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
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

</html>