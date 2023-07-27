<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $colors=Color::all();
        return view('admin.colors.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ColorFormRequest $request)
    {
        //
        $validatedData=$request->validated();
        // return $validatedData;
        $request->status==true? $validatedData['status']='1' : $validatedData['status']='0';
        Color::create($validatedData);
        return redirect('admin/colors')->with('message','color added successfully');
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
    public function edit(Color $color)
    {
        //
        return view('admin.colors.edit',compact('color')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColorFormRequest $request, string $id)
    {
        //
         $validatedData=$request->validated();
        $request->status==true? $validatedData['status']='1' : $validatedData['status']='0';
        Color::find($id)->update($validatedData);
        return redirect('admin/colors')->with('message','color updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Color::findOrFail($id)->delete();
        return redirect('admin/colors')->with('message','color deleted successfully');
    }
}
