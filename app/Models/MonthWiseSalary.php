<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthWiseSalary extends Model
{
    use HasFactory;
    protected $table = "tbl_month_wise_salary";
    protected $primaryKey = "id";
    protected $fillable = [
        'empId',
        'companyId',
        'sMonthId',
        //Payment Details
        'paymentCode',
        'paymentMode',
        'empBankId',
        'accountNo',
        'paySlipNote',
        // Salary check list
        'isSalaryStop',
        'isFullPay',
        'paidAmount',
        'balanceAmount',
        'disbursementDate',
        'balancePayDate',
        // Salary totals
        'GroossSalary',
        'DeductionSalary',
        'NetSalary',
        // Earning Component -1
        'BasicSalary',
        'HouseRentAllowance',
        'ConveyanceAllowance',
        'SpecialAllowance',
        'OtherAllowance',
        'Incentive',
        'SpotIncentive',
        'LeaveEncashment',
        'CSIIncentive',
        'SpecialBonus',
        'PerformanceBonus',
        'Bonus',
        'OtherSalary',
        'ArrearsSalary',
        //Deduction Component -2
        'ProvidentFund',
        'ESIC',
        'TDS',
        'OtherDeduction',
        'Loan',
        'MobileDeduction',
        'SalaryAdvance',
        'LatePresent',
        'SecurityDeposite',
        'ProfessionalTaxDeduction',
        //Other Component -3
        'PFWages',
        'PensionWage',
        'EPSEmployer',
        'EPFEmployer',
        'PFAdminCharge',
        'EDLIWage',
        'EDLIAdmin',
        'EDLIEmployer',
        'ESICWage',
        'ESICEmployer',
        'MasterGross',
        'PFControl',
        'status',
    ];
}