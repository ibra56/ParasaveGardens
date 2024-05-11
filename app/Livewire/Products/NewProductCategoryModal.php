<?php

namespace App\Livewire\Products;

use App\Models\ProductCategory;
use Livewire\Component;

class NewProductCategoryModal extends Component
{
    public $showNewCategoryModal = false;

    public $name;
    public $description;

    public function openNewCategoryModal()
    {
        $this->showNewCategoryModal = true;
    }

    public function closeNewCategoryModal()
    {
        $this->showNewCategoryModal = false;
    }

    public function render()
    {
        return view('livewire.products.new-product-category-modal');
    }

    public function createCategory()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);
        $category = ProductCategory::create([
            'name' => $this->name,
            'description' => $this->description ?? null,
        ]);
        noty()->addSuccess('Category created successfully');
        $this->closeNewCategoryModal();
        $this->reset();
    }
}
