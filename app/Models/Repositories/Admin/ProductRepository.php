<?php

namespace App\Models\Repositories\Admin;

use App\Interfaces\ImageVideoUpload;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductRepository
{

    private ImageVideoUpload $ImageUpload;
    public function __construct(ImageVideoUpload $ImageUpload)
    {
        $this->ImageUpload = $ImageUpload;
    }
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(50);
        return $products;
    }
    public function show($id){
        $product = Product::findOrfail($id);
        return $product;
    }
    public function store($request)
    {

        $data = $request->except(['_token','image']);
       DB::beginTransaction();
       try {
            if ($request->hasFile('image')) {
                $data['image'] = $this->ImageUpload->StoreImageSingle($request->image, 'Product');
            }

             Product::create($data);

            DB::commit();

        } catch (\Exception $e) {
            //  dd($e);
            DB::rollback();
           return 'error';
        }


    }
    public function update($request,$id)
    {

         $product = $this->show($id);

        $data = $request->except(['_token','password']);
        if($request->password){
            $data['password']=bcrypt($request->password);
        }
       DB::beginTransaction();
       try {

            if($request->hasFile('image')){
                $image = $this->ImageUpload->UpdateImageSingle($request->file('image'),'Product',$product->image);
                $data['image'] = $image;
            }
            $product->update($data);


            DB::commit();

        } catch (\Exception $e) {
            //  dd($e);
            DB::rollback();
           return 'error';
        }


    }
    public function destroy($id){
        $product = $this->show($id);
        DB::beginTransaction();
        try {
            $product->delete();

             DB::commit();

         } catch (\Exception $e) {

             DB::rollback();
             //  dd($e);
            return 'error';
         }

    }
}
