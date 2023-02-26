<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveYear extends Model
{
    use HasFactory;
    protected $table = "leave_years";
    protected $primaryKey = "leaveYearId";
    protected $fillable=[
        'companyId', 'leave_year', 'status'
    ];
}
