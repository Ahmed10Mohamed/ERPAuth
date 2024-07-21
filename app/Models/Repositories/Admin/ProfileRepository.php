<?php

namespace App\Models\Repositories\Admin;
use App\Interfaces\ImageVideoUpload;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileRepository
{
    private ImageVideoUpload $ImageUpload;
    public function __construct(ImageVideoUpload $ImageUpload)
    {
        $this->ImageUpload = $ImageUpload;
    }

    public function find_admin($id){
        $admin = Admin::findOrfail($id);
        return $admin;
    }
    public function update_profile($request)
    {

        $request_image = $request->file('image');
       $model = 'Admin';
       DB::beginTransaction();
       try {
           $admin = Admin::find(admin()->id);
                $admin->name  = $request->name;
                $admin->user_name  = $request->user_name;
                $admin->phone = $request->phone;
                $admin->email = $request->email;
             if($request->hasFile('image')){
                 $admin->image = $this->ImageUpload->StoreImageSingle($request_image,$model);
                }

                $admin->save();
            DB::commit();

        } catch (\Exception $e) {

            DB::rollback();
            //  dd($e);
           return 'error';
        }


    }
    public function update_password($request)
    {

       DB::beginTransaction();
       try {
           $admin = Admin::find(admin()->id);
            if(!Hash::check($request->current_password, $admin->password))
            {
                return 'error_password';
            }
            else
            {
                $admin->password = bcrypt($request->password);
            }

            $admin->save();
            DB::commit();

        } catch (\Exception $e) {

            DB::rollback();
            //  dd($e);
           return 'error';
        }


    }














}
