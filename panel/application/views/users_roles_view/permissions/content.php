



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
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "You edit <b>$item->title</b> record's permissons"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("user_roles/update_user_permissions/$item->id"); ?>" method="post">

                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <th>Module Name</th>
                            <th>Viewing</th>
                            <th>Adding</th>
                            <th>Editing</th>
                            <th>Deleting</th>
                        </thead>
                        <tbody>
                            <?php foreach (get_controller_list() as $controller_name) { ?>
                                <tr>
                                    <td class="w150"><?php echo $controller_name;?></td>
                                    <td class="w100 text-center">
                                        <label class="switch"> <input name="permissions[<?php echo $controller_name;?>][read]" type="checkbox" data-switchery/>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td class="w100 text-center">
                                        <label class="switch"> <input name="permissions[<?php echo $controller_name;?>][write]" type="checkbox" data-switchery/>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td class="w100 text-center">
                                        <label class="switch"> <input name="permissions[<?php echo $controller_name;?>][update]" type="checkbox" data-switchery/>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td class="w100 text-center">
                                        <label class="switch"> <input name="permissions[<?php echo $controller_name;?>][delete]" type="checkbox" data-switchery/>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <hr>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Update</button>
                    <a href="<?php echo base_url("user_roles/"); ?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>