<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class FinancialExpenseCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'financial_expense_categories';

    protected $fillable = [
        'name',
        'slug',
        // 'sr_code',
        'description',
        'created_by',
    ];

    public function categoryItems()
    {
        return $this->hasMany(FinancialExpenseCategoryItem::class, 'financial_category_id');
    }

    protected static function booted()
    {
        static::deleting(function ($financialCategory) {
            $financialCategory->deleted_by = auth()->id();
            $financialCategory->save();
        });
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%' . $search . '%');
    }
}
