<div class="row">
    <div class="simple-page-wrap">
        <div class="simple-page-logo animated swing">
            <a href="index.html">
                <span><i class="fa fa-gg"></i></span>
                <span>Content Management System</span>
            </a>
        </div><!-- logo -->
        <div class="simple-page-form animated flipInY" id="login-form">
            <h4 class="form-title m-b-xl text-center">Sign In With Your Infinity Account</h4>
            <form action="<?php echo  base_url("usersop/do_login");?>" method="post">
                <div class="form-group">
                    <input id="sign-in-email" type="email" class="form-control" placeholder="E-posta" name="user_email">
                    <?php if(isset($form_error)){ ?>
                        <small class="pull-right input-form-error"> <?php echo form_error("user_email"); ?></small>
                    <?php } ?>
                </div>

                <div class="form-group">
                    <input id="sign-in-password" type="password" class="form-control" placeholder="Şifre" name="user_password">
                    <?php if(isset($form_error)){ ?>
                        <small class="pull-right input-form-error"> <?php echo form_error("user_password"); ?></small>
                    <?php } ?>
                </div>

                <button type="submit" class="btn btn-primary"> SIGN IN</button>
            </form>
        </div><!-- #login-form -->

        <div class="simple-page-footer">
            <p><a href="<?php echo base_url("forget_password");?>">FORGOT YOUR PASSWORD ?</a></p>

        </div><!-- .simple-page-footer -->


    </div><!-- .simple-page-wrap -->


</div>