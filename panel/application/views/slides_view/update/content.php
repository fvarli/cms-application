<style>
    .switch {
        position: relative;
        display: inline-block;
        width:88px;
        height: 48px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .6s;
        transition: .6s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 40px;
        width: 40px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .6s;
        transition: .86s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(40px);
        -ms-transform: translateX(40px);
        transform: translateX(40px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 60px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "You edit <b>$item->title</b> record"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("slides/update_slide/$item->id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" placeholder="Title" name="title" value="<?php echo $item->title;?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->description; ?></textarea>
                    </div>

                    <div class="row">

                        <div class="col-md-1 image_upload_container">
                            <img src="<?php echo get_picture_to_size($viewFolder, $item->img_url, "1920x650");?>" alt="" class="img-responsive">
                        </div>

                        <div class="col-md-9 form-group image_upload_container">
                            <label>Choose Image</label>
                            <input type="file" name="img_url" class="form-control">
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-md-1">
                            <label><span style="font-size: 18px">Using Button</span></label>

                        </div>

                        <div class="form-group col-md-8">
                            <label class="switch">
                                <input
                                    class="form-control button_usage_btn"
                                    type="checkbox"
                                    data-switchery
                                    name="allowButton"
                                    <?php echo ($item->allowButton) ? "checked" : "";?>
                                />
                                <span class="slider round"></span>
                        </div>
                    </div>
                    <div class="button-information-container" style="display : <?php echo ($item->allowButton) ? "block" : "none";?>">

                        <div class="form-group">
                            <label>Button Title</label>
                            <input class="form-control" name="button_caption" placeholder="Button Title" <?php echo $item->button_caption;?>>

                            <?php if (isset($form_error)) {?>
                                <small class="pull-right input-form-error"><?php echo $form_error("button_caption")?></small>
                            <?php }?>

                        </div>

                        <div class="form-group">
                            <label>URL Information</label>
                            <input class="form-control" name="button_url" placeholder="URL Information" <?php echo $item->button_url;?>>

                            <?php if (isset($form_error)) {?>
                                <small class="pull-right input-form-error"><?php echo $form_error("button_url")?></small>
                            <?php }?>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Update</button>
                    <a href="<?php echo base_url("slides"); ?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>