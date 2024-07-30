<?php

namespace App\Models\Repositories\Admin;

use App\Models\Admin;
use App\Models\Category;
use App\Models\CategoryRequest;
use App\Models\CustomUpdate;
use App\Models\Page;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PermissionRepository
{


    public function index()
    {
        $permissions = Permission::orderBy('id', 'DESC')->get();
        return $permissions;
    }
    public function roles(){
        $roles = Role::where('id','!=',1)->orderBy('id', 'DESC')->get();
        return $roles;
    }
    public function pages(){
        $pages = Page::orderBy('id', 'DESC')->get();
        return $pages;
    }
    public function show($id){
        $permission = Permission::findOrfail($id);
        return $permission;
    }
    public function store($request)
    {
        $data = $request->except(['_token','permation','page']);
       DB::beginTransaction();
       try {
            $data['permation'] = implode(',',$request->permation);
            $data['page'] = implode(',',$request->page);
            $per =Permission::create($data);
            if(isset($request->col)){

                foreach ($request->col as $key => $col) {

                  CustomUpdate::create([
                        'permition_id'=>$per->id,
                        'col' =>$col,
                        'exp'=>$request->exp[$key],
                        'page_custom'=>$request->page_custom[$key],
                        'db_type'=>$request->db_type[$key],
                        'value'=>$request->value[$key],
                        'page_type'=>$request->page_type[$key],
                        'model_name'=>$request->model_name[$key],
                    ]);
                }
            }
            DB::commit();
        } catch (\Exception $e) {
             dd($e);
            DB::rollback();
           return 'error';
        }


    }
    public function update($request,$id)
    {

         $permission = $this->show($id);

        $data = $request->except(['_token']);
       DB::beginTransaction();
       try {

            $data['permation'] = implode(',',$request->permation);
            $data['page'] = implode(',',$request->page);
            $permission->update($data);
            if(isset($request->col)){

                if (isset($permission->customs_updats_info)) {
                    $permission->customs_updats_info()->delete();
                }

                foreach ($request->col as $key => $col) {

                CustomUpdate::create([
                        'permition_id'=>$permission->id,
                        'col' =>$col,
                        'exp'=>$request->exp[$key],
                        'page_custom'=>$request->page_custom[$key],
                        'db_type'=>$request->db_type[$key],
                        'page_type'=>$request->page_type[$key],
                        'value'=>$request->value[$key],
                        'model_name'=>$request->model_name[$key],
                    ]);
                }
            }


            DB::commit();

        } catch (\Exception $e) {
              dd($e);
            DB::rollback();
           return 'error';
        }


    }
    public function destroy($id){
        $permission = $this->show($id);
        DB::beginTransaction();
        try {
            // delete all Permission of this user
            if (isset($permission->customs_updats_info)) {
                $permission->customs_updats_info()->delete();
            }
            $permission->delete();

             DB::commit();

         } catch (\Exception $e) {

             DB::rollback();
             //  dd($e);
            return 'error';
         }

    }
}
