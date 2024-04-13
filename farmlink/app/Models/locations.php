<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locations extends Model
{
    use HasFactory;

    protected $fillable = [
        'district',
        'division',
        'county',
        'subcounty',
        'village',
    ];

    public function users(){
        $this->hasManyThrough(User::class, UserAddress::class) ;
    }
    
}
