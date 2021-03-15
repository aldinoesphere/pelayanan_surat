<!-- Blog Section -->
<div id="blog">
    <div class="container">
        <div class="row">
            <div class="section-title text-center">
                <h2><?php echo strtoupper($slug); ?></h2>
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