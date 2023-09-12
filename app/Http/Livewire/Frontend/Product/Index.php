<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products;
    public $category;
    public $brandInputs=[];
    public $priceInput;
    protected $queryString = [
        'brandInputs'=>['except' => '', 'as' => 'brand'],
        'priceInput'=>['except' => '', 'as' => 'price'],
    ];
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
              ->when($this->priceInput, function($query){
                 $query->when($this->priceInput=='high-to-low', function($query2){
                    $query2->orderBy('selling_price','DESC');
                    })
                    ->when($this->priceInput=='low-to-high', function($query2){
                    $query2->orderBy('selling_price','ASC');
                    });
              })
             ->where('status','1')
             ->get();
        return view('livewire.frontend.product.index',[
            'products'=>$this->products,
            'category'=>$this->category,
        ]);
    }
}
