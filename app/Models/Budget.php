<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Budget extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'prj_name',
        'prj_number',
        'slug',
        'prepared_by',
        'analysed_by',
        'approved_by',
        'project_id',
        'closing_date',
        'opening_date',
    ];

    public function preparedBy()
    {
        return $this->belongsTo(User::class, 'prepared_by')->withTrashed();
    }

    public function analysedBy()
    {
        return $this->belongsTo(User::class, 'analysed_by', 'id')->withTrashed();
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by', 'id')->withTrashed();
    }

    public function budgetDetails()
    {
        return $this->hasMany(BudgetDetails::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
