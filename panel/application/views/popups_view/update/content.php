<?php $page ="";
$get_page_list = get_page_list($page); ?>
<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "You edit <b>$item->title</b> record"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("popups/update_popup/$item->id"); ?>" method="post" enctype="multipart/form-data">


                    <div class="form-group">
                        <label>Related Page</label>
                        <select name="page" class="form-control">
                            <?php foreach ($get_page_list as $page_key => $value) { ?>
                                <?php $page_value = isset($form_error) ? set_value("page") : $item->page; ?>
                                <option
                                    <?php echo ($page_key == $page_value) ? "selected": "";?>
                                    value="<?php echo $page_key;?>"><?php echo $value;?>
                                </option>
                            <?php } ?>
                        </select>
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("page"); ?></small>
                        <?php } ?>
                    </div>


                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control"
                               placeholder="Title"
                               name="title"
                               value="<?php echo isset($form_error) ? set_value("title") : $item->title; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="m-0" name="description" data-plugin="summernote" data-options="{height: 250}"><?php echo isset($form_error) ? set_value("description") : $item->description;?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Update</button>
                    <a href="<?php echo base_url("popups"); ?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>