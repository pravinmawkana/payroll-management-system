<?php

namespace App\Http\Controllers;
use App\Models\TblemployeedetailsModel;
use App\Models\SalaryComponentAllocation;
use App\Models\EmployeeSalaryStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;
class EmployeeSalaryStructureController extends Controller
{
    //
     public function index(Request $request){

        return view('employeesalarystructure');

    }
    public function displayRecords(Request $request){
        $salaryEarningComponet = TblemployeedetailsModel::all()->where('status','=',1)->where('companyId','=',1);
        // $salaryDeductionComponet = SalaryComponentAllocation::all()->where('status','=',1)->where('cTypeId','=',2);
        // $salaryOtherComponet = SalaryComponentAllocation::all()->where('status','=',1)->where('cTypeId','=',3);
        //print_r($salaryEarningComponet);


        $responseEarning = "";

        if($salaryEarningComponet->count()>0){
            $responseEarning.='';
                        foreach ($salaryEarningComponet as $row) {
                            $empName = $row['empTitle'].' '.$row['empFirstName'].' '.$row['empLastName'];
                                $responseEarning.= '
                                            <tr>
                                            <td>'.$row['empCode'].'</td>
                                            <td>'.$empName.'</td>'.
                                            '<td>'.$row['branchId'].'</td>'.
                                            '<td><input type="button" value="Edit" onclick='."editData('1','EditStructure',".$row['empId'].",'".$row['empCode']."','".$row['empFirstName'].$row['empLastName']."')" .' class="btn btn-warning"></td>
                                            <td><input type="button" value="View Employee" onclick='."editData('0','ViewEmploye',".$row['empId'].")" .' class="btn"></td>
                                            </tr>';
                        }
        }else{
            $responseEarning.='<h1 class="text-center"> No Records</h1>';
        }

        $earning = $responseEarning;

        // $response = array();

        // $response[] = array(
        //     "Earning"=>$earning,
        //     "Deduction"=>$deduction,
        //     "Other"=>$other
        // );
        return $earning;
    }
    public function getSalaryComponent(Request $request){
        $earning = SalaryComponentAllocation::all()->where('status','=',1)->where('companyId','=',1)->where('cTypeId','=',$request->componentType);
        $response='';
        if($earning->count()>0){
            $response.='';
                        foreach ($earning as $row) {
                                $readonly='';
                                if($row['calcType']!='Fixed')
                                {
                                    $readonly='readonly';
                                }
                                $response.= '<div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="'.$row['calcCode'].'">'.$row['comptName'].'</label>
                                                    <input type="text"  value="0" onblur="calculation()" class="form-control" id="'.$row['calcCode'].'" name="'.$row['calcCode'].'" placeholder="Enter '.$row['comptName'].'" required '.$readonly.'>
                                                </div>
                                            </div>
                                            ';
                        }
        }else{
            $response.='<h1 class="text-center"> No Records</h1>';
        }
        return $response;
    }
    public function edit(Request $request){
            //echo $request->cNameId;
             $empSalaryStructure = EmployeeSalaryStructure::find($request->empId);
            //return $salarycomponentallocation->count();

             return response()->json($empSalaryStructure);


    }
    public function store(Request $request){
        $validator = "";
        $empSalaryStructure = "";
        $sStructId = $request->rowId;
            //print_r($_POST);
            $empSalaryStructureData = [
            'GroossSalary' => $request->GroossSalary,
            'DeductionSalary' => $request->DeductionSalary,
            'NetSalary' => $request->NetSalary,
            'BasicSalary' => $request->BasicSalary,
            'HouseRentAllowance' => $request->HouseRentAllowance,
            'ConveyanceAllowance' => $request->ConveyanceAllowance,
            'SpecialAllowance' => $request->SpecialAllowance,
            'OtherAllowance' => $request->OtherAllowance,
            'Incentive' => $request->Incentive,
            'SpotIncentive' => $request->SpotIncentive,
            'LeaveEncashment' => $request->LeaveEncashment,
            'CSIIncentive' => $request->CSIIncentive,
            'companyId' => $request->session()->get('companyId'),
            'SpecialBonus' => $request->SpecialBonus,
            'PerformanceBonus' => $request->PerformanceBonus,
            'Bonus' => $request->Bonus,
            'OtherSalary' => $request->OtherSalary,
            'ArrearsSalary' => $request->ArrearsSalary,
            'ProvidentFund' => $request->ProvidentFund,
            'ESIC' => $request->ESIC,
            'TDS' => $request->TDS,
            'OtherDeduction' => $request->OtherDeduction,
            'Loan' => $request->Loan,
            'MobileDeduction' => $request->MobileDeduction,
            'SalaryAdvance' => $request->SalaryAdvance,
            'LatePresent' => $request->LatePresent,
            'SecurityDeposite' => $request->SecurityDeposite,
            'ProfessionalTaxDeduction' => $request->ProfessionalTaxDeduction,
            'PFWages' => $request->PFWages,
            'PensionWage' => $request->PensionWage,
            'EPSEmployer' => $request->EPSEmployer,
            'EPFEmployer' => $request->EPFEmployer,
            'PFAdminCharge' => $request->PFAdminCharge,
            'EDLIWage' => $request->EDLIWage,
            'EDLIAdmin' => $request->EDLIAdmin,
            'EDLIEmployer' => $request->EDLIEmployer,
            'ESICWage' => $request->ESICWage,
            'ESICEmployer' => $request->ESICEmployer,
            'MasterGross' => $request->MasterGross,
            'PFControl' => $request->PFControl

            ];

            $validator =  Validator::make($request->all(),[
            'GroossSalary' => 'required',
            'DeductionSalary' => 'required',
            'NetSalary' => 'required',
            'BasicSalary' => 'required',
            'HouseRentAllowance' => 'required',
            'ConveyanceAllowance' => 'required',
            'SpecialAllowance' => 'required',
            'OtherAllowance' => 'required',
            'Incentive' => 'required',
            'SpotIncentive' => 'required',
            'LeaveEncashment' => 'required',
            'CSIIncentive' => 'required',
            'SpecialBonus' => 'required',
            'PerformanceBonus' => 'required',
            'Bonus' => 'required',
            'OtherSalary' => 'required',
            'ArrearsSalary' => 'required',
            'ProvidentFund' => 'required',
            'ESIC' => 'required',
            'TDS' => 'required',
            'OtherDeduction' => 'required',
            'Loan' => 'required',
            'MobileDeduction' => 'required',
            'SalaryAdvance' => 'required',
            'LatePresent' => 'required',
            'SecurityDeposite' => 'required',
            'ProfessionalTaxDeduction' => 'required',
            'PFWages' => 'required',
            'PensionWage' => 'required',
            'EPSEmployer' => 'required',
            'EPFEmployer' => 'required',
            'PFAdminCharge' => 'required',
            'EDLIWage' => 'required',
            'EDLIAdmin' => 'required',
            'EDLIEmployer' => 'required',
            'ESICWage' => 'required',
            'ESICEmployer' => 'required',
            'MasterGross' => 'required',
            'PFControl' => 'required'

            ]);


        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }
        //print_r($salarycomponentallocation);
        date_default_timezone_set('Asia/Kolkata');
        $empSalaryStructure = EmployeeSalaryStructure::find($sStructId);
        $rowmessage = $empSalaryStructure->update($empSalaryStructureData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> $rowmessage
        ]);
    }
}
