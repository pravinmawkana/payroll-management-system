<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ComponentNameMaster;
use App\Models\ComponentTypeMaster;
use App\Models\SalaryComponentAllocation;
use DataTables;
use Illuminate\Support\Facades\validator;


class SalaryComponentAllocationController extends Controller
{
     public function index(Request $request){

        return view('salarycomponentallocation');

    }
    public function load(Request $request){
        if($request->key=='ctype'){
            $componenttypemaster = ComponentTypeMaster::all()->where('status','=',1);
            return response()->json($componenttypemaster);
        }
    }
    // handler insert using ajax
    public function store(Request $request){

        //print_r($_POST);
        $salarycomponentallocation = [
        'cName' =>$request->cName,
        'calcCode'=>$request->calcCode,
        'cTypeId'=>$request->cTypeId,
        'status'=>1
        ];

          $validator =  Validator::make($request->all(),[
            'cName' =>'required | max:50',
            'calcCode' =>'required | max:255',
            'cTypeId' =>'required'

        ]);
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
        $salarycomponentallocation = SalaryComponentAllocation::all()->where('status','=',1);
        //print_r($salarycomponentallocation);
        $response = "";
        if($salarycomponentallocation->count()>0){
            $response.='<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Component Id</th>
                                <th>Component Name</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>';
                        foreach ($salarycomponentallocation as $row) {
                                $response.= '
                                            <tr>
                                            <td>'.$row['cNameId'].'</td>
                                            <td>'.$row['cName'].'</td>'.
                                            '<td><input type="button" value="edit" onclick='."editData('1','Edit',".$row['cNameId'].")" .' class="btn btn-warning"></td>
                                            <td><input type="button" value="View" onclick='."editData('0','Edit',".$row['cNameId'].")" .' class="btn"></td>
                                            <td><input type="button" value="Delete" onclick='."deleteData('1','Delete',".$row['cNameId'].")" .' class="btn btn-danger"> </td>
                                            </tr>';
                        }
        }else{
            $response.='<h1 class="text-center"> No Records</h1>';
        }
        $response.= '    </tbody>
                    </table>';
        return $response;
    }
    public function edit(Request $request){
            //echo $request->cNameId;
             $salarycomponentallocation = SalaryComponentAllocation::find($request->cNameId);
            //return $salarycomponentallocation->count();

             return response()->json($salarycomponentallocation);


    }
    public function update(Request $request){

          $validator =  Validator::make($request->all(),[
                'cName' =>'required | max:50',
                'calcCode' =>'required | max:255',
                'cTypeId' => 'required'
                ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }


        $salarycomponentallocation = SalaryComponentAllocation::find($request->rowId);

        //print_r($_POST);
        $salarycomponentallocationData = [
        'cName' =>$request->cName,
        'calcCode'=>$request->calcCode,
        'cTypeId'=>$request->cTypeId,
        'status'=>1
        ];

        //print_r($salarycomponentallocation);

        date_default_timezone_set('Asia/Kolkata');
        $salarycomponentallocation->update($salarycomponentallocationData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Updated'
        ]);
    }
    public function delete(Request $request){
        $salarycomponentallocation = SalaryComponentAllocation::find($request->cNameId);
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
