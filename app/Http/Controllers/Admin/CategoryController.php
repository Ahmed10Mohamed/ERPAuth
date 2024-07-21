<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Models\Repositories\Admin\CategoryRepository;
use App\Models\Repositories\CatRepository;
use App\Validators\CatValidators;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    private CategoryRepository $catRepository;
    public function __construct(CategoryRepository $catRepository){
        $this->catRepository = $catRepository;
    }

    public function index()
    {
        if(!permission_group_checker(admin()->id, 'Category')) {return  redirect('Dashboard/not_authorized');}

        $all_data = $this->catRepository->all_category();
        $class = 'all_cats';
        return view('admin.pages.category.index',compact('all_data','class'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if(!permission_group_checker(admin()->id, 'Category')) {return  redirect('Dashboard/not_authorized');}

        $class = 'all_cats';
        $cat = $request->cat;
        return view('admin.pages.category.create',compact('class','cat'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $this->catRepository->store($request);
        if($data === 'error'){
            return redirect()->back()->with('fail','opps! try again later');

        }else{
            return redirect()->route('categories.index')->with('success','Addedd success');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!permission_group_checker(admin()->id, 'Category')) {return  redirect('Dashboard/not_authorized');}

                $class = 'all_cats';
        $cat = $this->catRepository->cat_info($id);

        return view('admin.pages.category.show',compact('cat','class','all_data'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(!permission_group_checker(admin()->id, 'Category')) {return  redirect('Dashboard/not_authorized');}

        $class = 'all_cats';
        $data = $this->catRepository->cat_info($id);
        return view('admin.pages.category.edit',compact('data','class'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request,$id)
    {

        $data = $this->catRepository->update($request,$id);
        if($data === 'error'){
            return redirect()->back()->with('fail','opps! try again later');

        }else{
            return redirect()->route('categories.index')->with('success','updated success');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = $this->catRepository->destroy($id);
        if($data === 'error'){
            return redirect()->back()->with('fail','opps! try again later');

        }else{
            return redirect()->route('categories.index')->with('success','deletes success');
        }
    }
}
