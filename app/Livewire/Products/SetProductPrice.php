<?php

namespace App\Livewire\Products;

use App\Models\Product;
use App\Models\ProductPrice;
use Livewire\Component;

class SetProductPrice extends Component
{
    public $product;
    public $setPriceModal_isOpen = false;
    public $price;

    public function openProductPriceModal(){
        $this->setPriceModal_isOpen = true;
    }

    public function closeProductPriceModal(){
        $this->setPriceModal_isOpen = false;
    }

    public function mount($product){
        $this->product = $product;
        $price = ProductPrice::where('product_id', $product->id)->first();
        $this->price = $price ? $price->price : null;
    }

    public function render()
    {
        return view('livewire.products.set-product-price');
    }

    public function savePrice()
    {
        $this->validate([
            'price' => 'required|numeric|min:0',
        ]);

        // delete the price one
        ProductPrice::where('product_id', $this->product->id)->delete();

        // Create a new price
        ProductPrice::create([
            'product_id' => $this->product->id,
            'price' => $this->price,
            'created_by' => auth()->user()->id,
        ]);

        noty()->addSuccess('price changed');
        $this->closeProductPriceModal();
    }

}
