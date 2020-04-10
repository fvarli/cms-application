<div class="row">
        <div class="col-md-12">
            <h4 class="m-b-lg">
                <?php echo "You edit <b>$item->title</b>"?>
            </h4>
        </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">

            <div class="widget-body">

                <form action="<?php echo base_url("portfolios/update_portfolio/$item->id");?>" method="post">


                    <div class="row">

                        <div class="form-group col-md-6">
                            <label>Title</label>
                            <input class="form-control"
                                   name="title"
                                   placeholder="Title"
                                   value="<?php echo (isset($form_error)) ? set_value("title") : $item->title;?>"
                            >

                            <?php if (isset($form_error)) {?>
                                <small class="pull-right input-form-error"><?php echo $form_error("title")?></small>
                            <?php }?>

                        </div>


                        <div class="form-group col-md-6">
                            <label>Category</label>
                            <select name="category_id" id="" class="form-control">
                                <?php foreach ($categories as $category) {?>
                                    <?php $category_id = isset($form_error) ? set_value("category_id") : $item->category_id; ?>
                                    <option
                                        <?php echo ($category->id === $category_id) ? "selected" : "";?>
                                        value="<?php echo $category->id;?>"><?php echo $category->title;?></option>
                                <?php }?>
                            </select>
                            <?php if (isset($form_error)) {?>
                                <small class="pull-right input-form-error"><?php echo $form_error("category_id")?></small>
                            <?php }?>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="datetimepicker1">Finish Date</label>
                            <input type="hidden"
                                   name="finishedAt"
                                   id="datetimepicker1"
                                   value="<?php echo (isset($form_error)) ? set_value("finishedAt") : $item->finishedAt;?>"
                                   data-plugin="datetimepicker" data-options="{inline: true, viewMode: 'days', format: 'YYYY-MM-DD HH:mm:ss'}"/>
                        </div>

                        <div class="col-md-8">
                            <div class="row">


                                <div class="col-md-12">
                                    <label>Client</label>
                                    <input class="form-control"
                                           name="client"
                                           placeholder="Client"
                                           value="<?php echo (isset($form_error)) ? set_value("client") : $item->client;?>">

                                    <?php if (isset($form_error)) {?>
                                        <small class="pull-right input-form-error"><?php echo $form_error("client")?></small>
                                    <?php }?>
                                </div>

                                <div class="col-md-12">
                                    <label>Location</label>
                                    <input class="form-control"
                                           name="place"
                                           placeholder="Location"
                                           value="<?php echo (isset($form_error)) ? set_value("place") : $item->place;?>">

                                    <?php if (isset($form_error)) {?>
                                        <small class="pull-right input-form-error"><?php echo $form_error("place")?></small>
                                    <?php }?>
                                </div>

                                <div class="col-md-12">
                                    <label>URL of Process</label>
                                    <input class="form-control"
                                           name="portfolio_url"
                                           placeholder="URL of Process"
                                           value="<?php echo (isset($form_error)) ? set_value("portfolio_url") : $item->portfolio_url;?>">

                                    <?php if (isset($form_error)) {?>
                                        <small class="pull-right input-form-error"><?php echo $form_error("portfolio_url")?></small>
                                    <?php }?>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="m-0" name="description" data-plugin="summernote" data-options="{height: 250}">
                            <?php echo (isset($form_error)) ? set_value("description") : $item->description;?>
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Update</button>
                    <a href="<?php echo base_url("portfolios")?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>