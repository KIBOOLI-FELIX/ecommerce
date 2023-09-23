<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $category;
    public function __construct(){
        $this->category=new Category();
    }
    public function index()
    {
        //
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryFormRequest $request)
    {

        // //
        // return redirect('admin/category');
        $validatedData=$request->validated();
        $this->category->name=$validatedData['name'];
        $this->category->slug=Str::slug($validatedData['slug']);
        $this->category->description=$validatedData['description'];
        // $category->image=$validatedData['image'];


        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('uploads/category/',$fileName);
            $this->category->image='uploads/category/'.$fileName;
        }
        $this->category->meta_title=$validatedData['meta_title'];
        $this->category->meta_description=$validatedData['meta_description'];
        $this->category->meta_keyword=$validatedData['meta_keyword'];
        $this->category->status=$request['status']==true? '1':'0';
        if($this->category->save()){
            return redirect('admin/category')->with('message','Category Added Successsfully');
        }else{
            return redirect('admin/category')->with('message','Sorry! Failed to add category');
        }


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
    public function edit(Category $category)
    {
        //
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryFormRequest $request, string $id)
    {
        //
        $this->category=Category::findOrFail($id);
        $validatedData=$request->validated();
          if($request->hasFile('image')){
            $destination=$this->category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('uploads/category/',$fileName);
            $validatedData['image']='uploads/category/'.$fileName;
        }

        if($this->category->update($validatedData)){
            return redirect('admin/category')->with('message','Category updated successfully');
        }else{
            return redirect('admin/category')->with('message','Sorry failed to update');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
