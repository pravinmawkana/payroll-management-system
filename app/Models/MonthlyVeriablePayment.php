<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyVeriablePayment extends Model
{
    use HasFactory;
    protected $table = "monthly_veriable_payments";
    protected $primaryKey = "id";
    protected $fillable=[
         'empId', 'companyId', 'sMonthId', 'remarks', 'hold_salary', 'OtherAllowance', 'Incentive', 'SpotIncentive', 'LeaveEncashment', 'CSIIncentive', 'SpecialBonus', 'PerformanceBonus', 'Bonus', 'OtherSalary', 'ArrearsSalary', 'TDS', 'OtherDeduction', 'Loan', 'MobileDeduction', 'SalaryAdvance', 'LatePresent', 'SecurityDeposite', 'PFControl', 'status'
    ];
}
