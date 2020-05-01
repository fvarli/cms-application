<?php $page ="";
$get_page_list = get_page_list($page); ?>
<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Add New Popup
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">

            <div class="widget-body">

                <form action="<?php echo base_url("popups/save_new_popup");?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Related Page</label>
                        <select name="page" class="form-control">
                            <?php foreach ($get_page_list as $page_key => $value) { ?>
                                <option value="<?php echo $page_key;?>"><?php echo $value;?></option>
                            <?php } ?>
                        </select>
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
                    <a href="<?php echo base_url("popups")?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>