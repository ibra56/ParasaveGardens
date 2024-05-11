<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductsList extends Component
{
    public function render()
    {
        return view('livewire.products.products-list',[
            'products' => Product::all()
        ]);
    }
}
