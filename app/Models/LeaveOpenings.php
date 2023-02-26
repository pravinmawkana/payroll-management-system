<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveOpenings extends Model
{
    use HasFactory;
    protected $table = "leave_openings";
    protected $primaryKey = "leaveOpeningId";
    protected $fillable=[
        'leaveYearId', 'empId', 'companyId', 'pl_opening', 'pl_curryear', 'pl_prorata', 'sl_opening', 'sl_curryear', 'sl_prorata', 'cl_opening', 'cl_curryear', 'cl_prorata', 'co_opening', 'co_curryear', 'co_prorata', 'ol1_opening', 'ol1_curryear', 'ol1_prorata', 'ol2_opening', 'ol2_curryear', 'ol2_prorata', 'ol3_opening', 'ol3_curryear', 'ol3_prorata', 'ol4_opening', 'ol4_curryear', 'ol4_prorata', 'status'
    ];
}
