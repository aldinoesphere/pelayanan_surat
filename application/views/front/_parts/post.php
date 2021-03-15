<!-- Blog Section -->
<div id="blog">
    <div class="container">
        <div class="row">
            <div class="section-title text-center">
                <h2>Berita Terbaru</h2>
                <hr>
            </div>
        </div>
        <?php foreach ($posts as $post) : ?>
            <?php 
                $image = 'uploads/images/posts/' . $post->post_thumb;
                $thumb = $this->internal->thumb($image, 500, 334);
            ?>
        <div class="row">
            <div class="col-xs-12 col-md-6 ">
                <div class="about-img"><img src="data:image/png;base64,<?=$thumb?>" class="img-responsive" alt=""></div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="about-text">
                    <h2><a href="<?=base_url('single/post/' . $post->slug)?>"><?=$post->post_title?></a></h2>
                    <p><i class="fa fa-calendar"></i> <?=date('d M Y H:i:s', strtotime($post->post_date))?></p>
                    <hr>
                    <?=substr($post->post_content, 0,250)?>
                </div>
            </div>
        </div>
        <div class="cleaner"></div>
        <?php endforeach; ?>
        <div class="row">
            <?php 
                echo $this->pagination->create_links();
            ?>
        </div>
    </div>
</div>