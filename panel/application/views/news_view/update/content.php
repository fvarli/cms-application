<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "You update <b>$item->title</b> record";?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("news/update_news/$item->id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" placeholder="Title" name="title" value="<?php echo $item->title; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>URL</label>
                        <input class="form-control" placeholder="URL" name="url" value="<?php echo $item->url; ?>">

                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->description; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="control-demo-6" class="">News Type</label>
                        <div id="control-demo-6" class="">
                            <?php if(isset($form_error)) { ?>
                                <select class="form-control news_type_select" name="news_type">
                                    <option <?php echo ($news_type == "image") ? "selected" : ""; ?> value="image">Image</option>
                                    <option <?php echo ($news_type == "video") ? "selected" : ""; ?> value="video">Video</option>
                                </select>
                            <?php } else { ?>
                                <select class="form-control news_type_select" name="news_type">
                                    <option <?php echo ($item->news_type == "image") ? "selected" : ""; ?> value="image">Image</option>
                                    <option <?php echo ($item->news_type == "video") ? "selected" : ""; ?> value="video">Video</option>
                                </select>
                            <?php } ?>
                        </div>
                    </div><!-- .form-group -->

                    <?php if(isset($form_error)){ ?>

                        <div class="row">

                            <div class="col-md-1 image_upload_container">
                                <img src="<?php echo get_picture_to_size($viewFolder, $item->img_url, "513x289");?>" alt="" class="img-responsive">
                            </div>

                            <div class="form-group image_upload_container" style="display: <?php echo ($news_type == "image") ? "block" : "none"; ?>">
                                <label>Selecet Image</label>
                                <input type="file" name="img_url" class="form-control">
                            </div>


                        </div>

                        <div class="form-group video_url_container" style="display: <?php echo ($news_type == "video") ? "block" : "none"; ?>">
                            <label>Video URL</label>
                            <input class="form-control" placeholder="Add video link" name="video_url">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("video_url"); ?></small>
                            <?php } ?>
                        </div>


                    <?php } else { ?>

                        <div class="row">

                            <div class="col-md-1 image_upload_container">
                                <img src="<?php echo base_url("uploads/$viewFolder/$item->img_url"); ?>" alt="" class="img-responsive">
                            </div>

                            <div class="col-md-9 form-group image_upload_container" style="display: <?php echo ($item->news_type == "image") ? "block" : "none"; ?>">
                                <label>Selecet Image</label>
                                <input type="file" name="img_url" class="form-control">
                            </div>

                        </div>

                        <div class="form-group video_url_container" style="display: <?php echo ($item->news_type == "video") ? "block" : "none"; ?>">
                            <label>Video URL</label>
                            <input class="form-control" placeholder="Add Video Link" name="video_url" value="<?php echo $item->video_url; ?>">
                        </div>


                    <?php } ?>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Update</button>
                    <a href="<?php echo base_url("news"); ?>" class="btn btn-md btn-danger btn-outline">Cacncel</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>