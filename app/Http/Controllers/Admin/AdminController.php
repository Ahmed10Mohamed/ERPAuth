<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Repositories\Admin\AdminRepository;
use App\Validators\AdminValidators;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private AdminRepository $adminRepository;
    private AdminValidators $adminValidators;
    public function __construct(AdminRepository $adminRepository,AdminValidators $adminValidators){
        $this->adminRepository = $adminRepository;
        $this->adminValidators = $adminValidators;
    }
    public function not_authorized(){
        return view('admin.pages.admins.not_authorized');

    }

    public function index()
    {
        $class = 'admins';
        $all_data = $this->adminRepository->index();
        return view('admin.pages.admins.index',compact('all_data','class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $class = 'admins';
        $permitions = $this->adminRepository->permition();
         return view('admin.pages.admins.create',compact('class','permitions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = $this->valideation($request,'store');
        if ($validator) {
            return $validator;
        }
        $data = $this->adminRepository->store($request);
        if($data === 'error'){
            return redirect()->back()->with('fail','Opps! Try Again Later');
        }else{
            return redirect()->route('admins.index')->with('success','Added Success');

        }

    }

    public function edit($id)
    {
        $class = 'admins';
       $data = $this->adminRepository->show($id);
       $permitions = $this->adminRepository->permition();
        return view('admin.pages.admins.edit')->with(['data'=>$data,'class'=>$class,'permitions'=>$permitions]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->valideation($request,'update',$id);
        if ($validator) {
            return $validator;
        }
        $data = $this->adminRepository->update($request,$id);
        if($data === 'error'){
            return redirect()->back()->with('fail','Opps! Try Again Later');
        }else{
            return redirect()->route('admins.index')->with('success','Updates Success');

        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $data = $this->adminRepository->destroy($id);
        if($data === 'error'){
            return redirect()->back()->with('fail','Opps! Try Again Later');
        }else{
            return redirect()->route('admins.index')->with('success','Deleted Success');
        }
    }
    private function valideation($request,$type,$id=null){
        if($type == 'store'){
            $validator = $this->adminValidators->validate($request);
            if ($validator) {
                return $validator;
            }
            $validator_password = $this->adminValidators->password_validate($request);
            if ($validator_password) {
                return $validator_password;
            }
        }else{
            $validator = $this->adminValidators->validate_update($request,$id);
            if ($validator) {
                return $validator;
            }
            if($request->password){

                $validator_password = $this->adminValidators->password_validate($request);
                if ($validator_password) {
                    return $validator_password;
                }
            }

        }
    }
}
