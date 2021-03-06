<div class="row">
        <div class="col-md-12">
            <h4 class="m-b-lg">
                Add New Product
                <a href="#" class="btn-outline btn-primary btn-xs pull-right"><i class="fa fa-plus"></i>Add New</a>
            </h4>
        </div><!-- END column -->

        <div class="col-md-12">
            <div class="widget">

                <div class="widget-body">

                    <form action="<?php echo base_url("products/save_new_product");?>" method="post">
                        <div class="form-group">
                            <label>URL</label>
                            <input class="form-control" name="url" placeholder="URL">

                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" name="title" placeholder="Title">

                            <?php if (isset($form_error)) {?>
                                <small class="pull-right input-form-error"><?php echo $form_error("title")?></small>
                            <?php }?>

                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="m-0" name="description" data-plugin="summernote" data-options="{height: 250}"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-md btn-outline">Submit</button>
                        <a href="<?php echo base_url("products")?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                    </form>
                </div><!-- .widget-body -->
            </div><!-- .widget -->
        </div><!-- END column -->
</div>