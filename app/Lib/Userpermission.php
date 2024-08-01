<?php

use App\Models\CustomUpdate;
use App\Models\Employee;
use App\Models\Page;
use App\Models\Permission;
use App\Models\Product;
use App\Models\User;

function get_page_tables($page_model){
    $modelClass = "App\\Models\\{$page_model}";
    $cols = new $modelClass;
    $columnsWithTypes = $cols->getTableColumnsWithTypes();
    return $columnsWithTypes;
}
function customs_updats_delete_page_permation($page,$permission_id,$page_type){
    $permissions = CustomUpdate::where(['page_custom'=>$page,'permition_id'=>$permission_id,'page_type'=>$page_type])->first();
    return $permissions;
}
if (!function_exists('redirect_if_no_permission')) {
    function redirect_if_no_permission($page,$permission,$custom_page=null,$page_name=null,$item_id=null)

    {

        if (!check_has_permission($page,$permission,$custom_page,$page_name,$item_id)) {
            return redirect()->route('Not-Authorized');
        }
        return null;
    }
}

function check_has_permission($page,$permission,$custom_page=null,$page_name=null,$item_id=null){

    if(admin()->id !== 1){

        $admin_role = admin()->role_info;
        $page_data = Page::where('page_name',$page)->first('id');

        $permition_info = Permission::where(['page_id'=>$page_data->id,'role_id'=>$admin_role->id])->first();
        if($permition_info){

            if($custom_page){
                return check_custom_update_delete($page,$permition_info->id,$item_id,$custom_page);
            }else{
                return (bool)$permition_info->$permission;
            }

        }else{
            return false;
        }


    }else{
        // this supper admin
        return true;
    }
}

function page_data($page_name){
    $page = Page::where('page_name',$page_name)->first();
    return $page;
}
function check_custom_update_delete($page,$id,$item_id,$page_type){
    $per_emp = CustomUpdate::where(['permition_id'=>$id,'page_custom'=>$page,'page_type'=>$page_type])->first();
  if(!$per_emp){
    return true;
  }
    $page_data = page_data($page);

    $modelClass = "App\\Models\\{$page_data->model_name}";
    $permition =  $modelClass::query();

    if($per_emp->exp == 'search'){
        $permition = $permition->where($per_emp->col,'like','%'.$per_emp->value.'%');

    }elseif($per_emp->exp == 'date'){
        $permition = $permition->whereDate($per_emp->col,$per_emp->exp,$per_emp->value);
    }else{
        $permition = $permition->where($per_emp->col,$per_emp->exp,$per_emp->value);
    }
    $permition = $permition->where('id',$item_id)->exists();
    return $permition;
}
function user_permission($page){
    $admin_role = admin()->permition_info;
    $permitions = explode(',',$admin_role->permation);
    $filteredArray = array_filter($permitions, function($item) use ($page) {
        return strpos($item, $page) !== false;
    });
    return $filteredArray;
}
