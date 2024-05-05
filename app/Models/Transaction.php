<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'staff_id',
        'transaction_date',
        'payment_id',
        'reservation_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
