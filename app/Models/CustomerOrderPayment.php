<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerOrderPayment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        // 'customer_id',
        'staff_id',
        'transaction_date',
        'payment_id',
        'customer_order_id',
    ];

    // public function customer()
    // {
    //     return $this->belongsTo(Customer::class);
    // }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function customerOrder()
    {
        return $this->belongsTo(CustomerOrder::class);
    }
}
