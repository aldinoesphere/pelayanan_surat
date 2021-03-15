<!-- Header -->
<header id="header">
    <div class="swiper-container header">
        <div class="swiper-wrapper">
            <?php foreach ($banners as $banner) : ?>
            <div class="swiper-slide" style="background-image:url(<?= base_url() . 'uploads/images/banner/' . $banner->link_banner?>)"></div>
            <?php endforeach; ?>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>
</header>