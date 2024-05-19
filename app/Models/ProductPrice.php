<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPrice extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'price',
        'created_by',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function createdBy(){
        return $this->belongsTo(User::class);
    }
}
