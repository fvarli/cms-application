<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Add New User
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">

            <div class="widget-body">

                    <form action="<?php echo base_url("users/save_new_user");?>" method="post">

                    <div class="form-group">
                        <label>Full Name</label>
                        <input class="form-control" name="full_name" placeholder="Full Name">
                        <?php if (isset($form_error)) {?>
                            <small class="pull-right input-form-error"><?php echo $form_error("full_name")?></small>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input class="form-control" name="user_name" placeholder="User Name">
                        <?php if (isset($form_error)) {?>
                            <small class="pull-right input-form-error"><?php echo $form_error("user_name")?></small>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Email">
                        <?php if (isset($form_error)) {?>
                            <small class="pull-right input-form-error"><?php echo $form_error("email")?></small>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password">
                        <?php if (isset($form_error)) {?>
                            <small class="pull-right input-form-error"><?php echo $form_error("password")?></small>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label>Re Password</label>
                        <input class="form-control" type="password" name="re_password" placeholder="Re Password">
                        <?php if (isset($form_error)) {?>
                            <small class="pull-right input-form-error"><?php echo $form_error("re_password")?></small>
                        <?php }?>
                    </div>


                    <button type="submit" class="btn btn-primary btn-md btn-outline">Submit</button>
                    <a href="<?php echo base_url("users");?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>