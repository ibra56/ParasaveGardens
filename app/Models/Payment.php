<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'payment_method',
        'amount',
        'payment_date',
        'currency',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
