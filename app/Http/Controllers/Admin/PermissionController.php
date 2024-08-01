<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PermationRequest;
use App\Models\Page;
use App\Models\Repositories\Admin\PermissionRepository;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected PermissionRepository $permissionRepository;
    function __construct(PermissionRepository $permissionRepository){
        $this->permissionRepository = $permissionRepository;
    }
    public function index()
    {
        $class = 'permation';
        $all_data = $this->permissionRepository->index();
        $pages = $this->permissionRepository->pages();
        return view('admin.pages.permation.index',compact('all_data','class','pages'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function select_page(Request $request){
        $page = Page::findOrfail($request->id);
        return view('admin.pages.permation.select_page',compact('page'));

    }
    public function create()
    {
        $class = 'permation';
        $roles = $this->permissionRepository->roles();
        $pages = $this->permissionRepository->pages();
        return view('admin.pages.permation.create',compact('roles','class','pages'));
    }
    public function select_custom_update(Request $request){
        $page_data = Page::find($request->id);
        $page = $request->page;
        $type = $request->type;
        return view('admin.pages.permation.custom_update',compact('page','page_data','type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermationRequest $request)
    {
        $data = $this->permissionRepository->store($request);
        if($data === 'error'){
            return redirect()->back()->with('fail','Opps! Try Again Later');
        }else{
            return redirect()->route('Permation.index')->with('success','Added Success');

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
        $data = $this->permissionRepository->show($id);
        $class = 'permation';
        return view('admin.pages.permation.edit',compact('data','class'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermationRequest $request, string $id)
    {
        $data = $this->permissionRepository->update($request,$id);
        if($data === 'error'){
            return redirect()->back()->with('fail','Opps! Try Again Later');
        }else{
            return redirect()->route('Permation.index')->with('success','updated Success');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->permissionRepository->destroy($id);
        if($data === 'error'){
            return redirect()->back()->with('fail','Opps! Try Again Later');
        }else{
            return redirect()->route('Permation.index')->with('success','Deleted Success');
        }
    }
}
