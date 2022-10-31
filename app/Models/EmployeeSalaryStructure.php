<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalaryStructure extends Model
{
    use HasFactory;
    protected $table = "tblsalarystructure";
    protected $primaryKey = "sStructId";
    protected $fillable=[
        'empId',
        'companyId',
        'sStructDate',
        'GroossSalary',
        'DeductionSalary',
        'NetSalary',
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
        'status'

    ];

}
