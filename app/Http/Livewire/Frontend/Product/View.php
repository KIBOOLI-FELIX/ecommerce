<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class View extends Component
{
    public $category,$productColorQuantity;
    public $product;
    public function colorSelected($productColorId){
        // dd($productColorId);
        $productColor=$this->product->productColors()->where('id',$productColorId)->first();
        $this->productColorQuantity = $productColor->quantity;

        if($this->productColorQuantity == 0){
            $this->productColorQuantity = 'outOfStock';
        }
    }
    public function mount($category,$product)
    {
        $this->category=$category;
        $this->category=$product;
    }
    public function render()
    {
        return view('livewire.frontend.product.view',[
            'category'=>$this->category,
            'product'=>$this->product
        ]);
    }
}
