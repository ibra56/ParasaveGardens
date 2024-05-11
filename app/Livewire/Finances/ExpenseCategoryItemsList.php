<?php

namespace App\Livewire\Finances;

use App\Models\FinancialExpenseCategory;
use App\Models\FinancialExpenseCategoryItem;
use Livewire\Component;

class ExpenseCategoryItemsList extends Component
{
    public $category;
    public $perPage = 10;


    public function mount($category_slug)
    {
        // dd($category_slug);

        $this->category = FinancialExpenseCategory::where('slug', $category_slug)->firstOrFail();
        // $this->category = FinancialExpenseCategory::all();
    }
    public function render()
    {
        return view('livewire.finances.expense-category-items-list',[
            'category'=>$this->category,
            'categoryItems' =>  FinancialExpenseCategoryItem::withTrashed()->where('financial_expense_category_id', $this->category->id)->paginate($this->perPage)
        ]);
    }
}
