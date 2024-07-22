<?php

namespace App\Validators;
use App\Interfaces\Validators\IValidateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AdminValidators
{
      public function validate($request)
    {
        // dd(Request()->all());

        $validatedData = $request->validate([
            'name' => 'required',
            'permition_id'=>'required',
            'user_name' => 'required|unique:admins,user_name,NULL,id,deleted_at,NULL',
            'email' => 'nullable|email|unique:admins,email,NULL,id,deleted_at,NULL' ,
        ],
        [
            'name.required'=>'Please Enter Admin Name',
            'user_name.required'=>'Please Enter Admin User Name',
            'user_name.unique'=>'This Name Already Used Before',
            'email.unique'=>'This E-Mail Already Used Before',
            'email.email'=>'This E-Mail Not Correct  ',
        ]);
    }
    public function validate_update($request,$id)
    {
        // dd(Request()->all());

        $validatedData = $request->validate([
            'name' => 'required',
            'permition_id'=>'required',
            'user_name' => 'required|unique:admins,user_name,'.$id.',id,deleted_at,NULL',
            'email' => 'required|email|unique:admins,email,'.$id.',id,deleted_at,NULL',
        ],
        [
            'name.required'=>'Please Enter Admin Name',
            'user_name.required'=>'Please Enter Admin User Name',
            'user_name.unique'=>'This Name Already Used Before',
            'email.unique'=>'This E-Mail Already Used Before',
            'email.email'=>'This E-Mail Not Correct  ',
        ]);
    }
    public function password_validate($request)
    {
        // dd(Request()->all());

        $validatedData = $request->validate([
            'password' => 'required|confirmed|min:6',
        ],
        [    'password.required'=>'Please Enter Passord',
            'password.confirmed'=>'This Password Not Confirm',
            'password.min'=>'This Password Min 6 Char',

        ]);
    }


}
