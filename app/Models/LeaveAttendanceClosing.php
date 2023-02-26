<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveAttendanceClosing extends Model
{
    use HasFactory;
    protected $table = "leave_attendance_closings";
    protected $primaryKey = "id";
    protected $fillable=[
        'empId', 'companyId', 'sMonthId', 'days', 'week_off', 'paid_holidays', 'total_present', 'days_paid', 'lwp', 'absent', 'joinleft_absent', 'pl_opening', 'pl_increment', 'pl_availed', 'pl_encash', 'pl_closing', 'cl_opening', 'cl_increment', 'cl_availed', 'cl_closing', 'sl_opening', 'sl_increment', 'sl_availed', 'sl_closing', 'co_opening', 'co_increment', 'co_availed', 'co_closing', 'leave1_opening', 'leave1_increment', 'leave1_availed', 'leave1_closing', 'leave2_opening', 'leave2_increment', 'leave2_availed', 'leave2_closing', 'leave3_opening', 'leave3_increment', 'leave3_availed', 'leave3_closing', 'leave4_opening', 'leave4_increment', 'leave4_availed', 'leave4_closing', 'co_credit', 'ot_hours', 'late_marks', 'status'
    ];
}
