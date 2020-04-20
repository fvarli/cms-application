<?php $settings = get_settings();?>
<!-- banner start -->
<!-- ================ -->
<div class="banner dark-translucent-bg" style="background-image:url('<?php echo base_url("assets/images");?>/background-img-3.jpg'); background-position: 50% 30%;">
    <!-- breadcrumb start -->
    <!-- ================ -->
    <div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Contact Page</li>
            </ol>
        </div>
    </div>
    <!-- breadcrumb end -->
    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-lg-8 text-center pv-20">
                <h1 class="page-title text-center">Contact Us</h1>
                <div class="separator"></div>
                <p class="lead text-center">It would be great to hear from you! Just drop us a line and ask for anything with which you think we could be helpful. We are looking forward to hearing from you!</p>
                <ul class="list-inline mb-20 text-center">
                    <li class="list-inline-item"><i class="text-default fa fa-map-marker pr-2"></i> <?php echo $settings->address;?></li>
                    <li class="list-inline-item"><a href="tel:+00 1234567890" class="link-dark"><i class="text-default fa fa-phone pl-10 pr-2"></i> <?php echo $settings->phone_1;?></a></li>
                    <li class="list-inline-item"><a href="mailto:<?php echo $settings->email;?>" class="link-dark"><i class="text-default fa fa-envelope-o pl-10 pr-2"></i> <?php echo $settings->email;?></a></li>
                </ul>
                <div class="separator"></div>
                <ul class="social-links circle animated-effect-1 margin-clear text-center space-bottom">
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
            </div>
        </div>
    </div>
</div>
<!-- banner end -->
<!-- main-container start -->
<!-- ================ -->
<section class="main-container">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-12 space-bottom">
                <h2 class="title">DROP US A LINE</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <p>You can use the following form to send a message.</p>
                        <div class="alert alert-success hidden-xs-up" id="MessageSent">
                            We have received your message, we will contact you very soon.
                        </div>
                        <div class="alert alert-danger hidden-xs-up" id="MessageNotSent">
                            Oops! Something went wrong, please verify that you are not a robot or refresh the page and try again.
                        </div>
                        <div class="contact-form">
                            <form id="" class="margin-clear" role="form" method="post" action="<?php echo base_url("send-message");?>">
                                <div class="form-group has-feedback">
                                    <label for="name">Name*</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="">
                                    <i class="fa fa-user form-control-feedback"></i>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="email">Email*</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="">
                                    <i class="fa fa-envelope form-control-feedback"></i>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="subject">Subject*</label>
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="">
                                    <i class="fa fa-navicon form-control-feedback"></i>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="message">Message*</label>
                                    <textarea class="form-control" rows="6" id="message" name="message" placeholder=""></textarea>
                                    <i class="fa fa-pencil form-control-feedback"></i>
                                </div>

                                <div class="row">

                                    <div class="col-md-3">
                                        <?php echo $captcha["image"];?>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group has-feedback">
                                            <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Type The Verify Code">
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                                <input type="submit" value="Submit" class="submit-button btn btn-lg btn-default">
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div id="map-canvas"></div>
                    </div>
                </div>
            </div>
            <!-- main end -->
        </div>
    </div>
</section>
<!-- main-container end -->

<!-- section start -->
<!-- ================ -->
<section class="section pv-40 parallax background-img-1 dark-translucent-bg" style="background-position:50% 60%;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="call-to-action text-center">
                    <div class="row justify-content-lg-center">
                        <div class="col-lg-8">
                            <h2 class="title">SUBSCRIBE TO OUR NEWSLETTER</h2>
                            <p>Join Our Newsletter</p>
                            <div class="separator"></div>
                            <form class="form-inline margin-clear d-flex justify-content-center" action="<?php echo base_url("subscribe")?>" method="post">
                                <div class="form-group has-feedback">
                                    <label class="sr-only" for="subscribe_email">Email address</label>
                                    <input type="email" class="form-control form-control-lg" id="subscribe2" placeholder="Enter email" name="subscribe_email" required="">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
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