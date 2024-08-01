<?php

namespace App\Models\Repositories\Admin;

use App\Models\Admin;
use App\Models\AdminPermission;
use App\Models\Category;
use App\Models\CategoryRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminRepository
{


    public function index()
    {
        $admins = Admin::where('id','!=',1)->orderBy('id', 'DESC')->get();
        return $admins;
    }
    public function permition(){
        $permitions = Role::whereHas('permetions')->orderBy('id', 'DESC')->get();
        return $permitions;
    }
    public function show($id){
        $admin = Admin::findOrfail($id);
        return $admin;
    }
    public function store($request)
    {

        $data = $request->except(['_token','password']);
       DB::beginTransaction();
       try {

            $data['added_by']=admin()->id;
            $data['password']=bcrypt($request->password);
            $admin= Admin::create($data);
            // if ($request->has('permission')) {
            //     foreach ($request->permission as $permission) {
            //         AdminPermission::create([
            //             'admin' => $admin->id,
            //             'permission' => $permission,
            //         ]);
            //     }
            // }
            DB::commit();

        } catch (\Exception $e) {
           dd($e);
            DB::rollback();
           return 'error';
        }


    }
    public function update($request,$id)
    {

         $admin = $this->show($id);

        $data = $request->except(['_token','password']);
        $data['updated_by']=admin()->id;
        if($request->password){
            $data['password']=bcrypt($request->password);
        }
       DB::beginTransaction();
       try {

            $admin->update($data);

            DB::commit();

        } catch (\Exception $e) {
            //  dd($e);
            DB::rollback();
           return 'error';
        }


    }
    public function destroy($id){
        $admin = $this->show($id);
        DB::beginTransaction();
        try {
            // delete all Permission of this user
            AdminPermission::where('admin', $admin->id)->delete();
            $admin->delete();

             DB::commit();

         } catch (\Exception $e) {

             DB::rollback();
             //  dd($e);
            return 'error';
         }

    }
}
