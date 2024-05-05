<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_types_id',
        'name',
        'description',
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_types_id');
    }

    public function roomPrice()
    {
        return $this->hasOne(RoomPrice::class, 'room_id')->whereNull('deleted_at');
    }
 
}
