<div class="modal fade lead-form-modal" id="car-details" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body row m-a0 clearfix">
                <div class="col-lg-6 col-md-6 overlay-primary-dark d-flex p-a0" style="background-image:url(images/background/bg3.jpg);  background-position:center; background-size:cover;">
                    <div class="form-info text-white align-self-center">
                        <h3 class="m-b15">Masuk Sekarang</h3>
                        <p class="m-b15">Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 p-a0">
                    <div class="lead-form browse-job text-left">
                        <form action="<?php echo $domain; ?>akun/masuk" method="POST">
                            <h3 class="m-t0">SELAMAT DATANG</h3>
                            <div class="form-group">
                                <input type="email" name="surel" class="form-control" placeholder="surel@domain.com" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="sandi" class="form-control" placeholder="*******" required>
                            </div>
                            <div class="clearfix">
                                <button class="btn-primary site-button btn-block">Masuk </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="site-footer"> 
    <!-- footer bottom part -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <span> <?php echo date("Y");?> © Copyright by <i class="fa fa-heart m-lr5 text-red heart"></i>
                        <a href="<?php echo $domain;?>"><b>Qlap</b> </a> All rights reserved.</span>
                </div>
            </div>
        </div>
    </div>
</footer>