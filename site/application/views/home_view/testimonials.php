<!-- section start -->
<!-- ================ -->
<section class="dark-translucent-bg background-img-11 pv-300" style="background-position: 50% 50%;">
    <div class="owl-carousel content-slider">
<!-- TODO check later - video 287-->
        <?php foreach ($testimonials as $testimonial) { ?>
            <div class="container">
                <div class="row justify-content-lg-center">
                    <div class="col-lg-8">
                        <div class="testimonial text-center">
                            <div class="testimonial-image">
                                <img src="<?php echo base_url("testimonials_view", $testimonial->img_url, "90x90");?>"
                                     alt="<?php echo $testimonial->full_name;?>"
                                     title="<?php echo $testimonial->full_name;?>"
                                     class="rounded-circle">
                            </div>
                            <h3><?php echo $testimonial->title;?></h3>
                            <div class="separator"></div>
                            <div class="testimonial-body">
                                <blockquote>
                                    <p><?php echo $testimonial->description;?></p>
                                </blockquote>
                                <div class="testimonial-info-1">- <?php echo $testimonial->full_name;?></div>
                                <div class="testimonial-info-2"><?php echo $testimonial->company_name;?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</section>
<!-- section end -->