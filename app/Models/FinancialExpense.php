<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialExpense extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'expense_category_item_id',
        'amount',
        'narration',
        'date_of_payment',
        // 'paid_by',
        // 'currency_id',
        // 'rate_id',
        'created_by',
        'approved_by',
    ];

    protected static function booted()
    {
        static::creating(function ($expense) {
            $expense->deleted_at = now();
        });

        static::restored(function ($expense) {
            $expense->approved_by = auth()->user()->id; 
            $expense->save();
        });
    }

    public function financialcategory()
    {
        return $this->belongsTo(FinancialExpenseCategoryItem::class, 'financial_category_item_id', 'id');
    }

    public function recordedBy()
    {
        return $this->belongsTo(User::class, 'created_by')->withTrashed();
    }

    public function paidBy()
    {
        return $this->belongsTo(User::class, 'created_by')->withTrashed();
    }

    public function currency()
    {
        return $this->belongsTo(FinancialCurrency::class, 'currency_id');
    }

    public function rate()
    {
        return $this->belongsTo(FinancialRate::class, 'rate_id');
    }
}
