<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'budget_id',
        'financial_expense_category_id',
        'year_todate_budget',
        'year_todate_expense',
        'variance',
        'variance_percentage',
        'variance_explanation',
        'created_by',
        'currency_id',
        'rate_id',
    ];

    public function budget()
    {
        return $this->belongsTo(Budget::class)->withTrashed();
    }

    public function category()
    {
        return $this->belongsTo(FinancialExpenseCategory::class, 'financial_expense_category_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function currency()
    {
        return $this->belongsTo(FinancialCurrency::class, 'currency_id');
    }

    public function rate()
    {
        return $this->belongsTo(FinancialRate::class, 'rate_id');
    }

    public static function calculateExpenseDetails($detail, $totals  = ['budget' => 0, 'expense' => 0, 'variance' => 0]): array
    {
        if ($detail->budget->trashed()) {
            $totals['budget'] += $detail->year_todate_budget;
            $totals['expense'] += $detail->year_todate_expense;
            $totals['variance'] += $detail->variance;
            return [
                'expenseSum' => $detail->year_todate_expense,
                'variance' => $detail->variance,
                'variancePercentage' => $detail->variance_percentage,
            ];
        } else {
            // $startingDate = now()->startOfYear();
            $startingDate = Carbon::parse($detail->budget->opening_date)->startOfDay();
            $endingDate = Carbon::parse($detail->budget->closing_date)->endOfDay();
            $expenseSum = 0;

            $categoryItems = FinancialExpenseCategoryItem::where('financial_expense_category_id', $detail['financial_expense_category_id'])->get();
            $expenses = FinancialExpense::whereIn('financial_category_item_id', $categoryItems->pluck('id'))
                ->whereBetween('created_at', [$startingDate, $endingDate])
                ->get();

            foreach ($expenses as $expense) {
                if ($expense->currency_id == FinancialCurrency::where('symbol', 'UGX')->first()->id) {
                    $expenseSum += $expense->amount;
                } else {
                    $rate = FinancialRate::withTrashed()->find($expense->rate_id);
                    if ($rate->base_currency_id == $expense->currency_id) {
                        $expenseSum += $expense->amount * $rate->rate;
                    } else {
                        $expenseSum += $expense->amount / $rate->rate;
                    }
                }
            }

            $variance = $detail->year_todate_budget - $expenseSum;
            $variancePercentage = ($variance / $detail->year_todate_budget) * 100;

            $totals['budget'] += $detail->year_todate_budget;
            $totals['expense'] += $expenseSum;
            $totals['variance'] += $variance;

            return [
                'budget' => round($detail->year_todate_budget, 2),
                'expenseSum' => round($expenseSum, 2),
                'variance' => round($variance, 2),
                'variancePercentage' => round($variancePercentage, 2),
            ];
        }
    }
}
