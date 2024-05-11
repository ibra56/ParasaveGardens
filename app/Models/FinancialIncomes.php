<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialIncomes extends Model
{
    use HasFactory;

    protected $fillable = [
        'financial_category_item_id',
        'amount',
        'amount_usd',
        'narration',
        // 'paid_to',
        'date_of_pay',
        'created_by',
        'currency_id',
        'rate_id',
    ];

    public function financialCategory()
    {
        return $this->belongsTo(FinancialIncomeCategoryItem::class, 'financial_category_item_id');
    }

    public function recordedBy()
    {
        return $this->belongsTo(User::class, 'created_by')->withTrashed();
    }


    public function receivedBy()
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
