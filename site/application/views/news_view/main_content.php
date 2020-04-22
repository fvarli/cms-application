<!-- main start -->
<!-- ================ -->
<div class="main col-lg-8">

    <!-- page-title start -->
    <!-- ================ -->
    <h1 class="page-title"><?php echo $news->title;?></h1>
    <!-- page-title end -->

    <!-- blogpost start -->
    <!-- ================ -->
    <article class="blogpost full">
        <header>
            <div class="post-info mb-4">
                    <span class="post-date">
                      <i class="icon-calendar"></i>
                      <span class="month"><?php echo  getReadableDate($news->createdAt);?></span>
                    </span>
                <span class="comments"><i class="icon-eye"></i> <a href="#"><?php echo $news->view_count; ?> Views</a></span>
            </div>
        </header>
        <div class="blogpost-content">

            <?php if($news->news_type == "image") {?>

                <div class="overlay-container mb-20">
                    <img src="<?php echo base_url("panel/uploads/news_view/$news->img_url");?>" alt="<?php echo $news->url;?>">
                    <a class="overlay-link popup-img" href="<?php echo base_url("assets/images") ?>"/blog-1.jpg"><i class="fa fa-search-plus"></i></a>
                </div>

            <?php } else {?>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/<?php echo $news->video_url; ?>"></iframe>
                </div>
            <?php } ?>

            <p><?php echo $news->description;?></p>

        </div>
        <footer class="clearfix">
            <div class="tags pull-left"><i class="icon-tags"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>
            <div class="link pull-right">
                <ul class="social-links circle small colored clearfix margin-clear text-right animated-effect-1">
                    <li class="facebook"><a class="share_button" target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo base_url("new/$news->url");?>&t=<?php echo $news->title;?>"><i class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a class="share_button" target="_blank" href="https://www.twitter.com/intent/tweet?text=<?php echo $news->title;?>&url=<?php echo base_url("new/$news->url");?>"><i class="fa fa-twitter"></i></a></li>
                    <li class="linkedin"><a class="share_button" target="_blank" href="https://linkedin.com/shareArticle?mini=true&url=<?php echo base_url("new/$news->url");?>&title=<?php echo $news->title;?>"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </footer>
    </article>
    <!-- blogpost end -->

    <!-- comments start -->
    <!-- ================ -->
    <div id="comments" class="comments">
        <h2 class="title">There are 3 comments</h2>

        <!-- comment start -->
        <div class="comment clearfix">
            <div class="comment-avatar">
                <img class="rounded-circle" src="<?php echo base_url("assets/images") ?>/avatar.jpg" alt="avatar">
            </div>
            <header>
                <h3>Comment title</h3>
                <div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
            </header>
            <div class="comment-content">
                <div class="comment-body clearfix">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
                    <a href="blog-post.html" class="btn-sm-link link-dark pull-right"><i class="fa fa-reply"></i> Reply</a>
                </div>
            </div>

            <!-- comment start -->
            <div class="comment clearfix">
                <div class="comment-avatar">
                    <img class="rounded-circle" src="<?php echo base_url("assets/images") ?>/avatar.jpg" alt="avatar">
                </div>
                <header>
                    <h3>Comment title</h3>
                    <div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
                </header>
                <div class="comment-content">
                    <div class="comment-body clearfix">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
                        <a href="blog-post.html" class="btn-sm-link link-dark pull-right"><i class="fa fa-reply"></i> Reply</a>
                    </div>
                </div>
            </div>
            <!-- comment end -->

        </div>
        <!-- comment end -->

        <!-- comment start -->
        <div class="comment clearfix">
            <div class="comment-avatar">
                <img class="rounded-circle" src="<?php echo base_url("assets/images");?>/avatar.jpg" alt="avatar">
            </div>
            <header>
                <h3>Comment title</h3>
                <div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
            </header>
            <div class="comment-content">
                <div class="comment-body clearfix">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
                    <a href="blog-post.html" class="btn-sm-link link-dark pull-right"><i class="fa fa-reply"></i> Reply</a>
                </div>
            </div>
        </div>
        <!-- comment end -->

    </div>
    <!-- comments end -->

    <!-- comments form start -->
    <!-- ================ -->
    <div class="comments-form">
        <h2 class="title">Add your comment</h2>
        <form id="comment-form">
            <div class="form-group has-feedback">
                <label for="name4">Name</label>
                <input type="text" class="form-control" id="name4" placeholder="" name="name4" required>
                <i class="fa fa-user form-control-feedback"></i>
            </div>
            <div class="form-group has-feedback">
                <label for="subject4">Subject</label>
                <input type="text" class="form-control" id="subject4" placeholder="" name="subject4" required>
                <i class="fa fa-pencil form-control-feedback"></i>
            </div>
            <div class="form-group has-feedback">
                <label for="message4">Message</label>
                <textarea class="form-control" rows="8" id="message4" placeholder="" name="message4" required></textarea>
                <i class="fa fa-envelope-o form-control-feedback"></i>
            </div>
            <input type="submit" value="Submit" class="btn btn-default">
        </form>
    </div>
    <!-- comments form end -->

</div>
<!-- main end -->