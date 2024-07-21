<?php

namespace App\Models\Repositories\Admin;

use App\Models\Admin;
use App\Models\AdminPermission;
use App\Models\Category;
use App\Models\CategoryRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminRepository
{


    public function all_admins()
    {
        $admins = Admin::orderBy('id', 'DESC')->get();
        return $admins;
    }
    public function admin_info($id){
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
           if ($request->has('permission')) {
            foreach ($request->permission as $permission) {
                AdminPermission::create([
                    'admin' => $admin->id,
                    'permission' => $permission,
                ]);
            }
        }
            $logs = [];
            $logs['action'] = 'add new record';
            $logs['table_action'] = 'Admin';
            $logs['record_id'] =$admin->id;

            add_log($logs);
            DB::commit();

        } catch (\Exception $e) {
            //  dd($e);
            DB::rollback();
           return 'error';
        }


    }
    public function update($request,$id)
    {

         $admin = $this->admin_info($id);

        $data = $request->except(['_token','password']);
        $data['updated_by']=admin()->id;
        if($request->password){
            $data['password']=bcrypt($request->password);
        }
       DB::beginTransaction();
       try {

            $admin->update($data);
            AdminPermission::where('admin', $admin->id)->delete();

            // Check if there are new permissions and add them
            if ($request->has('permission')) {
                foreach ($request->permission as $permission) {
                    AdminPermission::create([
                        'admin' => $admin->id,
                        'permission' => $permission,
                    ]);
                }
}
            $logs = [];
            $logs['action'] = 'modified';
            $logs['table_action'] = 'Admin';
            $logs['record_id'] =$admin->id;

            add_log($logs);
            DB::commit();

        } catch (\Exception $e) {
            //  dd($e);
            DB::rollback();
           return 'error';
        }


    }
    public function destroy($id){
        $admin = $this->admin_info($id);
        DB::beginTransaction();
        try {
            // delete all Permission of this user
            AdminPermission::where('admin', $admin->id)->delete();
            $admin->delete();
            $logs = [];
            $logs['action'] = 'destroy';
            $logs['table_action'] = 'Admin';
            add_log($logs);

             DB::commit();

         } catch (\Exception $e) {
            
             DB::rollback();
             //  dd($e);
            return 'error';
         }

    }
}
