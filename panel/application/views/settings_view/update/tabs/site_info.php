<div role="tabpanel" class="tab-pane in active fade" id="tab-1">

    <div class="row">
        <div class="form-group col-md-8">
            <label>Company Name</label>
            <input class="form-control"
                   name="company_name"
                   placeholder="Company Name"
                   value="<?php echo isset($form_error) ? set_value("company_name") : $item->company_name; ?>">
            <?php if (isset($form_error)) {?>
                <small class="pull-right input-form-error"><?php echo $form_error("company_name")?></small>
            <?php }?>
        </div>

    </div>


    <div class="row">
        <div class="form-group col-md-4">
            <label>Phone 1</label>
            <input class="form-control"
                   name="phone_1"
                   placeholder="Phone 1"
                   value="<?php echo isset($form_error) ? set_value("phone_1"): $item->phone_1; ?>">
        </div>

        <div class="form-group col-md-4">
            <label>Phone 2</label>
            <input class="form-control" name="phone_2" placeholder="Phone 2" value="<?php echo isset($form_error) ? set_value("phone_2") : $item->phone_2; ?>">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
            <label>Fax 1</label>
            <input class="form-control" name="fax_1" placeholder="Fax 1" value="<?php echo isset($form_error) ? set_value("fax_1") : $item->fax_1; ?>">
        </div>


        <div class="form-group col-md-4">
            <label>Fax 2</label>
            <input class="form-control" name="fax_2" placeholder="Fax 2" value="<?php echo isset($form_error) ? set_value("fax_2") : $item->fax_2; ?>">
        </div>
    </div>


</div><!-- .tab-pane  -->