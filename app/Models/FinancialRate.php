<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialRate extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable =[
        'base_currency_id',
        'target_currency_id',
        'rate',
        'created_by',
    ];

    public function baseCurrency()
    {
        return $this->belongsTo(FinancialCurrency::class, 'base_currency_id');
    }

    public function targetCurrency()
    {
        return $this->belongsTo(FinancialCurrency::class, 'target_currency_id');
    }
}
