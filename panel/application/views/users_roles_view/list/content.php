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
                User Roles List
                <?php if(is_allowed_write_module()) { ?>
                    <a href="<?php echo base_url("user_roles/add_new_users_role");?>" class="btn-outline btn-primary btn-xs pull-right"><i class="fa fa-plus"></i>Add New</a>
                <?php } ?>
            </h4>
        </div><!-- END column -->

        <div class="col-md-12">

            <div class="widget p-lg">

                <?php if(empty($items)) { ?>
                    <?php if(is_allowed_write_module()) { ?>

                        <div class="alert alert-info">

                            <h4 class="alert-title">custom alert info</h4>
                            <p>There is no data. Please <a href="<?php echo base_url("user_roles/add_new_users_role");?>"><font color="#00008b">click here</font></a> to add data.</p>
                        </div>
                    <?php } ?>

                <?php } else { ?>

                <table class="table table-hover table-bordered table-striped table-container">

                    <thead>
                    <th class="order"><i class ="fa fa-reorder"></i></th>
                    <th class="w50">#id</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Process</th>
                    </thead>
                    <tbody>
                    
                    <?php  foreach($items as $item) { ?>
                        <tr id="ord-<?php echo $item->id?>">
                        <td class="order"><i class = "fa fa-reorder"></i></td>
                        <td class="w50 text-center">#<?php echo $item->id;?></td>
                        <td class="text-center w150"><?php echo $item->title;?></td>
                        <td class="text-center w150">
                        <label class="switch">
                        <input
                            data-url = "<?php echo  base_url("user_roles/isActiveSetter/$item->id");?>"
                            class="isActive"
                            type="checkbox"
                            data-switchery
                            <?php echo ($item->isActive) ? "checked" : ""; ?>/>
                        <span class="slider round"></span>
                        </label>
                        </td>
                        <td class="w250 text-center">
                            <?php if(is_allowed_delete_module()) { ?>
                                <button
                                        data-url="<?php echo base_url("user_roles/delete_record/$item->id");?>"
                                        class="btn btn-sm btn-danger btn-remove">
                                        <i class="fa fa-trash"></i> Delete
                                </button>
                            <?php } ?>

                            <?php if(is_allowed_update_module()) { ?>
                                <a href="<?php echo base_url("user_roles/update_existing_users_role/$item->id");?>" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                <a href="<?php echo base_url("user_roles/user_permissions/$item->id");?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Edit Permissions</a>
                            <?php } ?>
                        </td>
                    </tr>

                    <?php }?>
                    </tbody>
                </table>

                <?php } ?>

            </div><!-- .widget -->
        </div><!-- END column -->
    </div>