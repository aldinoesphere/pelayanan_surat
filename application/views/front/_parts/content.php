<!-- Blog Section -->
<div id="blog">
    <div class="container">
        <div class="row">
            <div class="section-title text-center">
                <h2>Berita Terbaru</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <?php foreach ($artikels as $artikel) : ?>
                <div class="row">
                    <div class="col-sm-12 post-content">
                        <div class="col-sm-6">
                            <h3 class="post-title"><?php echo strtoupper($artikel->judul); ?></h3>
                            <p class="publish-info">
                                <i class="fa fa-user"></i> Administrator <i class="fa fa-clock-o"></i> 30 Maret 2019 17:00:00
                            </p>
                            <p><?php echo get_snippet($artikel->konten, 0, 120); ?></p>
                            <a href="<?php echo base_url('artikel/single/'.$artikel->alias); ?>" class="btn btn-show-more">Baca selengkapnya</a>
                        </div>
                        <div class="col-sm-6">
                            <div class="image-container">
                                <div class="image-wrap">
                                    <img src="<?php echo base_url('uploads/images/post/thumbnail/'.$artikel->post_thumbnail); ?>">  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="post-pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">CARI ARTIKEL</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control">
                                <div class="input-group-addon">
                                    <i class="fa fa-search primary"></i>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kategori</h3>
                    </div>
                    <div class="box-body">
                        <?php echo get_list_category(); ?>
                    </div>
                </div>
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">STATISTIK</h3>
                    </div>
                    <div class="box-body">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                    </div>
                </div>
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">SOSIAL MEDIA</h3>
                    </div>
                    <div class="box-body">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                    </div>
                </div>
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">PETA KANTOR DESA</h3>
                    </div>
                    <div class="box-body">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sejarah Section -->
<div id="sejarah">
    <div class="section-title text-center center">
        <div class="overlay">
            <h2>Profil</h2>
            <hr>
            <p>Pembentukan desa & Profil Lembaga Desa</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="menu-section">
                    <h2 class="menu-section-title">Profil Pembentukan Desa</h2>
                    <hr>
                    <div class="menu-item">
                        <?php echo ambil_pengaturan('profil_desa'); ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="menu-section">
                    <h2 class="menu-section-title">Profil Lembaga Desa</h2>
                    <hr>
                    <div class="menu-item">
                        <?php echo ambil_pengaturan('profil_lembaga'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Gallery Section -->
<div id="gallery">
    <div class="section-title text-center center">
        <div class="overlay">
            <h2>Gallery</h2>
            <hr>
            <p>Gallery desa jatisawit lor - Indramayu</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="categories">
                <ul class="cat">
                    <li>
                        <ol class="type">
                            <li><a href="#" data-filter="*" class="active">All</a></li>
                            <li><a href="#" data-filter=".foto">Foto</a></li>
                            <li><a href="#" data-filter=".video">Video</a></li>
                        </ol>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="row">
            <div class="portfolio-items">
                <?php 
                    foreach ($galleries as $gallery) :
                    $image = get_link_foto($gallery->cover_album);
                ?>
                <div class="col-sm-6 col-md-4 col-lg-4 <?php if ($gallery->kategori == 0 ) { echo 'foto'; }else{ echo 'video' ; } ?>">
                    <div class="portfolio-item">
                        <div class="hover-bg"> <a href="<?php base_url('single/gallery/' . $gallery->id); ?>" title="<?php echo $gallery->judul; ?>">
                            <div class="hover-text">
                                <h4><?php echo $gallery->judul; ?></h4>
                            </div>
                            <img src="<?php echo base_url($image); ?>" class="img-responsive" alt="Project Title"> </a> 
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- Team Section -->
<div id="pegawai" class="text-center">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 section-title">
                    <h2>PROFIL PAMONG DESA</h2>
                    <hr>
                    <p>Daftar pegawai desa jatisawit lor :</p>
                </div>
            </div>
            <div id="row">
                <div class="swiper-container pegawai">
                    <div class="swiper-wrapper">
                        <?php
                            foreach ($semua_pegawai as $pegawai) :
                                if ($pegawai->link_photo) {
                                    $link_photo = base_url('uploads/images/pegawai/thumbnail/'.$pegawai->link_photo);
                                } else {
                                    $link_photo = base_url('assets/dist/img/avatar.png');
                                }
                        ?>
                            <div class="swiper-slide" style="background-image:url(<?php echo $link_photo ?>)"></div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Call Reservation Section -->
<!-- <div id="call-reservation" class="text-center">
    <div class="container">
        <h2>Want to make a reservation? Call <strong>1-887-654-3210</strong></h2>
    </div>
</div> -->
<!-- Contact Section -->
<div id="contact" class="text-center">
    <div class="container">
        <div class="section-title text-center">
            <h2>Pengaduan</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <form name="sentMessage" id="contactForm" novalidate>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" id="name" class="form-control" placeholder="Name" required="required">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="email" id="email" class="form-control" placeholder="Email" required="required">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
                <p class="help-block text-danger"></p>
            </div>
            <div id="success"></div>
            <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
            </form>
        </div>
    </div>
</div>