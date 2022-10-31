<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComponentNameMaster;
use App\Models\ComponentTypeMaster;
use DataTables;
use Illuminate\Support\Facades\validator;
class ComponentNameMasterController extends Controller
{
     public function index(Request $request){

        return view('cnamemaster');

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
        $componentnamemaster = [
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
        //print_r($componentnamemaster);
        date_default_timezone_set('Asia/Kolkata');
        $rowmessage = ComponentNameMaster::create($componentnamemaster);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Inserted'
        ]);
    }
    public function displayRecords(Request $request){
        $componentnamemaster = ComponentNameMaster::all()->where('status','=',1);
        //print_r($componentnamemaster);
        $response = "";
        if($componentnamemaster->count()>0){
            $response.='<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Component Id</th>
                                <th>Component Name</th>
                                <th>Component Type</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>';
                        foreach ($componentnamemaster as $row) {
                                $response.= '
                                            <tr>
                                            <td>'.$row['cNameId'].'</td>
                                            <td>'.$row['cName'].'</td>
                                            <td>'.$row['cTypeId'].'</td>'.
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
             $componentnamemaster = ComponentNameMaster::find($request->cNameId);
            //return $componentnamemaster->count();

             return response()->json($componentnamemaster);


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


        $componentnamemaster = ComponentNameMaster::find($request->rowId);

        //print_r($_POST);
        $componentnamemasterData = [
        'cName' =>$request->cName,
        'calcCode'=>$request->calcCode,
        'cTypeId'=>$request->cTypeId,
        'status'=>1
        ];

        //print_r($componentnamemaster);

        date_default_timezone_set('Asia/Kolkata');
        $componentnamemaster->update($componentnamemasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Updated'
        ]);
    }
    public function delete(Request $request){
        $componentnamemaster = ComponentNameMaster::find($request->cNameId);
        $componentnamemasterData = [
            'status'=>0
        ];
        //print_r($componentnamemaster);

        date_default_timezone_set('Asia/Kolkata');
        $componentnamemaster->update($componentnamemasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Deleted'
        ]);

    }
}
