<?php foreach ($posts as $post) : ?>
<div id="single-post">
	<div class="row">
		<div class="section-title text-center center">
	        <div class="overlay">
	            <h2><?php echo $post->judul; ?></h2>
	            <hr>
	        </div>
	    </div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div class="post-thumb">
						<img src="<?php echo base_url('uploads/images/post/original/'.$post->post_thumbnail); ?>">
					</div>
					<div class="cleaner"></div>
					<div class="row">
						<?php echo $post->konten; ?>	
					</div>
					<div class="cleaner"></div>
				</div>
				<div class="col-sm-2"></div>
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
<?php endforeach; ?>