<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "You edit <b>$item->title</b> record"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("testimonials/update_testimonial  /$item->id"); ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Full Name</label>
                        <input class="form-control" name="full_name" placeholder="Full Name" value="<?php echo $item->full_name; ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="pull-right input-form-error"><?php echo $form_error("full_name")?></small>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label>Company Name</label>
                        <input class="form-control" name="company_name" placeholder="Company Name" value="<?php echo $item->company_name; ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="pull-right input-form-error"><?php echo $form_error("company_name")?></small>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" placeholder="Title" name="title" value="<?php echo $item->title; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter A Description About Us" cols="30" rows="10"><?php echo $item->description; ?></textarea>
                        <?php if (isset($form_error)) {?>
                            <small class="pull-right input-form-error"><?php echo $form_error("description")?></small>
                        <?php }?>
                    </div>

                    <div class="row">

                        <div class="col-md-1 image_upload_container">
                            <img src="<?php //TODO fix visibility - lecture 245
                            echo get_picture_to_size($viewFolder, $item->img_url,"90x90");?>" alt="" class="img-responsive">
                        </div>

                        <div class="col-md-9 form-group image_upload_container">
                            <label>Choose Image</label>
                            <input type="file" name="img_url" class="form-control">
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Update</button>
                    <a href="<?php echo base_url("testimonials"); ?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>