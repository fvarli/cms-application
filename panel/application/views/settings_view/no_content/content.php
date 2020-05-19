<style>
.switch {
  position: relative;
  display: inline-block;
  width:44px;
  height: 24px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .3s;
  transition: .3s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  left: 2px;
  bottom: 2px;
  background-color: white;
  -webkit-transition: .3s;
  transition: .43s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(20px);
  -ms-transform: translateX(20px);
  transform: translateX(20px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 30px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<div class="row">

    <div class="row">
        <div class="col-md-12">
            <h4 class="m-b-lg">
                Site Settings
                <?php if(is_allowed_write_module()) { ?>
                    <a href="<?php echo base_url("settings/add_new_settings");?>" class="btn-outline btn-primary btn-xs pull-right"><i class="fa fa-plus"></i>Add New</a>
                <?php } ?>
            </h4>
        </div><!-- END column -->

        <div class="col-md-12">

            <div class="widget p-lg">

                <?php if(empty($items)) { ?>

                    <?php if(is_allowed_write_module()) { ?>
                        <div class="alert alert-info">

                            <h4 class="alert-title">custom alert info</h4>
                            <p>There is no data. Please <a href="<?php echo base_url("settings/add_new_settings");?>"><font color="#00008b">click here</font></a> to add data.</p>
                        </div>
                    <?php } ?>

                <?php } ?>

            </div><!-- .widget -->
        </div><!-- END column -->
    </div>