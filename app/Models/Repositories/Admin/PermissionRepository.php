<?php

namespace App\Models\Repositories\Admin;

use App\Models\Admin;
use App\Models\Category;
use App\Models\CategoryRequest;
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
            Permission::create($data);
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

            $permission->update($data);

            DB::commit();

        } catch (\Exception $e) {
            //  dd($e);
            DB::rollback();
           return 'error';
        }


    }
    public function destroy($id){
        $permission = $this->show($id);
        DB::beginTransaction();
        try {
            // delete all Permission of this user
            $permission->delete();

             DB::commit();

         } catch (\Exception $e) {

             DB::rollback();
             //  dd($e);
            return 'error';
         }

    }
}
