<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'customer_id',
        'staff_id',
        'currency_id',
        'room_price_id',
        'reservation_date',
        'checkin_date',
        'checkout_date',
        'number_of_people',
        'number_of_days',
        'custom_price',
        'uuid',
        'room_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = uniqid();
        });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function roomPrice()
    {
        return $this->belongsTo(RoomPrice::class)->withTrashed();
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function room(){
        return $this->belongsTo(Room::class)->withTrashed();
    }
}
