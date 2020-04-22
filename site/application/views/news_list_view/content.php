<!-- main-container start -->
<!-- ================ -->
<section class="main-container">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-12">

                <!-- page-title start -->
                <!-- ================ -->
                <h1 class="page-title">News List</h1>
                <div class="separator-2"></div>
                <!-- page-title end -->

                <!-- timeline grid start -->
                <!-- ================ -->
                <div class="timeline clearfix">

                    <?php $counter = 0; ?>
                    <?php foreach ($news as $new) {?>
                    <!-- timeline grid item start -->
                    <div class="timeline-item <?php echo (($counter++ % 2) == 0 ) ? "pull-left" : "pull-right"; ?>">
                        <!-- blogpost start -->
                        <article

                            class="blogpost shadow-2 light-gray-bg bordered <?php echo ($new->news_type == "video") ? "object-non-visible" : "";?>"
                            <?php echo ($new->news_type == "video") ? 'data-animation-effect="fadeInUpSmall" data-effect-delay="100"' : "";?>

                        >

                            <?php if($new->news_type == "image") { ?>
                            <div class="overlay-container">
                                <img src="<?php echo base_url("panel/uploads/news_view/$new->img_url");?>" alt="">
                                <a class="overlay-link" href="<?php echo base_url("new/$new->url");?>"><i class="fa fa-link"></i></a>
                            </div>

                            <?php } else { ?>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/<?php echo $new->video_url; ?>"></iframe>
                                </div>


                            <?php } ?>

                            <header>
                                <h2><a href="<?php echo base_url("new/$new->url");?>"><?php echo $new->title;?></a></h2>
                                <div class="post-info">
                        <span class="post-date">
                          <i class="icon-calendar"></i>
                          <span class="month"><?php echo $new->createdAt;?></span>
                        </span>
                                    <span class="comments"><i class="icon-eye"></i> <a href="#"><?php echo $new->view_count; ?> Views</a></span>
                                    <span class="submitted"><i class="icon-user-1"></i> by <a href="#">John Doe</a></span>

                                </div>
                            </header>
                            <div class="blogpost-content">
                                <p>Mauris dolor sapien, malesuada at interdum ut, hendrerit eget lorem. Nunc interdum mi neque, et  sollicitudin purus fermentum ut. Suspendisse faucibus nibh odio, a vehicula eros pharetra in. Maecenas  ullamcorper commodo rutrum. In iaculis lectus vel augue eleifend dignissim. Aenean viverra semper sollicitudin.</p>
                            </div>
                            <footer class="clearfix">
                                <div class="tags pull-left"><i class="icon-tags"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>
                                <div class="link pull-right"><i class="icon-link"></i><a href="<?php echo base_url("new/$new->url");?>">Read More</a></div>
                            </footer>
                        </article>
                        <!-- blogpost end -->
                    </div>
                    <!-- timeline grid item end -->
                    <?php } ?>



                </div>
                <!-- timeline grid end -->

            </div>
            <!-- main end -->

        </div>
    </div>
</section>
<!-- main-container end -->