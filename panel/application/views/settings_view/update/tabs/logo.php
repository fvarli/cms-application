<div role="tabpanel" class="tab-pane fade" id="tab-7">

    <div class="row">
        <div class="col-md-3">
            <img
                src="<?php echo get_picture_to_size($viewFolder, $item->logo, "150x35");?>"
                alt="<?php echo $item->company_name?>"
                class="responsive">
        </div>

        <div class="form-group col-md-6">
            <label>Select Image for Desktop</label>
            <input type="file" name="logo" class="form-control">
        </div>

        <div class="row">
            <div class="col-md-3">
                <img
                    src="<?php echo get_picture_to_size($viewFolder, $item->mobile_logo, "300x70");?>"
                    alt="<?php echo $item->company_name?>"
                    class="responsive">
            </div>
            <div class="form-group col-md-6">
                <label>Select Image for Mobile</label>
                <input type="file" name="mobile_logo" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <img
                    src="<?php echo get_picture_to_size($viewFolder, $item->favicon, "32x32");?>"
                    alt="<?php echo $item->company_name?>"
                    class="responsive">
            </div>

            <div class="form-group col-md-6">
                <label>Select Image for Favicon</label>
                <input type="file" name="favicon" class="form-control">
            </div>

        </div>
    </div>



</div><!-- .tab-pane  -->
