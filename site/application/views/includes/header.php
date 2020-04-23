<?php $settings = get_settings();?>

<!-- header-container start -->
<div class="header-container">
    <!-- header start -->
    <!-- classes:  -->
    <!-- "fixed": enables fixed navigation mode (sticky menu) e.g. class="header fixed clearfix" -->
    <!-- "fixed-desktop": enables fixed navigation only for desktop devices e.g. class="header fixed fixed-desktop clearfix" -->
    <!-- "fixed-all": enables fixed navigation only for all devices desktop and mobile e.g. class="header fixed fixed-desktop clearfix" -->
    <!-- "dark": dark version of header e.g. class="header dark clearfix" -->
    <!-- "centered": mandatory class for the centered logo layout -->
    <!-- ================ -->
    <header class="header dark fixed fixed-desktop clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-auto hidden-md-down pl-3">
                    <!-- header-first start -->
                    <!-- ================ -->
                    <div class="header-first clearfix">

                        <!-- logo -->
                        <div id="logo" class="logo">
                            <a href="<?php echo base_url("")?>"><img id="logo_img" src="<?php echo base_url("assets/images");?>/logo_purple.png" alt="The Project"></a>
                        </div>

                        <!-- name-and-slogan -->
                        <div class="site-slogan">
                            <?php echo $settings->slogan;?>
                        </div>

                    </div>
                    <!-- header-first end -->

                </div>
                <div class="col-lg-8 ml-lg-auto">

                    <!-- header-second start -->
                    <!-- ================ -->
                    <div class="header-second clearfix">

                        <!-- main-navigation start -->
                        <!-- classes: -->
                        <!-- "onclick": Makes the dropdowns open on click, this the default bootstrap behavior e.g. class="main-navigation onclick" -->
                        <!-- "animated": Enables animations on dropdowns opening e.g. class="main-navigation animated" -->
                        <!-- ================ -->
                        <div class="main-navigation main-navigation--mega-menu  animated">
                            <nav class="navbar navbar-expand-lg navbar-light p-0">
                                <div class="navbar-brand clearfix hidden-lg-up">

                                    <!-- logo -->
                                    <div id="logo-mobile" class="logo">
                                        <a href="<?php echo base_url("")?>"><img id="logo-img-mobile" src="images/logo_purple.png" alt="The Project"></a>
                                    </div>

                                    <!-- name-and-slogan -->
                                    <div class="site-slogan">
                                        Multipurpose HTML5 Template
                                    </div>

                                </div>

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-1" aria-controls="navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                    <!-- main-menu -->
                                    <ul class="nav navbar-nav">
                                        <!-- mega-menu start home-->
                                        <li class="active"><a href="<?php echo base_url("")?>" class="nav-link" id="first-dropdown">Home</a></li>
                                        <!-- mega-menu start about us-->
                                        <li class="nav-item dropdown">
                                            <a href="index.html" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">About Us</a>
                                            <ul class="dropdown-menu">
                                                <li ><a href="<?php echo base_url("about-us")?>">About Us</a></li>
                                                <li ><a href="<?php echo base_url("portfolios")?>">Portfolio</a></li>
                                                <li ><a href="<?php echo base_url("news")?>">News</a></li>
                                                <li ><a href="<?php echo base_url("references")?>">References</a></li>
                                                <li ><a href="<?php echo base_url("services")?>">Services</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a href="index.html" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Galleries</a>
                                            <ul class="dropdown-menu">
                                                <li ><a href="features-headers-default-dark.html">Image Galleries</a></li>
                                                <li ><a href="features-headers-default-dark.html">Video Galleries</a></li>
                                                <li ><a href="features-headers-default-dark.html">File Galleries</a></li>
                                            </ul>
                                        </li>
                                        <!-- mega-menu start products-->
                                        <li class="active"><a href="<?php echo base_url("products")?>" class="nav-link" id="first-dropdown">Products</a></li>
                                        <!-- mega-menu start courses-->
                                        <li class="active"><a href="<?php echo base_url("courses")?>" class="nav-link" id="first-dropdown">Courses</a></li>
                                        <!-- mega-menu start brands-->
                                        <li class="active"><a href="<?php echo base_url("brands")?>" class="nav-link" id="first-dropdown">Brands</a></li>
                                    </ul>
                                    <!-- main-menu end -->
                                </div>
                            </nav>
                        </div>
                        <!-- main-navigation end -->
                    </div>
                    <!-- header-second end -->

                </div>
                <div class="col-auto hidden-md-down pl-0 pl-md-1">
                    <!-- header dropdown buttons -->
                    <div class="header-dropdown-buttons">
                        <a href="<?php echo base_url("contact")?>" class="btn btn-sm btn-default">Contact Us <i class="fa fa-envelope-o pl-1"></i></a>
                    </div>
                    <!-- header dropdown buttons end-->
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->
</div>
<!-- header-container end -->