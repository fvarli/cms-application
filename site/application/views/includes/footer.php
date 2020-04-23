<?php $settings = get_settings();?>
<?php $recent_news_list= get_news_footer();?>
<?php //$get_portfolios = get_portfolio_cover_image();?>

<!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
<!-- ================ -->
<footer id="footer" class="clearfix dark">

    <!-- .footer start -->
    <!-- ================ -->
    <div class="footer">
        <div class="container">
            <div class="footer-inner">
                <!-- TODO update the section -->
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer-content">
                            <div class="logo-footer"><img id="logo-footer" src="<?php echo base_url("assets/images");?>/logo_purple.png" alt=""></div>
                            <p><?php echo character_limiter(strip_tags($settings->about_us),150)?>  <a href="<?php echo base_url("about-us");?>">Learn More<i class="fa fa-long-arrow-right pl-1"></i></a></p>
                            <div class="separator-2"></div>
                            <nav>
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="nav-link" target="_blank" href="<?php echo base_url("contact");?>">CONTACT</a></li>
                                    <li class="nav-item"><a class="nav-link" target="_blank" href="<?php echo base_url("services");?>">SERVICES</a></li>
                                    <li class="nav-item"><a class="nav-link" target="_blank" href="<?php echo base_url("references");?>">REFERENCES</a></li>
                                    <li class="nav-item"><a class="nav-link" target="_blank" href="<?php echo base_url("about-us");?>">About</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-content">
                            <h2 class="title">Latest From Blog</h2>
                            <div class="separator-2"></div>

                            <?php foreach ($recent_news_list as $recent_news) { ?>
                                <div class="media margin-clear">
                                    <div class="d-flex pr-2">
                                        <?php if ($recent_news->news_type == "image") {?>
                                            <div class="overlay-container">
                                                <img class="media-object" src="<?php echo base_url("panel/uploads/news_view/$recent_news->img_url");?>" alt="<?php echo $recent_news->url;?>">
                                                <a href="<?php echo base_url("new/$recent_news->url");?>" class="overlay-link small"><i class="fa fa-link"></i></a>
                                            </div>

                                        <?php } else {?>
                                            <div>
                                                <iframe style="width: 50px; height: 50px" src="//www.youtube.com/embed/<?php echo $recent_news->video_url; ?>"></iframe>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading"><a href="<?php echo base_url("new/$recent_news->url");?>"><?php echo $recent_news->title;?></a></h6>
                                        <p class="small margin-clear"><i class="fa fa-calendar pr-10"></i><?php  echo getReadableDate($recent_news->createdAt);?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="text-right space-top">
                                <a href="<?php echo base_url("news");?>" class="link-dark"><i class="fa fa-plus-circle pl-1 pr-1"></i>More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-content">
                            <h2 class="title">Portfolio Gallery</h2>
                            <div class="separator-2"></div>
                            <div class="row grid-space-10">

                                <?php //foreach ($get_portfolios as $portfolios) { ?>
                                    <div class="col-4 col-lg-6">
                                        <div class="overlay-container mb-10">
                                            <img src="<?php echo base_url("assets/images");?>/gallery-1.jpg" alt="">
                                            <a href="portfolio-item.html" class="overlay-link small">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        </div>
                                    </div>
                                <?php //} ?>

                            </div>
                            <div class="text-right space-top">
                                <a href="<?php echo base_url("portfolios");?>" class="link-dark"><i class="fa fa-plus-circle pl-1 pr-1"></i>More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-content">
                            <h2 class="title">Contant Us</h2>
                            <div class="separator-2"></div>
                            <p><?php echo $settings->slogan;?></p>
                            <ul class="social-links circle animated-effect-1">

                                <?php if($settings->facebook) { ?>
                                    <li class="facebook"><a target="_blank" href="http://www.facebook.com/<?php echo $settings->facebook;?>"><i class="fa fa-facebook"></i></a></li>
                                <?php } ?>

                                <?php if($settings->twitter) { ?>
                                    <li class="twitter"><a target="_blank" href="http://www.twitter.com/<?php echo $settings->twitter;?>"><i class="fa fa-twitter"></i></a></li>
                                <?php } ?>

                                <?php if($settings->instagram) { ?>
                                    <li class="instagram"><a target="_blank" href="http://www.instagram.com/<?php echo $settings->instagram;?>"><i class="fa fa-instagram"></i></a></li>
                                <?php } ?>

                                <?php if($settings->linkedin) { ?>
                                    <li class="linkedin"><a target="_blank" href="http://www.linkedin.com/<?php echo $settings->linkedin;?>"><i class="fa fa-linkedin"></i></a></li>
                                <?php } ?>

                            </ul>
                            <div class="separator-2"></div>
                            <ul class="list-icons">
                                <li><i class="fa fa-map-marker pr-2 text-default"></i> <?php echo $settings->address;?></li>
                                <li><i class="fa fa-phone pr-2 text-default"></i> <?php echo $settings->phone_1;?></li>
                                <li><a href="mailto:<?php echo $settings->email;?>"><i class="fa fa-envelope-o pr-2"></i> <?php echo $settings->email;?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .footer end -->

    <!-- .subfooter start -->
    <!-- ================ -->
    <div class="subfooter">
        <div class="container">
            <div class="subfooter-inner">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">Copyright © <?php echo date("Y") . " " . $settings->company_name;?> by <a target="_blank" href="https://ferzendervarli.com">Ferzender Varli</a>. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .subfooter end -->

</footer>
<!-- footer end -->