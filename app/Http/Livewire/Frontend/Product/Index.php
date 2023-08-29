<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products;
    public $category;
    public $brandInputs=[];
    protected $queryString = ['brandInputs'];
    public function mount($category)
    {
        $this->category=$category;
    }
    public function render()
    {
        $this->products=Product::where('category_id',$this->category->id)
             ->when($this->brandInputs, function($query){
                $query->whereIn('brand',$this->brandInputs);
             })
             ->where('status','1')
             ->get();
        return view('livewire.frontend.product.index',[
            'products'=>$this->products,
            'category'=>$this->category,
        ]);
    }
}
