<div class="row">
        <div class="col-md-12">
            <h4 class="m-b-lg">
                Add New Portfolio
                <a href="#" class="btn-outline btn-primary btn-xs pull-right"><i class="fa fa-plus"></i>Add New</a>
            </h4>
        </div><!-- END column -->

        <div class="col-md-12">
            <div class="widget">

                <div class="widget-body">

                    <form action="<?php echo base_url("portfolios/save_new_portfolio");?>" method="post">


                        <div class="row">

                            <div class="form-group col-md-6">
                                <label>Title</label>
                                <input class="form-control" name="title" placeholder="Title">

                                <?php if (isset($form_error)) {?>
                                    <small class="pull-right input-form-error"><?php echo $form_error("title")?></small>
                                <?php }?>

                            </div>


                            <div class="form-group col-md-6">
                                <label>Category</label>
                                <select name="category_id" id="" class="form-control">
                                   <?php foreach ($categories as $category) {?>
                                       <option value="<?php echo $category->id;?>"><?php echo $category->title?></option>
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
                                <input type="hidden" name="finishedAt" id="datetimepicker1" data-plugin="datetimepicker" data-options="{inline: true, viewMode: 'days', format: 'YYYY-MM-DD HH:mm:ss'}"/>
                            </div>

                            <div class="col-md-8">
                                <div class="row">


                                    <div class="col-md-12">
                                        <label>Client</label>
                                        <input class="form-control" name="client" placeholder="Client">

                                        <?php if (isset($form_error)) {?>
                                            <small class="pull-right input-form-error"><?php echo $form_error("client")?></small>
                                        <?php }?>
                                    </div>

                                    <div class="col-md-12">
                                        <label>Location</label>
                                        <input class="form-control" name="place" placeholder="Location">

                                        <?php if (isset($form_error)) {?>
                                            <small class="pull-right input-form-error"><?php echo $form_error("place")?></small>
                                        <?php }?>
                                    </div>

                                    <div class="col-md-12">
                                        <label>URL of Process</label>
                                        <input class="form-control" name="portfolio_url" placeholder="URL of Process">

                                        <?php if (isset($form_error)) {?>
                                            <small class="pull-right input-form-error"><?php echo $form_error("portfolio_url")?></small>
                                        <?php }?>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="m-0" name="description" data-plugin="summernote" data-options="{height: 250}"></textarea>
                        </div>


                        <button type="submit" class="btn btn-primary btn-md btn-outline">Submit</button>
                        <a href="<?php echo base_url("portfolios")?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                    </form>
                </div><!-- .widget-body -->
            </div><!-- .widget -->
        </div><!-- END column -->
</div>