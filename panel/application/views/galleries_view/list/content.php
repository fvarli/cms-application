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
                Gallery List
                <a href="<?php echo base_url("galleries/add_new_gallery");?>" class="btn-outline btn-primary btn-xs pull-right"><i class="fa fa-plus"></i>Add New</a>
            </h4>
        </div><!-- END column -->

        <div class="col-md-12">

            <div class="widget p-lg">

                <?php if(empty($items)) { ?>

                <div class="alert alert-info">

                    <h4 class="alert-title">custom alert info</h4>
                    <p>There is no data. Please <a href="<?php echo base_url("galleries/add_new_gallery");?>"><font color="#00008b">click here</font></a> to add data.</p>
                </div>

                <?php } else { ?>

                <table class="table table-hover table-bordered table-striped table-container">

                    <thead>
                    <th class="order"><i class ="fa fa-reorder"></i></th>
                    <th class="w50">#id</th>
                    <th>Url</th>
                    <th>Gallery Name</th>
                    <th>Gallery Type</th>
                    <th>Gallery Folder</th>
                    <th>Status</th>
                    <th>Process</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("galleries/rankSetter")?>">

                    <?php  foreach($items as $item) { ?>
                        <tr id="ord-<?php echo $item->id?>">
                        <td class="order"><i class = "fa fa-reorder"></i></td>
                        <td class="w50 text-center">#<?php echo $item->id;?></td>
                        <td class="w100 text-center"><?php echo $item->url;?></td>
                        <td class="text-center"><?php echo $item->title;?></td>
                        <td class="text-center"><?php echo $item->gallery_type;?></td>
                        <td class="text-center"><?php echo $item->folder_name;?></td>
                        <td>
                        <label class="switch">
                        <input
                            data-url = "<?php echo  base_url("galleries/isActiveSetter/$item->id");?>"
                            class="isActive"
                            type="checkbox"
                            data-switchery
                            <?php echo ($item->isActive) ? "checked" : ""; ?>/>
                        <span class="slider round"></span>
                        </label>
                        </td>
                        <td class="w250">
                            <button
                                    data-url="<?php echo base_url("galleries/delete_record/$item->id");?>"
                                    class="btn btn-sm btn-danger btn-remove">
                                    <i class="fa fa-trash"></i> Delete
                            </button>
                            <a href="<?php echo base_url("galleries/update_existing_gallery/$item->id");?>" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i> Edit</a>
                            <a href="<?php echo base_url("galleries/update_existing_image/$item->id");?>" class="btn btn-sm btn-dark"><i class="fa fa-image"></i> Images</a>
                        </td>
                    </tr>

                    <?php }?>
                    </tbody>

                </table>

                <?php } ?>

            </div><!-- .widget -->
        </div><!-- END column -->
    </div>