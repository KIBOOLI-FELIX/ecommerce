<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //
    public function index(){
        return view('admin.products.index');
    }
    public function create(){
        $categories=Category::all();
        $brands=Brand::all();
        return view('admin.products.create',compact('categories','brands'));
    }

    public function store(ProductFormRequest $request){
        $validatedData=$request->validated();
        $category=Category::findOrFail($validatedData['category_id']);
        $validatedData['slug']=Str::slug($validatedData['slug']);
        $request->status==true? $validatedData['status']='1' : $validatedData['status']='0';
        $request->status==true? $validatedData['trending']='1' : $validatedData['trending']='0';

        $product=$category->products()->create($validatedData);
        // return $product->id;
        if($request->hasFile('image')){
            $uploadPath = 'uploads/products/';
            foreach($request->file('image') as $imageFile){
                $extension=$imageFile->getClientOriginalExtension();
                $fileName=time().'.'.$extension;
                $imageFile->move($uploadPath,$fileName);
                $imagePath=$uploadPath.'-'.$fileName;

                $product->productImages()->create([
                    'product_id'=>$product->id,
                    'image'=>$imagePath
                ]);

            }
        }

        return redirect('admin/products')->with('message','Product added successfully');

    }
}
