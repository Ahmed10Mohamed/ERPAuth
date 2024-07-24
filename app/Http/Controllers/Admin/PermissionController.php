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
        return view('admin.pages.permation.custom_update',compact('page','page_data'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
