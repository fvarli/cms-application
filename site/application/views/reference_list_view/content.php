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
                <h1 class="page-title">REFERENCE LIST - LARGE IMAGES</h1>
                <div class="separator-2"></div>
                <!-- page-title end -->
                <p class="lead">You can see one of our refenreces for you below.</p>

                <?php $index =  0; ?>
                <?php foreach ($references as $reference) {?>
                    <div class="image-box style-4 light-gray-bg">
                        <div class="row grid-space-0">
                            <?php if(($index %2) == 0) { ?>
                                <div class="col-lg-6">
                                <div class="overlay-container">
                                    <img src="<?php echo base_url("panel/uploads/references_view/$reference->img_url");?>" alt="<?php echo $reference->title;?>">
                                    <div class="overlay-to-top">
                                        <p class="small margin-clear"><em><?php echo $reference->title;?></em></p>
                                    </div>
                                </div>
                            </div>
                                <div class="col-lg-6">
                                <div class="body">
                                    <div class="pv-30 hidden-lg-down"></div>
                                    <h3><?php echo $reference->title;?></h3>
                                    <div class="separator-2"></div>
                                    <p class="margin-clear"><?php echo $reference->description;?></p>

                                </div>
                            </div>
                            <?php } else { ?>
                                <div class="col-lg-6">
                                <div class="body">
                                    <div class="pv-30 hidden-lg-down"></div>
                                    <h3><?php echo $reference->title;?></h3>
                                    <div class="separator-2"></div>
                                    <p class="margin-clear"><?php echo $reference->description;?></p>
                                </div>
                            </div>
                                <div class="col-lg-6">
                                <div class="overlay-container">
                                    <img src="<?php echo base_url("panel/uploads/references_view/$reference->img_url");?>" alt="<?php echo $reference->title;?>">
                                    <div class="overlay-to-top">
                                        <p class="small margin-clear"><em><?php echo $reference->title;?></em></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php $index++; ?>
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