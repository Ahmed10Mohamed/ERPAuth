<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Repositories\Admin\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductRepository $productRepository;
    public function __construct(ProductRepository $productRepository){
        $this->productRepository = $productRepository;
    }


    public function index()
    {
        if ($redirect = redirect_if_no_permission('products','is_read')) {
            return $redirect;
        }

        $class = 'product';
        $all_data = $this->productRepository->index();
        return view('admin.pages.products.index',compact('all_data','class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        if ($redirect = redirect_if_no_permission('products','is_create')) {
            return $redirect;
        }

        $class = 'product';

         return view('admin.pages.products.create',compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $data = $this->productRepository->store($request);
        if($data === 'error'){
            return redirect()->back()->with('fail','Opps! Try Again Later');
        }else{
            return redirect()->route('Product.index')->with('success','Added Success');

        }

    }

    public function edit($id)
    {
        if ($redirect = redirect_if_no_permission('products','is_update','update','products',$id)) {

            return $redirect;
        }

        $class = 'product';
       $data = $this->productRepository->show($id);
        return view('admin.pages.products.edit')->with(['data'=>$data,'class'=>$class]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {

        $data = $this->productRepository->update($request,$id);
        if($data === 'error'){
            return redirect()->back()->with('fail','Opps! Try Again Later');
        }else{
            return redirect()->route('Product.index')->with('success','Updates Success');

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
        if ($redirect = redirect_if_no_permission('products','is_delete')) {
            return $redirect;
        }

        $data = $this->productRepository->destroy($id);
        if($data === 'error'){
            return redirect()->back()->with('fail','Opps! Try Again Later');
        }else{
            return redirect()->route('Product.index')->with('success','Deleted Success');
        }
    }

}
