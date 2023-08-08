<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $slider=Slider::where('status','1')->get();
        return view('frontend.index',compact('slider'));
    }
}
