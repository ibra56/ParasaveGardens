<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'supplier_id',
        'supplier_reference',
        'expected_arrival_date',
        'order_deadline_date',
        'sent_date',
        'created_by',
        'staff_notes',
        'received_date',
    ];


    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }


    public function responsibleStaff()
    {
        return $this->belongsTo(User::class, 'created_by', 'id')->withTrashed();
    }

    public function purchaseOrderItems(){
        return $this->hasMany(PurchaseOrderItem::class);
    }

}
