<?php

namespace App\Models\Repositories\Admin;

;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository
{


    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(50);
        return $users;
    }
    public function show($id){
        $user = User::findOrfail($id);
        return $user;
    }
    public function store($request)
    {

        $data = $request->except(['_token','password']);
       DB::beginTransaction();
       try {

            $data['password']=bcrypt($request->password);
             User::create($data);

            DB::commit();

        } catch (\Exception $e) {
            //  dd($e);
            DB::rollback();
           return 'error';
        }


    }
    public function update($request,$id)
    {

         $user = $this->show($id);

        $data = $request->except(['_token','password']);
        if($request->password){
            $data['password']=bcrypt($request->password);
        }
       DB::beginTransaction();
       try {

            $user->update($data);


            DB::commit();

        } catch (\Exception $e) {
            //  dd($e);
            DB::rollback();
           return 'error';
        }


    }
    public function destroy($id){
        $user = $this->show($id);
        DB::beginTransaction();
        try {
            $user->delete();

             DB::commit();

         } catch (\Exception $e) {

             DB::rollback();
             //  dd($e);
            return 'error';
         }

    }
}
