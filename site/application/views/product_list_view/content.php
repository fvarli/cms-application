<section class="main-container">
    <div class="container">
        <br><br>
        <h1 class="page-title">Product List</h1>
        <p>You can see the product list we use.</p>
        <div class="separator-2"></div>
        <div class="row">
            <?php foreach ($products as $product) { ?>

            <div class="col-sm-4">
                <div class="image-box style-2 mb-20 bordered light-gray-bg">
                    <div class="overlay-container overlay-visible">

                        <?php
                            $image = get_product_cover_image($product->id);
                            $image = ($image) ? base_url("panel/uploads/products_view/$image") : base_url("assets/images/portfolio-1.jpg");
                        ?>
                        <img src="<?php echo $image;?>" alt="">
                        <div class="overlay-bottom text-left">
                            <p class="lead margin-clear"><?php echo $product->title;?></p>
                        </div>
                    </div>
                    <div class="body">
                        <p class="small mb-10 text-muted"><i class="icon-calendar"></i><?php echo getReadableDate($product->createdAt);?></p>
                        <p><?php echo character_limiter(strip_tags($product->description),25); ?></p>
                        <a href="<?php echo base_url("product-detail")?>" class="btn btn-default btn-sm btn-hvr hvr-sweep-to-right margin-clear">Read More<i class="fa fa-arrow-right pl-10"></i></a>
                    </div>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>
</section>