<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveAttendance extends Model
{
    use HasFactory;
    protected $table = "leave_attendances";
    protected $primaryKey = "id";
    protected $fillable=[
        'empId',
        'companyId',
        'sMonthId',
        'days',
        'week_off',
        'paid_holidays',
        'total_present',
        'days_paid',
        'lwp',
        'absent',
        'joinleft_absent',
        'pl_availed',
        'cl_availed',
        'sl_availed',
        'co_availed',
        'co_credit',
        'ot_hours',
        'late_marks',
        'l1_availed',
        'l2_availed',
        'l3_availed',
        'l4_availed',
        'status'

    ];
}
