<div class="row">
        <div class="col-md-12">
            <h4 class="m-b-lg">
                Add New Gallery
                <a href="#" class="btn-outline btn-primary btn-xs pull-right"><i class="fa fa-plus"></i>Add New</a>
            </h4>
        </div><!-- END column -->

        <div class="col-md-12">
            <div class="widget">

                <div class="widget-body">

                    <form action="<?php echo base_url("galleries/save_new_gallery/");?>" method="post">

                        <div class="form-group">
                            <label>Gallery Name</label>
                            <input class="form-control" name="title" placeholder="Type Folder Name">
                        </div>
                        <div class="form-group">
                            <label for="control-demo-6">Gallery Type</label>
                            <div id="control-demo-6">
                                <select class="form-control" name="gallery_type">
                                    <option <?php echo (isset($gallery_type) && $gallery_type == "image") ? "selected" : "";?> value="image">Image</option>
                                    <option <?php echo (isset($gallery_type) && $gallery_type == "video") ? "selected" : "";?> value="video">Video</option>
                                    <option <?php echo (isset($gallery_type) && $gallery_type == "file") ? "selected" : "";?> value="video">File</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-md btn-outline">Submit</button>
                        <a href="<?php echo base_url("galleries")?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                    </form>
                </div><!-- .widget-body -->
            </div><!-- .widget -->
        </div><!-- END column -->
</div>