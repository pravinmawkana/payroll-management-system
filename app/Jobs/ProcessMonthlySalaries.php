<?php

namespace App\Jobs;

use App\Events\SalaryCalculationProgressEvent;
use App\Models\Employeemaster;
use App\Models\EmployeeSalaryStructure;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessMonthlySalaries implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $companyId;
    private $sMonthId;

    public function __construct($companyId, $sMonthId)
    {
        $this->companyId = $companyId;
        $this->sMonthId = $sMonthId;
    }

    public function handle()
    {
        $employees = Employeemaster::where('companyId', $this->companyId)->get();
        $totalEmployees = $employees->count();
        $processedEmployees = 0;
        foreach ($employees as $employee) {
            // $salaryStructure = EmployeeSalaryStructure::where('empId', $employee->empId)->first();
            $salaryStructure = EmployeeSalaryStructure::where('empId', $employee->empId)
                ->where('sMonthId', $this->sMonthId)
                ->first();

            // Perform the salary calculation based on the formulas
            $basicSalary = $salaryStructure->BasicSalary;
            $houseRentAllowance = $salaryStructure->HouseRentAllowance;
            $conveyanceAllowance = $salaryStructure->ConveyanceAllowance;
            $specialAllowance = $salaryStructure->SpecialAllowance;
            $otherAllowance = $salaryStructure->OtherAllowance;
            $incentive = $salaryStructure->Incentive;
            $spotIncentive = $salaryStructure->SpotIncentive;
            $leaveEncashment = $salaryStructure->LeaveEncashment;
            $csiIncentive = $salaryStructure->CSIIncentive;
            $specialBonus = $salaryStructure->SpecialBonus;
            $performanceBonus = $salaryStructure->PerformanceBonus;
            $bonus = $salaryStructure->Bonus;
            $otherSalary = $salaryStructure->OtherSalary;
            $arrearsSalary = $salaryStructure->ArrearsSalary;
            $providentFund = $salaryStructure->ProvidentFund;
            $esic = $salaryStructure->ESIC;
            $tds = $salaryStructure->TDS;
            $otherDeduction = $salaryStructure->OtherDeduction;
            $loan = $salaryStructure->Loan;
            $mobileDeduction = $salaryStructure->MobileDeduction;
            $salaryAdvance = $salaryStructure->SalaryAdvance;
            $latePresent = $salaryStructure->LatePresent;
            $securityDeposite = $salaryStructure->SecurityDeposite;

            // Salary calculation formulas
            $professionalTaxDeduction = 200;

            $masterGross = $basicSalary + $houseRentAllowance + $conveyanceAllowance + $specialAllowance;

            $pfWages = $basicSalary;
            if ($basicSalary > 15000) {
                $pfWages = 15000;
            }

            $pensionWage = $pfWages;

            $epfEmployer = round(($pensionWage * 8.33) / 100);

            $epfEmployerA = ($pfWages * 12) / 100;
            $epfEmployer = round($epfEmployerA - $epfEmployer);

            $pfAdminCharge = round(($pfWages * 0.65) / 100);

            $edliWage = $pfWages;
            if ($pfWages > 15000) {
                $edliWage = 15000;
            }

            $edliAdmin = 0;

            $edliEmployer = round(($edliWage * 0.5) / 100);

            $esicWage = $masterGross;
            $currentMonth = date('n');
            if ($esicWage > 21000) {
                if ($currentMonth == 4 || $currentMonth == 10) {
                    $esicWage = 0;
                }
            }

            $esicEmployer = (($esicWage * 3.25) / 100) + 0.49;

            $pfControl = 0;

            $providentFund = round(($pfWages * 12) / 100);

            $esic = round((($esicWage * 0.75) / 100) + 0.49);
            $tds = 0;
            $otherDeduction = 0;
            $loan = 0;
            $mobileDeduction = 0;
            $salaryAdvance = 0;
            $latePresent = 0;
            $securityDeposite = 0;

            $grossSalary = $basicSalary + $houseRentAllowance + $conveyanceAllowance + $specialAllowance + $otherAllowance +
                $incentive + $spotIncentive + $leaveEncashment + $csiIncentive + $specialBonus + $performanceBonus +
                $bonus + $otherSalary + $arrearsSalary + $providentFund + $esic + $tds + $otherDeduction + $loan +
                $salaryAdvance + $mobileDeduction + $latePresent + $securityDeposite + $professionalTaxDeduction;

            $deductionSalary = $providentFund + $esic + $tds + $otherDeduction + $loan + $salaryAdvance + $mobileDeduction +
                $latePresent + $securityDeposite + $professionalTaxDeduction;

            $netSalary = $grossSalary - $deductionSalary;

            // Update the salary attributes in the salary structure model
            $salaryStructure->GroossSalary = $grossSalary;
            $salaryStructure->DeductionSalary = $deductionSalary;
            $salaryStructure->NetSalary = $netSalary;

            $salaryStructure->save();

            $processedEmployees++;

            // Calculate the progress percentage
            $progress = ($processedEmployees / $totalEmployees) * 100;

            // Dispatch an event to update the progress
            // event(new SalaryCalculationProgressEvent($progress));
        }
    }
}
