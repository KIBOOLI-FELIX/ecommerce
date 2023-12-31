<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function index(){
        $slider=Slider::where('status','1')->get();
        return view('frontend.index',compact('slider'));
    }
    public function categories(){
        $categories=Category::where('status','1')->get();
        return view('frontend.collections.category.index',compact('categories'));
    }
    public function products($category_slug){
        $category=Category::where('slug',$category_slug)->first();
        if($category){

             return view('frontend.collections.products.index',compact('category'));
        }else{
            return redirect()->back();
        }
    }

    public function productView(string $category_slug,string $product_slug){
        $category=Category::where('slug',$category_slug)->first();
        if($category){

            $product=$category->products()->where('slug',$product_slug)
                                          ->where('status','1')->first();
            if($product){
                return view('frontend.collections.products.view',compact('product','category'));
            }else{
                 return redirect()->back();
            }
        }else{
        }
    }
}
