<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
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
            $products=$category->products()->get();
             return view('frontend.collections.products.index',compact('products','category'));
        }else{
            return redirect()->back();
        }
    }
}
