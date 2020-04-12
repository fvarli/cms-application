<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- banner start -->
                <!-- ================ -->
                <div class="pv-40 banner light-gray-bg">
                    <div class="container clearfix">

                        <!-- slideshow start -->
                        <!-- ================ -->
                        <div class="slideshow">

                            <!-- slider revolution start -->
                            <!-- ================ -->
                            <div class="slider-revolution-5-container">
                                <div id="slider-banner-boxedwidth" class="slider-banner-boxedwidth rev_slider" data-version="5.0">
                                    <ul class="slides">

                                        <?php foreach ($portfolio_images as $image) {?>
                                            <!-- slide 1 start -->
                                            <!-- ================ -->
                                            <li class="text-center" data-transition="slidehorizontal" data-slotamount="default" data-masterspeed="default" data-title="<?php echo $portfolio->title;?>">

                                            <!-- main image -->
                                            <img src="<?php echo base_url("panel/uploads/portfolios_view/$image->img_url");?>" alt="<?php echo $portfolio->title;?>" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover" class="rev-slidebg">

                                            <!-- Transparent Background -->
                                            <div class="tp-caption dark-translucent-bg"
                                                 data-x="center"
                                                 data-y="center"
                                                 data-start="0"
                                                 data-transform_idle="o:1;"
                                                 data-transform_in="o:0;s:600;e:Power2.easeInOut;"
                                                 data-transform_out="o:0;s:600;"
                                                 data-width="5000"
                                                 data-height="450">
                                            </div>

                                            <!-- LAYER NR. 1 -->
                                            <div class="tp-caption large_white"
                                                 data-x="center"
                                                 data-y="110"
                                                 data-start="1000"
                                                 data-width="650"
                                                 data-transform_idle="o:1;"
                                                 data-transform_in="y:[100%];sX:1;sY:1;s:1150;e:Power4.easeInOut;"
                                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;"
                                                 data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
                                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;">Project Image 1
                                            </div>

                                            <!-- LAYER NR. 2 -->
                                            <div class="tp-caption large_white tp-resizeme hidden-xs"
                                                 data-x="center"
                                                 data-y="155"
                                                 data-start="1300"
                                                 data-width="500"
                                                 data-transform_idle="o:1;"
                                                 data-transform_in="o:0;s:2000;e:Power4.easeInOut;">
                                                <div class="separator light"></div>
                                            </div>

                                            <!-- LAYER NR. 3 -->
                                            <div class="tp-caption medium_white hidden-xs"
                                                 data-x="center"
                                                 data-y="190"
                                                 data-start="1300"
                                                 data-width="650"
                                                 data-transform_idle="o:1;"
                                                 data-transform_in="y:[100%];sX:1;sY:1;s:800;e:Power4.easeInOut;"
                                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;"
                                                 data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Nesciunt, maiores, aliquid. Repellat eum numquam <br> culpa offici, tenetur fugiat dolorum sapiente...
                                            </div>

                                        </li>
                                        <!-- slide 1 end -->
                                        <?php } ?>

                                    </ul>
                                    <div class="tp-bannertimer"></div>
                                </div>
                            </div>
                            <!-- slider revolution end -->

                        </div>
                        <!-- slideshow end -->

                    </div>
                </div>
                <!-- banner end -->

                <!-- main-container start -->
                <!-- ================ -->
                <section class="main-container padding-ver-clear">
                    <div class="container pv-40">
                        <div class="row">

                            <!-- main start -->
                            <!-- ================ -->
                            <div class="main col-lg-8">
                                <h1 class="title"><?php echo $portfolio->title;?></h1>
                                <div class="separator-2"></div>
                                <p><?php echo strip_tags($portfolio->description);?></p>
                            </div>
                            <!-- main end -->

                            <!-- sidebar start -->
                            <!-- ================ -->
                            <aside class="col-lg-4 col-xl-3 ml-xl-auto">
                                <div class="sidebar">
                                    <div class="block clearfix">
                                        <h3 class="title">Portfolio Info</h3>
                                        <div class="separator-2"></div>
                                        <ul class="list margin-clear">
                                            <li><strong>Client: </strong> <span class="text-right"><?php echo $portfolio->client;?></span></li>
                                            <li><strong>Date: </strong> <span class="text-right"><?php echo getReadableDate($portfolio->finishedAt);?></span></li>
                                            <li><strong>In: </strong> <span class="text-right"><?php echo get_portfolio_category_title($portfolio->category_id);?></span></li>
                                            <li><strong>Place: </strong> <span class="text-right"><?php echo $portfolio->place;?></span></li>
                                            <li><strong>URL: </strong> <span class="text-right"><a href="<?php echo $portfolio->portfolio_url;?>"><?php echo $portfolio->portfolio_url;?></a></span></li>
                                        </ul>
                                        <a href="<?php echo $portfolio->portfolio_url;?>" class="btn btn-animated btn-default btn-lg">External Link <i class="fa fa-external-link"></i></a>
                                        <h3 class="mt-4">Share This</h3>
                                        <div class="separator-2"></div>
                                        <ul class="social-links colored circle small">
                                            <li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                                            <li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                                            <li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                                            <li class="xing"><a target="_blank" href="http://www.xing.com"><i class="fa fa-xing"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </aside>
                            <!-- sidebar end -->
                        </div>
                    </div>
                </section>
                <!-- main-container end -->

                <!-- section start -->
                <!-- ================ -->
                <section class="section light-gray-bg pv-40 clearfix">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="call-to-action text-center">
                                    <div class="row justify-content-lg-center">
                                        <div class="col-lg-8">
                                            <h2 class="title">More info About This Project</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus error pariatur deserunt laudantium nam, mollitia quas nihil inventore, quibusdam?</p>
                                            <div class="separator"></div>
                                            <form class="form-inline margin-clear d-flex justify-content-center">
                                                <div class="form-group has-feedback">
                                                    <label class="sr-only" for="subscribe2">Email address</label>
                                                    <input type="email" class="form-control form-control-lg" id="subscribe2" placeholder="Enter email" name="subscribe2" required="">
                                                    <i class="fa fa-envelope form-control-feedback"></i>
                                                </div>
                                                <button type="submit" class="btn btn-lg btn-gray-transparent btn-animated margin-clear ml-3">Submit <i class="fa fa-send"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- section end -->

                <!-- section start -->
                <!-- ================ -->
                <section class="section pv-40 clearfix">
                    <div class="container">
                        <h3 class="mt-3">Related <strong>portfolios</strong></h3>
                        <div class="row grid-space-10">
                            <?php foreach ($other_portfolios as $portfolio) { ?>

                                <div class="col-sm-4">
                                    <div class="image-box style-2 mb-20 bordered light-gray-bg">
                                        <div class="overlay-container overlay-visible">

                                            <?php
                                            $image = get_portfolio_cover_image($portfolio->id);
                                            $image = ($image) ? base_url("panel/uploads/portfolios_view/$image") : base_url("assets/images/portfolio-1.jpg");
                                            ?>
                                            <img src="<?php echo $image;?>" alt="">
                                            <div class="overlay-bottom text-left">
                                                <p class="lead margin-clear"><?php echo $portfolio->title;?></p>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <p class="small mb-10 text-muted"><i class="icon-calendar"></i><?php echo getReadableDate($portfolio->createdAt);?></p>
                                            <p><?php echo character_limiter(strip_tags($portfolio->description),25); ?></p>
                                            <a href="<?php echo base_url("portfolio-detail/$portfolio->url");?>" class="btn btn-default btn-sm btn-hvr hvr-sweep-to-right margin-clear">Read More<i class="fa fa-arrow-right pl-10"></i></a>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                </section>
                <!-- section end -->
            </div>
        </div>
    </div>
</div>