<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialIncomeCategoryItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'sr_code',
        'description',
        'financial_income_category_id',
        'created_by',
    ];

    // public function category()
    // {
    //     return $this->belongsTo(FinancialCategory::class);
    // }

    public function financialIncomeCategory(){
        return $this->belongsTo(FinancialIncomeCategory::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($financialSubcategory) {
            $financialSubcategory->deleted_by = auth()->user()->id;
            $financialSubcategory->save();
        });

        static::restoring(function ($financialSubcategory) {
            $financialSubcategory->deleted_by = null;
            $financialSubcategory->save();
        });
    }
}
