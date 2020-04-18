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
                <h1 class="page-title">BRAND LIST - LARGE IMAGES</h1>
                <div class="separator-2"></div>
                <!-- page-title end -->
                <p class="lead">You can see one of our refenreces for you below.</p>

                <div class="row">
                    <?php foreach ($brands as $brand) {?>
                    <div class="col-sm-4">
                        <div class="image-box shadow text-center mb-20">
                            <div class="overlay-container">
                                <img src="<?php echo base_url("panel/uploads/references_view/$brand->img_url");?>" alt="">
                                <div class="overlay-top">
                                </div>
                                <div class="overlay-bottom">
                                    <div class="text">
                                        <h3><?php echo $brand->title;?></h3>
                                       <!--
                                        <a href="portfolio-item.html" class="btn btn-gray-transparent btn-animated btn-sm">View Details <i class="pl-10 fa fa-arrow-right"></i></a>
                                       -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php } ?>

            </div>
            <!-- main end -->

        </div>
    </div>
</section>
<!-- main-container end -->