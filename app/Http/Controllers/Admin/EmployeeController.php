<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmpRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Repositories\Admin\EmpRepository;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected EmpRepository $empRepository;
    public function __construct(EmpRepository $empRepository){
        $this->empRepository = $empRepository;
    }


    public function index()
    {
        if ($redirect = redirect_if_no_permission('read-emp')) {
            return $redirect;
        }
        $class = 'emp';
        $all_data = $this->empRepository->index();
        return view('admin.pages.emp.index',compact('all_data','class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $class = 'emp';
        if ($redirect = redirect_if_no_permission('insert-emp')) {
            return $redirect;
        }
         return view('admin.pages.emp.create',compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpRequest $request)
    {

        $data = $this->empRepository->store($request);
        if($data === 'error'){
            return redirect()->back()->with('fail','Opps! Try Again Later');
        }else{
            return redirect()->route('Employee.index')->with('success','Added Success');

        }

    }

    public function edit($id)
    {
        $class = 'emp';
        if ($redirect = redirect_if_no_permission('update-emp','customUpdate-emp','emp',$id)) {
            return $redirect;
        }

       $data = $this->empRepository->show($id);
        return view('admin.pages.emp.edit')->with(['data'=>$data,'class'=>$class]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpRequest $request, $id)
    {

        $data = $this->empRepository->update($request,$id);
        if($data === 'error'){
            return redirect()->back()->with('fail','Opps! Try Again Later');
        }else{
            return redirect()->route('Employee.index')->with('success','Updates Success');

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
        if ($redirect = redirect_if_no_permission('delete-emp','customDelete-emp','emp',$id)) {

            return $redirect;
        }

        $data = $this->empRepository->destroy($id);
        if($data === 'error'){
            return redirect()->back()->with('fail','Opps! Try Again Later');
        }else{
            return redirect()->route('Employee.index')->with('success','Deleted Success');
        }
    }

}
