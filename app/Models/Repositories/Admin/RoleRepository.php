<?php

namespace App\Models\Repositories\Admin;

use App\Models\Admin;
use App\Models\Category;
use App\Models\CategoryRequest;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleRepository
{


    public function index()
    {
        $roles = Role::where('id','!=',1)->orderBy('id', 'DESC')->get();
        return $roles;
    }
    public function show($id){
        $role = Role::findOrfail($id);
        return $role;
    }
    public function store($request)
    {

        $data = $request->except(['_token']);
       DB::beginTransaction();
       try {

            Role::create($data);
            DB::commit();
        } catch (\Exception $e) {
            //  dd($e);
            DB::rollback();
           return 'error';
        }


    }
    public function update($request,$id)
    {

         $role = $this->show($id);

        $data = $request->except(['_token']);
       DB::beginTransaction();
       try {

            $role->update($data);

            DB::commit();

        } catch (\Exception $e) {
            //  dd($e);
            DB::rollback();
           return 'error';
        }


    }
    public function destroy($id){
        $role = $this->show($id);
        DB::beginTransaction();
        try {
            // delete all Permission of this user
            $role->delete();

             DB::commit();

         } catch (\Exception $e) {

             DB::rollback();
             //  dd($e);
            return 'error';
         }

    }
}
