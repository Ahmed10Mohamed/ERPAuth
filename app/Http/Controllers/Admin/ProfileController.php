<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Repositories\Admin\ProfileRepository;
use App\Validators\ProfileValidators;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

class ProfileController extends Controller
{

    private ProfileRepository $profileRepository;
    private ProfileValidators $profilevalidator;
    public function __construct(ProfileRepository $profileRepository,ProfileValidators $profilevalidator){
        $this->profileRepository = $profileRepository;
        $this->profilevalidator = $profilevalidator;

    }


    public function profile()
    {
        $class = 'account_setting';
        $admin = $this->profileRepository->find_admin(admin()->id);


        return view('admin.profile.account_setting',compact('class','admin'));
    }

    public function save_profile(Request $request)
    {
        $validator = $this->profilevalidator->validate($request);
        if ($validator) {
            return $validator;
        }
        $data = $this->profileRepository->update_profile($request);
        if($data === 'error'){
            return redirect()->back()->with('fail','حدث خطأ ما ! حاول فى وقت لاحق');
        }else{
            return redirect()->back()->with('success','تم تحديث بياناتك بنجاح');

        }
    }

    public function change_password()
    {
        $class = 'password';
        return view('admin.profile.change_password',compact('class'));
    }

    public function password_save(Request $request)
    {
        $validator = $this->profilevalidator->update_password($request);
        if ($validator) {
            return $validator;
        }
        $data = $this->profileRepository->update_password($request);
        if($data == 'error_password'){
            return redirect()->back()->withInput()->withErrors(['current_password'=>'كلمه المرور الحاليه غير صحيحة']);

        }
        if($data === 'error'){
            return redirect()->back()->with('fail','حدث خطأ ما ! حاول فى وقت لاحق');
        }else{
            return redirect()->back()->with('success','تم تغير كلمة المرور بنجاح');

        }

        return redirect('Dashboard')->with('success','Password Updated Success');
    }

}
