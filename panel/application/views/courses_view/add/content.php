<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Add New Course
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">

            <div class="widget-body">

                <form action="<?php echo base_url("courses/save_new_course");?>" method="post" enctype="multipart/form-data">

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

                    <div class="row">
                        <div class="col-md-4">
                            <label for="datetimepicker1">Course Date</label>
                            <input type="hidden" name="event_date" id="datetimepicker1" data-plugin="datetimepicker" data-options="{inline: true, viewMode: 'days', format: 'YYYY-MM-DD HH:mm:ss'}"/>
                        </div>
                        <div class="form-group image_upload_container col-md-4">
                            <label>Select Image</label>
                            <input type="file" name="img_url" class="form-control">
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary btn-md btn-outline">Submit</button>
                    <a href="<?php echo base_url("courses")?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>