<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlySupplementaryPayment extends Model
{
    use HasFactory;
    protected $table = "monthly_supplementary_payments";
    protected $primaryKey = "id";
    protected $fillable=[
        'empId', 'companyId', 'sMonthId', 'paymentCode', 'payment_based_month', 'payment_based_year', 'payment_days', 'restrict_pension', 'restrict_pt', 'remarks', 'GroossSalary', 'DeductionSalary', 'NetSalary', 'BasicSalary', 'HouseRentAllowance', 'ConveyanceAllowance', 'SpecialAllowance', 'OtherAllowance', 'Incentive', 'SpotIncentive', 'LeaveEncashment', 'CSIIncentive', 'SpecialBonus', 'PerformanceBonus', 'Bonus', 'OtherSalary', 'ArrearsSalary', 'ProvidentFund', 'ESIC', 'TDS', 'OtherDeduction', 'Loan', 'MobileDeduction', 'SalaryAdvance', 'LatePresent', 'SecurityDeposite', 'ProfessionalTaxDeduction', 'PFWages', 'PensionWage', 'EPSEmployer', 'EPFEmployer', 'PFAdminCharge', 'EDLIWage', 'EDLIAdmin', 'EDLIEmployer', 'ESICWage', 'ESICEmployer', 'MasterGross', 'PFControl', 'status'
    ];
}
