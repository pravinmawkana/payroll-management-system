<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BranchMaster;
use DataTables;
use Illuminate\Support\Facades\validator;
class BranchMasterConroller extends Controller
{
    public function index(Request $request){

        return view('branchmaster');

    }
    // handler insert using ajax
    public function store(Request $request){

        //print_r($_POST);
        $branchmaster = [
        'branchCode' =>$request->branchCode,
        'branchName' =>$request->branchName,
        'address' =>$request->address,
        'tanNo' =>$request->tanNo,
        'isPTApplicable' =>$request->isPTApplicable,
        'ptRegNo' =>$request->ptRegNo,
        'ptLocalOfiice' =>$request->ptLocalOfiice,
        'days' =>$request->days,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1
        ];

          $validator =  Validator::make($request->all(),[
            'branchCode' =>'required | max:20',
            'branchName' =>'required | max:30',
            'address' =>'required | max:255',
            'tanNo' =>'required | max:20',
            'isPTApplicable' =>'required',
            'ptLocalOfiice' =>'required | max:50',
            'days' =>'required | max:2'

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }
        //print_r($branchmaster);
        date_default_timezone_set('Asia/Kolkata');
        $rowmessage = BranchMaster::create($branchmaster);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Inserted'
        ]);
    }
    public function displayRecords(Request $request){
        $branchmaster = BranchMaster::all()->where('status','=',1)->where('companyId','=',$request->session()->get('companyId'));
        //print_r($branchmaster);
        $response = "";
        if($branchmaster->count()>0){
            $response.='<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Tan Id</th>
                                <th>TAN No</th>
                                <th>Resonsible Person Name</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>';
                        foreach ($branchmaster as $row) {
                                $response.= '
                                            <tr>
                                            <td>'.$row['branchId'].'</td>
                                            <td>'.$row['branchCode'].'</td>'.'<td>'.$row['branchName'].'</td>' .
                                            '<td><input type="button" value="edit" onclick='."editData('1','Edit',".$row['branchId'].")" .' class="btn btn-warning"></td>
                                            <td><input type="button" value="View" onclick='."editData('0','Edit',".$row['branchId'].")" .' class="btn"></td>
                                            <td><input type="button" value="Delete" onclick='."deleteData('1','Delete',".$row['branchId'].")" .' class="btn btn-danger"> </td>
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
            //echo $request->branchId;
             $branchmaster = BranchMaster::find($request->branchId);
            //return $branchmaster->count();

             return response()->json($branchmaster);


    }
    public function update(Request $request){

          $validator =  Validator::make($request->all(),[
            'branchCode' =>'required | max:20',
            'branchName' =>'required | max:30',
            'address' =>'required | max:255',
            'tanNo' =>'required | max:20',
            'isPTApplicable' =>'required',
            'ptLocalOfiice' =>'required | max:50',
            'days' =>'required | max:2'

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }


        $branchmaster = BranchMaster::find($request->rowId);

        //print_r($_POST);
        $branchmasterData = [
        'branchCode' =>$request->branchCode,
        'branchName' =>$request->branchName,
        'address' =>$request->address,
        'tanNo' =>$request->tanNo,
        'isPTApplicable' =>$request->isPTApplicable,
        'ptRegNo' =>$request->ptRegNo,
        'ptLocalOfiice' =>$request->ptLocalOfiice,
        'days' =>$request->days,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1
        ];

        //print_r($branchmaster);

        date_default_timezone_set('Asia/Kolkata');
        $branchmaster->update($branchmasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Updated'
        ]);
    }
    public function delete(Request $request){
        $branchmaster = BranchMaster::find($request->branchId);
        $branchmasterData = [
            'status'=>0
        ];
        //print_r($branchmaster);

        date_default_timezone_set('Asia/Kolkata');
        $branchmaster->update($branchmasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Deleted'
        ]);

    }
}
