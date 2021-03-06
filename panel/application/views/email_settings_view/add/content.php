<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Add New User New Account
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">

            <div class="widget-body">

                    <form action="<?php echo base_url("emailsettings/save_new_email");?>" method="post">

                    <div class="form-group">
                        <label>Protocol</label>
                        <input class="form-control" name="protocol" placeholder="Protocol">
                        <?php if (isset($form_error)) {?>
                            <small class="pull-right input-form-error"><?php echo $form_error("protocol")?></small>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label>Email Server Name</label>
                        <input class="form-control" name="host" placeholder="Hostname">
                        <?php if (isset($form_error)) {?>
                            <small class="pull-right input-form-error"><?php echo $form_error("host")?></small>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label>Port Number</label>
                        <input class="form-control" type="text" name="port" placeholder="Port Number">
                        <?php if (isset($form_error)) {?>
                            <small class="pull-right input-form-error"><?php echo $form_error("port")?></small>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label>Email User Address</label>
                        <input class="form-control" type="email" name="user" placeholder="User Email">
                        <?php if (isset($form_error)) {?>
                            <small class="pull-right input-form-error"><?php echo $form_error("user")?></small>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label>Email Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password">
                        <?php if (isset($form_error)) {?>
                            <small class="pull-right input-form-error"><?php echo $form_error("password")?></small>
                        <?php }?>
                    </div>

                    <div class="form-group">
                            <label>Email From</label>
                            <input class="form-control" type="email" name="from" placeholder="From">
                            <?php if (isset($form_error)) {?>
                                <small class="pull-right input-form-error"><?php echo $form_error("from")?></small>
                            <?php }?>
                    </div>

                    <div class="form-group">
                            <label>Email To</label>
                            <input class="form-control" type="email" name="to" placeholder="To">
                            <?php if (isset($form_error)) {?>
                                <small class="pull-right input-form-error"><?php echo $form_error("to")?></small>
                            <?php }?>
                    </div>


                    <div class="form-group">
                            <label>Email Title</label>
                            <input class="form-control" type="text" name="user_name" placeholder="User Name">
                            <?php if (isset($form_error)) {?>
                                <small class="pull-right input-form-error"><?php echo $form_error("user_name")?></small>
                            <?php }?>
                    </div>

                        <button type="submit" class="btn btn-primary btn-md btn-outline">Submit</button>
                    <a href="<?php echo base_url("emailsettings");?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>