<?php

namespace App\Models\Repositories\Admin;

;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmpRepository
{


    public function index()
    {
        $emps = Employee::orderBy('id', 'DESC')->get();
        return $emps;
    }
    public function show($id){
        $emp = Employee::findOrfail($id);
        return $emp;
    }
    public function store($request)
    {

        $data = $request->except(['_token','password']);
       DB::beginTransaction();
       try {

            $data['password']=bcrypt($request->password);
             Employee::create($data);
           
            DB::commit();

        } catch (\Exception $e) {
            //  dd($e);
            DB::rollback();
           return 'error';
        }


    }
    public function update($request,$id)
    {

         $emp = $this->show($id);

        $data = $request->except(['_token','password']);
        if($request->password){
            $data['password']=bcrypt($request->password);
        }
       DB::beginTransaction();
       try {

            $emp->update($data);


            DB::commit();

        } catch (\Exception $e) {
            //  dd($e);
            DB::rollback();
           return 'error';
        }


    }
    public function destroy($id){
        $emp = $this->show($id);
        DB::beginTransaction();
        try {
            $emp->delete();
        
             DB::commit();

         } catch (\Exception $e) {

             DB::rollback();
             //  dd($e);
            return 'error';
         }

    }
}
