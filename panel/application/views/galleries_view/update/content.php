<div class="row">
        <div class="col-md-12">
            <h4 class="m-b-lg">
                Update Existing Product
            </h4>
        </div><!-- END column -->

        <div class="col-md-12">
            <div class="widget">

                <div class="widget-body">

                    <form action="<?php echo base_url("galleries/update_gallery/$item->id/$item->gallery_type/$item->folder_name/");?>" method="post">
                        <div class="form-group">
                            <label>URL</label>
                            <input class="form-control" name="url" placeholder="URL" value ="<?php echo $item->url;?>">

                        </div>

                        <div class="form-group">
                            <label>Gallery Name</label>
                            <input class="form-control" name="title" placeholder="Title" value ="<?php echo $item->title;?>">

                            <?php if (isset($form_error)) {?>
                               <small class="pull-right input-form-error"><?php echo $form_error("title");?></small>
                            <?php }?>

                        </div>

                        <button type="submit" class="btn btn-primary btn-md btn-outline">Update</button>
                        <a href="<?php echo base_url("galleries")?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                    </form>
                </div><!-- .widget-body -->
            </div><!-- .widget -->
        </div><!-- END column -->
</div>