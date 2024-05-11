<?php

namespace App\Livewire\Finances;

use App\Models\FinancialExpenseCategory;
use Livewire\Component;
use Illuminate\Support\Str;

class NewExpenseCategoryModel extends Component
{
    public $newCategoryModal_isOpen = false;
    // #[Validate('required|string|unique:financial_categories,name')]
    public $name;
    // #[Validate('required|string')]  
    public $description;
    public function openNewCategoryModal()
    {
        $this->newCategoryModal_isOpen = true;
    }
    public function closeNewCategoryModal()
    {
        $this->newCategoryModal_isOpen = false;
    }
    public function render()
    {
        return view('livewire.finances.new-expense-category-model');
    }

    public function createCategory()
    {
        $this->validate(
            [
                'name' => 'required|string',
                'description' => 'sometimes|nullable|string',
            ]
        );
        FinancialExpenseCategory::create([
            'name' => $this->name,
            'description' => $this->description,
            'slug' => Str::slug($this->name),
            'created_by' => auth()->user()->id,
        ]);

        $this->reset('name', 'description');

        noty()->addSuccess('Financial Category created successfully');

        $this->closeNewCategoryModal();
    }
}
