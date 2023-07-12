<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $category;
    public function destroyCategory($category_id){
        $this->category=$category_id;
    }

    public function deleteCategory(){
        $category=Category::find($this->category);
        $path='uploads/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        
        if($category->delete()){
            session()->flash('message','Category deleted successfully');
        }else{
            session()->flash('message','Sorry! Failed to perform this action');
        }

         $this->dispatchBrowserEvent('close-modal');
    }
    public function render()
    {
        $categories=Category::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.category.index',['categories'=>$categories]);
    }
}
