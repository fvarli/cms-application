<div role="tabpanel" class="tab-pane fade" id="tab-6">

    <div class="row">
        <div class="form-group col-md-8">
            <label>Your Company Email Address</label>
            <input class="form-control"
                   name="email"
                   placeholder="Your Company Email Address"
                   value="<?php echo isset($form_error) ? set_value("email") : ""; ?>">
            <?php if (isset($form_error)) {?>
                <small class="pull-right input-form-error"><?php echo $form_error("email")?></small>
            <?php }?>
        </div>

    </div>

    <div class="row">
        <div class="form-group col-md-4">
            <label>Facebook Address</label>
            <input class="form-control" name="facebook" placeholder="Facebook Address">
        </div>

        <div class="form-group col-md-4">
            <label>Twitter Address</label>
            <input class="form-control" name="twitter" placeholder="Twitter Address">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
            <label>Instagram Address</label>
            <input class="form-control" name="instagram" placeholder="Instagram Address">
        </div>

        <div class="form-group col-md-4">
            <label>LinkedIn Address</label>
            <input class="form-control" name="linkedin" placeholder="LinkedIn Address">
        </div>
    </div>
</div><!-- .tab-pane  -->
