<?php

namespace App\Livewire\Finances;

use App\Models\FinancialExpenseCategoryItem;
use Livewire\Component;

use Illuminate\Support\Str;


class EditExpenseCategoryItem extends Component
{

    public $categoryItem;

    public $editCategoryModal_isOpen = false;

    public $name;
    public $description;
    public $sr_code;

    public function mount($categoryItem)
    {
        $this->categoryItem = FinancialExpenseCategoryItem::findOrFail($categoryItem->id);

        $this->name = $categoryItem->name;
        $this->description = $categoryItem->description;
        $this->sr_code = $categoryItem->sr_code;
    }

    public function render()
    {
        return view('livewire.finances.edit-expense-category-item');
    }


    public function openEditCategoryModal()
    {
        $this->editCategoryModal_isOpen = true;
    }

    public function closeEditCategoryModal()
    {
        $this->editCategoryModal_isOpen = false;
    }

    public function updateCategoryItem()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $this->categoryItem->update([
            'name' => $this->name,
            'description' => $this->description,
            'slug' => Str::slug($this->name),
        ]);

        noty()->addSuccess('Category Item updated successfully');

        $this->closeEditCategoryModal();
    }
}
