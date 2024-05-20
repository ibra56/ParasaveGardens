<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerOrderItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'customer_order_id',
        'product_id',
        'quantity',
        'item_price',
        'special_requests',
        'preparation_status',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
