<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DesignationMaster;
use DataTables;
use Illuminate\Support\Facades\validator;
class DesignationMasterController extends Controller
{
    public function index(Request $request){

        return view('designationMaster');

    }
    // handler insert using ajax
    public function store(Request $request){

        //print_r($_POST);
        $designationmaster = [
        'desigName' =>$request->desigName,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1
        ];

          $validator =  Validator::make($request->all(),[
            'desigName' =>'required | max:50'

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }
        //print_r($designationmaster);
        date_default_timezone_set('Asia/Kolkata');
        $rowmessage = DesignationMaster::create($designationmaster);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Inserted'
        ]);
    }
    public function displayRecords(Request $request){
        $designationmaster = DesignationMaster::all()->where('status','=',1)->where('companyId','=',$request->session()->get('companyId'));
        //print_r($designationmaster);
        $response = "";
        if($designationmaster->count()>0){
            $response.='<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Designation Id</th>
                                <th>Designation Name</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>';
                        foreach ($designationmaster as $row) {
                                $response.= '
                                            <tr>
                                            <td>'.$row['desigId'].'</td>
                                            <td>'.$row['desigName'].'</td>'.
                                            '<td><input type="button" value="edit" onclick='."editData('1','Edit',".$row['desigId'].")" .' class="btn btn-warning"></td>
                                            <td><input type="button" value="View" onclick='."editData('0','Edit',".$row['desigId'].")" .' class="btn"></td>
                                            <td><input type="button" value="Delete" onclick='."deleteData('1','Delete',".$row['desigId'].")" .' class="btn btn-danger"> </td>
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
            //echo $request->desigId;
             $designationmaster = DesignationMaster::find($request->desigId);
            //return $designationmaster->count();

             return response()->json($designationmaster);


    }
    public function update(Request $request){

          $validator =  Validator::make($request->all(),[
                'desigName' =>'required | max:50'
                ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }


        $designationmaster = DesignationMaster::find($request->rowId);

        //print_r($_POST);
        $designationmasterData = [
        'desigName' =>$request->desigName,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1
        ];

        //print_r($designationmaster);

        date_default_timezone_set('Asia/Kolkata');
        $designationmaster->update($designationmasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Updated'
        ]);
    }
    public function delete(Request $request){
        $designationmaster = DesignationMaster::find($request->desigId);
        $designationmasterData = [
            'status'=>0
        ];
        //print_r($designationmaster);

        date_default_timezone_set('Asia/Kolkata');
        $designationmaster->update($designationmasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Deleted'
        ]);

    }
}
