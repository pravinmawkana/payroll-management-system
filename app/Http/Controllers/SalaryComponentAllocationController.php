<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ComponentNameMaster;
use App\Models\ComponentTypeMaster;
use App\Models\TDSHeadMaster;
use App\Models\SalaryComponentAllocation;
use DataTables;
use Illuminate\Support\Facades\validator;


class SalaryComponentAllocationController extends Controller
{
     public function index(Request $request){

        return view('salarycomponentallocation');

    }
    public function load(Request $request){
        if($request->key=='comptName'){

                $componentnamemaster = ComponentNameMaster::all()->where('status','=',1);
                return response()->json($componentnamemaster);



        }
        if($request->key=='tdsHead'){
            $tdsheadmaster = TDSHeadMaster::all()->where('status','=',1);
            return response()->json($tdsheadmaster);
        }
        //echo "not load";
    }
    // handler insert using ajax
    public function store(Request $request){
        $validator = "";
        $salarycomponentallocation = "";
        if( isset($request->txtComptName))
        {
            //print_r($_POST);
            $salarycomponentallocation = [
            'calcCode' => $request->calcCode,
            'calcType' => $request->calcType,
            'comptName' => $request->txtComptName,
            'comptDesc' => $request->comptDesc,
            'cTypeId' => $request->cTypeId,
            'comptFormula' => $request->comptFormula,
            'calcAttendance' => $request->calcAttendance,
            'consdWeekOff' => $request->consdWeekOff,
            'consdPubHoliday' => $request->consdPubHoliday,
            'roundOff' => $request->roundOff,
            'printIfZero' => $request->printIfZero,
            'printOrder' => $request->printOrder,
            'tdsHead' => $request->tdsHead,
            'calcOrder' => $request->calcOrder,
            'companyId' => $request->session()->get('companyId'),
            'examptionLimit' => $request->examptionLimit,
            'status'=>1
            ];

            $validator =  Validator::make($request->all(),[
                'calcCode'=>'required | max:50',
                'calcType'=>'required | max:50',
                'comptName'=>'required | max:50',
                'comptDesc'=>'required | max:50',
                'cTypeId'=>'required',
                'comptFormula'=>'required | max:50',
                'calcAttendance'=>'required',
                'consdWeekOff'=>'required',
                'consdPubHoliday'=>'required',
                'roundOff'=>'required',
                'printIfZero'=>'required',
                'printOrder'=>'required',
                'tdsHead'=>'required | max:50',
                'calcOrder'=>'required',
                'examptionLimit'=>'required',

            ]);
        }
        if( isset($request->txtComptNamededuction))
        {
            //print_r($_POST);
            $salarycomponentallocation = [
            'calcCode' => $request->calcCodededuction,
            'calcType' => $request->calcTypededuction,
            'comptName' => $request->txtComptNamededuction,
            'comptDesc' => $request->comptDescdeduction,
            'cTypeId' => $request->cTypeIddeduction,
            'comptFormula' => $request->comptFormuladeduction,
            'calcAttendance' => $request->calcAttendancededuction,
            'consdWeekOff' => $request->consdWeekOffdeduction,
            'consdPubHoliday' => $request->consdPubHolidaydeduction,
            'roundOff' => $request->roundOffdeduction,
            'printIfZero' => $request->printIfZerodeduction,
            'printOrder' => $request->printOrderdeduction,
            'tdsHead' => $request->tdsHeaddeduction,
            'calcOrder' => $request->calcOrderdeduction,
            'companyId' => $request->session()->get('companyId'),
            'examptionLimit' => $request->examptionLimitdeduction,
            'status'=>1
            ];

            $validator =  Validator::make($request->all(),[
                'calcCodededuction'=>'required | max:50',
                'calcTypededuction'=>'required | max:50',
                'comptNamededuction'=>'required | max:50',
                'comptDescdeduction'=>'required | max:50',
                'cTypeIddeduction'=>'required',
                'comptFormuladeduction'=>'required | max:50',
                'calcAttendancededuction'=>'required',
                'consdWeekOffdeduction'=>'required',
                'consdPubHolidaydeduction'=>'required',
                'roundOffdeduction'=>'required',
                'printIfZerodeduction'=>'required',
                'printOrderdeduction'=>'required',
                'tdsHeaddeduction'=>'required | max:50',
                'calcOrderdeduction'=>'required',
                'examptionLimitdeduction'=>'required',

            ]);
        }
        if( isset($request->txtComptNameother))
        {
            //print_r($_POST);
            $salarycomponentallocation = [
            'calcCode' => $request->calcCodeother,
            'calcType' => $request->calcTypeother,
            'comptName' => $request->txtComptNameother,
            'comptDesc' => $request->comptDescother,
            'cTypeId' => $request->cTypeIdother,
            'comptFormula' => $request->comptFormulaother,
            'calcAttendance' => $request->calcAttendanceother,
            'consdWeekOff' => $request->consdWeekOffother,
            'consdPubHoliday' => $request->consdPubHolidayother,
            'roundOff' => $request->roundOffother,
            'printIfZero' => $request->printIfZeroother,
            'printOrder' => $request->printOrderother,
            'tdsHead' => $request->tdsHeadother,
            'calcOrder' => $request->calcOrderother,
            'companyId' => $request->session()->get('companyId'),
            'examptionLimit' => $request->examptionLimitother,
            'status'=>1
            ];

          $validator =  Validator::make($request->all(),[
            'calcCodeother'=>'required | max:50',
            'calcTypeother'=>'required | max:50',
            'comptNameother'=>'required | max:50',
            'comptDescother'=>'required | max:50',
            'cTypeIdother'=>'required',
            'comptFormulaother'=>'required | max:50',
            'calcAttendanceother'=>'required',
            'consdWeekOffother'=>'required',
            'consdPubHolidayother'=>'required',
            'roundOffother'=>'required',
            'printIfZeroother'=>'required',
            'printOrderother'=>'required',
            'tdsHeadother'=>'required | max:50',
            'calcOrderother'=>'required',
            'examptionLimitother'=>'required',

        ]);
        }


        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }
        //print_r($salarycomponentallocation);
        date_default_timezone_set('Asia/Kolkata');
        $rowmessage = SalaryComponentAllocation::create($salarycomponentallocation);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Inserted'
        ]);
    }
    public function displayRecords(Request $request){
        $salaryEarningComponet = SalaryComponentAllocation::all()->where('status','=',1)->where('cTypeId','=',1);
        $salaryDeductionComponet = SalaryComponentAllocation::all()->where('status','=',1)->where('cTypeId','=',2);
        $salaryOtherComponet = SalaryComponentAllocation::all()->where('status','=',1)->where('cTypeId','=',3);
        //print_r($salaryEarningComponet);
        $earning='<h1 class="text-center"> No Records</h1>';
        $deduction='<h1 class="text-center"> No Records</h1>';
        $other='<h1 class="text-center"> No Records</h1>';
        $responseEarning = "";
        $responseDeduction = "";
        $responseOther = "";
        if($salaryEarningComponet->count()>0){
            $responseEarning.='';
                        foreach ($salaryEarningComponet as $row) {
                                $responseEarning.= '
                                            <tr>
                                            <td>'.$row['comptId'].'</td>
                                            <td>'.$row['comptName'].'</td>'.
                                            '<td><input type="button" value="edit" onclick='."editData('1','EditEarning',".$row['comptId'].")" .' class="btn btn-warning"></td>
                                            <td><input type="button" value="View" onclick='."editData('0','EditEarning',".$row['comptId'].")" .' class="btn"></td>
                                            <td><input type="button" value="Delete" onclick='."deleteData('1','Delete',".$row['comptId'].")" .' class="btn btn-danger"> </td>
                                            </tr>';
                        }
        }else{
            $responseEarning.='<h1 class="text-center"> No Records</h1>';
        }
        $responseDeduction.= '';
        if($salaryDeductionComponet->count()>0){
            $responseDeduction.='';
                        foreach ($salaryDeductionComponet as $row) {
                                $responseDeduction.= '
                                            <tr>
                                            <td>'.$row['comptId'].'</td>
                                            <td>'.$row['comptName'].'</td>'.
                                            '<td><input type="button" value="edit" onclick='."editData('1','EditDeduction',".$row['comptId'].")" .' class="btn btn-warning"></td>
                                            <td><input type="button" value="View" onclick='."editData('0','EditDeduction',".$row['comptId'].")" .' class="btn"></td>
                                            <td><input type="button" value="Delete" onclick='."deleteData('1','Delete',".$row['comptId'].")" .' class="btn btn-danger"> </td>
                                            </tr>';
                        }
        }else{
            $responseDeduction.='<h1 class="text-center"> No Records</h1>';
        }
        $responseDeduction.= '';
        if($salaryOtherComponet->count()>0){
            $responseOther.='';
                        foreach ($salaryOtherComponet as $row) {
                                $responseOther.= '
                                            <tr>
                                            <td>'.$row['comptId'].'</td>
                                            <td>'.$row['comptName'].'</td>'.
                                            '<td><input type="button" value="edit" onclick='."editData('1','EditOther',".$row['comptId'].")" .' class="btn btn-warning"></td>
                                            <td><input type="button" value="View" onclick='."editData('0','EditOther',".$row['comptId'].")" .' class="btn"></td>
                                            <td><input type="button" value="Delete" onclick='."deleteData('1','Delete',".$row['comptId'].")" .' class="btn btn-danger"> </td>
                                            </tr>';
                        }
        }else{
            $responseOther.='<h1 class="text-center"> No Records</h1>';
        }
        $responseOther.= '';
        $earning = $responseEarning;
        $deduction = $responseDeduction;
        $other = $responseOther;
        $response = array();

        $response[] = array(
            "Earning"=>$earning,
            "Deduction"=>$deduction,
            "Other"=>$other
        );
        return json_encode($response);
    }
    public function edit(Request $request){
            //echo $request->cNameId;
             $salarycomponentallocation = SalaryComponentAllocation::find($request->comptId);
            //return $salarycomponentallocation->count();

             return response()->json($salarycomponentallocation);


    }
    public function update(Request $request){
        $salarycomponentallocationData = "";

        if( isset($request->txtComptName))
        {
          $validator =  Validator::make($request->all(),[
            'calcType'=>'required | max:50',
            'comptDesc'=>'required | max:50',
            'cTypeId'=>'required',
            'comptFormula'=>'required | max:50',
            'calcAttendance'=>'required',
            'consdWeekOff'=>'required',
            'consdPubHoliday'=>'required',
            'roundOff'=>'required',
            'printIfZero'=>'required',
            'printOrder'=>'required',
            'tdsHead'=>'required | max:50',
            'calcOrder'=>'required',
            'examptionLimit'=>'required',

            ]);

            if($validator->fails()){
                return response()->json([
                    'status'=>400,
                    'errors'=> $validator->messages(),
                ]);
            }


            // $salarycomponentallocation = SalaryComponentAllocation::find($request->rowId);

            //print_r($_POST);
            $salarycomponentallocationData = [
            'calcType' => $request->calcType,
            'comptDesc' => $request->comptDesc,
            'cTypeId' => $request->cTypeId,
            'comptFormula' => $request->comptFormula,
            'calcAttendance' => $request->calcAttendance,
            'consdWeekOff' => $request->consdWeekOff,
            'consdPubHoliday' => $request->consdPubHoliday,
            'roundOff' => $request->roundOff,
            'printIfZero' => $request->printIfZero,
            'printOrder' => $request->printOrder,
            'tdsHead' => $request->tdsHead,
            'calcOrder' => $request->calcOrder,
            'examptionLimit' => $request->examptionLimit,
            ];
        }
         if( isset($request->txtComptNamededuction))
        {
            $validator =  Validator::make($request->all(),[
            'calcTypededuction'=>'required | max:50',
            'comptDescdeduction'=>'required | max:50',
            'cTypeIddeduction'=>'required',
            'comptFormuladeduction'=>'required | max:50',
            'calcAttendancededuction'=>'required',
            'consdWeekOffdeduction'=>'required',
            'consdPubHolidaydeduction'=>'required',
            'roundOffdeduction'=>'required',
            'printIfZerodeduction'=>'required',
            'printOrderdeduction'=>'required',
            'tdsHeaddeduction'=>'required | max:50',
            'calcOrderdeduction'=>'required',
            'examptionLimitdeduction'=>'required',

            ]);

            if($validator->fails()){
                return response()->json([
                    'status'=>400,
                    'errors'=> $validator->messages(),
                ]);
            }


            $salarycomponentallocation = SalaryComponentAllocation::find($request->rowIddeduction);

            //print_r($_POST);
            $salarycomponentallocationData = [
            'calcType' => $request->calcTypededuction,
            'comptDesc' => $request->comptDescdeduction,
            'cTypeId' => $request->cTypeIddeduction,
            'comptFormula' => $request->comptFormuladeduction,
            'calcAttendance' => $request->calcAttendancededuction,
            'consdWeekOff' => $request->consdWeekOffdeduction,
            'consdPubHoliday' => $request->consdPubHolidaydeduction,
            'roundOff' => $request->roundOffdeduction,
            'printIfZero' => $request->printIfZerodeduction,
            'printOrder' => $request->printOrderdeduction,
            'tdsHead' => $request->tdsHeaddeduction,
            'calcOrder' => $request->calcOrderdeduction,
            'examptionLimit' => $request->examptionLimitdeduction,
            ];
        }
        if( isset($request->txtComptNameother))
        {
            $validator =  Validator::make($request->all(),[
            'calcTypeother'=>'required | max:50',
            'comptDescother'=>'required | max:50',
            'cTypeIdother'=>'required',
            'comptFormulaother'=>'required | max:50',
            'calcAttendanceother'=>'required',
            'consdWeekOffother'=>'required',
            'consdPubHolidayother'=>'required',
            'roundOffother'=>'required',
            'printIfZeroother'=>'required',
            'printOrderother'=>'required',
            'tdsHeadother'=>'required | max:50',
            'calcOrderother'=>'required',
            'examptionLimitother'=>'required',

            ]);

            if($validator->fails()){
                return response()->json([
                    'status'=>400,
                    'errors'=> $validator->messages(),
                ]);
            }


            $salarycomponentallocation = SalaryComponentAllocation::find($request->rowIdother);

            //print_r($_POST);
            $salarycomponentallocationData = [
            'calcType' => $request->calcTypeother,
            'comptDesc' => $request->comptDescother,
            'cTypeId' => $request->cTypeIdother,
            'comptFormula' => $request->comptFormulaother,
            'calcAttendance' => $request->calcAttendanceother,
            'consdWeekOff' => $request->consdWeekOffother,
            'consdPubHoliday' => $request->consdPubHolidayother,
            'roundOff' => $request->roundOffother,
            'printIfZero' => $request->printIfZeroother,
            'printOrder' => $request->printOrderother,
            'tdsHead' => $request->tdsHeadother,
            'calcOrder' => $request->calcOrderother,
            'examptionLimit' => $request->examptionLimitother,
            ];
        }
        //print_r($salarycomponentallocation);
        // $salarycomponentallocation = SalaryComponentAllocation::find($request->rowId);
        date_default_timezone_set('Asia/Kolkata');
        $salarycomponentallocation->update($salarycomponentallocationData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Updated'
        ]);
    }
    public function delete(Request $request){
        $salarycomponentallocation = SalaryComponentAllocation::find($request->comptId);
        $salarycomponentallocationData = [
            'status'=>0
        ];
        //print_r($salarycomponentallocation);

        date_default_timezone_set('Asia/Kolkata');
        $salarycomponentallocation->update($salarycomponentallocationData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Deleted'
        ]);

    }
}
