<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //
    public function index(){
        $products=Product::all();
        return view('admin.products.index',compact('products'));
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
            $i=1;
            foreach($request->file('image') as $imageFile){
                $extension=$imageFile->getClientOriginalExtension();
                $fileName=time().$i++.'.'.$extension;
                $imageFile->move($uploadPath,$fileName);
                $imagePath=$uploadPath.$fileName;

                $product->productImages()->create([
                    'product_id'=>$product->id,
                    'image'=>$imagePath
                ]);

            }
        }

        return redirect('admin/products')->with('message','Product added successfully');

    }
    public function edit(Product $product)
    {
        $categories=Category::all();
        $brands=Brand::all();
        return view('admin.products.edit',compact('product','categories','brands'));
    }
    public function update( ProductFormRequest $request,int $product_id=null)
    {
        $validatedData=$request->validated();
        $product=Category::findOrFail($validatedData['category_id'])
                            ->products()->where('id',$product_id)->first();
        if($product)
        {
            $validatedData['slug']=Str::slug($validatedData['slug']);
            $request->status==true? $validatedData['status']='1' : $validatedData['status']='0';
            $request->trending==true? $validatedData['trending']='1' : $validatedData['trending']='0';
            $product->update($validatedData);

            if($request->hasFile('image')){
            $uploadPath = 'uploads/products/';
            $i=1;
            foreach($request->file('image') as $imageFile){
                $extension=$imageFile->getClientOriginalExtension();
                $fileName=time().$i++.'.'.$extension;
                $imageFile->move($uploadPath,$fileName);
                $imagePath=$uploadPath.$fileName;

                $product->productImages()->create([
                    'product_id'=>$product->id,
                    'image'=>$imagePath
                ]);

            }
        }

        return redirect('admin/products')->with('message','Product updated  successfully');


        }else{
            return redirect('admin/products')->with('message','No such product exists');
        }
    }
    public function deleteImage(int $product_image_id=null)
    {
        $productImage=ProductImage::findOrFail($product_image_id);
        if(File::exists($productImage->image))
        {
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message','Product image deleted successfully');
    }

    public function delete(int $product_id)
    {
        $product=Product::findOrFail($product_id);
        if($product->productImages)
        {
            foreach($product->productImages as $image){
                if(File::exists($image->image)){
                   File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect('admin/products')->with('message','Product deleted ');
    }
}
