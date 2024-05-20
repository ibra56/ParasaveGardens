<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerOrder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'customer_id',
        'table_number',
        'order_date',
        'status',
        'payment_method',
        'total_amount',
        'discount',
        'tax',
        'tip',
        'payment_status',
        'server_id',
    ];

    public function servedBy(){
        return $this->belongsTo(User::class, 'server_id')->withTrashed();
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function items(){
        return $this->hasMany(CustomerOrderItem::class)->withTrashed();
    }
    public function servedItems(){
        return $this->hasMany(CustomerOrderItem::class)->withTrashed()->where('preparation_status','served');
    }
    
}
