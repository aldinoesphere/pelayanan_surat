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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                            <h3 class="post-title">Lorem ipsum</h3>
                            <p class="publish-info">
                                <i class="fa fa-user"></i> Administrator <i class="fa fa-clock-o"></i> 30 Maret 2019 17:00:00
                            </p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <a href="#" class="btn btn-show-more">Show More</a>
                        </div>
                        <div class="col-sm-6">
                            <img src="assets/dist/img/photo2.png" class="image-thumbnail">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                            <h3 class="post-title">Lorem ipsum</h3>
                            <p class="publish-info">
                                <i class="fa fa-user"></i> Administrator <i class="fa fa-clock-o"></i> 30 Maret 2019 17:00:00
                            </p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <a href="#" class="btn btn-show-more">Show More</a>
                        </div>
                        <div class="col-sm-6">
                            <img src="assets/dist/img/photo2.png" class="image-thumbnail">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                            <h3 class="post-title">Lorem ipsum</h3>
                            <p class="publish-info">
                                <i class="fa fa-user"></i> Administrator <i class="fa fa-clock-o"></i> 30 Maret 2019 17:00:00
                            </p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <a href="#" class="btn btn-show-more">Show More</a>
                        </div>
                        <div class="col-sm-6">
                            <img src="assets/dist/img/photo2.png" class="image-thumbnail">
                        </div>
                    </div>
                </div>
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
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
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
                            <li><a href="#" data-filter=".ontheroad">On the road</a></li>
                            <li><a href="#" data-filter=".event">Events</a></li>
                            <li><a href="#" data-filter=".socialisation">Socialisation</a></li>
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
                    $image = 'uploads/images/albums/' . $gallery->link_cover;
                    $albums = $this->internal->thumb($image, 500, 333);
                ?>
                <div class="col-sm-6 col-md-4 col-lg-4 <?=$gallery->category?>">
                    <div class="portfolio-item">
                        <div class="hover-bg"> <a href="<?=base_url('single/gallery/' . $gallery->ID)?>" title="<?=$gallery->title?>">
                            <div class="hover-text">
                                <h4><?=$gallery->title?></h4>
                            </div>
                            <img src="data:image/png;base64,<?=$albums?>" class="img-responsive" alt="Project Title"> </a> 
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- Team Section -->
<div id="anggota" class="text-center">
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
                <div class="swiper-container anggota">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="background-image:url(assets/dist/img/avatar.png)"></div>
                        <div class="swiper-slide" style="background-image:url(assets/dist/img/avatar.png)"></div>
                        <div class="swiper-slide" style="background-image:url(assets/dist/img/avatar.png)"></div>
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