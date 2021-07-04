<div id="footer">
  <div class="container text-center">
    <div class="col-md-4">
      <h3>Alamat</h3>
      <div class="contact-item">
        <?php echo ambil_pengaturan('alamat'); ?>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Jam Pelayanan Masyarakat</h3>
      <div class="contact-item">
        <p>Senin - Jum'at</p>
        <p>Pukul: 08:00 Wib - Selesai</p>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Contact Info</h3>
      <div class="contact-item">
        <p>Phone: <?php echo ambil_pengaturan('no_tlp'); ?></p>
        <p>Email: <?php echo ambil_pengaturan('email_admin'); ?></p>
      </div>
    </div>
  </div>
  <div class="container-fluid text-center copyrights">
    <div class="col-md-8 col-md-offset-2">
      <div class="social">
        <ul>
          <li><a href="<?php echo ambil_pengaturan('facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <li><a href="<?php echo ambil_pengaturan('twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
          <li><a href="<?php echo ambil_pengaturan('instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
        </ul>
      </div>
      <p>&copy; <?php echo ambil_pengaturan('nama_website'); ?></p>
    </div>
  </div>
</div>
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/dist/js/SmoothScroll.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/dist/js/nivo-lightbox.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/dist/js/jquery.isotope.js'); ?>"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/dist/js/jqBootstrapValidation.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/dist/js/contact_me.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/dist/js/main.js'); ?>"></script>
</body>
</html>