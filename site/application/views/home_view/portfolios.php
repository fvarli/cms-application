<!-- section start -->
<!-- ================ -->
<section class="clearfix pv-40">
    <div class="container">
        <div class="row justify-content-lg-center">

            <h3 class="mt-4">Latest <strong>Portfolios</strong></h3>
            <div class="separator-2"></div>
            <div class="row grid-space-10">
                <?php foreach ($portfolios as $portfolio) { ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="image-box style-2 mb-20 bordered text-center">
                            <div id="carousel-portfolio" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <div class="overlay-container">
                                            <img src="<?php echo get_picture_to_size("portfolios_view", get_portfolio_cover_image($portfolio->id), "276x171");?>"
                                                 alt="<?php echo $portfolio->title;?>">
                                            <div class="overlay-to-top">
                                                <p class="small margin-clear"><?php echo $portfolio->title;?></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="body shadow light-gray-bg ">
                                <h3><?php echo $portfolio->title;?></h3>
                                <div class="separator"></div>
                                <p><?php echo character_limiter(strip_tags($portfolio->description), 150);?></p>
                                <a href="<?php echo base_url("portfolio-detail/$portfolio->portfolio_url");?>" class="btn btn-default btn-sm btn-hvr hvr-shutter-out-horizontal margin-clear">Read More<i class="fa fa-arrow-right pl-10"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- section end -->