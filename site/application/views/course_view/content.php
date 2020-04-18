<!-- banner start -->
<!-- ================ -->
<div class="banner dark-translucent-bg" style="background-image:url('<?php echo base_url("panel/uploads/courses_view/$course->img_url")?>'); background-position: 50% 21%;">
    <!-- breadcrumb start -->
    <!-- ================ -->
    <div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Courses</li>
            </ol>
        </div>
    </div>
    <!-- breadcrumb end -->
    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-lg-8 text-center pv-20">
                <h2 class="title object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100"><strong><?php echo $course->title;?></strong></h2>
                <div class="separator object-non-visible mt-10" data-animation-effect="fadeIn" data-effect-delay="100"></div>
                <p class="text-center object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100"><?php echo character_limiter(strip_tags($course->description),200);?></p>
                <p class="text-center object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100"><i class="fa fa-calendar"></i> <?php echo getReadableDate($course->event_date);?></p>
            </div>
        </div>
    </div>
</div>
<!-- banner end -->

<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <!-- main-container start -->
                <!-- ================ -->
                <section class="main-container padding-ver-clear">
                    <div class="container pv-40">
                        <div class="row">

                            <!-- main start -->
                            <!-- ================ -->
                            <div class="main col-lg-8">
                                <h1 class="title"><?php echo $course->title;?></h1>
                                <div class="separator-2"></div>
                                <p><?php echo strip_tags($course->description);?></p>
                            </div>
                            <!-- main end -->

                            <!-- sidebar start -->
                            <!-- ================ -->
                            <aside class="col-lg-4 col-xl-3 ml-xl-auto">
                                <div class="sidebar">
                                    <div class="block clearfix">
                                        <h3 class="title">Course Info</h3>
                                        <div class="separator-2"></div>
                                        <ul class="list margin-clear">
                                            <li><strong>Course: </strong> <span class="text-right"><?php echo $course->title;?></span></li>
                                            <li><strong>Course Date: </strong> <span class="text-right"><?php echo getReadableDate($course->event_date);?></span></li>
                                            <li><strong>URL: </strong> <span class="text-right"><a href="<?php echo $course->url;?>"><?php echo $course->url;?></a></span></li>
                                        </ul>
                                        <a href="<?php echo $course->url;?>" class="btn btn-animated btn-default btn-lg">External Link <i class="fa fa-external-link"></i></a>
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
                        <h3 class="mt-3">Related <strong>Courses</strong></h3>
                        <div class="row grid-space-10">
                            <?php foreach ($other_courses as $course) { ?>

                                <div class="col-sm-4">
                                    <div class="image-box style-2 mb-20 bordered light-gray-bg">
                                        <div class="overlay-container overlay-visible">

                                            <img src="<?php echo base_url("panel/uploads/courses_view/$course->img_url");?>" alt="">
                                            <div class="overlay-bottom text-left">
                                                <p class="lead margin-clear"><?php echo $course->title;?></p>
                                            </div>
                                        </div>
                                        <div class="body">
                                             <p><?php echo character_limiter(strip_tags($course->description),25); ?></p>
                                            <a href="<?php echo base_url("course-detail/$course->url");?>" class="btn btn-default btn-sm btn-hvr hvr-sweep-to-right margin-clear">Read More<i class="fa fa-arrow-right pl-10"></i></a>
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