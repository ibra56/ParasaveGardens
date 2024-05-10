<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialCurrency extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable =[
        'name',
        'symbol',
        'created_by',
    ];


    public function rates()
    {
        return $this->hasMany(FinancialRate::class);
    }


}
