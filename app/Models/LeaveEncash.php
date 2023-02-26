<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveEncash extends Model
{
    use HasFactory;
    protected $table = "leave_encashes";
    protected $primaryKey = "id";
    protected $fillable=[
       'leaveTypeId', 'empId', 'companyId', 'sMonthId', 'payment_date', 'days', 'last_drwn_month', 'amount', 'last_drwn_salary', 'make_supplementary', 'full_n_final', 'status'
    ];
}
