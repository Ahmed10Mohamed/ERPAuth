<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use App\Models\Repositories\Admin\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected RoleRepository $roleRepository;
    function __construct(RoleRepository $roleRepository){
        $this->roleRepository = $roleRepository;
    }
    public function index()
    {
        $all_data = $this->roleRepository->index();
        $class = 'role';
        return view('admin.pages.role.index',compact('all_data','class'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $data = $this->roleRepository->store($request);
        if($data === 'error'){
           return errorResponseMessage('Ops!TryAgain');

        }else{
            return successResponseData('Addedd Success');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->roleRepository->update($request,$id);
        if($data === 'error'){
           return errorResponseMessage('Ops!TryAgain');

        }else{
            return successResponseData('updated Success');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->roleRepository->destroy($id);
        if($data === 'error'){
            return redirect()->back()->with('fail','opps! try again later');

        }else{
            return redirect()->route('Role.index')->with('success','deletes success');
        }
    }
}
