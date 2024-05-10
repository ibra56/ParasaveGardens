<?php

namespace App\Livewire\Finances;

use App\Models\FinancialExpenseCategory;
use Livewire\Component;

class FinancialExpenseCatoriesList extends Component
{
    public function render()
    {
        return view('livewire.finances.financial-expense-catories-list',[
            'categories'=>FinancialExpenseCategory::all()
        ]);
    }

    public function showCategory($id){
        $cat = FinancialExpenseCategory::withTrashed()->find($id);
        return redirect(route('finances.expense_category.view',['category_slug' => $cat->slug]));
    }
}
