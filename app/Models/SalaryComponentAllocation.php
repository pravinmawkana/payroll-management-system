<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryComponentAllocation extends Model
{
    use HasFactory;
    protected $table = "salary_component_allocations";
    protected $primaryKey = "comptId";
    protected $fillable=[
        'calcCode',
        'calcType',
        'comptName',
        'comptDesc',
        'cTypeId',
        'comptFormula',
        'calcAttendance',
        'consdWeekOff',
        'consdPubHoliday',
        'roundOff',
        'printIfZero',
        'printOrder',
        'tdsHead',
        'calcOrder',
        'companyId',
        'examptionLimit',
        'status'
    ];
}
