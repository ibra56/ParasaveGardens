<?php

namespace App\Livewire\Finances;

use App\Models\FinancialExpenseCategory;
use App\Models\FinancialExpenseCategoryItem;
use Livewire\Attributes\Validate;
use Livewire\Component;

use Illuminate\Support\Str;


class NewExpenseCategoryItem extends Component
{

    public $financialCategory;
    public $newCategoryItemModal_isOpen = false;

    #[Validate('required|string')]
    public $name;
    #[Validate('nullable|sometimes|string')]
    public $description;


    public function mount($category)
    {
        $this->financialCategory = FinancialExpenseCategory::findOrFail($category->id);
    }
    public function render()
    {
        return view('livewire.finances.new-expense-category-item');
    }

    public function openNewCategoryItemModal()
    {
        $this->newCategoryItemModal_isOpen = true;
    }

    public function closeNewCategoryItemModal()
    {
        $this->newCategoryItemModal_isOpen = false;
    }

    public function createCategoryItem()
    {
        $this->validate();

        FinancialExpenseCategoryItem::create([
            'name' => $this->name,
            'description' => $this->description ?? null,
            'financial_expense_category_id' => $this->financialCategory->id,
            'slug' => Str::slug($this->name),
            'created_by' => auth()->user()->id,
        ]);

        $this->reset('name', 'description');
        noty()->addSuccess('Category Item created successfully');
        $this->closeNewCategoryItemModal();
    }
}
