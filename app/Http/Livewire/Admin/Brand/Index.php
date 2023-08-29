<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $name;
    public $slug;
    public $status;
    public $brand_id;
    public $category_id;

    public function rules()
    {
        return [
            'name'=>'required|string',
            'slug'=>'required|string',
            'category_id'=>'required|integer',
            'status'=>'nullable'
        ];
    }

    public function resetFields()
    {
        $this->name=NULL;
        $this->slug=NULL;
        $this->status=NULL;
        $this->brand_id=NULL;
        $this->category_id=NULL;
    }
    public function saveBrand()
    {
        $validatedData=$this->validate();
        Brand::create([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status==true ? '1':'0',
            'category_id'=>$this->category_id,
        ]);

        session()->flash('message','brand added successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetFields();
    }

    public function closeModal()
    {
        $this->resetFields();
    }
    public function openModal()
    {
        $this->resetFields();
    }

    public function updateBrand(int $brand_id)
    {
        $this->brand_id=$brand_id;
        $brand=Brand::findOrFail($brand_id);
        $this->name=$brand->name;
        $this->status=$brand->status;
        $this->slug=$brand->slug;
        $this->category_id=$brand->category_id;
    }
    public function updateStoreBrand(){
        $validatedData=$this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status==true ? '1':'0',
             'category_id'=>$this->category_id,
        ]);

        session()->flash('message','brand updated successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetFields();
    }

    public function destroyBrand($brand_id)
    {
        $this->brand_id=$brand_id;
    }
    public function deleteBrand()
    {
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message','brand deleted successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetFields();
    }
    public function render()
    {
        $categories=Category::where('status','1')->get();
        $brands=Brand::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brand.index',compact('brands','categories'))
                    ->extends('layouts.admin')
                    ->section('content');
    }
}
