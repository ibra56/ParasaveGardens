<?php

namespace App\Livewire\Finances;

use App\Models\FinancialExpenseCategory;
use Livewire\Component;
use Illuminate\Support\Str;

class EditExpenseCategoryModal extends Component
{
    public $editCategoryModal_isOpen = false;
    public $category;
    public $name;
    public $description;

    public function openEditCategoryModal()
    {
        $this->editCategoryModal_isOpen = true;
    }
    public function closeEditCategoryModal()
    {
        $this->editCategoryModal_isOpen = false;
    }
    public function mount($category)
    {
        $this->category = FinancialExpenseCategory::findOrFail($category->id);
        $this->name = $category->name;
        $this->description = $category->description;
    }

    public function render()
    {
        return view('livewire.finances.edit-expense-category-modal');
    }
    public function updateCategory()
    {
        $this->validate(
            [
                'name' => 'required|string',
                'description' => 'sometimes|nullable|string',
            ],
            [
                'name' => 'Name / Title is required',
                'description' => 'Description',
            ]
        );
        $this->category->update([
            'name' => $this->name,
            'description' => $this->description ?? null,
            'slug' => Str::slug($this->name),
        ]);

        noty()->addSuccess('Financial Category updated successfully');

        $this->closeEditCategoryModal();
    }
}
