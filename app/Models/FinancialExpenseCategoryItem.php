<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialExpenseCategoryItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'financial_expense_category_id',
        'created_by',
    ];

    // public function category()
    // {
    //     return $this->belongsTo(FinancialCategory::class);
    // }

    public function financialExpenseCategory()
    {
        return $this->belongsTo(FinancialExpenseCategory::class);
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
