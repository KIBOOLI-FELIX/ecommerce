<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sliders=Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderFormRequest $request)
    {
        //
        $validatedData=$request->validated();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('uploads/slider/',$fileName);
            $validatedData['image']='uploads/slider/'.$fileName;
        }
        $request->status==true? $validatedData['status']='1' : $validatedData['status']='0';

        Slider::create($validatedData);

        return redirect('admin/sliders')->with('message','slider added');
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
    public function edit(Slider $slider)
    {
        //
        return view('admin.slider.edit',compact('slider'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderFormRequest $request, Slider $slider)
    {
        //
         //
        $validatedData=$request->validated();
        if($request->hasFile('image')){
            $destination=$slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('uploads/slider/',$fileName);
            $validatedData['image']='uploads/slider/'.$fileName;
        }
        $request->status==true? $validatedData['status']='1' : $validatedData['status']='0';

        Slider::where('id',$slider->id)->update($validatedData);

        return redirect('admin/sliders')->with('message','slider updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        //
        if($slider->count()>0){


        $destination=$slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
        $slider->delete();

        return redirect('admin/sliders')->with('message','slider deleted');
        }

        return redirect('admin/sliders')->with('message','Unexpected error');
    }
}
