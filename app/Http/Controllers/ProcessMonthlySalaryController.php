<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employeemaster;
use App\Jobs\ProcessMonthlySalaries;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;
use App\Events\SalaryCalculationProgressEvent;
use App\Models\EmployeeSalaryStructure;
use App\Models\LeaveAttendance;
use App\Models\LeaveAttendanceClosing;
use Illuminate\Support\Facades\Event;
use Dompdf\Dompdf;

class ProcessMonthlySalaryController extends Controller
{


    // public function handleSalaryCalculationProgress($progress)
    // {
    //     // Handle the salary calculation progress
    //     // Update the UI or perform any necessary actions based on the progress value

    //     // For example, you can echo the progress value
    //     echo "Progress: " . $progress . "%<br>";

    //     // Flush the output buffer to send the echoed content immediately
    //     ob_flush();
    //     flush();
    // } xzz
    public function ProcessMonthlySalary()
    {
        //PFWages =[Basic Salary]  if [Basic Salary]>15000 then  final=15000  end if  If [User Defined Other2]=1 then  Final=[Basic Salary]  End if
        $companyId = 1;
        $sMonthId = 1;
        // dispatch(new ProcessMonthlySalaries());

        $employeesCount = Employeemaster::where('companyId', $companyId)->count();
        // Create an instance of the job
        // $job = new ProcessMonthlySalaries($companyId, $sMonthId);

        // Manually dispatch the job
        // app(\Illuminate\Contracts\Bus\Dispatcher::class)->dispatch($job);

        echo "Salary calculation process started.";
        // Dispatch the job
        // ProcessMonthlySalaries::dispatch($companyId, $sMonthId)
        //     ->chain([
        //         function () {
        //             // Dispatch an event to indicate that the salary calculation has started
        //             Event::dispatch(new SalaryCalculationProgressEvent(0));
        //         }
        //     ]);
        // return redirect()->route('employeesalarystructure')->with('success', 'Salary calculation process started.');

        // return redirect()->back()->with('success', 'Salary calculation process started.');
        // Dispatch the job
        // ProcessMonthlySalaries::dispatch($companyId, $sMonthId);

        // return redirect()->back()->with('success', 'Salary calculation process started.');
        // return response()->json(['message' => 'Salary calculation process started.']);
        // $job = new ProcessMonthlySalaries($companyId, $sMonthId);

        // $consoleOutput = new ConsoleOutput();
        // $progressBar = new ProgressBar($consoleOutput, $employeesCount);
        // $progressBar->start();
        // dispatch(new ProcessMonthlySalaries($companyId, $sMonthId));
        // dispatch($job)->onQueue('default')->onConnection('database')->progress(function () use ($progressBar) {
        //     $progressBar->advance();
        // });

        // $progressBar->finish();
        // $consoleOutput->writeln("\nJob dispatched successfully.");


        // exit;
        $employees = Employeemaster::where('companyId', $companyId)->get();
        // foreach ($employees as $employee) {
        //     echo "Employee ID: " . $employee->empId . "<br>";
        //     echo "Employee Code: " . $employee->empCode . "<br>";
        //     echo "Employee Title: " . $employee->empTitle . "<br>";
        //     echo "Employee First Name: " . $employee->empFirstName . "<br>";
        //     echo "Employee Middle Name: " . $employee->empMiddleName . "<br>";
        //     echo "Employee Last Name: " . $employee->empLastName . "<br>";
        //     echo "Spouse Name: " . $employee->spouseName . "<br>";
        //     echo "Gender: " . $employee->gender . "<br>";
        //     echo "Date of Birth: " . $employee->dateOfBirth . "<br>";
        //     echo "Date of Joinning: " . $employee->dateOfJoinning . "<br>";
        //     echo "Date of Probation: " . $employee->dateOfProbation . "<br>";
        //     echo "Date of Confirmation: " . $employee->dateOfConfirmation . "<br>";
        //     echo "Is PF Applicable: " . $employee->isPFApplicable . "<br>";
        //     echo "PF Number: " . $employee->pfNo . "<br>";
        //     echo "PF Apply Date: " . $employee->pfApplyDate . "<br>";
        //     echo "UNA: " . $employee->UNA . "<br>";
        //     echo "Is ESIC Applicable: " . $employee->isESICApplicable . "<br>";
        //     echo "ESIC Number: " . $employee->ESICNo . "<br>";
        //     echo "Is PT Applicable: " . $employee->isPTApplicable . "<br>";
        //     echo "PAN: " . $employee->PAN . "<br>";
        //     echo "Branch ID: " . $employee->branchId . "<br>";
        //     echo "Grade ID: " . $employee->gradeId . "<br>";
        //     echo "Department ID: " . $employee->deptId . "<br>";
        //     echo "Designation ID: " . $employee->desigId . "<br>";
        //     echo "Division ID: " . $employee->divId . "<br>";
        //     echo "Unit ID: " . $employee->unitId . "<br>";
        //     echo "Project ID: " . $employee->projectId . "<br>";
        //     echo "Category ID: " . $employee->catgId . "<br>";
        //     echo "Payment Mode: " . $employee->paymentMode . "<br>";
        //     echo "Employee Bank ID: " . $employee->eBankId . "<br>";
        //     echo "Account Number: " . $employee->accountNo . "<br>";
        //     echo "Account Name: " . $employee->accountName . "<br>";
        //     echo "Aadhaar Number: " . $employee->adharNo . "<br>";
        //     echo "Reporting Head ID: " . $employee->reportingHeadId . "<br>";
        //     echo "Inserted By: " . $employee->insertedBy . "<br>";
        //     echo "Updated By: " . $employee->updatedBy . "<br>";
        //     echo "Reporting Manager ID: " . $employee->reportingManagerId . "<br>";
        //     echo "Group Joining Date: " . $employee->groupJoiningDate . "<br>";
        //     echo "Date of Leaving: " . $employee->dateOfLeaving . "<br>";
        //     echo "Registration Remarks: " . $employee->reginRemarks . "<br>";
        //     echo "Is Salary Processing: " . $employee->isSalaryProcessing . "<br>";
        //     echo "PF UNA Number: " . $employee->pfUNANo . "<br>";
        //     echo "Attendance Code: " . $employee->attendanceCode . "<br>";
        //     echo "Photo Path: " . $employee->photoPath . "<br>";
        //     echo "User Name: " . $employee->userName . "<br>";
        //     echo "User Password: " . $employee->userPassword . "<br>";
        //     echo "Security Code: " . $employee->securityCode . "<br>";
        //     echo "User Rights: " . $employee->userRights . "<br>";
        //     echo "Last Log On: " . $employee->lastLogOn . "<br>";
        //     echo "Restriction: " . $employee->ristriction . "<br>";
        //     echo "Restrict Sunday: " . $employee->ristrictSunday . "<br>";
        //     echo "Start Time: " . $employee->startTime . "<br>";
        //     echo "End Time: " . $employee->endTime . "<br>";
        //     echo "Change Password Status: " . $employee->changePassStatus . "<br>";
        //     echo "Change Password Date: " . $employee->changePassDate . "<br>";
        //     echo "Financial Year: " . $employee->financialYear . "<br>";
        //     echo "Company ID: " . $employee->companyId . "<br>";
        //     echo "Status: " . $employee->status . "<br>";
        //     echo "Created At: " . $employee->created_at . "<br>";
        //     echo "Updated At: " . $employee->updated_at . "<br>";
        //     echo "<br>";
        // }

        // dd($employees);
        // foreach ($employees as $employee) {
        //     foreach ($employee->getAttributes() as $key => $value) {
        //         echo $key . ": " . $value . "<br>";
        //     }
        //     echo "<br>";
        // }

        //Earning Allowance
        $basicSalary = 14000;
        $houseRentAllowance = 3000;
        $conveyanceAllowance = 0;
        $specialAllowance = 0;
        $otherAllowance = 0;
        $incentive = 0;
        $spotIncentive = 0;
        $leaveEncashment = 0;
        $csiIncentive = 0;
        $specialBonus = 0;
        $performanceBonus = 0;
        $bonus = 0;
        $otherSalary = 0;
        $arrearsSalary = 0;


        //Deduction Allowance
        $professionalTaxDeduction = 200; //$this->getProfessionalTax();

        //MasterGross=[M_Basic Salary]+[M_House Rent Allowance]+[M_Convayence Allowance]+[M_Special Allowance]
        $masterGross = $basicSalary + $houseRentAllowance + $conveyanceAllowance + $specialAllowance;

        $pfWages = $basicSalary;
        if ($basicSalary > 15000) {
            $pfWages = 15000;
        }

        //PensionWage=[PF Wages]  if [PF Wages]>15000 then  Final=15000  End if  if [Age]>=58 then  Final=0  End if
        $pensionWage = $pfWages;
        // if($this->getEmpAge()>=58)
        //     $pensionWage=0;


        //EPSEmployer=([Pension Wage])*8.33/100
        $epsEmployer = round(($pensionWage * 8.33) / 100);

        //EPFEmployer = A=[PF Wages]*12/100  Final=A - [EPS Employer]
        $epfEmployerA = ($pfWages * 12) / 100;
        $epfEmployer = round($epfEmployerA - $epsEmployer);

        //PFAdminCharge=[PF Wages]*0.85/100
        $pfAdminCharge = round(($pfWages * 0.85) / 100);

        //EDLIWage=[PF Wages]  if [PF Wages]>15000 then  Final=15000  End if
        $edliWage = $pfWages;
        if ($pfWages > 15000) {
            $edliWage = 15000;
        }

        //EDLIAdmin=[EDLI Wage]*0/100 need to check 
        $edliAdmin = ($edliWage * 0.1) / 100;

        //EDLIEmployer=[EDLI Wage]*0.5/100
        $edliEmployer = round(($edliWage * 0.5) / 100);

        //ESICWage=[GrossSalary]  check=[Gross_Salary_Structure]  if check>21000 then  if [CurrentMonth]=4 or [CurrentMonth]=10 then  Final=0  End if  End if
        $esicWage = $masterGross;
        $currentMonth = date('n');
        if ($esicWage > 21000) {
            if ($currentMonth == 4 || $currentMonth == 10) {
                $esicWage = 0;
            }
        }


        //ESICEmployer=([ESIC Wage]*3.25/100)+0.49
        $esicEmployer = round((($esicWage * 3.25) / 100) + 0.49);

        $pfControl = 0;


        //ProvidentFund=[PF Wages]*12/100
        $providentFund = round(($pfWages * 12) / 100);

        //Final=([ESIC Wage]*0.75/100)+0.49
        $esic = round((($esicWage * 0.75) / 100) + 0.49);
        $tds = 0;
        $otherDeduction = 0;
        $loan = 0;
        $mobileDeduction = 0;
        $salaryAdvance = 0;
        $latePresent = 0;
        //A=[Gross_Salary_Structure]/[days]  Final=(A/6)*[late_marks]
        $days = 30;
        $late_marks = 7;
        $latePresentA = $masterGross / $days;
        $latePresent = round(($latePresentA / 6) * $late_marks);
        $securityDeposite = 0;

        $grossSalary = $basicSalary + $houseRentAllowance + $conveyanceAllowance + $specialAllowance + $otherAllowance +
            $incentive + $spotIncentive + $leaveEncashment + $csiIncentive + $specialBonus + $performanceBonus +
            $bonus + $otherSalary + $arrearsSalary + $providentFund + $esic + $tds + $otherDeduction + $loan +
            $salaryAdvance + $mobileDeduction + $latePresent + $securityDeposite + $professionalTaxDeduction;

        $deductionSalary = $providentFund + $esic + $tds + $otherDeduction + $loan + $salaryAdvance + $mobileDeduction +
            $latePresent + $securityDeposite + $professionalTaxDeduction;

        $netSalary = $grossSalary - $deductionSalary;

        $data = '';
        $data .= "Basic Salary: " . $basicSalary . "<br>";
        $data .= "House Rent Allowance: " . $houseRentAllowance . "<br>";
        $data .= "Conveyance Allowance: " . $conveyanceAllowance . "<br>";
        $data .= "Special Allowance: " . $specialAllowance . "<br>";
        $data .= "Other Allowance: " . $otherAllowance . "<br>";
        $data .= "Incentive: " . $incentive . "<br>";
        $data .= "Spot Incentive: " . $spotIncentive . "<br>";
        $data .= "Leave Encashment: " . $leaveEncashment . "<br>";
        $data .= "CSI Incentive: " . $csiIncentive . "<br>";
        $data .= "Special Bonus: " . $specialBonus . "<br>";
        $data .= "Performance Bonus: " . $performanceBonus . "<br>";
        $data .= "Bonus: " . $bonus . "<br>";
        $data .= "Other Salary: " . $otherSalary . "<br>";
        $data .= "Arrears Salary: " . $arrearsSalary . "<br>";
        $data .= "D Provident Fund: " . $providentFund . "<br>";
        $data .= "O fp wage: " . $pfWages . "<br>";
        $data .= "O pension wage: " . $pensionWage . "<br>";
        $data .= "D ESIC: " . $esic . "<br>";
        $data .= "O EPF: " . $epfEmployer . "<br>";
        $data .= "O PF Admin Charge: " . $pfAdminCharge . "<br>";
        $data .= "O edli Admin Charge: " . $edliAdmin . "<br>";
        $data .= "O edli Wage: " . $edliWage . "<br>";
        $data .= "O edli Employer: " . $edliEmployer . "<br>";
        $data .= "O ESIC Wage: " . $esicWage . "<br>";
        $data .= "O ESIC Employer: " . $esicEmployer . "<br>";
        $data .= "O Master Gross: " . $masterGross . "<br>";


        $data .= "O EPS: " . $epsEmployer . "<br>";

        $data .= "TDS: " . $tds . "<br>";
        $data .= "Other Deduction: " . $otherDeduction . "<br>";
        $data .= "Loan: " . $loan . "<br>";
        $data .= "Salary Advance: " . $salaryAdvance . "<br>";
        $data .= "Mobile Deduction: " . $mobileDeduction . "<br>";
        $data .= "Late Present: " . $latePresent . "<br>";
        $data .= "Security Deposite: " . $securityDeposite . "<br>";
        $data .= "Professional Tax Deduction: " . $professionalTaxDeduction . "<br>";

        echo "<br/><pre>" . $this->getSalaryStructure(1) . "</pre>";
        echo "<br/>" . $this->getLeaveAttendaceClosing(1, 1);
        echo "<br/>" . $this->getLeaveAttendance(1, 1);

        exit;
        $data = [
            'employeeName' => 'John Doe',
            'employeeId' => '123',
            'basicSalary' => '5000',
            'taxes' => '1000',
            'generatedOn' => date('Y-m-d'),
        ];


        $html = view('PDF.salarySlip', $data)->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();
        $dompdf->stream('salary_slip.pdf', ['Attachment' => false]);




        return $data . "ProcessMonthlySalary" .  ' GroossSalary :- ' . $grossSalary . '<br/> ' . 'DeductionSalary' . $deductionSalary . '<br/>' . 'NetSalary' . $netSalary;
        // Return the calculated values
        // return response()->json([
        //     'GroossSalary' => $groossSalary,
        //     'DeductionSalary' => $deductionSalary,
        //     'NetSalary' => $netSalary,
        // Add more response data as needed
        // ]);
    }
    public function getSalaryStructure($empId)
    {
        $salaryStructure =  EmployeeSalaryStructure::where('empId', $empId)->first();

        if ($salaryStructure) {
            foreach ($salaryStructure->getAttributes() as $key => $value) {
                echo "$key: $value<br>";
            }
        } else {
            echo "No salary structure found for the employee.";
        }
        return $salaryStructure;
    }
    public function getLeaveAttendaceClosing($empId, $sMonthId)
    {
        $leaveClosing =  LeaveAttendanceClosing::where('sMonthId', $sMonthId)
            ->where('empId', $empId)
            ->first();

        if ($leaveClosing) {
            foreach ($leaveClosing->getAttributes() as $key => $value) {
                echo "$key: $value<br>";
            }
        } else {
            echo "No leave attendance closing found.";
        }
        return $leaveClosing;
    }
    public function getLeaveAttendance($empId, $sMonthId)
    {
        $leaveAttendance = LeaveAttendance::where('sMonthId', $sMonthId)
            ->where('empId', $empId)
            ->first();

        if ($leaveAttendance) {
            foreach ($leaveAttendance->getAttributes() as $key => $value) {
                echo "$key: $value<br>";
            }
        } else {
            echo "No leave attendance found.";
        }
        return $leaveAttendance;
    }
}
