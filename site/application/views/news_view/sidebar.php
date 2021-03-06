<!-- sidebar start -->
<!-- ================ -->
<aside class="col-lg-4 col-xl-3 ml-xl-auto">
    <div class="sidebar">
        <div class="block clearfix">
            <h3 class="title">Sidebar Menu</h3>
            <div class="separator-2"></div>
            <nav>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url("");?>">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url("products");?>">PRODUCTS</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url("portfolios");?>">PORTFOLIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url("about-us");?>">ABOUT</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url("contact");?>">CONTACT</a></li>
                </ul>
            </nav>
        </div>
        <div class="block clearfix">
            <h3 class="title">Featured Project</h3>
            <div class="separator-2"></div>
            <div id="carousel-portfolio-sidebar" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-portfolio-sidebar" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-portfolio-sidebar" data-slide-to="1"></li>
                    <li data-target="#carousel-portfolio-sidebar" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="image-box shadow bordered text-center mb-20">
                            <div class="overlay-container">
                                <img src="<?php echo base_url("assets/images") ?>/portfolio-4.jpg" alt="">
                                <a href="portfolio-item.html" class="overlay-link">
                                    <i class="fa fa-link"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="image-box shadow bordered text-center mb-20">
                            <div class="overlay-container">
                                <img src="<?php echo base_url("assets/images") ?>/portfolio-1-2.jpg" alt="">
                                <a href="portfolio-item.html" class="overlay-link">
                                    <i class="fa fa-link"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="image-box shadow bordered text-center mb-20">
                            <div class="overlay-container">
                                <img src="<?php echo base_url("assets/images") ?>/portfolio-1-3.jpg" alt="">
                                <a href="portfolio-item.html" class="overlay-link">
                                    <i class="fa fa-link"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block clearfix">
            <h3 class="title">Latest tweets</h3>
            <div class="separator-2"></div>
            <ul class="tweets">
                <li>
                    <i class="fa fa-twitter"></i>
                    <p><a href="#">@lorem</a> ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, aliquid, et molestias nesciunt <a href="#">http://t.co/dzLEYGeEH9</a>.</p><span>16 hours ago</span>
                </li>
                <li>
                    <i class="fa fa-twitter"></i>
                    <p><a href="#">@lorem</a> ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, aliquid, et molestias nesciunt <a href="#">http://t.co/dzLEYGeEH9</a>.</p><span>16 hours ago</span>
                </li>
            </ul>
        </div>
        <div class="block clearfix">
            <h3 class="title">Popular Tags</h3>
            <div class="separator-2"></div>
            <div class="tags-cloud">
                <div class="tag">
                    <a href="#">energy</a>
                </div>
                <div class="tag">
                    <a href="#">business</a>
                </div>
                <div class="tag">
                    <a href="#">food</a>
                </div>
                <div class="tag">
                    <a href="#">fashion</a>
                </div>
                <div class="tag">
                    <a href="#">finance</a>
                </div>
                <div class="tag">
                    <a href="#">culture</a>
                </div>
                <div class="tag">
                    <a href="#">health</a>
                </div>
                <div class="tag">
                    <a href="#">sports</a>
                </div>
                <div class="tag">
                    <a href="#">life style</a>
                </div>
                <div class="tag">
                    <a href="#">books</a>
                </div>
                <div class="tag">
                    <a href="#">lorem</a>
                </div>
                <div class="tag">
                    <a href="#">ipsum</a>
                </div>
                <div class="tag">
                    <a href="#">responsive</a>
                </div>
                <div class="tag">
                    <a href="#">style</a>
                </div>
                <div class="tag">
                    <a href="#">finance</a>
                </div>
                <div class="tag">
                    <a href="#">sports</a>
                </div>
                <div class="tag">
                    <a href="#">technology</a>
                </div>
                <div class="tag">
                    <a href="#">support</a>
                </div>
                <div class="tag">
                    <a href="#">life style</a>
                </div>
                <div class="tag">
                    <a href="#">books</a>
                </div>
            </div>
        </div>
        <div class="block clearfix">
            <h3 class="title">Testimonial</h3>
            <div class="separator-2"></div>
            <blockquote class="margin-clear">
                <p>Design is not just what it looks like and feels like. Design is how it works.</p>
                <footer><cite title="Source Title">Steve Jobs </cite></footer>
            </blockquote>
            <blockquote class="margin-clear">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos dolorem.</p>
                <footer><cite title="Source Title">Steve Doe </cite></footer>
            </blockquote>
        </div>
        <div class="block clearfix">
            <h3 class="title">Latest News</h3>
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
        <div class="block clearfix">
            <h3 class="title">Text Sample</h3>
            <div class="separator-2"></div>
            <p class="margin-clear">Debitis eaque officia illo impedit ipsa earum <a href="#">cupiditate repellendus</a> corrupti nisi nemo, perspiciatis optio harum, hic laudantium nulla maiores rem sit magni neque nihil sequi temporibus. Laboriosam ipsum reiciendis iste, nobis obcaecati, a autem voluptatum odio? Recusandae officiis dicta quod qui eligendi.</p>
        </div>
        <div class="block clearfix">
            <form role="search">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Search">
                    <i class="fa fa-search form-control-feedback"></i>
                </div>
            </form>
        </div>
    </div>
</aside>
<!-- sidebar end -->