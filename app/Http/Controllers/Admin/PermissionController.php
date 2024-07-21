<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        //
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
        $page = $request->page;
        return view('admin.pages.permation.custom_update',compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
