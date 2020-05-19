<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "You edit <b>$item->user_name</b> record"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("users/update_user/$item->id"); ?>" method="post">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input class="form-control" placeholder="Full Name" name="full_name" value="<?php echo $item->full_name; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("full_name"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>User Name</label>
                        <input class="form-control" name="user_name" placeholder="User Name" value="<?php echo $item->user_name; ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="pull-right input-form-error"><?php echo $form_error("user_name")?></small>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $item->email; ?>">
                        <?php if (isset($form_error)) {?>
                            <small class="pull-right input-form-error"><?php echo $form_error("email")?></small>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label>User Role</label>
                        <select name="user_role_id" id="" class="form-control">
                            <?php foreach ($user_roles as $user_role) {?>
                                <option <?php echo ($user_role->id == $item->user_role_id) ? "selected" : ""; ?> value="<?php echo $user_role->id;?>"><?php echo $user_role->title?></option>
                            <?php }?>
                        </select>
                        <?php if (isset($form_error)) {?>
                            <small class="pull-right input-form-error"><?php echo $form_error("user_role_id")?></small>
                        <?php }?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Update</button>
                    <a href="<?php echo base_url("users"); ?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>