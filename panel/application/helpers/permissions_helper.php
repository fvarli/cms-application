<?php



function is_allowed_view_module($module_name=""){
    $t = &get_instance();

    $module_name = ($module_name="") ? $t->router->fetch_class() : $module_name;

    $user = get_active_user();
    $user_roles = get_user_roles();

    if(isset($user_roles[$user->user_role_id])){
        $permissions = json_decode($user_roles[$user->user_role_id]);
        if(isset($permissions->$module_name) && isset($permissions->$module_name->read)){
            return true;
        }
    }
    return false;
}

function is_allowed_write_module($module_name=""){
    $t = &get_instance();

    $module_name = ($module_name="") ? $t->router->fetch_class() : $module_name;

    $user = get_active_user();
    $user_roles = get_user_roles();

    if(isset($user_roles[$user->user_role_id])){
        $permissions = json_decode($user_roles[$user->user_role_id]);
        if(isset($permissions->$module_name) && isset($permissions->$module_name->write)){
            return true;
        }
    }
    return false;
}

function is_allowed_update_module($module_name=""){
    $t = &get_instance();

    $module_name = ($module_name="") ? $t->router->fetch_class() : $module_name;

    $user = get_active_user();
    $user_roles = get_user_roles();

    if(isset($user_roles[$user->user_role_id])){
        $permissions = json_decode($user_roles[$user->user_role_id]);
        if(isset($permissions->$module_name) && isset($permissions->$module_name->update)){
            return true;
        }
    }
    return false;
}

function is_allowed_delete_module($module_name=""){
    $t = &get_instance();

    $module_name = ($module_name="") ? $t->router->fetch_class() : $module_name;

    $user = get_active_user();
    $user_roles = get_user_roles();

    if(isset($user_roles[$user->user_role_id])){
        $permissions = json_decode($user_roles[$user->user_role_id]);
        if(isset($permissions->$module_name) && isset($permissions->$module_name->delete)){
            return true;
        }
    }
    return false;
}

