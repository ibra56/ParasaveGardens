<?php

namespace App\Livewire\Finances;

use App\Models\FinancialCurrency;
use App\Models\FinancialExpense;
use App\Models\FinancialExpenseCategoryItem;
use Livewire\Attributes\Validate;
use Livewire\Component;


class NewExpenseItem extends Component
{
    public $newExpenseModal_isOpen = false;

    #[Validate('required|exists:financial_expense_category_items,id')]
    public $category_id;

    #[Validate('required|numeric|min:0')]
    public $amount;

    #[Validate("required|string|max:220")]
    public $description;

    #[Validate("required|date")]
    public $date_of_pay;

    // #[Validate("required|exists:financial_currencies,id")]
    // public $currency_id;


    // #[Validate("required|exists:users,id")]
    // public $paid_by;


    public function mount()
    {
        // $this->currency_id = FinancialCurrency::where('symbol', 'UGX')->first()->id;
        $this->date_of_pay = now()->format('Y-m-d');
    }
    public function render()
    {
        return view('livewire.finances.new-expense-item',[
            'financialCategories'=> FinancialExpenseCategoryItem::all(),
        ]);
    }

    
    public function createExpense()
    {
        $this->validate();
        // $rate = FinancialRate::first();
        // dd($rate->rate);
        FinancialExpense::create([
            'expense_category_item_id' => $this->category_id,
            'amount' => $this->amount,
            'narration' => $this->description ?? null,
            'date_of_payment' => $this->date_of_pay ?? null,
            // 'paid_by' => $this->paid_by ?? null,
            // 'rate_id' => $rate->id,
            // 'currency_id' => $this->currency_id,
            'created_by' => auth()->user()->id,
        ]);

        noty()->addSuccess('transaction saved');
        $this->reset();
        // $this->closeNewExpenseModal();
    }

    public function cancelExpense()
    {
        $this->reset();
        $this->mount();
    }
}
