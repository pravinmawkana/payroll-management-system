<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DivisionMaster;
use DataTables;
use Illuminate\Support\Facades\validator;
class DivisionMasterController extends Controller
{
    public function index(Request $request){

        return view('divisionmaster');

    }
    // handler insert using ajax
    public function store(Request $request){

        //print_r($_POST);
        $divisionMaster = [
        'divName' =>$request->divName,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1
        ];

          $validator =  Validator::make($request->all(),[
            'divName' =>'required | max:50'

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }
        //print_r($divisionMaster);
        date_default_timezone_set('Asia/Kolkata');
        $rowmessage = DivisionMaster::create($divisionMaster);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Inserted'
        ]);
    }
    public function displayRecords(Request $request){
        $divisionMaster = DivisionMaster::all()->where('status','=',1)->where('companyId','=',$request->session()->get('companyId'));
        //print_r($divisionMaster);
        $response = "";
        if($divisionMaster->count()>0){
            $response.='<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Division Id</th>
                                <th>Division Name</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>';
                        foreach ($divisionMaster as $row) {
                                $response.= '
                                            <tr>
                                            <td>'.$row['divId'].'</td>
                                            <td>'.$row['divName'].'</td>'.
                                            '<td><input type="button" value="edit" onclick='."editData('1','Edit',".$row['divId'].")" .' class="btn btn-warning"></td>
                                            <td><input type="button" value="View" onclick='."editData('0','Edit',".$row['divId'].")" .' class="btn"></td>
                                            <td><input type="button" value="Delete" onclick='."deleteData('1','Delete',".$row['divId'].")" .' class="btn btn-danger"> </td>
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
            //echo $request->divId;
             $divisionMaster = DivisionMaster::find($request->divId);
            //return $divisionMaster->count();

             return response()->json($divisionMaster);


    }
    public function update(Request $request){

          $validator =  Validator::make($request->all(),[
                'divName' =>'required | max:50'
                ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }


        $divisionMaster = DivisionMaster::find($request->rowId);

        //print_r($_POST);
        $divisionMasterData = [
        'divName' =>$request->divName,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1
        ];

        //print_r($divisionMaster);

        date_default_timezone_set('Asia/Kolkata');
        $divisionMaster->update($divisionMasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Updated'
        ]);
    }
    public function delete(Request $request){
        $divisionMaster = DivisionMaster::find($request->divId);
        $divisionMasterData = [
            'status'=>0
        ];
        //print_r($divisionMaster);

        date_default_timezone_set('Asia/Kolkata');
        $divisionMaster->update($divisionMasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Deleted'
        ]);

    }
}
