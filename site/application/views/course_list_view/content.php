<!-- main-container start -->
<!-- ================ -->
<section class="main-container">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-12">

                <br>
                <br>

                <!-- page-title start -->
                <!-- ================ -->
                <h1 class="page-title">COURSE LIST - LARGE IMAGES</h1>
                <div class="separator-2"></div>
                <!-- page-title end -->
                <p class="lead">You can see one of our courses for you below.</p>

                <?php foreach ($courses as $course) {?>
                <div class="image-box style-3-b">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="overlay-container">

                                <img src="<?php echo base_url("panel/uploads/courses_view/$course->img_url");?>" alt="<?php echo $course->title;?>">
                                <div class="overlay-to-top">
                                    <p class="small margin-clear"><em><?php echo $course->title;?></em></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-8 col-xl-9">
                            <div class="body">
                                <h3 class="title"><a href="portfolio-item.html"><?php echo $course->title;?></a></h3>
                                <p class="small mb-10"><i class="icon-calendar"></i><?php echo getReadableDate($course->event_date); // TODO check date format
                                    // ((!empty($portfolio->finishedAt) && $portfolio->finishedAt != "0000-00-00 00:00:00" && $portfolio->finishedAt != "1970-01-01 00:00:00")? date("d/m/Y",strtotime($portfolio->finishedAt)):"");?>
                                <div class="separator-2"></div>
                                <p class="mb-10"><?php echo strip_tags($course->description);?></p>
                                <a href="<?php echo base_url("portfolio-detail/$course->url");?>" class="btn btn-default btn-hvr hvr-shutter-out-horizontal margin-clear">Read More<i class="fa fa-arrow-right pl-10"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <!-- pagination start -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <i aria-hidden="true" class="fa fa-angle-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <i aria-hidden="true" class="fa fa-angle-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- pagination end -->

            </div>
            <!-- main end -->

        </div>
    </div>
</section>
<!-- main-container end -->