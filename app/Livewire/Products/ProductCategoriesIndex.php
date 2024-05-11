<?php

namespace App\Livewire\Products;

use App\Models\ProductCategory;
use Livewire\Component;

class ProductCategoriesIndex extends Component
{
    public function render()
    {
        return view('livewire.products.product-categories-index',[
            'productCategories' => ProductCategory::all()
        ]);
    }
}
