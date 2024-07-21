<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AddPackage;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Client;
use App\Models\Course;
use App\Models\Log;
use App\Models\Product;
use App\Models\Project;
use App\Models\RentalRequest;
use App\Models\RentalsSection;
use App\Models\ReportViolation;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
            $class = "dashboard";
            return view('admin.home',compact(
                'class'
            ));
    }
    public function account_setting(){
        $class = 'account_setting';
        $admin = admin();
        return view('admin.profile.account_setting',compact('class','admin'));
    }

       public function profile()
    {
        $admin = Auth::guard('admin')->user();
        $class = 'profile';

        return view('admin.pages.admins.profile',compact('admin','class'));
    }

    public function save_profile(Request $request)
    {
        $admin = Admin::findorfail(Auth::guard('admin')->user()->id);
        $validatedData = $request->validate([
            'user_name' => 'required|unique:admins,user_name,'.$admin->id.',id,deleted_at,NULL',
            'email' => 'required|email|unique:admins,email,'.$admin->id.',id,deleted_at,NULL',
            'phone' => 'required|unique:admins,phone,'.$admin->id.',id,deleted_at,NULL',
        ],
        [
            'user_name.required'=>'من فضلك ادخل اسم المستخدم',
            'user_name.unique'=>'اسم المستخدم مسجل في حساب اخر',
            'email.required'=>'من فضلك ادخل البريد الالكترونى',
            'email.unique'=>'البريد الالكترونى مسجل في حساب اخر',
            'email.email'=>'البريد الالكترونى غير صحيح',
            'phone.required'=>'من فضلك ادخل رقم التليفون',
            'phone.unique'=>'رقم التليفون مسجل في حساب اخر',
         ]);



        $admin->name  = $request->name;
        $admin->user_name = $request->user_name;
        $admin->phone = $request->phone;
        $admin->email = $request->email;

        if($request->hasFile('image'))
        {
            $validatedData = $request->validate([
                'image' => 'mimes:jpeg,png,jpg,gif,svg,gif,webp'
            ],
            $messages = [
                'image.mimes' => 'Please Choose Image File'
            ]);

            if (File::exists(public_path().$admin->image))
            {
                File::delete(public_path().$admin->image);
            }

            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/admins');
            $image->move($destinationPath, $imageName);
            $admin->image = '/uploads/admins/'.$imageName;
        }

        $admin->save();

        return redirect()->back()->with('success','Profile Updated Success');
    }

    public function change_password()
    {
        $class = 'profile';
        return view('admin.pages.admins.change_password',compact('class'));
    }

    public function password_save(Request $request)
    {
        $admin = Admin::findorfail(Auth::guard('admin')->user()->id);

        $validatedData = $request->validate([
            'password' => 'required|min:6|confirmed',
        ],
        [
            'password.required'=>'Please Enter Password',
            'password.min'=>'Password Must Be At Least 6 Charachters',
            'password.confirmed'=>'Password & Its Confirmation Not Matching',
        ]);
        $admin->password = bcrypt($request->password);
        $admin->save();

        return redirect('Dashboard')->with('success','Password Updated Success');
    }

}
