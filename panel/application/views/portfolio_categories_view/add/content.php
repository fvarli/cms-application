<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Add Portfolio Category
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">

            <div class="widget-body">

                <form action="<?php echo base_url("portfolio_categories/save_new_portfolio_category");?>" method="post">

                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="title" placeholder="Title">

                        <?php if (isset($form_error)) {?>
                            <small class="pull-right input-form-error"><?php echo $form_error("title")?></small>
                        <?php }?>

                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Submit</button>
                    <a href="<?php echo base_url("portfolio_categories")?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>