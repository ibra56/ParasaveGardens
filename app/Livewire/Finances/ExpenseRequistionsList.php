<?php

namespace App\Livewire\Finances;

use App\Models\FinancialExpense;
use App\Models\FinancialExpenseCategory;
use App\Models\FinancialExpenseCategoryItem;
use Livewire\Component;
use Livewire\WithPagination;

class ExpenseRequistionsList extends Component
{
    use WithPagination;

    public $filtersModal_isOpen = false;

    public $from_date;
    public $to_date;

    public $category = "";
    public $perPage = 100;
    public $sort_by = "created_at";
    public $sort_dir = "desc";

    public function mount()
    {
        $this->from_date = now()->subDays(30)->format('Y-m-d');
        $this->to_date = now()->addDays(1)->format('Y-m-d');
    }

    public function sortBy($field)
    {
        if ($this->sort_by === $field) {
            $this->sort_dir = $this->sort_dir === "asc" ? "desc" : "asc";
        } else {
            $this->sort_by = $field;
            $this->sort_dir = "asc";
        }
    }

    public function render()
    {
        return view('livewire.finances.expense-requistions-list', [
            'expenses' => FinancialExpense::onlyTrashed()->with('financialcategory')->with('paidBy')
                ->whereBetween('created_at', [$this->from_date, $this->to_date])
                ->when($this->category !== "", function ($query) {
                    return $query->where('expense_category_item_id', $this->category);
                })
                ->orderBy($this->sort_by, $this->sort_dir)->paginate($this->perPage),
            'categories' => FinancialExpenseCategoryItem::whereIn('financial_expense_category_id', FinancialExpenseCategory::pluck('id'))->get(),
        ]);
    }

    public function openFiltersModal()
    {
        $this->filtersModal_isOpen = true;
    }

    public function closeFiltersModal()
    {
        $this->filtersModal_isOpen = false;
    }

    public function approveExpense($id)
    {
        $expense = FinancialExpense::onlyTrashed()->find($id);
        $expense->approved_by = auth()->user()->id;
        $expense->save();
        $expense->restore();
        noty()->addSuccess('Requisition Approved Successfully');
    }

    public function declineExpense($id)
    {
        $expense = FinancialExpense::onlyTrashed()->find($id);
        $expense->forceDelete();
        noty()->addWarning('Requisition Declined Successfully');
    }
}
