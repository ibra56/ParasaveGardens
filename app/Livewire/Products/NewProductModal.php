<?php

namespace App\Livewire\Products;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Attributes\Validate;
use Livewire\Component;

class NewProductModal extends Component
{
    public $showNewProductModal = false;

    #[Validate('required|string')]
    public $name;

    #[Validate('sometimes|nullable|string')]
    public $description;
    public $is_sellable;
    public $is_buyable;
    public $is_manufacturable;

    #[Validate('required|exists:product_categories,id')]
    public $category_id;

    public function openNewProductModal()
    {
        $this->showNewProductModal = true;
    }

    public function closeNewProductModal()
    {
        $this->showNewProductModal = false;
    }

    public function render()
    {
        return view('livewire.products.new-product-modal', [
            'categories' => ProductCategory::all()
        ]);
    }

    public function createProduct()
    {
        $this->validate();

        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'is_sellable' => $this->is_sellable,
            'is_buyable' => $this->is_buyable,
            'is_manufacturable' => $this->is_manufacturable,
            'product_category_id' => $this->category_id
        ]);

        noty()->addSuccess('Product created successfully');
        $this->closeNewProductModal();
        $this->reset();
    }
}
